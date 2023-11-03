<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorys extends Model
{
    use HasFactory;
    protected $table = 'categorys';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['category_name'];
}
