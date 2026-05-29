<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'state_id',
    ];

    public $allowIncluded = ['state', 'graduates'];
    public $allowFilter = ['id', 'name', 'state_id'];
    public $allowSort = ['id', 'name'];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function graduates()
    {
        return $this->hasMany(Graduate::class);
    }
}