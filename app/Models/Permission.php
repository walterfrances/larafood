<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'description'];

    /**
     * Get Modules
     */
    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }
}
