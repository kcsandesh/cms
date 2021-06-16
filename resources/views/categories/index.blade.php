@extends('layouts.app')

@section('content')
<div class="card card-default">
<div class="card-header"><h1><b>Categories</b></h1></div>
<div class="card body">
@if($categories->count() > 0)

<table class="table">
<thead>
<th><b>Name</b></th>
</thead>
<tbody>
@foreach($categories as $category)
<tr>
<td>
{{$category->name}}

</td>
<td>
<a href="{{route('categories.edit',$category->id)}}" class="btn btn-success btn-sm">Edit</a>
<button class="btn btn-danger btn-sm" onclick="handleDelete({{ $category->id}})">Delete</button>
</td>
</tr>
@endforeach
</tbody>
</table> 
@else
<h3 class="text-center"><b>No Category yet.</b></h3>
@endif
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="" method="POST" id="deleteCategoryForm">
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

<div class="d-flex justify-content-end">
<a href="{{route('categories.create')}}"class="btn btn-primary mb1 my-2">button</a></div>

@endsection


@section('scripts')
   <script>
    function handleDelete(id){

      var form=document.getElementById('deleteCategoryForm')
      form.action='/categories/' + id
        // console.log('delete.',form)
        $('#deleteModal').modal('show')

        }
   </script>
@endsection