@extends('layouts.app')
@section('content')
    <div class="card">       
        <div class="card-header">
          {{ isset($category) ? 'Update Category' : 'Create Category' }}
        </div>
        <div class="card-body">
          @include('partials.error')
        
        
        <form action="{{isset($category) ? route('category.update',$category->slug) : route('category.store') }}" method="POST">
          @csrf
          @isset($category)
            @method('PUT')
          @endisset
                <div class="form-group">
                  <input type="text" id="name" class="form-control" name="name" placeholder="Category Name" value="{{ isset($category) ? $category->name : '' }}">
                </div>
                <div class="form-group">
                  <input type="text" id="slug" class="form-control"  name="slug" placeholder="Category Slug" value="{{ isset($category) ? $category->slug : '' }}">
                </div>
                
                <button type="submit" class="btn btn-primary">{{ isset($category) ? 'Update Category' : 'Add Category' }}</button>
              </form>
        </div>
    </div>
@endsection
@section('scripts')
<script>
  $('#name').on('keyup',function(e) {
    $.get('{{ route('category.check_slug') }}', 
      { 'name': $(this).val() }, 
      function( data ) {
        $('#slug').val(data.slug);
      }
    );
  });
</script>
@endsection
