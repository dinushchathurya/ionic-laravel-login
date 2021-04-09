<?php

namespace App\Http\Controllers;

use Request;
use View;
use Validator;
use Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;

use App\Album;

class AlbumController extends Controller
{
    public function getList()
    {
        $albums = Album::with('Photos')->get();
        return View::make('index')
        ->with('albums',$albums);
    }

    public function getAlbum($id)
    {
        $album = Album::with('Photos')->find($id);
        $albums = Album::with('Photos')->get();
        // dd($albums);
        return View::make('album')
        ->with(['album'=>$album, 'albums'=>$album]);
    }

    public function getForm()
    {
        return View::make('createalbum');
    }

    public function postCreate(Request $request)
    {
        $rules = array(

        'name' => 'required',
        'cover_image'=>'required|image'

        );
        
        $validator = Validator::make(Request::all(), $rules);
        if($validator->fails()){

        return Redirect::route('create_album_form')
            ->withErrors($validator)
            ->withInput();
        }

        $file = Request::file('cover_image');
        $random_name = Str::random(8);
        $destinationPath = 'albums/';
        $extension = $file->getClientOriginalExtension();
        $filename=$random_name.'_cover.'.$extension;
        $uploadSuccess = Request::file('cover_image')
            ->move($destinationPath, $filename);
            $album = Album::create(array(
                'name' => Request::get('name'),
                'description' => Request::get('description'),
                'cover_image' => $filename,
        ));

        return Redirect::route('show_album',array('id'=>$album->id));
    }

    public function getDelete($id)
    {
        $album = Album::find($id);
        $album->delete();
        return Redirect::route('index');
    }
}
