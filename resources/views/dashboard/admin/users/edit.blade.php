@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Add new user</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">user create form</h6>
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
                <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("POST")
                    <div class="form-group">
                        <label for="name">Full name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" placeholder="Enter fullname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}"  placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                            <select name="role_id" class="form-control" value="{{ $user->role }}">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="confirm password">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="confirm password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="file upload">Upload Profile Image</label>
                        <input type="file" name="profile_image" id="profile_image_file" hidden>
                        <div class="input-group col-xs-12">
                            <input type="text" id="profile_image" class="form-control file-upload-info" class="form-control" disabled placeholder="No file choosen">
                            <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary"id="profile_image_btn" type="button">Upload</button>
                            </span>
                        </div>
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
         Image Upload
        */
        $('#profile_image_file').change(function() {
            var theUploadValue = this.value.replace(/^.*\\/, "");
            uploadValue = $('#profile_image');
            uploadValue.val(theUploadValue);
        });
        // Upoad Cover Image Button
        document.getElementById('profile_image_btn').onclick = ()=> document.getElementById('profile_image_file').click();
    </script>
@endsection
