<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

class RouteFilters extends QueryFilters
{
    /**
     * Filter by name.
     *
     * @param  string $name
     * @return Builder
     */
    public function name($name)
    {
        return $this->builder
            ->where('route_short_name', 'like', '%'. $name .'%')
            ->orWhere('route_long_name', 'like', '%'. $name .'%');
    }

    /**
     * Filter by route id not to be confused with
     * table auto incrementing id
     *
     * @param  string $routeId
     * @return Builder
     */
    public function route($routeId)
    {
        return $this->builder->where('route_id', $routeId);
    }

    /**
     * Filter by type.
     *
     * @param  string $type
     * @return Builder
     */
    public function type($type = '3')
    {
        return $this->builder->where('route_type', $type);
    }
}
