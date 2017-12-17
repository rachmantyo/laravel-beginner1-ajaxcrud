<?php $__env->startSection('content'); ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="pull-left">
        <h3>Show Post </h3> <a class="btn btn-xs btn-primary" href="<?php echo e(route('post.index')); ?>">Back</a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">
      <div class="form-group">
        <strong>Title : </strong>
        <?php echo e($post->title); ?>

      </div>
    </div>
    <div class="col-xs-12">
      <div class="form-group">
        <strong>Body : </strong>
        <?php echo e($post->desc); ?>

      </div>
    </div>
  </div>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('post.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>