<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Services\AlbumService;
use App\Http\Services\PhotoService;
use Illuminate\Http\UploadedFile;

use App\Models\Album;
use App\Models\Photo;

class PhotoController extends Controller {


	public function listAllPhotos() {
        $photoService = new PhotoService();
        $listPhotos = $photoService->listaAllPhotos();
        return view('/');
    }

	public function listPhotosByIdAlbum(Request $request) {
        $photoService = new PhotoService();
        $album = new Album();
        $album->id = $request->idAlbum;
        $listPhotos = $photoService->listPhotosByIdAlbum($album);
        // return $listPhotos;
        return view('photo.save')->with(['listPhotos' => $listPhotos, 'idAlbum' => $request->idAlbum, 'nameAlbum' => $request->nameAlbum]);
    }

    public function sendPhoto(Request $request) {
    	$album = new Album();
    	$album->id = $request->idAlbum;

    	$photoService = new PhotoService();
    	if ($request->hasFile('names')) {
	    	$names = $request->file('names');
	    	$photos = array();
	    	foreach($names as $name) {
		    	//$image = $request->file('name');
		    	$imagename = time().'.'.$name->getClientOriginalName();
		    	$nameAlbum = str_replace(" ", "", $request->nameAlbum);
		    	$destinationPath = public_path('/img/'.$nameAlbum);
		    	$name->move($destinationPath, $imagename);


		    	$photo = new Photo();
		    	$photo->destination_path = '/img/'.$nameAlbum."/".$imagename;
		    	$photo->album_id = $request->idAlbum;
		    	
		    	$photoService->savePhoto($photo);
	    	}
    	}

    	return back()->with('success','Image Upload successful');
    }
}
