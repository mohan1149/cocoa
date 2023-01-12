<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<p class="help-block">
	<?php echo e(implode(', ', $tag), false); ?>

</p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /Users/mohanvelegacherla/projects/custom/laravel/cocoa/resources/views/notification_template/partials/tags.blade.php ENDPATH**/ ?>