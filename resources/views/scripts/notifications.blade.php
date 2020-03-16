@if (Session::has('new'))
    @php
        $notifications_data = Auth::user()->unreadNotifications()->latest()->limit(5)->get()->toArray();

        $notifications = [];

        foreach ($notifications_data as $index => $notification) {
            switch($notification['type']) {
                case 'App\Notifications\NewTeamMember':
                    $notifications[] = array_merge($notifications_data[$index], ['content' => '<i class="text-white fas fa-bell fa-fw"></i> <strong>' . App\User::find($notification['data']['user_id'])->name() . '</strong> just joined your team.']);
                    break;
                case 'App\Notifications\Commission':
                    $notifications[] = array_merge($notifications_data[$index], ['content' => '<i class="text-white fas fa-bell fa-fw"></i> You received a referral commission of <strong>$' . App\Commission::find($notification['data']['commission_id'])->amount . '</strong>.']);
                    break;
                case 'App\Notifications\Deposit':
                    $notifications[] = array_merge($notifications_data[$index], ['content' => '<i class="text-white fas fa-bell fa-fw"></i> You successfully made a deposit of <strong>$' . App\Deposit::find($notification['data']['deposit_id'])->amount . '</strong>.']);
                    break;
                case 'App\Notifications\Payment':
                    $notifications[] = array_merge($notifications_data[$index], ['content' => '<i class="text-white fas fa-bell fa-fw"></i> You made a payment of <strong>$' . App\Payment::find($notification['data']['payment_id'])->amount . '</strong>.']);
                    break;
                case 'App\Notifications\Transfer':
                    if (App\Transfer::find($notification['data']['transfer_id'])->sender == Auth::user()->ref) $notifications[] = array_merge($notifications_data[$index], ['content' => '<i class="text-white fas fa-bell fa-fw"></i> You successfully transfered <strong>$' . App\Transfer::find($notification['data']['transfer_id'])->amount . '</strong> to ' . App\Transfer::find($notification['data']['transfer_id'])->receiver . '.']);
                    if (App\Transfer::find($notification['data']['transfer_id'])->receiver == Auth::user()->ref) $notifications[] = array_merge($notifications_data[$index], ['content' => '<i class="text-white fas fa-bell fa-fw"></i> You received <strong>$' . App\Transfer::find($notification['data']['transfer_id'])->amount . '</strong> from ' . App\Transfer::find($notification['data']['transfer_id'])->sender . '.']);
                    break;
                case 'App\Notifications\Withdraw':
                    $notifications[] = array_merge($notifications_data[$index], ['content' => '<i class="text-white fas fa-bell fa-fw"></i> You just made a withdraw of <strong>$' . App\Withdraw::find($notification['data']['withdraw_id'])->amount . '</strong>.']);
                    break;
            }
        }
    @endphp
    <script>
        $(function () {
            const notifications = @json($notifications);
            notifications.forEach(notification => {
                new Noty({
                    theme: 'metroui',
                    text: notification.content,
                    type: 'info',
                    container: '#notifications-block',
                    timeout: 5000
                }).show();
            });
        });
    </script>
@endif
