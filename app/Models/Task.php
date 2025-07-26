<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];
    public function Workspace()
    {
        return $this->belongsTo(Workspace::class);
    }
}
