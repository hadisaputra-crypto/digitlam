<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'action',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    /**
     * Get the user that performed the action.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Log an activity.
     */
    public static function log($action, $meta = [], $userId = null)
    {
        return self::create([
            'user_id' => $userId ?? auth()->id(),
            'action' => $action,
            'meta' => $meta,
        ]);
    }
}
