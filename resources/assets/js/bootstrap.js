/*import jquery from 'jquery';

window.$ = jquery;
window.jQuery = jquery;
window.jquery = jquery;*/

import axios from 'axios';

window.axios = axios; 

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


/*css*/
import '../sass/app.scss';  

/*js*/
import '../myjs/jquery-2.1.4.js';
import '../myjs/map-script.js';
import '../myjs/bootstrap.min.js';
import '../myjs/jquery-ui.min.js';
import '../myjs/jquery.appear.js';
import '../myjs/jquery.countTo.js';
import '../myjs/isotope.js';
import '../myjs/jquery.fancybox.pack.js';
import '../myjs/jquery.fancybox-media.js';
import '../myjs/owl.js';
import '../myjs/masterslider.js';
import '../myjs/jquery.polyglot.language.switcher.js';
import '../myjs/owl.carousel.min.js';
import '../myjs/jquery.mixitup.min.js';
import '../myjs/validate.js';
import '../myjs/wow.js';
import '../myjs/theme.js';
import '../myjs/jquery.bxslider.min.js';
import '../myjs/jquery.matchHeight.js';
import '../myjs/script.js';
