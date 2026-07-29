import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import '@fortawesome/fontawesome-free/css/all.min.css';

import 'aos/dist/aos.css';

import AOS from 'aos';

AOS.init({

    duration:700,

    once:true,

});