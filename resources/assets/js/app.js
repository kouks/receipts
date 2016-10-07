
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

/**
 * Let us now import all our Vue components.
 */

Vue.component('households', require('./components/Households.vue'));

const app = new Vue({
    el: 'body'
});

/**
 * Make the menu actually toggle.
 */

$('.nav-toggle').click(function() {
  $(this).next().toggleClass('is-active');
});

/**
 * Make the escape button work
 */

$('button.delete').click(function() {
  $(this).parent().toggleClass('is-inactive');
});
