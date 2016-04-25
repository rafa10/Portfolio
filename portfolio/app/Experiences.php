<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiences extends Model {

    protected $table = 'experiences';

    protected $fillable = ['fonction', 'date_start', 'date_end', 'business', 'description', 'url', 'image'];


}



