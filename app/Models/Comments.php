<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $primaryKey = 'id';
   
    public $timestamps = true;
    protected $fillable = ['cmt', 'id_blog', 'id_user', 'avatar', 'name_user', 'level'];

}
