
@extends('layouts.master')
@section('header')
   
      <!-- Header -->
      <header class="header text-white" style="background-image: url({{ asset("images/bg.jpg") }});" data-overlay="6">
        <div class="container text-center">

          <div class="row ">
            <div class="col-md-8 mr-auto ">

              <h1 class="recipe-font box">اكلات ماما</h1>
              <p class="lead-2 box opacity-90 recipe-font mt-6"> لكل أنواع الوصفات الشهية و الصحية </p>

            </div>
          </div>

        </div>
      </header><!-- /.header -->



  <!-- Main Content -->
@endsection
@section('content')
    
    
      <div class="section ">
        <div class="container">
          <div class="row">


            <div class="col-md-8 col-xl-9">
              <div class="row gap-y">
              @forelse ($posts as $post)
                <div class="col-md-4">
                  <div class="my-card card border border-secondary mb-6 d-block">
                    <a href="{{ route('blog.show',$post->slug) }}"><img class="post-img my-img card-img-top" src="{{ asset("images/{$post->image}") }}" alt="Card image cap"></a>
                    
                    <div class="p-6 text-center">
                  <a class="text-dark recipe-font-title" href="{{ route('blog.show',$post->slug) }}">{{ $post->title }}</a>
                    </div>
                  </div>
                </div>
              @empty
                <h1><strong>{{ request()->query('search') }}</strong> Not Found</h1>
              @endforelse
                

              </div>


              
              {{ $posts->appends(['search'=>request()->query('search')])->links() }}
            </div>



            <div class="col-md-4 col-xl-3 bg-gray">
              @include('partials.sidebar')
            </div>

          </div>
        </div>
      </div>
 




@endsection

    