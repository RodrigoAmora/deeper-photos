<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Album extends Model {
    use HasFactory;

    public $timestamps = true;

 	protected $guarded = ['id'];

 	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    public function photos() {
        return $this->hasMany(Photo::class);
    }
}
