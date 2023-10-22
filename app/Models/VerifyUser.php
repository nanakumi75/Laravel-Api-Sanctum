<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    protected $fillable = [
      'token',
      'user_id'
    ];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
