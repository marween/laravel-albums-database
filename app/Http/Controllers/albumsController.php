<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Albums;

class albumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



       if($request->hasfile('filename'))
       {
        $file = $request->file('filename');
        $name=time().$file->getClientOriginalName();
        $file->move(public_path().'/images/', $name);
    }
    $request->validate([
        'name'=>'required',
        'file'=>'required',
        'gender'=>'required',
        'year' => 'required',
        'label'=>'required',
        'note'=>'required',
    ]);

    $collection = [];
    $collection=$request->validate([
        'artists'=>'required|array',
        'songs'=>'required|array'

    ]);
    //var_dump($collection['artists']);exit();

    $albums = new Albums([
        'name' => $request->get('name'),
        'file'=> $request->get('file'),
        'gender'=> $request->get('gender'),
        'year'=> $request->get('year'),
        'label'=> $request->get('label'),
        'note'=> $request->get('note'),
        //$collection['artists'],
        //$collection['songs']


        'artists'=> implode('-', $request->get('artists')),
        'songs'=> implode('-', $request->get('songs')),


    ]);
    $albums->save();
    return redirect('/albums')->with('success', 'Stock has been added');
    
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
        //
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
    }
}
