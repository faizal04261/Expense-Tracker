<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\AccountIsLockedException;
use App\Exceptions\ConfigurationConnectionException;
use App\Exceptions\InvalidCredentialsException;
use App\Exceptions\InvalidLdapGetEntriesParametersException;
use App\Exceptions\PasswordIsExpiredException;
use App\Exceptions\PasswordNeedsToResetException;
use App\Exceptions\UnregisteredErrorException;
use App\Exceptions\UserNotFoundException;

class LdapService
{
    const BASE_DN = 'DC=swh,DC=com';
 
    const LDAP_ERROR_CODES_EXCEPTIONS
        = [
            '52e' => InvalidCredentialsException::class,
            '775' => AccountIsLockedException::class,
            '532' => PasswordIsExpiredException::class,
            '773' => PasswordNeedsToResetException::class,
            '530' => 'Server Error',
            '531' => 'Server Error',
            '533' => 'Server Error',
            '701' => 'Server Error'
        ];

    /**
     * @param $username
     * @param $password
     * @return array
     * @throws ConfigurationConnectionException
     * @throws InvalidCredentialsException
     * @throws InvalidLdapGetEntriesParametersException
     */
    public function login ($username, $password)
    {
      $conn = $this->checkLdapConnection('test', $username, $password);
  

     return  $conn;
    }

    /**
     * @param $hostname
     * @param $username
     * @param $password
     * @return resource
     * @throws ConfigurationConnectionException
     * @throws InvalidCredentialsException
     */
    protected function checkLdapConnection ($hostname, $username, $password)
    {
        if (!$username || !$password) {
            throw new InvalidCredentialsException('Invalid username or password.');
        }else if (!$hostname) {
            throw new ConfigurationConnectionException();
        }

        $connection = $this->ldapConnect($hostname);

        $result = $this->setLdapOptions($connection)->bindLdap($connection, $username, $password);

        if (!$result) {
            $error = $this->getLdapError($connection);
           // throw new $error;
        }

        return $result;
    }

    /**
     * @param $hostname
     * @return resource
     */
    private function ldapConnect ($hostname)
    {
        return ldap_connect($hostname);
    }

    /**
     * @param $connection
     * @return $this
     */
    private function setLdapOptions ($connection)
    {
        ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($connection, LDAP_OPT_REFERRALS, 0);

        return $this;
    }

    /**
     * @param $connection
     * @param $username
     * @param $password
     * @return bool
     */
    private function bindLdap ($connection, $username, $password)
    {
        return @ldap_bind($connection, $this->buildLdapUsername($username), $password);
    }

    /**
     * @param $username
     * @return string
     */
    private function buildLdapUsername ($username)
    {
        return $username . 'test';
    }

    /**
     * @param $connection
     * @return mixed|string
     */
    private function getLdapError ($connection)
    {
        ldap_get_option($connection, 0x0032, $extendedError);

        $errorCode = $extendedError ? $this->getErrorCode($extendedError) : null;

        if (array_key_exists($errorCode, self::LDAP_ERROR_CODES_EXCEPTIONS)) {
            return self::LDAP_ERROR_CODES_EXCEPTIONS[$errorCode];
        }

        return UnregisteredErrorException::class;
    }

    /**
     * @param $extendedError
     * @return mixed
     */
    private function getErrorCode ($extendedError)
    {
        $explodedError = explode(',', $extendedError);
        $explodedError = $explodedError[2];
        $explodedError = explode(' ', $explodedError);

        return $explodedError[2];
    }

    /**
     * @param $connection
     * @param $username
     * @return array
     * @throws InvalidLdapGetEntriesParametersException
     */
    private function getUserDetails ($connection, $username)
    {
        $filter = '(samaccountname=' . $username . ')';

        $attributesToReturn = [
            'ou',
            'sn',
            'lastlogon',
            'givenname',
            'cn',
            'samaccountname',
            'description',
            'department',
            'mail'
        ];

        $result = ldap_search($connection, self::BASE_DN, $filter, $attributesToReturn);

        $userInfo = ldap_get_entries($connection, $result);

        if (!$userInfo['count']) {
            throw new InvalidLdapGetEntriesParametersException();
        }

        return $userInfo;
    }
}