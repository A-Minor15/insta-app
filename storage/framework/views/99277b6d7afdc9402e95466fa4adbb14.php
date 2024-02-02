<?php $__env->startSection('title', 'Categories Admin'); ?>

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('admin.categories.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="row mb-3">
            <div class="col-8">
                <input type="text" name="name" class="form-control" placeholder="Add new category here" autofocus>
            </div>
            <div class="col-4">
                <input type="submit" value="Add" class="btn btn-primary">
            </div>
        </div>
        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="text-danger small"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </form>

    <table class="table table-hover align-middle bg-white border text-secondary">
        <thead class="small table-warning text-secondary">
            <th></th>
            <th>NAME</th>
            <th>COUNT</th>
            <th>LAST UPDATED</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $all_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($category->id); ?></td>
                    <td><?php echo e($category->name); ?></td>
                    <td><?php echo e($category->categoryPost->count()); ?></td>
                    <td><?php echo e($category->updated_at); ?></td>
                    <td>
                        <button class="btn btn-outline-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#edit-category-<?php echo e($category->id); ?>" title="Edit"><i class="fa-solid fa-pen"></i></button>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-category-<?php echo e($category->id); ?>" title="Delete"><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                    <?php echo $__env->make('Admin.categories.modal.action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('Admin.categories.modal.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="lead text-center text-muted">No Posts Yet</td>
                </tr>
            <?php endif; ?>

            <tr>
                <td></td>
                <td class="text-dark">
                    Uncategorized
                    <p class="xsmall mb-0 text-muted">Hidden posts are not included.</p>
                </td>
                <td><?php echo e($uncategorized_count); ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <?php echo e($all_categories->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\degtj\OneDrive\デスクトップ\laravel-insta\insta-app\resources\views/Admin/categories/index.blade.php ENDPATH**/ ?>