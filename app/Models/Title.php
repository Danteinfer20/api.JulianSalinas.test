<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_titulo',
    ];

    public $allowIncluded = ['graduates'];
    public $allowFilter = ['id', 'nombre_titulo'];
    public $allowSort = ['id', 'nombre_titulo'];

    public function graduates()
    {
        return $this->belongsToMany(Graduate::class, 'graduates_titles', 'title_id', 'graduate_id');
    }
}