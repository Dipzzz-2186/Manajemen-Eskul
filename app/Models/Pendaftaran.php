<?php

namespace App\Models;

use App\Models\Ekskul\Ekskul;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nis', 'kelas', 'ekskul'];
}
