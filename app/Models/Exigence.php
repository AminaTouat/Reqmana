<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exigence extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at'];
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['projet_id', 'summary','requirementType', 'importance', 'entredBy','source','body'];
    public function projet(){
        return $this->belongsTo(Projet::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
    public function Links(){
        return $this->hasMany(Link::class);
    }
}
