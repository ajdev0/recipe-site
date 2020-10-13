<?php

namespace App\Http\Controllers;
use App\Post;
use App\Tag;
use App\Category;
use App\Http\Requests\post\CreatePostRequest;
use App\Http\Requests\post\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct(){
        $this->Middleware(['checkCategoryCount'])->only(['create','store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post = Post::all();
        return view('post.index')->with('posts',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     
        $category = Category::all();     
        return view('post.create')->with('categories',$category)->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //
        $image = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $image);

        $postData = Post::create([
            'title'=>$request->title, 
            'slug'=>$request->slug, 
            'description'=>$request->description,
            'content'=>$request->content, 
            'cookTimeFrom' => $request->TimeFrom,
            'cookTimeTo' => $request->TimeTo,
            'image'=>$image, 
            'published_at'=>$request->published_at,
            'category_id'=>$request->category_id, 
            'user_id'=>auth()->user()->id, 
            
        ]);

        if($request->tags){
            $postData->attach($request->tags);
        }

        session()->flash('success','Post Created Successfully');
        return redirect(route('post.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::all(); 
        $post = Post::where('slug', $id)->firstOrFail();

        return view('post.create')->with('post',$post)->with('categories',$category)->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //

        $data = $request->only('title', 'slug', 'description', 'content' , 'published_at', 'user_id', 'category_id',  
        'cookTimeFrom' , 'cookTimeTo' );
        //check if new image 
        if($request->hasFile('image')){
            //upload it
        $image =  time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $image);

        //delete old one 

        Storage::delete($post->image);

        $data['image'] = $image;

        }

        if($request->tags){
            $post->tags()->sync($request->tags);
        }
        //update it
        $post->update($data);
        $post->save();
        //flash message
        session()->flash('success','Post Update Successfully');
        return redirect(route('post.index'));
    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::withTrashed()->where('id',$id)->FirstOrFail();
        if($post->trashed()){
            $post->deleteImage();     
            $post->forceDelete();
        }
        else
        {
        $post->delete();
        }
        session()->flash('success','Post Deleted Successfully');
        return redirect(route('post.index'));

    }
    /**
     * Remove the specified resource from storage Permently.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trashed(Post $post)
    {
        //
        $trashed = $post->onlyTrashed()->get();

        return view('post.index')->withPosts($trashed);

    }
    
    public function restore($id){
        $post =  Post::withTrashed()->where('id',$id)->FirstOrFail();
        $post->restore();

        return redirect()->back();
        session()->flash('success','Post Restored Successfully');
    }


    /**
     * 
     * @param string $slug
     * @@return \Illuminate\Http\Response
     */
    public function checkSlug(Request $request){
        $slug = Str::slug($request->title,'-');
        return response()->json(['slug' => $slug]);
    }
    
  
}
