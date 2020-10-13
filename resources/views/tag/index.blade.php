@extends('layouts.app')

@section('content')
@include('partials.success')
<div class="d-flex mb-1">
  <a class="btn btn-primary" href="{{ route('tag.create') }}">Add tag</a>
</div>
<div class="card">
  
    <div class="card-header">
        tags
    </div>
    <div class="card-body">

        <table class="table">
            <thead>
              <tr>
                
                <th scope="col">Name</th>
                <th scope="col">Related Posts</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($tags as $tag)
                <tr>
                
                <td>{{ $tag->name }} </td>
                <td>{{$tag->posts->count()}}</td>
                <td>
                    <a href="{{ route('tag.edit',$tag->slug ) }}" class="btn btn-primary btn-sm">Edit</a>
                </td>
                <td>
                  <form action="{{ route('tag.destroy',$tag->slug ) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>  
                </td>
              </tr>  
              @endforeach
        
            </tbody>
          </table>
    </div>
</div>

@endsection