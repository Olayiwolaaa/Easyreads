@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Add new book</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Book create form</h6>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("POST")
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" placeholder="Enter Book Title">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}"  placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" cols="30" rows="10">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                            <select name="category_id" class="form-control" value="{{ old('category') }}">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="initial price">Initial Price</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                              </div>
                                <input type="number" name="init_price" class="form-control" value="{{ old('init_price') }}" placeholder="Enter Book Price">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">Add Discount</span>
                            </div>
                                <input type="number" name="discount_price" class="form-control" value="{{ old('discount') }}" max="100" placeholder="Optional">
                            <div class="input-group-prepend">
                                <span class="input-group-text">%</span>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="file upload">File upload</label>
                        <input type="file" name="cover_image" id="file_upload_coverImage" value="{{ old('cover_image') }}"  hidden>
                        <div class="input-group col-xs-12">
                            <input type="text" id="cover_image" class="form-control file-upload-info" class="form-control" disabled placeholder="No file choosen">
                            <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary"id="upload_cover_image_btn" type="button">Upload</button>
                            </span>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Add Book</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        /*
         making slug automatically
        */
        $('#title').change(function() {
            var theTitle = this.value.toLowerCase().trim(),
                slugInput = $('#slug');
            theSlug = theTitle.replace(/&/g, '-and-')
                .replace(/[^a-z$0-9-]+/g, '-')
                .replace(/\-\-+/g, '-')
                .replace(/^-+|-+$/g, '')

            slugInput.val(theSlug);
        });
        /*
         Image Upload
        */
        $('#file_upload_coverImage').change(function() {
            var theUploadValue = this.value.replace(/^.*\\/, "");
            uploadValue = $('#cover_image');
            uploadValue.val(theUploadValue);
        });
        // Upoad Cover Image Button
        document.getElementById('upload_cover_image_btn').onclick = ()=> document.getElementById('file_upload_coverImage').click();
    </script>
@endsection
