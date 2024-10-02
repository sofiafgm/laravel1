import './bootstrap';
import jQuery, { ready } from 'jquery';
window.jQuery = jQuery;
await import("jquery-ui/dist/jquery-ui");
await import("jquery-ui/dist/themes/base/jquery-ui.css")
await import("jquery-ui/dist/themes/ui-darkness/jquery-ui.css")
import members from './members';
import statistics from "./statistics";

const init = function() {
    // Import statistics module
    members();
    statistics();
}

// execute the init function when document is ready
$(document).ready(init);

