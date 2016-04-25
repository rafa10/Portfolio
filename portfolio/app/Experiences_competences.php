<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Experiences_competences extends Model {

	protected  $table = 'experiences_competences';

    protected $fillable = ['competences_id','experiences_id'];



}
