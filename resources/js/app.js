import './bootstrap';
import { applyMasks } from './mask';
import Alpine from 'alpinejs';

window.Alpine = Alpine
 
Alpine.start()

document.addEventListener("DOMContentLoaded", () => {
    applyMasks();
});
