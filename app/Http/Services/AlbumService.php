<?php
namespace App\Http\Services;

use Illuminate\Support\Facades\DB;

use App\Models\Album;
use App\Models\Photo;

class AlbumService {
	
	public function listarAlbum() {
		return Album::all();
	}

	public function saveAlbum(Album $album) {
		$album->save();
	}

/*
	public function listarProjetosPessoais() {
		return ProjetoPessoal::all();
	}

	public function listarProjetosPessoaisAPI() {
		$projetosPessoais = ProjetoPessoal::all();
    	return response()->json($projetosPessoais);
	}
	*/
}