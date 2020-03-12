<script>
    $(function () {
        $('#country').change(function () {
            const current = $(this);
            const value = current.val();
            const country = current.find('option:selected').attr('country');
            $('#code').val(value);
            $('#country-code').val(country);
        });
        
        const passwordBlock = $('.password.alert');

        passwordBlock.hide().removeClass('d-none');
        
        $('#password').keyup(function () {
            passwordBlock.slideDown();

            const current = $(this);
            const value = current.val();

            const uppercaseRegex = /[A-Z]/g;
            const lowercaseRegex = /[a-z]/g;
            const numberRegex = /[0-9]/g;
            const specialRegex = /[!@#\$%\^\&*\)\(+=._-]/g;

            const uppercase = $('#uppercase');
            const lowercase = $('#lowercase');
            const number = $('#number');
            const special = $('#special');
            const minimum = $('#minimum');
            const confirm = $('#confirm');

            const uppercaseTest = uppercaseRegex.test(value);
            const lowercaseTest = lowercaseRegex.test(value);
            const numberTest = numberRegex.test(value);
            const specialTest = specialRegex.test(value);
            const minimumTest = value.length > 7;
            const confirmTest = value === $('#password-confirmation').val();

            if (uppercaseTest && lowercaseTest && numberTest && specialTest && minimumTest && confirmTest) passwordBlock.removeClass('alert-danger').addClass('alert-success');
            else passwordBlock.removeClass('alert-success').addClass('alert-danger');

            if (uppercaseTest) uppercase.removeClass('text-purered').addClass('text-green').find('.fas').removeClass('fa-times-circle').addClass('fa-check-circle');
            else uppercase.addClass('text-purered').removeClass('text-green').find('.fas').addClass('fa-times-circle').removeClass('fa-check-circle');

            if (lowercaseTest) lowercase.removeClass('text-purered').addClass('text-green').find('.fas').removeClass('fa-times-circle').addClass('fa-check-circle');
            else lowercase.addClass('text-purered').removeClass('text-green').find('.fas').addClass('fa-times-circle').removeClass('fa-check-circle');

            if (numberTest) number.removeClass('text-purered').addClass('text-green').find('.fas').removeClass('fa-times-circle').addClass('fa-check-circle');
            else number.addClass('text-purered').removeClass('text-green').find('.fas').addClass('fa-times-circle').removeClass('fa-check-circle');

            if (specialTest) special.removeClass('text-purered').addClass('text-green').find('.fas').removeClass('fa-times-circle').addClass('fa-check-circle');
            else special.addClass('text-purered').removeClass('text-green').find('.fas').addClass('fa-times-circle').removeClass('fa-check-circle');

            if (minimumTest) minimum.removeClass('text-purered').addClass('text-green').find('.fas').removeClass('fa-times-circle').addClass('fa-check-circle');
            else minimum.addClass('text-purered').removeClass('text-green').find('.fas').addClass('fa-times-circle').removeClass('fa-check-circle');
            
            if (confirmTest) confirm.removeClass('text-purered').addClass('text-green').find('.fas').removeClass('fa-times-circle').addClass('fa-check-circle');
            else confirm.addClass('text-purered').removeClass('text-green').find('.fas').addClass('fa-times-circle').removeClass('fa-check-circle');
        });

        $('#password').change(function () {
            $('#password').keyup();
        });

        $('#password-confirmation').change(function () {
            $('#password').keyup();
        });

        $('#password-confirmation').keyup(function () {
            $('#password').keyup();
        });

        $('form').submit(function (e) {
            if ($('.password.alert').hasClass('alert-danger')) e.preventDefault();
        });
    });
</script>