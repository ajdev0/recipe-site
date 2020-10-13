<?php

namespace App\Http\Controllers;
use App\Tag;
use App\Http\Requests\Request\UpdateTagRequest;
use App\Http\Requests\Request\CreateTagRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tag = Tag::all();
        return view('tag.index')->with('tags',$tag);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //
        
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
        //
        $data = [
            'name' => $request->name,
            'slug' => $request->slug
        ];
        $data['slug'] = Str::slug($data['slug'], '-');

        Tag::create($data);
        session()->flash('success','Tag Created Successfully');
        return redirect(route('tag.index'));
    }

    /**
     * Display the specified resofindrce.
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
        
        $tag = Tag::where('slug', $id)->firstOrFail();
        
        return view('tag.create')->with('tag',$tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RequestResponse
     */
    public function update( UpdateTagRequest $request, Tag $tag)
    {
        //
        $data = $request->only(['name','slug']);
        $Tag->update($data);
        $Tag->save();

        session()->flash('success','Tag Updated Successfully');
        return redirect(route('tag.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
        $tag->delete();
        
        session()->flash('success','Tag Deleted Successfully');
        return redirect(route('tag.index'));
    }
    /**
     * 
     * @param string $slug
     * @@return \Illuminate\Http\Response
     */
    public function checkSlug(Request $request){
        
        $slug = Str::slug($request->name,'-');
        return response()->json(['slug' => $slug]);
    }
}
