<?php
namespace App\Http\Services;

use Illuminate\Support\Facades\DB;

use App\Models\Album;
use App\Models\Photo;

class PhotoService {

	public function listaAllPhotos() {
		return Photo::all();
	}

	public function listPhotosByIdAlbum(Album $album) {
		return Photo::where("album_id", $album->id)->paginate(12);
	}

	public function savePhoto(Photo $photo) {
		$photo->save();
	}
}