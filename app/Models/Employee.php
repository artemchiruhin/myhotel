<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'role_id',
        'position_id',
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function activities()
    {
        return DB::table('position_activity')->where('position_id', $this->position_id)->get();
    }
}
