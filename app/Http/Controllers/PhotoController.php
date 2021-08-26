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

    	if ($request->hasFile('names')) {
	    	$names = $request->file('names');
            $nameAlbun = $request->nameAlbum;
            $idAlbum = $request->idAlbum;

	    	$this->savePhotoInStorage($names, $nameAlbun, $idAlbum);
    	}

    	return back()->with('success','Image Upload successful');
    }

    private function savePhotoInStorage($names, string $album, string $idAlbum) {
        foreach($names as $name) {
                $imagename = time().'.'.$name->getClientOriginalName();
                $nameAlbum = str_replace(" ", "", $album);
                $destinationPath = public_path('/img/'.$nameAlbum);
                $name->move($destinationPath, $imagename);

                $this->savePhotoInDatabase($nameAlbum, $imagename, $idAlbum);
        }
    }

    private function savePhotoInDatabase(string $nameAlbum, string $imagename, string $idAlbum) {
        $photo = new Photo();
        $photo->destination_path = '/img/'.$nameAlbum."/".$imagename;
        $photo->album_id = $idAlbum;

        $photoService = new PhotoService();
        $photoService->savePhoto($photo);
    }
}
