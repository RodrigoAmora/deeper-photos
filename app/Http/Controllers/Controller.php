<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Http\Services\AlbumService;
use Illuminate\Http\UploadedFile;

use App\Models\Album;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function index() {
        $albumService = new AlbumService();
        $listaAlbuns = $albumService->listarAlbum();
        return view('/body', ['listaAlbuns' => $listaAlbuns]);
    }
}
