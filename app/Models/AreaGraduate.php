<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ApiQueryScopes; 

class AreaGraduate extends Model
{
    use HasFactory, ApiQueryScopes; 

    protected $table = 'area_graduates';

    protected $fillable = [
        'area_knowledge_id',
        'graduate_id',
    ];

    public $allowIncluded = ['graduate', 'areaKnowledge', 'graduate.companyGraduates']; 
    public $allowFilter = ['id', 'area_knowledge_id', 'graduate_id'];
    public $allowSort = ['id'];
    public $allowSearch = ['id', 'area_knowledge_id', 'graduate_id']; 

    public function graduate()
    {
        return $this->belongsTo(Graduate::class);
    }

    public function areaKnowledge()
    {
        return $this->belongsTo(AreaKnowledge::class, 'area_knowledge_id');
    }
}