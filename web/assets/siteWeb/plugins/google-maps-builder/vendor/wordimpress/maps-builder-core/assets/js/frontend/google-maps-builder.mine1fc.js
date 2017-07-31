!function($,gmb){"use strict";function perform_places_search(a,e){for(var t=a.getCenter(),n=e.places_api.search_places,o=0;o<search_markers.length;o++)search_markers[o].setMap(null);if(search_markers=[],n.length>0){var r={key:gmb_data.api_key,location:new google.maps.LatLng(t.lat(),t.lng()),types:n,radius:e.places_api.search_radius};places_service.nearbySearch(r,function(t,n,o){var r,i=0;if(n==google.maps.places.PlacesServiceStatus.OK){for(i=0;r=t[i];i++)gmb.create_search_result_marker(a,t[i],e);o.hasNextPage&&o.nextPage()}})}}var map,places_service,place,directionsDisplay=[],search_markers=[];gmb.init=function(){var a=$(".google-maps-builder");a.each(function(e,t){gmb.initialize_map($(a[e]))}),$('a[data-toggle="tab"]').on("shown.bs.tab",function(a){var e=$(a.target).attr("href");gmb.load_hidden_map(e)}),$(".fl-tabs-label").on("click",function(a){var e=$(".fl-tabs-panel-content.fl-tab-active").get(0);gmb.load_hidden_map(e)}),$(".responsive-tabs__list__item").on("click",function(a){var e=$(".responsive-tabs__panel--active").get(0);gmb.load_hidden_map(e)}),$(".ui-accordion-header").on("click",function(a){var e=$(".ui-accordion-content-active").get(0);gmb.load_hidden_map(e)}),$(".vc_tta-tabs a").on("show.vc.tab",function(){google.maps.event.trigger(window,"resize",{})})},gmb.global_load=function(a){return $(a).hasClass("google-maps-builder")?void gmb.initialize_map(a):"invalid Google Maps Builder"},gmb.load_hidden_map=function(a){var e=$(a).find(".google-maps-builder");e.length&&e.each(function(a,t){gmb.initialize_map($(e[a]))})},gmb.initialize_map=function(a){var e=$(a).data("map-id"),t=gmb_data[e],n=t.map_params.latitude?t.map_params.latitude:"32.713240",o=t.map_params.longitude?t.map_params.longitude:"-117.159443",r={center:new google.maps.LatLng(n,o),zoom:parseInt(t.map_params.zoom),styles:[{stylers:[{visibility:"simplified"}]},{elementType:"labels",stylers:[{visibility:"off"}]}]};map=new google.maps.Map(a[0],r),places_service=new google.maps.places.PlacesService(map),gmb.set_map_options(map,t),gmb.set_map_theme(map,t),gmb.set_map_markers(map,t),gmb.set_mashup_markers(map,t),gmb.set_map_directions(map,t),gmb.set_map_layers(map,t),gmb.set_map_places_search(map,t),"yes"===t.places_api.show_places&&perform_places_search(map,t)},gmb.set_map_theme=function(map,map_data){var map_type=map_data.map_theme.map_type.toUpperCase(),map_theme=map_data.map_theme.map_theme_json;"ROADMAP"===map_type&&"none"!==map_theme?map.setOptions({mapTypeId:google.maps.MapTypeId.ROADMAP,styles:eval(map_theme)}):map.setOptions({mapTypeId:google.maps.MapTypeId[map_type],styles:!1})},gmb.set_map_options=function(a,e){var t=e.map_controls.zoom_control.toLowerCase();"none"==t?a.setOptions({zoomControl:!1}):a.setOptions({zoomControl:!0,zoomControlOptions:{style:google.maps.ZoomControlStyle[t]}});var n=e.map_controls.wheel_zoom.toLowerCase();"none"===n?a.setOptions({scrollwheel:!1}):a.setOptions({scrollwheel:!0});var o=e.map_controls.pan_control.toLowerCase();"none"===o?a.setOptions({panControl:!1}):a.setOptions({panControl:!0});var r=e.map_controls.map_type_control;"none"==r?a.setOptions({mapTypeControl:!1}):a.setOptions({mapTypeControl:!0,mapTypeControlOptions:{style:google.maps.MapTypeControlStyle[r]}});var i=e.map_controls.street_view.toLowerCase();"none"===i?a.setOptions({streetViewControl:!1}):a.setOptions({streetViewControl:!0});var s=e.map_controls.double_click_zoom.toLowerCase();"none"===s?a.setOptions({disableDoubleClickZoom:!0}):a.setOptions({disableDoubleClickZoom:!1});var m=e.map_controls.draggable.toLowerCase();"none"===m?a.setOptions({draggable:!1}):a.setOptions({draggable:!0})},gmb.set_map_markers=function(map,map_data){gmb.info_window_args={map:map,map_data:map_data,shadowStyle:gmb_data.infobubble_args.shadowStyle,padding:gmb_data.infobubble_args.padding,backgroundColor:gmb_data.infobubble_args.backgroundColor,borderRadius:gmb_data.infobubble_args.borderRadius,arrowSize:gmb_data.infobubble_args.arrowSize,minHeight:gmb_data.infobubble_args.minHeight,maxHeight:gmb_data.infobubble_args.maxHeight,minWidth:gmb_data.infobubble_args.minWidth,maxWidth:gmb_data.infobubble_args.maxWidth,borderWidth:gmb_data.infobubble_args.borderWidth,disableAutoPan:gmb_data.infobubble_args.disableAutoPan,disableAnimation:gmb_data.infobubble_args.disableAnimation,backgroundClassName:gmb_data.infobubble_args.backgroundClassName,closeSrc:gmb_data.infobubble_args.closeSrc};var map_markers=map_data.map_markers,markers=[];if(map.info_window=new GMB_InfoBubble(gmb.info_window_args),$(map_markers).each(function(index,marker_data){if(""!=marker_data.lat&&""!=marker_data.lng){var marker_label="",custom_marker_icon=marker_data.marker_img&&!isNaN(marker_data.marker_img_id)?marker_data.marker_img:"",marker_icon=map_data.map_params.default_marker,included_marker_icon=""!==marker_data.marker_included_img?marker_data.marker_included_img:"";included_marker_icon?marker_icon=map_data.plugin_url+included_marker_icon:custom_marker_icon?marker_icon=custom_marker_icon:"undefined"!=typeof marker_data.marker&&marker_data.marker.length>0&&"undefined"!=typeof marker_data.label&&marker_data.label.length>0&&(marker_icon=eval("("+marker_data.marker+")"),marker_label=marker_data.label);var marker_args={position:new google.maps.LatLng(marker_data.lat,marker_data.lng),map:map,zIndex:index,icon:marker_icon,custom_label:marker_label};marker_data.place_id&&"enabled"===map_data.signed_in_option&&(delete marker_args.position,marker_args.place={location:{lat:parseFloat(marker_data.lat),lng:parseFloat(marker_data.lng)},placeId:marker_data.place_id},marker_args.attribution={source:map_data.site_name,webUrl:map_data.site_url});var location_marker=new Marker(marker_args);markers.push(location_marker),location_marker.setVisible(!0),google.maps.event.addListener(location_marker,"click",function(){map.info_window.close(),gmb.set_info_window_content(marker_data,map,map_data).done(function(){map.info_window.open(map,location_marker,map_data),"yes"==map_data.marker_centered&&window.setTimeout(function(){map.info_window.panToView()},300)})}),"undefined"!=typeof marker_data.infowindow_open&&"opened"==marker_data.infowindow_open&&google.maps.event.addListenerOnce(map,"idle",function(){gmb.set_info_window_content(marker_data,map,map_data).done(function(){map.info_window.open(map,location_marker,map_data)})})}}),"yes"===map_data.marker_cluster)var markerCluster=new MarkerClusterer(map,markers)},gmb.set_info_window_content=function(a,e,t){var n=$.Deferred(),o="";if("undefined"!=typeof a.title&&a.title.length>0&&(o+='<p class="place-title">'+a.title+"</p>"),"undefined"!=typeof a.description&&a.description.length>0&&(o+='<div class="place-description">'+a.description+"</div>"),"undefined"!=typeof a.place_id&&a.place_id&&"on"!==a.hide_details){var r={key:gmb_data.api_key,placeId:a.place_id};places_service.getDetails(r,function(a,r){r==google.maps.places.PlacesServiceStatus.OK&&(o+=gmb.set_place_content_in_info_window(a),e.info_window.setContent(o),e.info_window.updateContent_(),n.resolve(),"yes"==t.marker_centered&&window.setTimeout(function(){e.info_window.panToView()},300))})}else n.resolve(),e.info_window.setContent(o);return n},gmb.set_place_content_in_info_window=function(a){var e;return e='<div class="marker-info-wrapper">',a.adr_address&&(e+='<div class="place-address">',e+=a.adr_address,a.formatted_address&&(e+='<a href="https://www.google.com/maps/dir/Current+Location/'+encodeURIComponent(a.formatted_address)+'" class="place-directions-link" target="_blank" title="'+gmb_data.i18n.get_directions+'"><span class="place-icon"></span>'+gmb_data.i18n.get_directions+"</a>"),e+="</div>"),a.rating&&(e+='<div class="rating-wrap"><p class="numeric-rating">'+a.rating+'</p><div class="star-rating-wrap"><div class="star-rating-size" style="width:'+65*a.rating/5+'px;"></div></div></div>'),e+=a.formatted_phone_number?'<div class="place-phone"><a href="tel:'+a.international_phone_number.replace(/\s+/g,"")+'" class="place-tel-link"><span  class="place-icon"></span>'+a.formatted_phone_number+"</a></div>":"",e+=a.website?'<div class="place-website"><a href="'+a.website+'" target="_blank" rel="nofollow"><span class="place-icon"></span>'+gmb_data.i18n.visit_website+"</a></div>":"",e+="</div>"},gmb.create_search_result_marker=function(a,e,t){var n=new google.maps.Marker({map:a});n.setIcon({url:e.icon,size:new google.maps.Size(24,24),origin:new google.maps.Point(0,0),anchor:new google.maps.Point(17,34),scaledSize:new google.maps.Size(24,24)}),n.setPosition(e.geometry.location),n.setVisible(!0),google.maps.event.addListener(n,"click",function(){a.info_window.close();var o={title:e.name,place_id:e.place_id};gmb.set_info_window_content(o,a,t).done(function(){a.info_window.open(a,n,t),"yes"==t.marker_centered&&window.setTimeout(function(){a.info_window.panToView()},300)})}),search_markers.push(n)},gmb.set_mashup_markers=function(a,e){if("undefined"==typeof e.mashup_markers||!e.mashup_markers)return!1;var t=[];$(e.mashup_markers).each(function(n,o){var r="undefined"!=typeof o.post_type?o.post_type:"",i="undefined"!=typeof o.taxonomy?o.taxonomy:"",s="undefined"!=typeof o.latitude?o.latitude:"",m="undefined"!=typeof o.longitude?o.longitude:"",_="undefined"!=typeof o.terms?o.terms:"",l={action:"get_mashup_markers",post_type:r,taxonomy:i,terms:_,index:n,lat_field:s,lng_field:m};jQuery.post(e.ajax_url,l,function(n){if($.each(n,function(n,r){var i=gmb.set_mashup_marker(a,l.index,r,o,e);i instanceof Marker&&t.push(i)}),"yes"===e.marker_cluster){new MarkerClusterer(a,t)}},"json")})},gmb.set_map_directions=function(a,e){},gmb.set_map_layers=function(a,e){},gmb.set_map_places_search=function(a,e){}}(jQuery,window.MapsBuilder||(window.MapsBuilder={})),jQuery(document).ready(function(){MapsBuilder.init();var a=new CustomEvent("MapBuilderInit");window.dispatchEvent(a)}),window.google_maps_builder_load=function(a){return MapsBuilder.global_load(a)};