<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable= [
        'id',
        'ticket_id',
        'user_id',
        'task_type',
        'task_status',
        'actual_start_time',
        'scheduled_end_time',
        'scheduled_starttime',
        'overdue_status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }
}
