<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'parent_id'];

    public function skills() {
        return $this->hasMany(Skill::class);
    }

    public function quizzes() {
        return $this->hasMany(Quiz::class);
    }


    public function children()
    {

        return $this->hasMany(Category::class,'parent_id','id');
    }
}
