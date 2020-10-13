<?php

namespace App\Http\Controllers;
use App\Category;
use App\Http\Requests\Request\UpdateCategoryRequest;
use App\Http\Requests\Request\CreateCategoryRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = Category::all();
        return view('category.index')->with('categories',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //
        
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        //
        $data = [
            'name' => $request->name,
            'slug' => $request->slug
        ];
        $data['slug'] = Str::slug($data['slug'], '-');

        Category::create($data);
        session()->flash('success','category Created Successfully');
        return redirect(route('category.index'));
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
        
        $category = Category::where('slug', $id)->firstOrFail();
        
        return view('category.create')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RequestResponse
     */
    public function update( UpdateCategoryRequest $request, Category $category)
    {
        //
        $data = $request->only(['name','slug']);
        $category->update($data);
        $category->save();

        session()->flash('success','category Updated Successfully');
        return redirect(route('category.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        if($category->posts()->count() < 1){
            $category->delete();
            session()->flash('success','category Deleted Successfully');
            return redirect(route('category.index'));
        }else{
            session()->flash('rong','cant delete there are posts assoiated this category');
            return redirect(route('category.index'));
        }
       
        
       
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
