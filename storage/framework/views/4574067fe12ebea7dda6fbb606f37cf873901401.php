<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backup="static">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
				<?php echo e(csrf_field()); ?>  <?php echo e(method_field('POST')); ?>

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true"> &times; </span>
					</button>
					<h3 class="modal-title"></h3>
				</div>

				<div class="modal-body">
					<input type="hidden" name="id" id="id">

					<div class="form-group">
						<label for="name" class="col-md-3 control-label">nama</label>
						<div class="col-md-6">
							<input type="text" name="name" id="name" class="form-control" autofocus required>
							<span class="help-block with-errors"></span>
						</div>	
					</div>

					<div class="form-group">
						<label for="email" class="col-md-3 control-label">email</label>
						<div class="col-md-6">
							<input type="email" name="email" id="email" class="form-control" autofocus required>
							<span class="help-block with-errors"></span>
						</div>	
					</div>

					<div class="form-group">
						<label for="photo" class="col-md-3 control-label">Photo</label>
						<div class="col-md-6">
							<input type="file" name="photo" id="photo" class="form-control">
							<span class="help-block with-errors"></span>
						</div>	
					</div>


				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-save">Submit</button>
					<button type="button" class="btn btn-default" data-dismiss="modal" >Cancel</button>
				</div>		
			</form>
		</div>
	</div>
</div>