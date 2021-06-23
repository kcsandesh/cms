@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">
    <h1><b>{{isset($category)?'Edit Category':'Create Category'}}</b></h1>
    </div>
    <div class="card-body">



        <form action="{{isset($category)? route('categories.update',$category->id) : route('categories.store')}}" method="POST">
        @csrf

        @if(isset($category))
        @method('PUT')
        @endif

        <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" class="form-control" name="name" value="{{isset($category) ? $category->name :''}}">
        @include('partials.error')
        </div>
        <div class="form-group">
        <button class="btn btn-success my-2">
        {{isset($category)?'Update Category':'Create Category'}}
        </button>
        </div>

        </form>
    </div>
</div>



@endsection
