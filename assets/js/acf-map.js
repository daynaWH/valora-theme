(function($) {
    function render_map($el) {
        var $markers = $el.find('.marker');
        var map = new google.maps.Map($el[0], {
            zoom: 16,
            center: new google.maps.LatLng(0, 0),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        map.markers = [];
        $markers.each(function(){
            var latlng = new google.maps.LatLng($(this).data('lat'), $(this).data('lng'));
            var marker = new google.maps.Marker({
                position: latlng,
                map: map
            });
            map.markers.push(marker);
            map.setCenter(latlng);
        });
    }
    $(document).ready(function(){
        $('.acf-map').each(function(){
            render_map($(this));
        });
    });
})(jQuery);






