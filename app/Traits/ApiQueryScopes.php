<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait ApiQueryScopes
{
    public function scopeIncluded(Builder $query)
    {
        if (empty($this->allowIncluded) || empty(request('included'))) {
            return;
        }

        $relations = explode(',', request('included'));
        $allowIncluded = collect($this->allowIncluded);
        
        foreach ($relations as $key => $relationship) {
            // Soporta la verificación de la relación base si viene con perforación de punto (.)
            $baseRelation = explode('.', $relationship)[0];

            if (!$allowIncluded->contains($relationship) && !$allowIncluded->contains($baseRelation)) {
                unset($relations[$key]);
            }
        }

        if (!empty($relations)) {
            $query->with($relations);
        }
    }

    public function scopeWithCount(Builder $query)
    {
        // Validación unificada sobre allowIncluded para máxima compatibilidad
        if (empty($this->allowIncluded) || empty(request('withCount'))) {
            return;
        }

        $relations = explode(',', request('withCount'));
        $allowIncluded = collect($this->allowIncluded);
        
        foreach ($relations as $key => $relationship) {
            if (!$allowIncluded->contains($relationship)) {
                unset($relations[$key]);
            }
        }

        // CONTROL DE FILTRO CRÍTICO: Solo ejecuta si el array filtrado mantiene elementos válidos
        if (!empty($relations)) {
            $query->withCount($relations);
        }
    }
     
    public function scopeFilter(Builder $query)
    {
        if (empty($this->allowFilter) || empty(request('filter'))) {
            return;
        }

        $filters = request('filter');
        $allowFilter = collect($this->allowFilter);
        
        foreach ($filters as $filter => $value) {
            if ($allowFilter->contains($filter) && !is_null($value)) {
                $query->where($filter, 'LIKE', '%' . $value . '%');
            }
        }
    }

    public function scopeFilterStrict(Builder $query)
    {
        if (empty($this->allowFilter) || empty(request('filterStrict'))) {
            return;
        }

        $filters = request('filterStrict');
        $allowFilter = collect($this->allowFilter);
        
        foreach ($filters as $filter => $value) {
            if ($allowFilter->contains($filter) && !is_null($value)) {
                $query->where($filter, '=', $value);
            }
        }
    }
    
    public function scopeFilterDate(Builder $query)
    {
        if (empty($this->allowFilterDate) || empty(request('filterDate'))) {
            return;
        }

        $filters = request('filterDate');
        $allowFilterDate = collect($this->allowFilterDate);
        
        foreach ($filters as $filter => $value) {
            if ($allowFilterDate->contains($filter)) {
                $dates = explode(',', $value);
                if (count($dates) == 2) {
                    $query->whereBetween($filter, [$dates[0], $dates[1]]);
                }
            }
        }
    }
   
    public function scopeSearch(Builder $query)
    {
        if (empty($this->allowSearch) || empty(request('search'))) {
            return;
        }

        $term = request('search');
        $allowSearch = $this->allowSearch;

        $query->where(function ($q) use ($allowSearch, $term) {
            foreach ($allowSearch as $column) {
                $q->orWhere($column, 'LIKE', '%' . $term . '%');
            }
        });
    }
    
    public function scopeSort(Builder $query)
    {
        if (empty($this->allowSort) || empty(request('sort'))) {
            return;
        }

        $sortFields = explode(',', request('sort'));
        $allowSort = collect($this->allowSort);
        
        foreach ($sortFields as $sortField) {
            $direction = 'asc';
            if (substr($sortField, 0, 1) == '-') {
                $direction = 'desc';
                $sortField = substr($sortField, 1);
            }
            if ($allowSort->contains($sortField)) {
                $query->orderBy($sortField, $direction);
            }
        }
    }
    
    public function scopeGetOrPaginate(Builder $query)
    {
        if (request('perPage')) {
            $perPage = intval(request('perPage'));
            if ($perPage) {
                return $query->paginate($perPage);
            }
        }
        return $query->get();
    }
}