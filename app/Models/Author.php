<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public $fillable = [
        'name', 'email', 'email_verified_at',
        'password', 'role_id', 'remember_token'
    ];

    public function books(){
        return $this->hasMany(Book::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
