import "@fortawesome/fontawesome-free/css/all.css";
import "toastr/build/toastr.min.css";

import './bootstrap';
import Alpine from 'alpinejs';
import usePopper from "./components/usePopper";
import focus from '@alpinejs/focus';
import Tom from "tom-select/dist/js/tom-select.complete.min";
import toastr from "toastr/toastr";

window.Alpine = Alpine;
window.Tom = Tom;

Alpine.plugin(focus);
Alpine.data("usePopper", usePopper);
Alpine.start();

toastr.options = {
    positionClass: "toast-top-right",
    progressBar: true     
};

window.addEventListener('ticket-opened', event => {
    toastr.success(event.detail.message, 'Success');
});