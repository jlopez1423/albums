<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model {


    protected $fillable = ['name', 'style', 'description', 'published_on' ];

}



?>