<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = "notifications";
    protected $fillable = [
        'form_id',
    ];
    public function form(){
    	return $this->belongsTo(FormData::class , 'form_id');
    }
}
