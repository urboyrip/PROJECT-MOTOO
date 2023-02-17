<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review_Teknisi extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'reviewer_user_id',
        'Penilaian',
        'Deskripsi'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
