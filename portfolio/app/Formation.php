<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model {

    protected $table = 'formation';

    protected $fillable = ['type', 'description', 'year'];

}
