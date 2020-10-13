@extends('layouts.master')
@section('header')
<!-- Header -->
<header class="header">
    <div class="container text-center">
      <h1 class="display-4 mb-6"><strong>{{ $tag->name }}</strong></h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $tag->name }}</li>
        </ol>
      </nav>
    </div>
  </header><!-- /.header -->
@endsection
@section('content')
    
    
      <div class="section bg-gray">
        <div class="container">
          <div class="row">


            <div class="col-md-8 col-xl-9">
              <div class="row gap-y">
              @forelse ($posts as $post)
                <div class="col-md-4">
                  <div class="card border hover-shadow-6 mb-6 d-block">
                    <a href="{{ route('blog.show',$post->slug) }}"><img class="post-img card-img-top" src="{{ asset("images/{$post->image}") }}" alt="Card image cap"></a>
                    <div class="p-6 text-center">
                      <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">{{ $post->category->name}}</a></p>
                    <h5 class="mb-0"><a class="text-dark" href="#">{{ $post->title }}</a></h5>
                    </div>
                  </div>
                </div>
              @empty
                <h1><strong>{{ request()->query('search') }}</strong> Not Found</h1>
              @endforelse
                

              </div>


              
              {{ $posts->appends(['search'=>request()->query('search')])->links() }}
            </div>



            <div class="col-md-4 col-xl-3">
              @include('partials.sidebar')
            </div>

          </div>
        </div>
      </div>
 




@endsection

    