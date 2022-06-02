

<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('lw-question-repo')->html();
} elseif ($_instance->childHasBeenRendered('7lULcQX')) {
    $componentId = $_instance->getRenderedChildComponentId('7lULcQX');
    $componentTag = $_instance->getRenderedChildComponentTagName('7lULcQX');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('7lULcQX');
} else {
    $response = \Livewire\Livewire::mount('lw-question-repo');
    $html = $response->html();
    $_instance->logRenderedChild('7lULcQX', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\MandatoryComplianceTraining\resources\views/v-question-repo.blade.php ENDPATH**/ ?>