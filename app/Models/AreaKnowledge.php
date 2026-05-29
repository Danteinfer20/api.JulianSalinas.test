<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaKnowledge extends Model
{
    use HasFactory;

    protected $table = 'area_knowledge';

    protected $fillable = [
        'nombre_area_conocimiento',
    ];

    public $allowIncluded = ['graduates']; 
    public $allowFilter = ['id', 'nombre_area_conocimiento']; 
    public $allowSort = ['id', 'nombre_area_conocimiento'];

    public function graduates()
    {
        return $this->belongsToMany(Graduate::class, 'area_graduates', 'area_knowledge_id', 'graduate_id');
    }
}