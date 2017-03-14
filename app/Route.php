<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use Filterable;

    /**
     * trips that a route has
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
