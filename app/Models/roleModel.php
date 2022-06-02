<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roleModel extends Model
{
    use HasFactory;
    public $timestamps = true;
    // 
	protected $table = 'user_roles';


    public static function search($searchValue) {
        return empty($searchValue) ? static::query()
            : static::query()->where(function($query) use($searchValue) {
                $query->where('name', 'LIKE', '%'.$searchValue.'%')
                    ->orWhere('description', 'LIKE', '%'.$searchValue.'%');
        });
    }
}
