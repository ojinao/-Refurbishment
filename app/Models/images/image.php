<?php

namespace App\Models\images;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{

    const UPDATED_AT = null;
    protected $table = 'images';

    protected $fillable = [
        'image',
    ];
}
