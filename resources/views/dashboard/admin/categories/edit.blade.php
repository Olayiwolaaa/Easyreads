@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Add new Category</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Category create form</h6>
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
                <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ? old('name') : $category->name }}" placeholder="Enter Category name">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') ? old('slug') : $category->slug }}"  placeholder="">
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            <span class="icon text-white-50">
                            </span>
                            <span class="text">Update</span>
                        </button>
                        <button type="reset" class="btn btn-danger">
                            <span class="icon text-white-50">
                            </span>
                            <span class="text">Reset</span>
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
        $('#name').change(function() {
            var theName = this.value.toLowerCase().trim(),
                slugInput = $('#slug');
            theSlug = theName.replace(/&/g, '-and-')
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
