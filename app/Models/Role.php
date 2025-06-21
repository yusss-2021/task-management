<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    protected $primaryKey = 'role_id'; // sesuai migration
    public $timestamps = false;

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
