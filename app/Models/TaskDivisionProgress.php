<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskDivisionProgress extends Model
{
    protected $table = 'task_division_progress';

    protected $fillable = [
        'task_id',
        'division_id',
        'user_id',
        'progress_percent',
        'jumlah_selesai',
        'file_url',
        'status',
        'note',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
