<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;
    protected $fillable = [
        'choice',
        'question_id',
        'isRight'
    ];

    public function question() {
        return $this->belongsTo(Question::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

}
