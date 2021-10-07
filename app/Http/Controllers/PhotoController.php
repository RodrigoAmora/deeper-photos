<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('photo.save')->with(['listPhotos' => $listPhotos, 'idAlbum' => $request->idAlbum, 'nameAlbum' => $request->nameAlbum]);
    }

    public function downloadPhoto(Request $request) {
        $file = public_path().$request->path;
        $headers = array(
                        'Content-Type: image/jpeg',
                    );

        $namePhoto = explode("/", "".$request->path, 5);
        $file_path = public_path(".".$request->path);
        
        return response()->download($file_path);
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
        
        $albumService = new AlbumService();
        if (!$albumService->getAlbumCorver($idAlbum)) {
            $albumService->saveAlbumCorver($idAlbum, $photo->destination_path);
        }
    }
}
