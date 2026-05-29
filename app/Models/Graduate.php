<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graduate extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_egresado',
        'telefono',
        'correo_electronico',
        'direccion',
        'city_id',
    ];

    public $allowIncluded = ['city', 'companyGraduates', 'areas', 'titles']; 
    public $allowFilter = ['id', 'nombre_egresado', 'telefono', 'correo_electronico', 'direccion', 'city_id']; 
    public $allowSort = ['id', 'nombre_egresado', 'city_id']; 

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function companyGraduates()
    {
        return $this->hasMany(CompanyGraduate::class);
    }

    public function areas()
    {
        return $this->belongsToMany(AreaKnowledge::class, 'area_graduates', 'graduate_id', 'area_knowledge_id');
    }

    public function titles()
    {
        return $this->belongsToMany(Title::class, 'graduates_titles', 'graduate_id', 'title_id');
    }
}