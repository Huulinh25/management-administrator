<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histories extends Model
{
    use HasFactory;

    protected $table = 'history';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['id', 'email', 'phone', 'name', 'id_user', 'price'];
}
