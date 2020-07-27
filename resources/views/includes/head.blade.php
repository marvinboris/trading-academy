<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="google-site-verification" content="NdoTR6e5mBZFhwgVPN-4v23r9KIMmMpn6TerKkT_jsY" />
        <!-- Hotjar Tracking Code for https://gitacademy.net/ -->
        <script>
            (function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:1786108,hjsv:6};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
        </script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-164818912-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-164818912-1');
        </script>

        <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
        <link href="{{ asset('css/summernote-bs4.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @yield('styles')

        <title>Trading Academy</title>
    </head>
    <body class="min-vh-100">

        <div id="app">
