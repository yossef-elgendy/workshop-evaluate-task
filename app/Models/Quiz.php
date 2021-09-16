<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'duration',
        'category_id',
        'description',
        'level',
        'price',
        'photo_id'
    ];

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function photo(){
        return $this->hasOne(Photo::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
