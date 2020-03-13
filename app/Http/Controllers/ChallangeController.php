<?php

namespace App\Http\Controllers;

use App\Challange;
use App\User;
use Illuminate\Http\Request;

class ChallangeController extends Controller
{

   public function index()
   {
       $challanges = Challange::all();
       return view('challanges.index', compact('challanges'));

   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('challanges.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       $request->validate([
           'title'=>'required',
           'status'=>'required',
           'description'=>'required',
           'deadline'=>'required',
       ]);

        Challange::create([
            'title' => $request->get('title'),
            'status' => $request->get('status'),
            'description' => $request->get('description'),
            'deadline' => $request->get('deadline'),
        ]);

       return redirect('/home')->with('success', 'challange saved!');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
    $users = User::all();

    return view('home', compact('users'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $challange = Challange::find($id);
       return view('challanges.edit', compact('challange'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
       $request->validate([
           'title'=>'required',
           'status'=>'required',
           'description'=>'required',
           'deadline'=>'required'
       ]);

       $challange = Challange::find($id);
       $challange->title =  $request->get('title');
       $challange->status = $request->get('status');
       $challange->description = $request->get('description');
       $challange->deadline = $request->get('deadline');
       $challange->save();

       return redirect('/home')->with('success', 'Challange updated!');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
    $challange = Challange::find($id);
    $challange->delete();

    return redirect('/home')->with('success', 'Challange deleted!');
   }
}
