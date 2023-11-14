<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['id_user', 'name', 'price', 'id_category', 'id_brand', 'status', 'sale', 'company', 'avatar', 'detail'];
}
