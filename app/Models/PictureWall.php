<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PictureWall extends Model
{
    use HasFactory;
    protected $table='picture_walls';
    protected $fillable = [
        'picURL',
        'status'
    ];
}
