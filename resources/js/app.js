/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

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

$(function () {
    const activeNavLink = $('.nav-link.active');
    const width = activeNavLink.outerWidth();
    const height = activeNavLink.outerHeight();
    const lilPoint = $('#lil-point');
    lilPoint.css({ top: height - 15, left: width - 5 });

    $('.nav-link:not(.active)').hover(function () {
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
        $('.nav-link').off();
        activeNavLink.removeClass('active');
        current.stop().animate({ fontSize: 18 }, 'fast', function () { current.css({ fontWeight: 'bold', color: '#ffe710' }) });
        lilPoint.show('fast').animate({ top: height - 15, left: width - 5 + left });
    });
});