@extends('layouts.master')
@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Blog content
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <div class="section mt-2">
        <div class="container">

          <div class="row gap-y">
              <!--sidbar-->
              
              <!--single page content-->
              <div class="col-md-9  recipe-head mt-2">
                <div class="row ">
                  <div class="col-md-4 ">
                    <div class="f-img  my-5 ">
                      <img class="feature-img rounded-md" src="{{ asset("images/{$post->image}") }} " alt="...">
                    </div>
                </div>
                
                  <div class="col-md-8 ">
                    <div class="text-right  mt-5">
                        <h2 class="recipe-font">{{ $post->title }}</h2>
                        <div class="row my-5 d-flex flex-column float-right">
                          <div class="mb-3 mr-4 recipe-font"><a href="{{ route('blog.category', $post->category->slug) }}">{{ $post->category->name }}</a></div>
                          <div class="col-md-6 d-flex flex-row">

                            <div class="nutration">
                              <span> كربوهيدرات</span>
                              <span class="number">5</span>
                            </div>
                            <div class="nutration">
                              <span>دهن مشبع</span>
                              <span class="number">5</span>
                            </div>
                            <div class="nutration">
                              <span>دهون</span>
                              <span class="number">5</span>
                            </div>
                            <div class="nutration">
                              <span>كالوري</span>
                              <span class="number">5</span>
                            </div>

                          </div>
                          <div class="col-md-6 d-flex flex-row mt-5">
                            <div class="nutration">
                              <span>ملح</span>
                              <span class="number">5</span>
                            </div>
                            <div class="nutration">
                              <span>بروتين</span>
                              <span class="number">5</span>
                            </div>
                            <div class="nutration">
                              <span>ألياف</span>
                              <span class="number">5</span>
                            </div>
                            <div class="nutration">
                              <span>سكر</span>
                              <span class="number">5</span>
                            </div>
                          </div>
                         
                          


                        </div>
                    
                      </div>
                  
                    </div>
                  

                </div>  
        
                  <div class="row text-right my-5">
                    <div class="col-md-6 mx-auto">
                      <div class="card  recipe-details">
                        <div class="card-header recipe-details-head">
                          المكونات
                        </div>
                        <div class="card-body">
                          <p class="card-text"> {!! $post->content !!}</p>
                        </div>
                      </div>
                          
                    </div>
                    <div class="col-md-6 mx-auto">
                        <div class="card  recipe-details">
                          <div class="card-header recipe-details-head">
                            الخطوات
                          </div>
                          <div class="card-body">
                            <p class="card-text"> {!! $post->description !!}</p>
                          </div>
                        </div>
                       
                    </div>
                  
                  </div>
        
                  <div class="row">
                    <div class="col-lg-8 mx-auto">
        
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>
                      <div class="gap-xy-2  float-right  mt-6">
                          @foreach ($post->tags as $tag)
                           <a class="badge badge-pill badge-secondary" href="{{ route('blog.tag',$tag->slug) }}">{{ $tag->name }}</a>
                          @endforeach
                      </div>   
                    </div>
                  </div>
              </div>
               

              <div class="col-md-3 mt-5 ">
                @include('partials.sidebar')
              </div>
          </div>

        </div>
      </div>

      


@endsection
@section('script')
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f5fd27e1737018a"></script>

@endsection