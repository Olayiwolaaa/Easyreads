@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Books</h1>
        <div class="my-2 px-1">
            <div class="row">
                <div class="col-6">
                    <div>
                        <a href="{{route('admin.books.create')}}" class="btn-primary btn-sm">
                            <i class="fas fa-plus-circle mr-1"></i>
                            Add Book
                        </a>
                    </div>
                </div>
                <div class="col-6 text-right">
                    <span class="mr-2"><a href="{{ route('admin.books.index') }}">All books</a> |</span>
                    <span class="mr-2"><a href="{{ route('admin.books.trash-books') }}">Trash books</a></span>
                </div>
            </div>
        </div>
        @include('partials.flash_messages')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Books</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 271px;">S/N</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 403px;">Action</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 403px;">Image</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 199px;">Title</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 189px;">Category</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 189px;">Author</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 189px;">Price</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 189px;">Discount</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 189px;">Quantity</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 189px;">Created date</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">S/N</th>
                                <th rowspan="1" colspan="1">Action</th>
                                <th rowspan="1" colspan="1">Image</th>
                                <th rowspan="1" colspan="1">Title</th>
                                <th rowspan="1" colspan="1">Category</th>
                                <th rowspan="1" colspan="1">Author</th>
                                <th rowspan="1" colspan="1">Price</th>
                                <th rowspan="1" colspan="1">Discount</th>
                                <th rowspan="1" colspan="1">Quantity</th>
                                <th rowspan="1" colspan="1">Created date</th>
                        </tfoot>
                        <tbody>
                            @foreach ($books as $book)
                                <tr class="odd">
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <div class="action d-flex flex-row">
                                            <a href="" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('admin.books.destroy', $book) }}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" onclick="return confirm('Book will move to trash! Are you sure to delete??')" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td><img src="{{ $book->getFirstMediaUrl('cover_images', 'thumb') }}"></td>
                                    <td>{{$book->title}}</td>
                                    <td>{{$book->category->name}}</td>
                                    {{-- <td>{{$book->author->user->name}}</td>   --}}
                                    <td>${{$book->init_price}}</td>
                                    <td>{{$book->discount_rate}} %</td>
                                    <td>{{$book->quantity}}</td>
                                    <td>{{$book->created_at->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection
