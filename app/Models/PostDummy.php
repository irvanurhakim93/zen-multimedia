<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostDummy extends Model
{
    use HasFactory;

    protected $table = 'post_dummies';

    protected $fillable = [
        'nama',
        'deskripsi'
    ];
}

