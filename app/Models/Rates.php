<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rates extends Model
{
    use HasFactory;

    protected $table = 'rate';
    protected $primaryKey = 'id';
   
    public $timestamps = false;
}
