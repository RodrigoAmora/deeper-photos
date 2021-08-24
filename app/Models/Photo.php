<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Photo extends Model
{
    use HasFactory;

    public $timestamps = true;

 	protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'destination_path',
        'album_id',
    ];

    public function album() {
        return $this->belongsTo(Album::class);
    }
}
