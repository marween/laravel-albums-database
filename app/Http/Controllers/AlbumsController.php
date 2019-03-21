<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Albums;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $albums = Albums::all();

       return view('albums.index', compact('albums'));
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
        'gender'=>'required',
        'year' => 'required',
        'label'=>'required',
        'note'=>'required',
    ]);

    $albums = new Albums([
        'name' => $request->get('name'),
        'file'=> $request->get('file'),
        'gender'=> $request->get('gender'),
        'year'=> $request->get('year'),
        'label'=> $request->get('label'),
        'note'=> $request->get('note'),

        'artists'=> json_encode($request->get('artists')),
        'songs'=> json_encode($request->get('songs'))

    ]);

    $id = $albums->save();
   

    //return redirect('/albums')->with('success', 'Album has been added');
     return $id ? "Created album successfully" : 'There was a problem trying to insert into the database';
    
    
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $albums = Albums::find($id);

        return view('albums.show', compact('albums'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $albums = Albums::find($id);

        return view('albums.edit', compact('albums'));
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
            'name'=>'required',
            'gender'=>'required',
            'year' => 'required',
            'label'=>'required',
            'note'=>'required',
        ]);



        $album = Albums::find($id);
        $album->name = $request->get('name');
        $album->file = $request->get('file');
        $album->gender = $request->get('gender');
        $album->year = $request->get('year');
        $album->label = $request->get('label');
        $album->note = $request->get('note');
        $album->artists = json_encode($request->get('artists'));
        $album->songs = json_encode($request->get('songs'));

       $id = $album->save();

       // return redirect('/albums')->with('success', 'Album has been updated');
         return $id ? "Updated album successfully" : 'There was a problem trying to update the album';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $albums = Albums::find($id);
        $albums->delete();

       // return redirect('/albums')->with('success', 'Stock has been deleted Successfully');
         return $status ? "Deleted album successfully" : 'There was a problem trying to delete the album';

    }

    
    /**
     * scherac a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request $request
     */
    public function search(Request $request)
    {
        var_dump($request->filled('id')) ;exit();
       
        if ($request->has('id')) {
            $result = Albums::find($request->input('id'));
            return $result ? $result : 'No such album.';
        } 

        elseif ($request->has('queryString')) {
            
            $result = Albums::where(
                'artists', 'ILIKE', '%'.$request->input('queryString').'%')->orWhere(
                'name', 'ILIKE', '%'.$request->input('queryString').'%')->orWhere(
                'label', 'ILIKE', '%'.$request->input('queryString').'%')->orWhere(
                'gender', 'ILIKE', '%'.$request->input('queryString').'%')->orWhere(
                'songs', 'ILIKE', '%'.$request->input('queryString').'%')->get();
            
            return count($result) > 0 ? $result : 'No such album.';

        }
        return Albums::inRandomOrder()->first();
    }

}
