@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@trixassets
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="card">
      @include('partials.error')
        <div class="card-header">
          {{ isset($post)? 'Update Post' : 'Create Post' }}  
        </div>
        <div class="card-body">
            <form action="{{isset($post) ? route('post.update',$post->slug) : route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                  @isset($post)
                    @method('PUT')
                  @endisset
                <div class="form-group">
                <input type="text" id="title" class="form-control" name="title" placeholder="Post Title" value="{{ isset($post)? $post->title : '' }}">
                </div>
                <div class="form-group">
                    <input type="text" id="slug" class="form-control" name="slug" placeholder="Post Slug" value="{{ isset($post)? $post->slug : '' }}">
                  </div>
                <div class="form-group">
                  <label for="description">الخطوات</label>
                    <input id="description" type="hidden" class="form-control" name="description"  placeholder="Post Description" value="{{ isset($post)? $post->description : '' }}">
                    <trix-editor input="description"></trix-editor>
                </div>
                <div class="form-group">
                  <label for="conten">Content</label>
                  <input id="content" type="hidden" name="content" value="{{isset($post)? $post->content : ''}}"/>
                   <trix-editor input="content"></trix-editor>
                </div>
                <div class="form-row">
                  <h3>Cook time</h3>
                  <div class="col form-group">
                    <input type="number" class="form-control" name="TimeFrom" placeholder=" time" value="{{ isset($post)? $post->cookTimeFrom : '' }}">
                  </div>
                  <div class="col form-group">
                    <input type="number" class="form-control" name="TimeTo" placeholder=" time" value="{{ isset($post)? $post->cookTimeTo : '' }}">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="image"><h4>Image</h4></label>
                  <img class="img-fluid" src="{{ isset($post)? asset("images/{$post->image}") : '' }} " alt="">
                    <input type="file" class="form-control" name="image" placeholder="Post image">
                </div>
                <div class="form-group">
                    <input type="text" id="pubish" class="form-control" name="published_at" placeholder="Published At" value="{{ isset($post)? $post->published_at : now() }}">
                  </div>
                  <div class="form-group">
                    <label for="">Category</label>
                    <select class="form-control" name="category_id">
                      @foreach ($categories as $category)
                      <option value="{{$category->id}}"
                        @isset($post)
                          @if($category->id == $post->category_id )
                          selected
                          @endif  
                        @endisset
                        
                        >
                        {{$category->name}}
                      </option>
                      @endforeach
                     
                    </select>
                  </div>
                  @if($tags->count()>0)
                  <div class="form-group">
                      <label for="tags">Tags</label>
                      <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                          @foreach($tags as $tag)
                          <option value="{{$tag->id}}"
                              @if(isset($post))
                                  @if($post->hasTag($tag->id))
                                      selected 
                                  @endif
                              @endif    
                          >{{$tag->name}}</option>
                          @endforeach
      
                      </select>
                  </div>
                  @endif
                <button type="submit" class="btn btn-primary">Save</button>
              </form>
        </div>
    </div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
 $("#title").keyup(function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9\u0600-\u06FF]+/g,'-');
        $("#slug").val(Text);        
});

  //
  flatpickr("#pubish", {altInput: true, altFormat: "F j, Y", dateFormat: "Y-m-d",});
  $(document).ready(function() {
        $('.tags-selector').select2();
    })
</script>
@endsection

