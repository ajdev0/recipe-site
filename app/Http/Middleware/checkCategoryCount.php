<?php

namespace App\Http\Middleware;

use Closure;
use App\Category;
class checkCategoryCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Category::all()->count() ===  0){

            session()->flash('rong','add category first');

            return redirect(route('category.create'));
        }
        return $next($request);
    }
}
