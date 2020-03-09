@switch($notification->type)
    @case('App\Notifications\NewTeamMember')
        @if ($shortcut ?? false) <i class="text-orange fas fa-bell fa-fw"></i> @endif <strong>{{ App\User::find($notification->data['user_id'])->name() }}</strong> just joined your team.
        @break
    @case('App\Notifications\Commission')
        @if ($shortcut ?? false) <i class="text-orange fas fa-bell fa-fw"></i> @endif You received a referral commission of <strong>${{ App\Commission::find($notification->data['commission_id'])->amount }}</strong>.
        @break
    @case('App\Notifications\Deposit')
        @if ($shortcut ?? false) <i class="text-orange fas fa-bell fa-fw"></i> @endif You successfully made a deposit of <strong>${{ App\Deposit::find($notification->data['deposit_id'])->amount }}</strong>.
        @break
    @case('App\Notifications\Payment')
        @if ($shortcut ?? false) <i class="text-orange fas fa-bell fa-fw"></i> @endif You made a payment of <strong>${{ App\Payment::find($notification->data['payment_id'])->amount }}</strong>.
        @break
    @case('App\Notifications\Transfer')
        @if (App\Transfer::find($notification->data['transfer_id'])->sender == Auth::user()->ref)
        @if ($shortcut ?? false) <i class="text-orange fas fa-bell fa-fw"></i> @endif You successfully transfered <strong>${{ App\Transfer::find($notification->data['transfer_id'])->amount }}</strong> to {{ App\Transfer::find($notification->data['transfer_id'])->receiver }}.
        @endif
        @if (App\Transfer::find($notification->data['transfer_id'])->receiver == Auth::user()->ref)
        @if ($shortcut ?? false) <i class="text-orange fas fa-bell fa-fw"></i> @endif You received <strong>${{ App\Transfer::find($notification->data['transfer_id'])->amount }}</strong> from {{ App\Transfer::find($notification->data['transfer_id'])->sender }}.
        @endif
        @break
    @case('App\Notifications\Withdraw')
        @if ($shortcut ?? false) <i class="text-orange fas fa-bell fa-fw"></i> @endif You just made a withdraw of <strong>${{ App\Withdraw::find($notification->data['withdraw_id'])->amount }}</strong>.
        @break
@endswitch