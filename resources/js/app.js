import './bootstrap';
import "@fortawesome/fontawesome-free/css/all.css";

import Alpine from 'alpinejs';
import usePopper from "./components/usePopper";
import focus from '@alpinejs/focus';
import Tom from "tom-select/dist/js/tom-select.complete.min";


window.Alpine = Alpine;
window.Tom = Tom;

Alpine.plugin(focus);
Alpine.data("usePopper", usePopper);
Alpine.start();

