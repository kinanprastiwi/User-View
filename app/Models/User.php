<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    /**
     * Get active schedule for today or future
     */
    public function getActiveSchedule()
    {
        return $this->schedules()
                    ->where('date', '>=', now()->format('Y-m-d'))
                    ->where('status', 'pending')
                    ->orderBy('date', 'asc')
                    ->first();
    }

    /**
     * Get unread notifications count
     */
    public function getUnreadCount()
    {
        return $this->notifications()
                    ->where('is_read', false)
                    ->count();
    }

    /**
     * Get all schedules grouped by week
     */
    public function getSchedulesByWeek()
    {
        $schedules = $this->schedules()
                        ->orderBy('date', 'desc')
                        ->get();
        
        return $schedules->groupBy(function($item) {
            $weekNumber = ceil($item->date->format('d') / 7);
            return 'Minggu ' . $this->getWeekName($weekNumber);
        });
    }

    private function getWeekName($weekNumber)
    {
        $weeks = [
            1 => 'Pertama',
            2 => 'Kedua',
            3 => 'Ketiga',
            4 => 'Keempat',
        ];
        return $weeks[$weekNumber] ?? 'Pertama';
    }
}