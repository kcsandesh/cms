@extends('layouts.app')

@section('content')

<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <!-- enctype="multipart|form-data" is required when your are passing multimedia data -->
    <div class=" card card-default">
        <div class="card-header">Add Post</div>
        <div class="card-body">
             <div class="form-group">
                <label for="tittle">Title</label>
                <input type="text" class="form-control" name="title" id="title">
                @error('title')
                  <div class="col-sm-9 invalid-text text-danger">{{$message}}</div>
                  @enderror
             </div>

             <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="5" rows="5" class="form-control"></textarea>
                @error('description')
                  <div class="col-sm-9 invalid-text text-danger">{{$message}}</div>
                  @enderror
             </div>
             
             <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
                @error('content')
                  <div class="col-sm-9 invalid-text text-danger">{{$message}}</div>
                  @enderror
             </div>

             <div class="form-group">
                <label for="published_at">Published At</label>
                <input type="text" class="form-control" name="published_at" id="published_at">
             @error('published_at')
                  <div class="col-sm-9 invalid-text text-danger">{{$message}}</div>
                  @enderror
             </div>
             <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image">
                @error('image')
                  <div class="col-sm-9 invalid-text text-danger">{{$message}}</div>
                  @enderror
             </div>
             <div class="form-group">
                 <button type="submit" class="btn btn-success">Create Post</button>
             </div>
        </div>
    </div>
    </div>
</form>

@endsection