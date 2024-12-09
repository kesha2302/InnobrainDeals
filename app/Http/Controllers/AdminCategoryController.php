<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminCategoryController extends Controller
{
    public function admincategory(Request $request)
    {
        $search=$request['search']??"";
        if($search!=""){
            $categories=Category::where('name',"LIKE","%$search%")->get();
        }
        else{
            $categories=Category::all();
        }


        $data=compact('categories', 'search');
        return view('AdminPanel.category')->with($data);
    }

    public function admincategoryform()
     {
        $category = new Category();
        $url=url('/Admincategoryform2');
        $title="Category Detail Form";
        $data=compact('url','title','category');

        return view('AdminPanel.categoryform')->with($data);
    }

    public function categoryform(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $categories= new Category();
        $categories->name=$request->input('name');

        $categories->save();

        return redirect('/Admincategory');

    }

    public function categorytrash()
    {
        $categories= Category::onlyTrashed()->get();
        $data=compact('categories');

        return view ("AdminPanel.categorytrash")->with($data);
    }

    public function categoryedit($id)
    {
        $category=Category::find($id);
        if(is_null($category)){
            return redirect('/Admincategory');
        }
        else
        {
            $url=url('/category/update') ."/". $id;
            $title="Update Category Details";
            $data=compact('category','url','title');
            return view('AdminPanel.categoryform')->with($data);

        }

    }

    public function categoryupdate($id, Request $request)
    {
        $categories=Category::find($id);
        $categories->name=$request->input('name');

        $categories->save();

        return redirect('/Admincategory');

    }

    public function categorydelete($id)
    {
        $categories=Category::find($id);
        if(!is_null($categories)){
            $categories->delete();
        }
        return redirect('/Admincategory');
    }

    public function categoryrestore($id)
    {
        $categories=Category::withTrashed()->find($id);
        if(!is_null($categories)){
            $categories->restore();
        }
        return redirect('Admincategory');
    }

    public function categoryforcedelete($id)
    {
        $categories=Category::withTrashed()->find($id);
        if(!is_null($categories)){
            $categories->forceDelete();
        }
        return redirect()->back();
    }
}
