<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormDataBackSubject extends Model
{
    use HasFactory;
    protected $table = "form_data_back_subjects";
    protected $fillable = [
        'subject_id',
        'form_data_id',
    ];
    public function subject(){
    	return $this->belongsTo(Subject::class);
    }
    public function formData(){
    	return $this->belongsTo(FormData::class , 'form_data_id');
    }
}
