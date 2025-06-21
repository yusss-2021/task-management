<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Division extends Model
{
    protected $primaryKey = 'division_id'; // sesuai migration
    public $timestamps = false;

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'division_id');
    }
    public function progress()
    {
        return $this->hasMany(TaskDivisionProgress::class, 'division_id');
    }

}
