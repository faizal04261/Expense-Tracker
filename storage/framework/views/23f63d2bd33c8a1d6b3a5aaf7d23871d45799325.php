<!DOCTYPE html>
<html>
<head><meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<style type="text/css">
    body {
        background-image: url('<?php echo e(public_path('img/bg.png')); ?>');
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        font-family: sans-serif;
    }
</style>
<script type="text/javascript" src="<?php echo e(public_path('js/app.js')); ?>"></script>
</head>
<body>




<h1 style="position:absolute;right:30px;top:15px" class="cls_005"><span style="color:#205985">MANDATORY COMPLIANCE</span></h1>
<h1 style="position:absolute;right:30px;top:50px" class="cls_005"><span style="color:#205985">TRAINING </span><span style="color:#E2AA43">CERTIFICATE</span></h1>

<h2 style="position:absolute;left:30px;top:100px" class="cls_008"><span style="color:#FFFFFF">MODULES and</span> <span style="color:#E2AA43">RATINGS</span></h2>
<h4 style="position:absolute;right:30px;top:130px" class="cls_006"><span style="color:#205985">THIS CERTIFIES THAT</span></h4>
<div style="position:absolute;right:30px;top:200px;max-width:520px" class="cls_012"><span style="color:#205985;font-size:42px;font-weight:bold"><?php echo e($examdetails['fname'] . ' ' .$examdetails['lname']); ?></span></div>
<?php ($index = 170); ?>

<?php $__currentLoopData = $tmpcatelistdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catidata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php ($style = $index . 'px'); ?>
    <!-- <div style="position:absolute;left:50.62px;top:211.58px" class="cls_004"> -->
        <div style="position:absolute;left:45px;top:<?php echo e($style); ?>;max-width:280px" class="cls_004">
            <!-- <span class="cls_004">Business Continuity Management</span> -->
            <span style="color:#E2AA43;font-size:12px"><?php echo e($catidata['status'] .'% '); ?></span> <span style="color:#FFFFFF;font-size:12px"><?php echo e($catidata['catename']); ?></span>
        </div>                     
    
    <?php ($index = $index + 40); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<div style="position:absolute;right:30px;top:340px;max-width:520px;text-align:right" class="cls_003"><span style="color:#205985">has successfully completed and passed the <br><?php echo e($examdetails['examName']); ?></span></div>
<div style="position:absolute;right:30px;top:440px;text-align:right" class="cls_003"><span style="color:#205985">Issued this <?php echo e(\Carbon\Carbon::parse($examdetails['takendate'])->format('jS')); ?> day of <?php echo e(\Carbon\Carbon::parse($examdetails['takendate'])->format('F')); ?> in the year <?php echo e(\Carbon\Carbon::parse($examdetails['takendate'])->format('Y')); ?>.</span></div>

<img src="<?php echo e(public_path('img/irensign.png')); ?>" style="position:absolute;right:300px;top:570px"></div>
<div style="position:absolute;right:270px;top:630px" class="cls_007"><span style="color:#205985;font-weight:bold">Irene Ramos-Salvacion</span></div>
<div style="position:absolute;right:250px;top:660px;text-align:center" class="cls_05"><span style="color:#205985;font-size:12px">General Counsel - Philippine Operations <br>and Compliance Officer</span></div>

<img src="<?php echo e(public_path('img/anshumsign.png')); ?>" style="position:absolute;right:20px;top:570px"></div>
<div style="position:absolute;right:50px;top:630px" class="cls_007"><span style="color:#205985;font-weight:bold">Anshum Sinha</span></div>
<div style="position:absolute;right:29px;top:660px" class="cls_013"><span style="color:#205985;font-size:12px">CPO and Country Manager</span></div>
<!-- <div style="position:absolute;left:377.95px;top:563.09px" class="cls_014"><span class="cls_014">Operations</span></div> -->

<!-- <div style="position:absolute;left:71.78px;top:243.41px" class="cls_004"><span class="cls_004">CMS General Compliance</span></div> -->

<!-- <div style="position:absolute;left:69.62px;top:277.73px" class="cls_004"><span class="cls_004">Medicare Part C and D Fraud,</span></div>
<div style="position:absolute;left:69.62px;top:292.37px" class="cls_004"><span class="cls_004">Waste</span></div>
<div style="position:absolute;left:69.62px;top:314.57px" class="cls_004"><span class="cls_004">Conflict of Interest</span></div>
<div style="position:absolute;left:282.77px;top:325.49px" class="cls_003"><span class="cls_003">has successfully completed and passed the 2022</span></div>
<div style="position:absolute;left:71.78px;top:341.69px" class="cls_004"><span class="cls_004">Compliance Program and</span></div>
<div style="position:absolute;left:71.78px;top:356.33px" class="cls_004"><span class="cls_004">Code of</span></div>
<div style="position:absolute;left:260.81px;top:352.25px" class="cls_003"><span class="cls_003">Shearwater Health Mandatory Compliance Training</span></div>
<div style="position:absolute;left:69.62px;top:381.29px" class="cls_004"><span class="cls_004">Harassment and</span></div>
<div style="position:absolute;left:400.27px;top:386.93px" class="cls_003"><span class="cls_003">Issued this 5th day of March in</span></div>
<div style="position:absolute;left:67.70px;top:414.67px" class="cls_004"><span class="cls_004">HIPAA/HITECH and</span></div>
<div style="position:absolute;left:70.46px;top:444.67px" class="cls_004"><span class="cls_004">Information Security</span></div>
<div style="position:absolute;left:69.62px;top:471.19px" class="cls_004"><span class="cls_004">URAC Current Standards</span></div>
<div style="position:absolute;left:359.47px;top:532.27px" class="cls_007"><span class="cls_007">Irene Ramos-</span></div>
<div style="position:absolute;left:531.46px;top:531.67px" class="cls_007"><span class="cls_007">Anshum</span></div>
<div style="position:absolute;left:335.95px;top:549.79px" class="cls_013"><span class="cls_013">General Counsel - Philippine</span></div>
<div style="position:absolute;left:517.06px;top:547.99px" class="cls_013"><span class="cls_013">CPO and Country</span></div>
<div style="position:absolute;left:377.95px;top:563.09px" class="cls_014"><span class="cls_014">Operations</span></div> -->
</div>


</body>
</html>
<?php /**PATH C:\laragon\www\MandatoryComplianceTraining\resources\views/cert.blade.php ENDPATH**/ ?>