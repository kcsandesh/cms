@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end">
    <a href="{{ route('posts.create') }}" class="btn btn-success mb1 my-2">

Add Post

    </a>
</div>
<div class="card card-default">
    <div class="card-header"><h1><b>Posts</b></h1></div>
        <div class="card body">

           @if($posts->count() > 0)

           <table class="table">
               <thead>
                   <th><b>Image</b></th>
                   <th><b>Title</b></th>
                   <th><b>Category</b></th>
                   <th></th>
               </thead>
               <tbody>
                 @foreach($posts as $post)
                    <tr>
                        <td>
                        <img src="/storage/{{$post->image}}" width="150px" height="120px" alt="">

                        </td>

                        <td>
                            {{$post->title}}
                        </td>
                        <td>
                            <a href="{{route('categories.edit',$post->category->id)}}" class="text-success m-2" >{{$post->category->name }}</a>
                        </td>



                        <td>
                        @if($post->trashed())


                        <form action="{{route('restore-posts',$post->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-outline-info ">Restore</button>
                        </form>
                        </td>

                        @else
                        <td>
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-outline-info" >Edit</a>
                        </td>
                        @endif

                        <td>
                        <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                             <button type="submit" class="btn btn-outline-danger " ></i>
                            {{$post->trashed() ? 'Delete' :'Trash'}}
                            </button>
                        </form>
                        </td>
                    </tr>
                 @endforeach

               </tbody>
            </table>

            {{$posts->links()}}


           @else
           <H3 class="text-center text-secondary"><b>No Post yet.</b></H3>

           @endif
        </div>




    </div>








@endsection




