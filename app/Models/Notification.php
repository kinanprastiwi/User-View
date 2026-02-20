<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';

    protected $guarded = [];

    protected $casts = [
        'is_read' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mark notification as read
     */
    public function markAsRead()
    {
        $this->update(['is_read' => true]);
    }

    /**
     * Get type icon
     */
    public function getTypeIconAttribute()
    {
        return match($this->type) {
            'event', 'info' => 'event',
            'success' => 'check_circle',
            'warning' => 'warning',
            'error' => 'error',
            default => 'notifications'
        };
    }

    /**
     * Get formatted time
     */
    public function getTimeAgoAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}