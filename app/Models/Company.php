<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_empresa',
    ];

    public $allowIncluded = ['companyGraduates']; 
    public $allowFilter = ['id', 'nombre_empresa']; 
    public $allowSort = ['id', 'nombre_empresa'];   

    public function companyGraduates()
    {
        return $this->hasMany(CompanyGraduate::class);
    }
}