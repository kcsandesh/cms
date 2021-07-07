@extends('layouts.app')

@section('content')

    <div class="card-header"><h1><b>Users</b></h1></div>
        <div class="card body">

           @if($users->count() > 0)

           <table class="table">
               <thead>
                   <th><b>Image</b></th>
                   <th><b>Name</b></th>
                   <th><b>E-mail</b></th>
                   <th></th>
               </thead>
               <tbody>
                 @foreach($users as $user)
                    <tr>
                        <td>
                            <img width="50px" height="50px" style="border-radios:50px" src="{{Gravatar::src($user->image)}}" alt="">
                        </td>

                        <td>
                            {{$user->name}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>

                       @if (!$user->isAdmin())
                       <td>
                        <form action="{{route('users.make-admin',$user->id)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Make Admin</button>
                        </form>
                      </td>

                       @endif



                    </tr>


                 @endforeach
               </tbody>
           </table>
           {{$users->links()}}

           @else
           <H3 class="text-center"><b>No User yet.</b></H3>

           @endif
        </div>




    </div>








@endsection




