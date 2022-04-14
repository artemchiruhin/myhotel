<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'date_from',
        'time_from',
        'date_to',
        'time_to',
        'text'
    ];

    public $dates = ['date_from', 'date_to'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
