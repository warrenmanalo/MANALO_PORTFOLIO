<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    
    protected $fillable = ['heading', 'highlight', 'subheading', 'profile_photo'];
}
