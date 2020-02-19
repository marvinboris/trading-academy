</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/summernote-bs4.min.js') }}" defer></script>
<script>
    $(function () {
        $('.summernote').summernote({
            tabsize: 2,
            height: 100
        });
    });
</script>
@yield('scripts')
</body>
</html>
