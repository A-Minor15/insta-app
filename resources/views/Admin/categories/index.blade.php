@extends('layouts.app')

@section('title', 'Categories Admin')

@section('content')
    <form action="{{ route('admin.categories.store') }}" method="post">
        @csrf
        <div class="row mb-3">
            <div class="col-8">
                <input type="text" name="name" class="form-control" placeholder="Add new category here" autofocus>
            </div>
            <div class="col-4">
                <input type="submit" value="Add" class="btn btn-primary">
            </div>
        </div>
        @error('name')
            <p class="text-danger small">{{ $message }}</p>
        @enderror
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
            @forelse ($all_categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->categoryPost->count() }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td>
                        <button class="btn btn-outline-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#edit-category-{{ $category->id }}" title="Edit"><i class="fa-solid fa-pen"></i></button>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-category-{{ $category->id }}" title="Delete"><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                    @include('Admin.categories.modal.action')
                    @include('Admin.categories.modal.delete')
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="lead text-center text-muted">No Posts Yet</td>
                </tr>
            @endforelse

            <tr>
                <td></td>
                <td class="text-dark">
                    Uncategorized
                    <p class="xsmall mb-0 text-muted">Hidden posts are not included.</p>
                </td>
                <td>{{ $uncategorized_count }}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $all_categories->links() }}
    </div>
@endsection
