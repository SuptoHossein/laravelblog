@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">User Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User List</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">User List</h3>
                            <a class="btn btn-primary" href="{{ route('user.index') }}">Back</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        @include('includes.errors')
                        <div class="row">
                            <div class="col-12 col-lg-9">
                                <!-- form start -->
                                <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="userName">User Name</label>
                                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="userEmail">User Email</label>
                                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="userPassword">Password <small class="text-primary">Enter password, to change</small></label>
                                                    <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="image">Picture</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="image" class="custom-file-input" id="customFile">
                                                        <label class="custom-file-label" for="customFile"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea name="description" id="" cols="30" rows="5" class="form-control" placeholder="Write your profile description">{{ $user->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <button type="Update" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                </form>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div style="height: 200px; width:200px; overflow: hidden;" class="m-auto">
                                            @if ($user->image)
                                                <img src="{{ asset($user->image) }}" alt="" class="img-fluid rounded-circle">
                                            @else
                                                <img src="{{ asset('website/images/user big.png') }}" alt="" class="img-fluid rounded-circle">
                                            @endif
                                        </div>
                                        <h5 class="mt-3">{{ $user->name }}</h5>
                                        <p>{{ $user->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


