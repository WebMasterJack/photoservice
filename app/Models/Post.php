<?php

namespace App\Models;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable =[
       
        'image',
    ];
    // public function tags(){
    //    return $this->hasMany(Tag::class,'post_id');
    // }
}
