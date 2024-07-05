<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndexYoutube extends Model
{
    use HasFactory;
    protected $table = 'index_youtubes';
    protected $fillable = [
      'title',
      'ytLink'
    ];
}
