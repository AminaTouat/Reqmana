<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    public function users(){
        return $this->belongsToMany(User::class, 'user_projet', 'projet_id', 'user_id');
    }
    public function usecases(){
        return $this->hasMany(UseCase::class);
    }
    public function exigences(){
        return $this->hasMany(Exigence::class);
    }
}
