<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'Subject',
        'Request_Type',
        'Request_Status',
        'Approval_Status',
        'Site',
        'Due_By_Time'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
