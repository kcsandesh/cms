      @extends('layouts.app')

      @section('content')

      <form action="{{isset($post) ? route('posts.update',$post->id) : route('posts.store')}}" method="post" enctype="multipart/form-data">
         @csrf
         @if(isset($post))
            @method('PATCH')
         @endif
         <!-- enctype="multipart|form-data" is required when your are passing multimedia data -->
         <div class=" card card-default">
            <div class="card-header">{{isset($post) ? 'Update' : 'Add'}}</div>
            <div class="card-body">
                  <div class="form-group">
                     <label for="tittle">Title</label>
                     <input type="text" class="form-control" name="title" id="title" value="{{ isset($post) ? $post->title :''}}">
                     @error('title')
                        <div class="col-sm-9 invalid-text text-danger">{{$message}}</div>
                        @enderror
                  </div>

                  <div class="form-group">
                     <label for="description">Description</label>
                     <textarea name="description" id="description" cols="5" rows="5" class="form-control">{{isset($post) ? $post->description : ''}}</textarea>
                     @error('description')
                     <div class="col-sm-9 invalid-text text-danger">{{$message}}</div>
                     @enderror
                  </div>


                  <div class="form-group">

                     <label for="content">Content</label>
                     <input id="content" type="hidden" name="content" value="{{isset($post)  ? $post->content :''}}">
                     <trix-editor input="content"></trix-editor>

                     @error('content')
                     <div class="col-sm-9 invalid-text text-danger">{{$message}}</div>
                     @enderror

                  </div>

                  <div class="form-group">
                     <label for="published_at">Published At</label>
                     <input type="text" id="published_at" class="form-control" name="published_at" value="{{isset($post) ? $post->published_at :''}}" >

                    @error('published_at')
                    <div class="col-sm-9 invalid-text text-danger">{{$message}}</div>
                    @enderror

                  </div>

                  @if(isset($post))
                     <div class="form-group">
                        <img src="{{asset($post->image)}}" alt="" style="width:100%">
                     </div>
                  @endif
                  <div class="form-group">
                     <label for="image">Image</label>
                     <input type="file" class="form-control" name="image" id="image">
                     @error('image')
                     <div class="col-sm-9 invalid-text text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="from-group">
                      <label for="category_id">Category </label>
                      <select name="category_id" class="form-control"  id="category_id">
                      @foreach($categories as $category)
                      <option value="{{ $category->id }}">
                        {{$category->name}}
                    </option>
                    @endforeach
                  </select>
                  @error('category_id')
                  <div class="col-sm-9 invalid-text text-danger">{{$message}}</div>
                  @enderror
                  </div>

                  <div class="form-group">
                     <button type="submit" class="btn btn-success my-2">{{ isset($post) ? 'Update Post' : 'Create Post'}}</button>
                  </div>
            </div>
    </div>
    </div>
</form>

@endsection


@section('scripts')

   <script src="	https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js">
   </script>
   <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
   <script>
      flatpickr('#published_at',{
         enableTime:true
      })
   </script>


@endsection

@section('css')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


@endsection
