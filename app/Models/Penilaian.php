<?php

namespace App\Models;

use App\Models\Ekskul\Ekskul;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'ekskul', 'nilai', 'deskripsi'];
}
