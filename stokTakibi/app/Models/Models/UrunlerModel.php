<?php

namespace App\Models\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrunlerModel extends Model
{
    protected $table = 'urunler';
    protected $fillable = ['urunAdi', 'image'];
}
