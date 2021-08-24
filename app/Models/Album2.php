<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album2 extends Model {

    protected $table = 'album';
    public $timestamps = false;

 	protected $guarded = ['id'];


 	/**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
}
