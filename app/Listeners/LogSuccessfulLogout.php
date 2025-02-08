<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use App\Models\ActivityLog;

class LogSuccessfulLogout
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        // Pastikan user tersedia pada event
        if ($event->user) {
            ActivityLog::create([
                'user_id'  => $event->user->id,
                'activity' => 'Logout',
                'detail'   => 'User berhasil logout pada ' . now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
