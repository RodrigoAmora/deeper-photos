<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Services\AlbumService;
use Illuminate\Http\UploadedFile;

use App\Models\Album;

class AlbumController extends Controller {

	public function listarAlbuns() {
        $albumService = new AlbumService();
        $listaAlbuns = $albumService->listarAlbum();
        return view('/body')->with(['listaAlbuns' => $listaAlbuns]);
    }

    public function saveAlbum(Request $request) {
    	$album = new Album;
    	$album->name = $request->name;
    	$album->description = $request->description;

    	$albumService = new AlbumService();
        $albumService->saveAlbum($album);
        $listaAlbuns = $albumService->listarAlbum();
        return view('/body')->with(['listaAlbuns' => $listaAlbuns, 'message' => "Álbum criado com sucesso!"]);
    }


    /*
    
    */
}