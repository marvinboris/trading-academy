<script>
    $(function () {
        $('body').on('click', '.pagination a', function(e) {
            e.preventDefault();

            const url = $(this).attr('href');
            getData(url);
            window.history.pushState("", "", url);
        });

        function getData(url) {
            $.ajax({
                url,
                success: function (data) {
                    $('#tag_container').html(data); 
                }
            })
            .fail(function () {
                alert('Data could not be loaded.');
            });
        }
    });
</script>