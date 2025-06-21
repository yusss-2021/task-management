<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $primaryKey = 'task_id';

protected $fillable = [
    'nama_task',
    'warna',
    'jumlah',
    'waktu_pengerjaan',
    'ukuran',
    'progress',
    'owner_id'
];

public function customer()
{
    return $this->belongsTo(\App\Models\Customer::class, 'owner_id');
}

// public function progress()
// {
//     return $this->hasMany(TaskDivisionProgress::class, 'task_id');
// }
public function divisionProgress()
{
    return $this->hasMany(TaskDivisionProgress::class, 'task_id');
}


}
