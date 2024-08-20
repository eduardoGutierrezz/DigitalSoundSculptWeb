import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

import { Chart, registerables } from 'chart.js';

Chart.register(...registerables);

document.addEventListener('DOMContentLoaded', function () {
    console.log('Chart.js script loaded and ready');
});
