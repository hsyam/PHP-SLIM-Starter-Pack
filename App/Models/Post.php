<?php

namespace  App\Models ;
use Illuminate\Database\Eloquent\Model;

Class Post extends Model {
    protected $table = 'posts' ;

    protected $fillable = ['title','body'];

}