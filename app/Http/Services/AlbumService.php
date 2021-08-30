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

	public function saveAlbumCorver(string $idAlbum, string $albumCorver) {
		$album = Album::find($idAlbum);
		$album->corver = $albumCorver;
		$album->save();
	}

	public function getAlbumCorver(string $idAlbum) {
		$album = Album::find($idAlbum);
		return isset($album->corver);
	}
}