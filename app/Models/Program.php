<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table="programs";
    protected  $fillable = [
        'id',
        'program',
        'departnment',
    ];
    public function subject(){
    	return $this->hasMany(Subject::class);
    }
    public function formData(){
    	return $this->hasMany(FormData::class);
    }
}
