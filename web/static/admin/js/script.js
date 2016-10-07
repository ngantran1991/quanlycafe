$(document).ready(function () {
    function initialize() {
        
        if (typeof currentHost == 'undefined') {
            return false;
        }
        host = currentHost.slice(0, currentHost.length);
        $.ajax({
            url: host + postURL,
            method: 'POST',
            data: {userId:userId}
        }).done(function (response) {
            var myLatLng = response.length ? response : [];
            var flag = true;
            if (!myLatLng.length) {
                myLatLng.push({lat:48.8873779, lng:2.3366626});
                flag = false;
            }
            var defaultLatLng = myLatLng[0];
            var center = new google.maps.LatLng(defaultLatLng);
            var mapOptions = {
                center: center,
                zoom: 11,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: true,
                draggable: true,
                panControl: true,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: true,
                streetViewControl: true,
                overviewMapControl: true,
                rotateControl: true,
            };

            var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
            if (!flag){
                return false;
            }
            for (var i = 0, length = myLatLng.length; i < length; i++) {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(myLatLng[i])
                });
                marker.setMap(map);
            }
        }).fail(function (error) {
            console.log(error);
        });

    }
    google.maps.event.addDomListener(window, 'load', initialize);

});
