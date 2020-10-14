<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UsersImport;
use App\Imports\UsersPostImport;

use App\Exports\UsersExport;
use App\Exports\UsersPostExport;

use Maatwebsite\Excel\Facades\Excel;




class MyExportImportController extends Controller
{
    //
       /**

    * @return \Illuminate\Support\Collection

    */

    public function importExportView()

    {

       return view('import');

    }

   

    /**

    * @return \Illuminate\Support\Collection

    */

    public function export() 

    {

        return Excel::download(new UsersPostExport, 'posts.xlsx');

    }

   

    /**

    * @return \Illuminate\Support\Collection

    */

    public function import() 

    {

        Excel::import(new UsersPostImport,request()->file('file'));

           

        return back();

    } 

}
