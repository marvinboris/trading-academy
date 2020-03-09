<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    //
    public function index()
    {
        $notifications = Auth::user()->notifications()->latest()->get();
        $data = [];
        foreach ($notifications as $notification) {
            $icon = '';
            $title = '';
            $content = '';

            if ($notification->type === 'App\Notifications\NewTeamMember') {
                $icon = 'fas fa-user text-orange';
                $title = 'New Team Member';
            }
            if ($notification->type === 'App\Notifications\Commission') {
                $icon = 'fas fa-dollar-sign text-orange';
                $title = 'Commission';
            }
            if ($notification->type === 'App\Notifications\Deposit') {
                $icon = 'fas fa-wallet text-orange';
                $title = 'Deposit';
            }
            if ($notification->type === 'App\Notifications\Payment') {
                $icon = 'fas fa-hand-holding-usd text-orange';
                $title = 'Payment';
            }
            if ($notification->type === 'App\Notifications\Withdraw') {
                $icon = 'fas fa-money-bill-wave-alt text-orange';
                $title = 'Withdraw';
            }
            if ($notification->type === 'App\Notifications\Transfer') {
                $icon = 'fas fa-exchange-alt text-orange';
                $title = 'Transfer';
            }

            $data[$notification->id] = [
                'id' => $notification->id,
                'icon' => $icon,
                'title' => $title,
                'datetime' => $notification->created_at->diffForHumans(),
                'content' => $content
            ];
        }

        return view('pages.user.notifications', [
            'data' => $data,
            'notifications' => $notifications
        ]);
    }

    public function show($id)
    {
        $notifications = Auth::user()->notifications;
        $notification = null;

        foreach ($notifications as $not) {
            if ($not->id === $id) $notification = $not;
        }

        $notification->markAsRead();

        $icon = '';
        $title = '';

        if ($notification->type === 'App\Notifications\NewTeamMember') {
            $icon = 'fas fa-user text-orange';
            $title = 'New Team Member';
        }
        if ($notification->type === 'App\Notifications\Commission') {
            $icon = 'fas fa-dollar-sign text-orange';
            $title = 'Commission';
        }
        if ($notification->type === 'App\Notifications\Deposit') {
            $icon = 'fas fa-wallet text-orange';
            $title = 'Deposit';
        }
        if ($notification->type === 'App\Notifications\Payment') {
            $icon = 'fas fa-hand-holding-usd text-orange';
            $title = 'Payment';
        }
        if ($notification->type === 'App\Notifications\Withdraw') {
            $icon = 'fas fa-money-bill-wave-alt text-orange';
            $title = 'Withdraw';
        }
        if ($notification->type === 'App\Notifications\Transfer') {
            $icon = 'fas fa-exchange-alt text-orange';
            $title = 'Transfer';
        }

        $data = [
            'id' => $notification->id,
            'icon' => $icon,
            'title' => $title,
            'datetime' => $notification->created_at->diffForHumans()
        ];
        return view('pages.user.notification', [
            'data' => $data,
            'notification' => $notification,
        ]);
    }
}
