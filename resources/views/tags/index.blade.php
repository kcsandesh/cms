@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end">
<a href="{{route('tags.create')}}"class="btn btn-success mb1 my-2">Add Tag</a></div>
<div class="card card-default">
<div class="card-header"><h1><b>Tags</b></h1></div>
<div class="card body">
@if($tags->count() > 0)

<table class="table">
<thead>
<th><b>Name</b></th>
<th><b>Posts</b>
</th>
<th></th>
</thead>
<tbody>
@foreach($tags as $tag)
<tr>
<td>
{{$tag->name}}

</td>
<td>
    {{$tag->posts->count()}}
</td>
<td>
<a href="{{route('tags.edit',$tag->id)}}" class="btn btn-outline-info ">Edit</a>
</td>
<td>
<button class="btn btn-outline-danger " onclick="handleDelete({{ $tag->id}})">Delete</button>
</td>
</tr>
@endforeach
</tbody>
</table>
{{$tags->links()}}
@else
<h3 class="text-center text-secondary"><b>No Tag yet.</b></h3>
@endif
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="" method="POST" id="deleteTagForm">
    @csrf
    @method('DELETE')
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>

    </form>
  </div>
</div>
</div>
</div>



@endsection


@section('scripts')
   <script>
    function handleDelete(id){

      var form=document.getElementById('deleteTagForm')
      form.action='/tags/' + id
        // console.log('delete.',form)
        $('#deleteModal').modal('show')

        }
   </script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
