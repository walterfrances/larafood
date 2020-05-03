<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    protected $fillable =['name', 'url', 'price', 'Description'];

    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
                            ->orwhere('Description', 'LIKE', "%{$filter}%")
                            ->paginate();

        return $results;

    }
}
