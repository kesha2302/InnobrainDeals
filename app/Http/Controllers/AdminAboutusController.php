<?php

namespace App\Http\Controllers;

use App\Models\Aboutus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminAboutusController extends Controller
{
    public function adminaboutus(Request $request)
    {
        $search=$request['search']??"";
        if($search!=""){
            $aboutus=Aboutus::where('title',"LIKE","%$search%")->get();
        }
        else{
            $aboutus=Aboutus::all();
        }

        $data=compact('aboutus','search');
        return view('AdminPanel.aboutus')->with($data);
    }

    public function adminaboutusform()
     {
        $aboutus = new Aboutus();
        $url=url('/Adminaboutusform2');
        $title="Aboutus Form";
        $data=compact('url','title','aboutus');

        return view('AdminPanel.aboutusform')->with($data);
    }

    public function aboutusform(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description1' => 'required|string|max:800',
            'description2' => 'required|string|max:800',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $aboutus= new Aboutus();
        $aboutus->title=$request->input('title');
        $aboutus->description1=$request->input('description1');
        $aboutus->description2=$request->input('description2');

        $aboutus->save();

        return redirect('/Adminaboutus');

    }

    public function aboutustrash()
    {
        $aboutus= Aboutus::onlyTrashed()->get();
        $data=compact('aboutus');

        return view ("AdminPanel.aboutustrash")->with($data);
    }

    public function aboutusedit($id)
    {
        $aboutus=Aboutus::find($id);
        if(is_null($aboutus)){
            return redirect('/Adminaboutus');
        }
        else
        {
            $url=url('/aboutus/update') ."/". $id;
            $title="Update Aboutus Details";
            $data=compact('aboutus','url','title');
            return view('AdminPanel.aboutusform')->with($data);

        }

    }

    public function aboutusupdate($id, Request $request)
    {
        $aboutus=Aboutus::find($id);

        $aboutus->title=$request->input('title');
        $aboutus->description1=$request->input('description1');
        $aboutus->description2=$request->input('description2');

        $aboutus->save();

        return redirect('/Adminaboutus');

    }

    public function aboutusdelete($id)
    {
        $aboutus=Aboutus::find($id);
        if(!is_null($aboutus)){
            $aboutus->delete();
        }
        return redirect('/Adminaboutus');
    }

    public function aboutusrestore($id)
    {
        $aboutus=Aboutus::withTrashed()->find($id);
        if(!is_null($aboutus)){
            $aboutus->restore();
        }
        return redirect('Adminaboutus');
    }

    public function aboutusforcedelete($id)
    {
        $aboutus=Aboutus::withTrashed()->find($id);
        if(!is_null($aboutus)){
            $aboutus->forceDelete();
        }
        return redirect()->back();
    }
}
