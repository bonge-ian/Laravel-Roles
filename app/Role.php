<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * A role can belong to many users
     *
     * @return Illumiate\Database\Eloquent
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
