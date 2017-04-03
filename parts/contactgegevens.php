<div class="row">
    <div class="col-sm-6">
        contactgegevens
    </div>
    <div class="col-sm-6">
        <div id="map">
        kaartje
        </div>
    </div>
</div>
<script>
    function initMap() {
        var groningen = {lat: 53.240857, lng: 6.532921};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: groningen
        });

        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">PHP Pizza</h1>'+
            '<div id="bodyContent">'+
            '<p>Zernikelaan 11<br>' +
            '9747 AS Groningen<br>' +
            '<a href=\'tel:0505957744\'>(050) 595 77 44</a>' +
            '</p>'
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

        var marker = new google.maps.Marker({
            position: groningen,
            map: map,
            icon: "img/pizzaicon.png"
        });

        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });

    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBi4xKndQJptUGy_DHYd9ypgNnV2TV9jg0&callback=initMap"></script>
