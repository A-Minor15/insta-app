{{-- delete modal for categories --}}
<div class="modal fade" id="delete-category-{{ $category->id }}">
    <div class="modal-dialog">
        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content border-danger">
                <div class="modal-header border-danger">
                    <h3 class="h5 modal-title">
                        <i class="fa-regular fa-to-square"></i> Delete Category
                    </h3>
                </div>
                <div class="modal-body">
                    Are you sure to delete this category {{ $category->id }}?
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </div>
            </div>
        </form>

    </div>
</div>
