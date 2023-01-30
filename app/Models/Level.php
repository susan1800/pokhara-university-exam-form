<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $table ="levels";
    protected $fillable =[
        'title',
    ];
    public function subject(){
    	return $this->hasMany(Subject::class);
    }

    public function formData(){
    	return $this->hasMany(FormData::class);
    }
}
