<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
    public function index(){
        $albums = Album::with('Photos')->get();
        return view('albums.index')->with('albums',$albums);
    }

    public function create(){

    return view('albums.create');
}

public function store(Request $request){
$this->validate($request,[
'name' => 'required',
'cover_image' => 'image|max:1999'
]);


   //Get Filename with extendsion
   $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

   //Get just the filename
   $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);


   //Get extension
   $extension = $request->file('cover_image')->getClientOriginalExtension();

// Create new filename
$filenameToStore = $filename.'_'.time().'.'.$extension;

//Upload image
$path = $request->file('cover_image')->storeAs('public/album_covers',$filenameToStore);

$albums = new Album;
$albums->name = $request->input('name');
$albums->description = $request->input('description');
$albums->cover_image = $filenameToStore;
$albums->save();
return redirect('/albums')->with('success','Album Created');

}


}