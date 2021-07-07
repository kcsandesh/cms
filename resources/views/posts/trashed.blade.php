@extends('layouts.app')

@section('content')
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


                        <form action="{{route('restore-posts',$post->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-outline-info ">Restore</button>
                        </form>
                        </td>


                        <td>
                        <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                             <button type="submit" class="btn btn-outline-danger " ></i>
                              Delete
                            </button>
                        </form>
                        </td>
                    </tr>
                 @endforeach

               </tbody>
            </table>

           @else
           <H3 class="text-center text-secondary"><b>No Post yet.</b></H3>

           @endif
        </div>




    </div>








@endsection




