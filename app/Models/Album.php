<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['name','artista','data_lancamento'];

    public function tracks()
    {
        return $this->hasMany(Faixa::class);
    }
}
