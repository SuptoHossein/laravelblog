@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Post</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post List</a></li>
                    <li class="breadcrumb-item active">Edit Post</li>
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
                            <h3 class="card-title">Edit Post - {{ $post->title }}</h3>
                            <a class="btn btn-primary" href="{{ route('post.index') }}">Back</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                <!-- form start -->
                                <form action="{{ route('post.update', [$post->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        @include('includes.errors')
                                        <div class="form-group">
                                            <label for="title">Post title</label>
                                            <input type="title" class="form-control" name="title"
                                                placeholder="Post title" value="{{ $post->title }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Post Category</label>
                                            <select name="category" class="form-control" id="category">
                                                <option value="" style="display:none;" selected>Select Category</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @if ($post->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-8">
                                                    <label for="image">Image</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="image" id="image">
                                                        <label class="custom-file-label" for="image">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="" style="width: 100px;height: 100px;overflow: hidden;margin-left:auto">
                                                        <img src="{{ $post->image }}" class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="image">Post Tag</label>
                                            <div class="d-flex justify-wrap">
                                                @foreach ($tags as $tag)
                                                <div class="custom-control custom-checkbox mr-2">
                                                    <input class="custom-control-input" name="tag[]" type="checkbox"
                                                        id="tag{{ $tag->id }}" value="{{ $tag->id }}">
                                                    <label for="tag{{ $tag->id }}"
                                                        class="custom-control-label">{{ $tag->name }}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Description</label>
                                            <textarea name="description" id="" cols="" rows="4" class="form-control" placeholder="Enter Description"> {{ $post->description }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
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


