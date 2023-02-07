<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{
    use HasFactory;
    protected $table = "form_data";
    protected $fillable = [

        'exam_roll_no',
        'college_roll_no',
        'student_detail',
        'user_id',
        'program_id',
        'level_id',
        'payment',
        'payment_image',
        'image',
        'year',
        'signature',
        'date',
        'credit_hours',
        'status',
        'approve',
        'payment_remarks',
        'exam_year',

    ];


    public function subject(){
    	return $this->hasMany(FormDataSubject::class);
    }
    public function userdetail(){
    	return $this->belongsTo(PaymentStatus::class , 'student_details');
    }
    public function backSubject(){
    	return $this->hasMany(FormDataBackSubject::class);
    }
    public function level(){
    	return $this->belongsTo(Level::class , 'level_id');
    }
    public function user(){
    	return $this->belongsTo(User::class , 'user_id');
    }
    public function program(){
    	return $this->belongsTo(Program::class , 'program_id');
    }
    public function marks(){
    	return $this->hasOne(FormDataMarks::class);
    }
}
