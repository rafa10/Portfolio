<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Competences extends Model {

	protected $table = 'competences';

    protected $fillable = ['name', 'logo', 'rating'];


}
