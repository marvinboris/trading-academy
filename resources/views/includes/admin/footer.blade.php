<footer class="py-2 px-3 bg-white text-dark border-top">
    &copy; Copyright <strong>Trading Academy</strong>. All Rights Reserved. Designed by <a href="mailto:jaris.ultio.21@gmail.com" class="font-weight-bold text-reset text-decoration-none">Brainer 21</a> .
</footer>
@section('scripts')
<script>
    $(function () {
        $('#messages-controller').click(function () {
            if ($('#notifications').hasClass('show') || $('#menu').hasClass('show')) $('#notifications, #menu').removeClass('show');
        });
        $('#notifications-controller').click(function () {
            if ($('#messages').hasClass('show') || $('#menu').hasClass('show')) $('#messages, #menu').removeClass('show');
        });
        $('#menu-controller').click(function () {
            if ($('#messages').hasClass('show') || $('#notifications').hasClass('show')) $('#messages, #notifications').removeClass('show');
        });
    });
</script>
@endsection