
<div class="modal fade" id="hide-post-<?php echo e($post->id); ?>">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    <i class="fa-solid fa-eye-slash"></i> Invisible post
                </h3>
            </div>
            <div class="modal-body">
                Are you sure you want to hide the post <?php echo e($post->id); ?>?
            </div>
            <div class="modal-footer border-0">
                <form action="<?php echo e(route('admin.posts.hide', $post->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Invisible</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="unhide-post-<?php echo e($post->id); ?>">
    <div class="modal-dialog">
        <div class="modal-content border-success">
            <div class="modal-header border-success">
                <h3 class="h5 modal-title text-success">
                    <i class="fa-solid fa-eye-check"></i> Visible Post
                </h3>
            </div>
            <div class="modal-body">
                Are you sure you want to visible the post <?php echo e($post->id); ?>?
            </div>
            <div class="modal-footer border-0">
                <form action="<?php echo e(route('admin.posts.unhide', $post->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <button type="button" class="btn btn-outline-success btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-sm">Visible</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\degtj\OneDrive\デスクトップ\laravel-insta\insta-app\resources\views/Admin/posts/modal/status.blade.php ENDPATH**/ ?>