<?php

namespace App\Models;

use App\Models\Ekskul\Ekskul;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = ['ekskul', 'hari', 'mulai', 'selesai', 'status'];

    public function ekskul()
    {
        return $this->belongsTo(Ekskul::class);
    }
}
