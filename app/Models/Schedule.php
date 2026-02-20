<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Schedule extends Model
{
    protected $table = 'schedules';

    protected $guarded = [];

    protected $casts = [
        'date' => 'date',
        'start_time' => 'string',
        'end_time' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function report()
    {
        return $this->hasOne(Report::class, 'schedule_id');
    }

    /**
     * Format date to d/m/Y
     */
    public function getFormattedDateAttribute()
    {
        return $this->date->format('d/m/Y');
    }

    /**
     * Get status badge color
     */
    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'Selesai', 'completed' => 'bg-green-100 text-green-600',
            'Belum Selesai', 'pending' => 'bg-red-100 text-red-600',
            default => 'bg-gray-100 text-gray-600'
        };
    }

    /**
     * Get day color for badge
     */
    public function getDayColorAttribute()
    {
        return match($this->day) {
            'Senin' => 'bg-blue-100 text-blue-600',
            'Selasa' => 'bg-yellow-100 text-yellow-600',
            'Rabu' => 'bg-green-100 text-green-600',
            'Kamis' => 'bg-purple-100 text-purple-600',
            'Jumat' => 'bg-pink-100 text-pink-600',
            default => 'bg-gray-100 text-gray-600'
        };
    }
}