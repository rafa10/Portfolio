<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Langue extends Model {

    protected $table = 'langue';

    protected $fillable = ['name', 'description'];

}
