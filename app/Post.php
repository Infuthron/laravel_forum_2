<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    public $primaryKey = 'id';

    public $timestamps = true;

    public function post(){
        return $this->belongsTo('App\Topic');
    }
}
