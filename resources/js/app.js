/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.ClipboardJS = require('clipboard');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

new ClipboardJS('.btn-copy');

$(function () {
    $.getScript('/js/summernote-bs4.min.js', function () {
        $('.summernote').summernote({
            tabsize: 2,
        });
    });
    $.getScript('/js/aos.js', function () {
        AOS.init();
    });
    $.getScript('/js/jquery.waypoints.min.js', function () {
        $.getScript('/js/jquery.countup.min.js', function () {
            $('.counter').countUp();
        });
    });
    $.getScript('/js/jquery.star-rating-svg.js', function () {
        $(".ranking-stars").starRating({
            totalStars: 5,
            starShape: 'rounded',
            starSize: 40,
            emptyColor: 'lightgray',
            hoverColor: 'salmon',
            activeColor: 'orange',
            useGradient: false,
            callback: function (currentRating) {
                $('input[name="mark"]').val(currentRating);
                console.log(currentRating);
            }
        });

        $(".read-only-stars").starRating({
            readOnly: true,
            starShape: 'rounded',
            starSize: 20,
        });
    });
});

$(function () {
    const activeNavLink = $('.nav-link.active span');
    const width = activeNavLink.outerWidth();
    const height = activeNavLink.outerHeight();
    const lilPoint = $('#lil-point');
    lilPoint.css({ top: height - 15, left: width - 5 });

    $('.nav-item:not(.dropdown) .nav-link:not(.active) span').hover(function () {
        const current = $(this);
        current.stop().animate({ fontSize: 18 }, 'fast', function () { current.css({ fontWeight: 'bold' }) });
        activeNavLink.stop().animate({ fontSize: 15 }, 'fast');
    }, function () {
        const current = $(this);
        current.stop().animate({ fontSize: 15 }, 'fast', function () { current.css({ fontWeight: 'normal' }) });
        activeNavLink.stop().animate({ fontSize: 18 }, 'fast');
    }).click(function () {
        const current = $(this);
        const { left } = current.position();
        $('.nav-link span').off('hover');
        activeNavLink.removeClass('active');
        current.stop().animate({ fontSize: 18 }, 'fast', function () { current.css({ fontWeight: 'bold' }).removeClass('text-white').addClass('text-yellow') });
        lilPoint.show('fast').animate({ top: height - 15, left: width - 5 + left }, 'fast');
    });
});

$(function () {
    const editBtn = $('#photo-form').find('button');
    const editBtnAside = $('#photo-form-aside').find('button');
    editBtn.hide().removeClass('d-none');
    editBtnAside.hide().removeClass('d-none');
    $('#photo-form-photo').change(function () {
        editBtn.show();
    });
    $('#photo-form-aside-photo').change(function () {
        editBtnAside.show();
    });
});

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

$(function () {
    $('.btn-animate .secondary').css({ display: 'flex' }).hide().removeClass('d-none');
    $('.btn-animate .primary').hover(function () {
        const current = $(this);
        const secondary = current.find('.secondary');

        const secondaryWidth = secondary.outerWidth();

        current.stop().animate({ paddingRight: secondaryWidth }, 'fast');
        secondary.stop().show('fast');
    }, function () {
        const current = $(this);
        const secondary = current.find('.secondary');

        current.stop().animate({ paddingRight: 0 }, 'fast');
        secondary.stop().hide('fast');
    });
});