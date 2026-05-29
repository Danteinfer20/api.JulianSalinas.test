<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';

    protected $fillable = [
        'nombre_pais',
    ];

    public $allowIncluded = ['states']; 
    public $allowFilter = ['id', 'nombre_pais'];
    public $allowSort = ['id', 'nombre_pais'];

    public function states()
    {
        return $this->hasMany(State::class);
    }
}