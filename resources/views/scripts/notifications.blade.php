@if (Session::has('new'))
    @php
        $notifications = Auth::user()->unreadNotifications()->latest()->limit(5)->get()->toArray();
    @endphp
    <script>
        $(function () {
            const notifications = @json($notifications);
            notifications.forEach(notification => {

            });
        });
    </script>
@endif
