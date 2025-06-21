<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $primaryKey = 'customer_id';

    protected $fillable = [
        'nama',
        'nomor',
        'alamat'
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'owner_id');
    }
}
