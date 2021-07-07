@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Your Profile</div>

    <div class="card-body">
        <form action="{{route('users.update-profile')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control"  value="{{$user->name}}">
            @include('partials.error')

            </div>
            <div class="form-group">
                <label for="about">About</label>
                <textarea name="About" id="about" cols="30" rows="10" class="form-control">{{$user->about}}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Update</button>

        </form>
    </div>
</div>
@endsection
