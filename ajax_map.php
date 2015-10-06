
    <div id="map-canvas" style="height:500px;width:100%;" ></div>
    <script type="text/javascript">

     var delay = 100;
     var latlng = new google.maps.LatLng(21.0000, 78.0000);
      var map = new google.maps.Map(document.getElementById('map-canvas'), {
        center: latlng,
        zoom: 6
       });

       var infowindow = new google.maps.InfoWindow(), marker, i;
       var geocoder = new google.maps.Geocoder(); 
        var bounds = new google.maps.LatLngBounds();

       /* for (i = 0; i < markers.length; i++) { 
            var pos = new google.maps.LatLng(markers[i][1], markers[i][2]);
            bounds.extend(pos);
            marker = new google.maps.Marker({
                position: pos,
                map: map
            });
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(markers[i][0]);
                    infowindow.open(map, marker);
                }
            
        })(marker, i));
        map.fitBounds(bounds);
      
    }*/

    function geocodeAddress(address, next) {
        geocoder.geocode({address:address}, function (results,status)
          { 
             if (status == google.maps.GeocoderStatus.OK) {
              var p = results[0].geometry.location;
              var lat=p.lat();
              var lng=p.lng();
              createMarker(address,lat,lng);
            }
            else {
               if (status == google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
                nextAddress--;
                delay++;
              } else {
                            }   
            }
            next();
          }
        );
      }

      function createMarker(add,lat,lng) {
       var contentString = add;
       var marker = new google.maps.Marker({
         position: new google.maps.LatLng(lat,lng),
         map: map,
               });

      google.maps.event.addListener(marker, 'click', function() {
         infowindow.setContent(contentString); 
         infowindow.open(map,marker);
       });

       bounds.extend(marker.position);

     }

      var locations = [
               'New Delhi, India',
               'Mumbai, India',
               'Bangaluru, Karnataka, India',
               'Hyderabad, Ahemdabad, India',
               'Gurgaon, Haryana, India',
               'Cannaught Place, New Delhi, India',
               'Bandra, Mumbai, India',
               'Nainital, Uttranchal, India',
               'Guwahati, India',
               'West Bengal, India',
               'Jammu, India',
               'Kanyakumari, India',
               'Kerala, India',
               'Himachal Pradesh, India',
               'Shillong, India',
               'Chandigarh, India',
               'Dwarka, New Delhi, India',
               'Pune, India',
               'Indore, India',
               'Orissa, India',
               'Shimla, India',
               'Gujarat, India'
      ];
      var nextAddress = 0;
      function theNext() {
        if (nextAddress < locations.length) {
          setTimeout('geocodeAddress("'+locations[nextAddress]+'",theNext)', delay);
          nextAddress++;
        } else {
          map.fitBounds(bounds);
        }
      }

    theNext();

    </script>



