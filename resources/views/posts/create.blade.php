      @extends('layouts.app')

      @section('content')

      <form action="{{isset($post) ? route('posts.update',$post->id) : route('posts.store')}}" method="POST" role="form" enctype="multipart/form-data">
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
                        <img src="/storage/{{$post->image}}" alt="" style="width:100%">
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
                      <label for="category">Category </label>
                      <select name="category" class="form-control"  id="category">
                      @foreach($categories as $category)
                      <option value="{{ $category->id }}">
                        {{$category->name}}
                    </option>
                    @endforeach
                  </select>
                  @error('category')
                  <div class="col-sm-9 invalid-text text-danger">{{$message}}</div>
                  @enderror
                  </div>

                  @if($tags->count()>0)

                  <div class="form-group">
                    <label for="tags">Tag</label>
                    <select name="tags[]" id="tags" class="form-control tag-selector" multiple>
                      @foreach($tags as $tag)
                      <option value="{{$tag->id}}"
                        @if(isset($post))
                        @if($post->pluckTag($tag->id))

                        selected

                        @endif
                        @endif
                        >
                      {{$tag->name }}
                      </option>
                      @endforeach
                    </select>
                 </div>
                  @endif


                  <div class="form-group">
                     <button type="submit" class="btn btn-success my-2">{{ isset($post) ? 'Update Post' : 'Create Post'}}</button>
                  </div>
            </div>
    </div>
    </div>
</form>

@endsection


@section('scripts')

   <script src="	https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

   <script>
      flatpickr('#published_at',{
         enableTime:true,
         enableSecond:true 
      })

      $(document).ready(function() {
      $('.tag-selector').select2()
     })
   </script>


@endsection

@section('css')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


@endsection
