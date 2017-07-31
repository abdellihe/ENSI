jQuery(document).ready(function() {            var tabHashId = window.location.hash.substr(1);
            if (tabHashId) {
                jQuery('#oscitas-restabs-1-laboratoire-cristal-60204 a[href="#'+tabHashId+'"]').tab('show');
            }});