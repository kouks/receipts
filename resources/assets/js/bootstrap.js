/**
 * Lodash utilities
 */

// window._ = require('lodash');

/**
 * Laravel csrf token
 */

window.Laravel = {
  csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
};

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

// window.$ = window.jQuery = require('jquery');
// require('bootstrap-sass');

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require('vue');
require('vue-resource');

/**
 * We'll register a HTTP interceptor to attach the "CSRF" header to each of
 * the outgoing requests issued by this application. The CSRF middleware
 * included with Laravel will automatically verify the header's value.
 */

Vue.http.interceptors.push((request, next) => {
  request.headers['X-CSRF-TOKEN'] = Laravel.csrfToken;

  next();
});

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from "laravel-echo"

// window.Echo = new Echo({
//   broadcaster: 'pusher',
//   cluster: 'eu',
//   key: '16f52079b6cc6777c049'
// });

/**
 * Turbolinks
 */

// import Turbolinks from 'turbolinks'
// Turbolinks.start();
