
<div class="modal fade" id="#edit-category-<?php echo e($category->id); ?>">
    <div class="modal-dialog">
        <div class="modal-content border-warning">
            <div class="modal-header border-warning">
                <h3 class="h5 modal-title text-danger">
                    <i class="fa-solid fa-eye-slash"></i> Invisible post
                </h3>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer border-0">
                <form action="" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Invisible</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="delete-category-<?php echo e($category->id); ?>">
    <div class="modal-dialog">
        <div class="modal-content border-success">
            <div class="modal-header border-success">
                <h3 class="h5 modal-title text-success">
                    <i class="fa-solid fa-eye-check"></i>
                </h3>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer border-0">
                <form action="" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <button type="button" class="btn btn-outline-success btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-sm">Visible</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\degtj\OneDrive\デスクトップ\laravel-insta\insta-app\resources\views/Admin/categories/modal/status.blade.php ENDPATH**/ ?>