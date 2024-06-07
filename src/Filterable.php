<?php

namespace Sufian\QueryFilter;

use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    public function scopeFilter(Builder $query)
    {
        $filterClass = $this->getFilterClass();
        return (new $filterClass(request()))->apply($query);
    }

    protected function getFilterClass()
    {
        $modelName = class_basename($this);
        return "App\\Filters\\{$modelName}Filter";
    }
}
