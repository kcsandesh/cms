@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header"><h1><b>Posts</b></h1></div>
        <div class="card body">
           @if($posts->count() > 0)

           <table class="table">
               <thead>
                   <th>Image</th>
                   <th>Title</th>
                   <th></th>
                   <th></th>
               </thead>
               <tbody>
                 @foreach($posts as $post)
                    <tr>
                        <td>
                        <img src="{{($post->image)}}" width="120px" height="120px" alt="">
                        </td>
                        <td>
                            {{$post->title}}
                        </td>
                        


                        @if(!$post->trashed())
                        <td>
                        <a href="" class="btn btn-success" >Edit</a>
                        </td>
                        @endif
                        
                        <td>
                        <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" >
                            {{$post->trashed() ? 'Delete' :'Trash'}}
                            </button>
                        </form>
                        </td>
                    </tr>
                    
                    
                 @endforeach
               </tbody>
           </table>

           @else
           <H3 class="text-center"><b>No Post yet.</b></H3>

           @endif
        </div>          
 
        
        
        
    </div>
  




<div class="d-flex justify-content-end">
<a href="{{ route('posts.create') }}"class="btn btn-primary mb1 my-2">button</a></div>
 


@endsection


