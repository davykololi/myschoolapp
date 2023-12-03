/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

import './bootstrap';

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import './components/Example';


/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Alpine from 'alpinejs';
// optional
window.Alpine = Alpine;
// initialize Alpine
Alpine.start();


import { Datepicker, Input, Select, Carousel, Ripple, Collapse, Sidenav, Chart, Lightbox, Datetimepicker, initTE } from "tw-elements";
initTE({ Datepicker, Input, Select, Carousel, Ripple, Collapse, Sidenav, Chart, Lightbox, Datetimepicker });

import 'flowbite';

// OTP
