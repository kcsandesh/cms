<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;



class Post extends Model
{

    use SoftDeletes;
    
    protected $fillable=[
    'title','description','content','image','published_at','deleted_at',
    ];

    public function imageDelete(){

    Storage::delete($this->image);

    }
}
