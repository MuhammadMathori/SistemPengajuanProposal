@extends('dashboard.layouts.main')

@section('title', 'Books')

@section('container')
    <div class="mt-4">
        <h2>Books List</h2>
        <div class="mt-4 d-flex justify-content-end">
            <a href="create-book" class="btn btn-primary me-3">Create New Book</a>
            <a href="deleted-book" class="btn btn-info">View Book Delete</a>
        </div>
        <div class="mt-5">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="mt-4">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Code</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $book->book_code }}</td>
                            <td>{{ $book->title }}</td>
                            <td>
                                @foreach ($book->categories as $category)
                                    {{ $category->name }} <br>
                                @endforeach
                            </td>
                            <td>{{ $book->status }}</td>
                            <td>
                                <a href="edit-book/{{ $book->slug }}" class="btn btn-warning">Edit</a>
                                <a href="delete-book/{{ $book->slug }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
