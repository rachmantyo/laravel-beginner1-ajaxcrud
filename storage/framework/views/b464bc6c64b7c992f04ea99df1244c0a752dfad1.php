<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-lg-12">
			<h3>simple Laravel CRUD</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="pull-right">
				<a class="btn btn-xs btn-success" href=" <?php echo e(route('post.create')); ?> " > Create New Post</a>
			</div>
		</div>
	</div>

	<?php if($message = Session::get('success')): ?>
		<div class="alert alert-success">
			<p><?php echo e($message); ?></p>
		</div>
	<?php endif; ?>

	<table class="table table-bordered">
		
		<thead>
			<tr>
				<th>No</th>
				<th>Title</th>
				<th>Description</th>
				<th width="300px">Action</th>
			</tr>
		</thead>
		<tbody>

			<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($data->id); ?></td>
					<td><?php echo e($data->title); ?></td>
					<td><?php echo e($data->desc); ?></td>
					<td>
						<a class="btn btn-xs btn-info" href="<?php echo e(route('post.show', $data->id)); ?>" >Show</a>
						<a class="btn btn-xs btn-primary" href="<?php echo e(route('post.edit', $data->id)); ?>" >Edit</a>

						<?php echo Form::open(['method'=>'delete', 'route'=>['post.destroy', $data->id], 'style'=>'display:inline']); ?>

						<?php echo Form::submit('delete', ['class'=>'btn btn-xs btn-danger']); ?>

						<?php echo Form::close(); ?>

 
					</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			
		</tbody>
	</table>
	<?php echo $posts->links(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('post.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>