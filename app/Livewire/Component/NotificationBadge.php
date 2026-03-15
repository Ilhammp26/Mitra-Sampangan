<?php

namespace App\Livewire\Component;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NotificationBadge extends Component
{
    protected $listeners = ['notificationRecieved' => '$refresh'];

    public function markAsRead($id)
    {
        $notification = Auth::user()->notifications()->find($id);
        if ($notification) {
            $notification->markAsRead();
        }
    }

    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications()->update(['read_at' => now()]);
    }

    public function render()
    {
        $notifications = Auth::user() ? Auth::user()->notifications()->latest()->take(5)->get() : collect();
        $unreadCount = Auth::user() ? Auth::user()->unreadNotifications()->count() : 0;

        return view('livewire.component.notification-badge', compact('notifications', 'unreadCount'));
    }
}
