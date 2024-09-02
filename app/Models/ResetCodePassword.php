<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResetCodePassword extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'code',
        'created_at',
    ];
    public function isExpire()
    {
        if ($this->created_at > now()->addHour()) {
            $this->delete();
        }
    }
    public function user(){
        return $this->belongsTo(User::class,'email');
    }
}
