window._ = require('lodash');

try {
  window.$ = window.jQuery = require('jquery');
  // window.Popper = require('@popperjs/core');
  // require('bootstrap');
  // require('admin-lte');
  // window.Popper = require('popper.js').default;
} catch (e) {}

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  console.error('CSRF token not found');
}

require('select2');
// require('overlayscrollbars');
// window.iziToast = require('izitoast');
// require('sweetalert');
require('./custom/double-request');
// require('chart.js');
// var spectrum = require('spectrum-colorpicker2/dist/spectrum.min.js');
