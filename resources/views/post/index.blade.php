@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end">
  <a href="{{route('post.trashed') }}" class="btn btn-warning mb-2 mr-2">
  Trashed Posts
      </a>
  <a href="{{ route('post.create') }}" class="btn btn-primary mb-2">Add Post</a>
  </div>
  
<div class="card">
  @include('partials.success')
    <div class="card-header">
        Posts
    </div>
    <div class="card-body">

        <table class="table">
            <thead>
              <tr>
                <th scope="col">user</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">action</th>
              </tr>
            </thead>
            <tbody>
             
              
            
              @foreach ($posts as $post)
              @if($post->user_id == Auth::id())
                <tr>
                  <th>{{ $post->user->name }}</th>
                <td>
                  <img class="img-responsive img-rounded" src="{{ asset("images/{$post->image}") }}" width="60" height="60" alt="Recipe Pic">
 
                </td>
                
                
                  <td><a href="{{ route('blog.show', $post->slug) }}">{{$post->title}}</a></td>
                  @if($posts->count() > 0)
                   <td> <a href="{{ route('category.edit', $post->category->id) }}">{{$post->category->name}}</a> </td>
                  @endif
                  <td>
                  @if($post->trashed())
                    <form action="{{ route('post.restore',$post->id) }}" method="post">
                        @csrf
                        @method('put')
                        <button class="btn btn-primary btn-sm float-right">Restore</button>
                    </form>
                    
                  @else
                  <a href="{{ route('post.edit',$post->slug) }}" class="btn btn-primary btn-sm float-right">Edit</a>
                  @endif
                  </td>
                  <td>
                    <form action="{{ route('post.destroy',$post->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                     <button class="btn btn-danger btn-sm float-right mr-1">
                     {{ $post->trashed() ? 'Delete' : 'Trash'}}
                     </button>
                  </form>
                  </td>
                </tr>
                @endif
              @endforeach
                  
             
              
            </tbody>
          </table>
    </div>
</div>

@endsection