@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">
    <h1><b>{{isset($tag)?'Edit Tag':'Create Tag'}}</b></h1>
    </div>
    <div class="card-body">



        <form action="{{isset($tag)? route('tags.update',$tag->id) : route('tags.store')}}" method="POST">
        @csrf

        @if(isset($tag))
        @method('PUT')
        @endif

        <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" class="form-control" name="name" value="{{isset($tag) ? $tag->name :''}}">
        @error('name')
        <div class="col-sm-9 invalid-text text-danger my-2">{{$message}}</div>
        @enderror
         </div>
        <div class="form-group">
        <button class="btn btn-success my-2">
        {{isset($tag)?'Update Tag':'Create Tag'}}
        </button>
        </div>

        </form>
    </div>
</div>



@endsection
