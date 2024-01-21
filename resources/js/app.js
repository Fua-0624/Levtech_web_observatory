import './bootstrap';
import './calendar.js';　//ここでjsを読み込むことで@viteでapp.jsを読み込むだけでcalendar.jsも呼び出せるようになる

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

