
<div class="modal fade" id="delete-category-<?php echo e($category->id); ?>">
    <div class="modal-dialog">
        <form action="<?php echo e(route('admin.categories.destroy', $category->id)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <div class="modal-content border-danger">
                <div class="modal-header border-danger">
                    <h3 class="h5 modal-title">
                        <i class="fa-regular fa-to-square"></i> Delete Category
                    </h3>
                </div>
                <div class="modal-body">
                    Are you sure to delete this category <?php echo e($category->id); ?>?
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </div>
            </div>
        </form>

    </div>
</div>
<?php /**PATH C:\Users\degtj\OneDrive\デスクトップ\laravel-insta\insta-app\resources\views/Admin/categories/modal/delete.blade.php ENDPATH**/ ?>