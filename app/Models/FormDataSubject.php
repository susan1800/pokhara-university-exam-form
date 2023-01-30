<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormDataSubject extends Model
{
    use HasFactory;
    protected $table ="form_data_subjects";
    protected $fillable = [
        'subject_id',
        'form_data_id',
    ];
    public function subject(){
    	return $this->belongsTo(Subject::class , 'subject_id');
    }
    public function formData(){
    	return $this->belongsTo(FormData::class , 'form_data_id');
    }
}
