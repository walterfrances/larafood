<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPlan extends Model
{
    protected $fillable =['name'];

    protected $table = 'details_plans';

    public function plan()
    {
        $this->belongsTo(DetailPlan::class);
    }
}
