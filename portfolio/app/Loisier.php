<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Loisier extends Model {

    protected $table= 'loisier';

    protected $fillable = ['description', 'image'];

}
