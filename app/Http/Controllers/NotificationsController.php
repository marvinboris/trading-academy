<?php

namespace App\Http\Controllers;

use App\Commission;
use App\Deposit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
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
                $content = '
                <div class="text-truncate">
                    <strong>' . User::find($notification->data['user_id'])->name() . '</strong> just joined your team.
                </div>
                ';
            }
            if ($notification->type === 'App\Notifications\Commission') {
                $icon = 'fas fa-dollar-sign text-orange';
                $title = 'Commission';
                $content = '
                    <div class="text-truncate">
                        You received a referral commission of <strong>$' . Commission::find($notification->data['commission_id'])->amount . '</strong>.
                    </div>
                    ';
            }
            if ($notification->type === 'App\Notifications\Deposit') {
                $icon = 'fas fa-wallet text-orange';
                $title = 'Deposit';
                $content = '
                    <div class="text-truncate">
                        You successfully made a deposit of <strong>$' . Deposit::find($notification->data['deposit_id'])->amount . '</strong>.
                    </div>
                    ';
            }

            $data[] = [
                'id' => $notification->id,
                'icon' => $icon,
                'title' => $title,
                'datetime' => $notification->created_at->diffForHumans(),
                'content' => $content
            ];
        }
        return view('user.notifications', compact('data'));
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
        $content = '';

        if ($notification->type === 'App\Notifications\NewTeamMember') {
            $icon = 'fas fa-user text-orange';
            $title = 'New Team Member';
            $content = '
                <div class="text-truncate">
                    <strong>' . User::find($notification->data['user_id'])->name() . '</strong> just joined your team.
                </div>
                ';
        }
        if ($notification->type === 'App\Notifications\Commission') {
            $icon = 'fas fa-dollar-sign text-orange';
            $title = 'Commission';
            $content = '
                <div class="text-truncate">
                    You received a referral commission of <strong>$' . Commission::find($notification->data['commission_id'])->amount . '</strong>.
                </div>
                ';
        }
        if ($notification->type === 'App\Notifications\Deposit') {
            $icon = 'fas fa-wallet text-orange';
            $title = 'Deposit';
            $content = '
                <div class="text-truncate">
                    You successfully made a deposit of <strong>$' . Deposit::find($notification->data['deposit_id'])->amount . '</strong>.
                </div>
                ';
        }

        $data = [
            'id' => $notification->id,
            'icon' => $icon,
            'title' => $title,
            'datetime' => $notification->created_at->diffForHumans(),
            'content' => $content
        ];
        return view('user.notification', compact('data'));
    }
}
