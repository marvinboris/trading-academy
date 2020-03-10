<script>
    $(function () {
        $('body').on('click', '.pagination a', function(e) {
            e.preventDefault();

            const url = $(this).attr('href');
            getData(url);
            window.history.pushState("", "", url);
        });

        $('.export').click(function (e) {
            e.preventDefault();

            const url = $(this).attr('href');
            exportData(url);
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

        function exportData(url) {
            const _token = $('input[name="_token"]').val();
            const data = $('input[name="data"]').val();

            const format = url.split('/')[url.split('/').length - 1];
            const name = 'Data.' + format;

            $.ajax({
                url,
                method: 'POST',
                data: {data, name, _token},
                xhrFields: {
                    responseType: 'blob'
                },
                success: function (data) {
                    const url = URL.createObjectURL(data);
                    const a = document.createElement('a');
                    a.style.display = 'none';
                    a.href = url;
                    a.download = name;
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);
                },
                error: err => console.log(err.responseText)
            })
            .fail(function () {
                alert('Data could not be sent.');
            });
        }

        function blobToFile(theBlob, fileName){
            theBlob.lastModifiedDate = new Date();
            theBlob.name = fileName;
            return theBlob;
        }
    });
</script>