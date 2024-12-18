<?php

namespace App\Models\Ekskul;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    protected $guarded = [];

    protected $table = 'ekskul';

    use HasFactory;

    protected $fillable = ['name', 'description', 'featured_image'];
    
    

    
}


