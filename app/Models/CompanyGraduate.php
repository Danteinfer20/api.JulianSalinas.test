<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyGraduate extends Model
{
    use HasFactory;

    protected $table = 'company_graduates';

    protected $fillable = [
        'estado_actual',
        'cargo',
        'graduate_id',
        'company_id',
    ];

    public $allowIncluded = ['graduate', 'company']; 
    public $allowFilter = ['id', 'estado_actual', 'cargo', 'graduate_id', 'company_id']; 
    public $allowSort = ['id', 'estado_actual', 'cargo'];

    public function graduate()
    {
        return $this->belongsTo(Graduate::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}