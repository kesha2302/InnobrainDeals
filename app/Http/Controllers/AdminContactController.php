<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminContactController extends Controller
{
    public function admincontact(Request $request)
    {
        $contact=Contact::all();
        $data=compact('contact');
        return view('AdminPanel.contactus')->with($data);
    }

    public function admincontactform()
     {
        $contact = new Contact();
        $url=url('/Admincontactform2');
        $title="Contact Form";
        $data=compact('url','title','contact');

        return view('AdminPanel.contactusform')->with($data);
    }

    public function contactform(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email|max:255',
            'contact1' => 'required|digits:10',
            'contact2' => 'required|digits:10',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $contact= new Contact();
        $contact->email=$request->input('email');
        $contact->contact1=$request->input('contact1');
        $contact->contact2=$request->input('contact2');

        $contact->save();

        return redirect('/Admincontact');

    }

    public function contactedit($id)
    {
        $contact=Contact::find($id);
        if(is_null($contact)){
            return redirect('/Admincontact');
        }
        else
        {
            $url=url('/contact/update') ."/". $id;
            $title="Update Contact Details";
            $data=compact('contact','url','title');
            return view('AdminPanel.contactusform')->with($data);

        }

    }

    public function contactupdate($id, Request $request)
    {
        $contact=Contact::find($id);

        $contact->email=$request->input('email');
        $contact->contact1=$request->input('contact1');
        $contact->contact2=$request->input('contact2');
        $contact->save();

        return redirect('/Admincontact');

    }

    public function contactdelete($id)
    {
        $contact=Contact::find($id);
        if(!is_null($contact)){
            $contact->delete();
        }
        return redirect('/Admincontact');
    }
}
