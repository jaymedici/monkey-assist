import './bootstrap';

import Alpine from 'alpinejs';
import usePopper from "./components/usePopper";
import "@fortawesome/fontawesome-free/css/all.css";

window.Alpine = Alpine;

Alpine.data("usePopper", usePopper);
Alpine.start();

