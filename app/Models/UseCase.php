<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException; 

class UseCase extends Model
{
    protected $table = 'use_cases';
    protected $fillable = ['projet_id', 'image'];
    use HasFactory;

    public function projet(){
        return $this->belongsTo(Projet::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
  
}
