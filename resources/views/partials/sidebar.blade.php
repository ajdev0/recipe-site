<div class="sidebar float-right text-right px-4 py-md-0">

    <h6 class="sidebar-title sid recipe-font ">البحث</h6>
    <form class="input-group" action=" " method="GET">
      <input type="text" class="form-control" name="search" placeholder="بحث" value="{{ request()->query('search') }}">
      <div class="input-group-addon">
        <span class="input-group-text"><i class="ti-search"></i></span>
      </div>
    </form>

    <hr>

    <h6 class="sidebar-title sid recipe-font">أقسام</h6>
    <div class="row recipe-font link-color-default fs-14 lh-24">
      @foreach ($categories as $category)
          <div class="col-12 text-right"><a href="{{ route('blog.category',$category->slug) }}">{{ $category->name }}</a></div>
      @endforeach
      
    </div>

    <hr>

    <h6 class="sidebar-title sid recipe-font">افضل الوصفات</h6>
    @foreach ($ppost as $item)
    <a class="media float-right recipe-font  text-default align-items-center mb-5" href="{{ route('blog.show',$item->slug) }}">
      <img class="rounded w-65px ml-4" src="{{ asset("images/{$item->image}") }}">
      <p class="media-body small-2 lh-4 mb-0">{{ $item->title }}</p>
     
    </a>

    @endforeach
 
  <!-- 
    <hr>

    <h6 class="sidebar-title">Tags</h6>
    <div class="gap-multiline-items-1">
      @foreach ($tags as $tag)
      <a class="badge badge-secondary" href="{{ route('blog.tag',$tag->slug) }}">{{ $tag->name }}</a>
      @endforeach
    </div>

    
  -->
  <hr>
  </div>