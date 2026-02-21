<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    public function application()
    {
        return $this->hasMany(Application::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    protected $casts = [
        'date' => 'datetime'
    ];
}
