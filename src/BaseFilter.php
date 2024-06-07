<?php

namespace Sufian\QueryFilter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class BaseFilter
{
    protected $request;
    protected $filters = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $query)
    {
        foreach ($this->filters() as $filter => $value) {
            if (in_array($filter, $this->filters) && method_exists($this, $filter)) {
                $this->$filter($query, $value);
            }
        }
        return $query;
    }

    public function filters()
    {
        return $this->request->only($this->filters);
    }
}
