@extends('layouts.app')
@section('content')
    <div class="card">       
        <div class="card-header">
          {{ isset($tag) ? 'Update tag' : 'Create tag' }}
        </div>
        <div class="card-body">
          @include('partials.error')
        
        
        <form action="{{isset($tag) ? route('tag.update',$tag->slug) : route('tag.store') }}" method="POST">
          @csrf
          @isset($tag)
            @method('PUT')
          @endisset
                <div class="form-group">
                  <input type="text" id="name" class="form-control" name="name" placeholder="tag Name" value="{{ isset($tag) ? $tag->name : '' }}">
                </div>
                <div class="form-group">
                  <input type="text" id="slug" class="form-control"  name="slug" placeholder="tag Slug" value="{{ isset($tag) ? $tag->slug : '' }}">
                </div>
                
                <button type="submit" class="btn btn-primary">{{ isset($tag) ? 'Update tag' : 'Add tag' }}</button>
              </form>
        </div>
    </div>
@endsection
@section('scripts')
<script>
  $('#name').on('keyup',function(e) {
    $.get('{{ route('tag.check_slug') }}', 
      { 'name': $(this).val() }, 
      function( data ) {
        $('#slug').val(data.slug);
      }
    );
  });
</script>
@endsection
