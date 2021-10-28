<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\test;

class comp extends Controller
{
    //
    
         
    public function index()
    {
                $test= test::all()->where('status', 'Approved');

        return view('userview',compact('test'));
    }
    
    public function show(){
        
             $test= test::all();
        
             return view('home',compact('test'));
        
    }
    
    function store(Request $req)
    {
         $validate = $req->validate([
        'title' => 'required|max:60',
        'text' => 'required|max:300',
        'image' => 'nullable|image|mimes:jpeg,png,doc,docx|max:2048',
             ]);
    
            $file = $req->file('image');

        $name=$req->file('image')->getClientOriginalName();
//        $req->file('image')->storeAs('public/images/', $name);
         $file->move(public_path().'/images/', $name);  
        $test=new test();
        $test->title=$req->title;
        $test->text=$req->text;
        $test->image=$name;

        $test->save();
     return redirect('/form');


    }
    
     public function edit($id)
    {
        $test= test::find($id);
        return view('home', compact('test'));
    }

     public function update(Request $req, $id)
    {
         $test = $req->select;
    test::whereId($id)->update(['status' => $test]);
        return redirect('/home');
    }
    
}
