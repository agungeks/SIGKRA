<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
      <!--  css loader men -->
    <link href="admin/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
        <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEIAOa6sUw5v4RyfchsJK2IXcJ1mwUcEs&callback=initMap" type="text/javascript">
      </script>
    
      <script type="text/javascript">
      //<![CDATA[

      var customIcons = {
      'smk': {
         icon: 'http://localhost/fixmagang/images/iconkra/smk.png'
      }
      };

      function peta_awal() {
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(-7.608880457556658, 110.97536147837756),
        zoom: 11,
        mapTypeId: 'roadmap'
      });

      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
      downloadUrl("generatesmp.php", function(data) {
      var xml = data.responseXML;
      var markers = xml.documentElement.getElementsByTagName("marker");
      for (var i = 0; i < markers.length; i++) {
        var name = markers[i].getAttribute("nama");
        //var address = markers[i].getAttribute("address");
        //var type = markers[i].getAttribute("type");
        var point = new google.maps.LatLng(
            parseFloat(markers[i].getAttribute("lat")),
            parseFloat(markers[i].getAttribute("lng")));
        var alamat = markers[i].getAttribute("alamat");
        var info = markers[i].getAttribute("info");
        var foto = markers[i].getAttribute("foto");
        var sumber = markers[i].getAttribute("sumber");
        var type = markers[i].getAttribute("type");

        //var html = "<b>" + name + "</b> <br/>" + address;
        var html = "<b>" + name + "</b> <br/>" + point + "<br/>" + alamat + "</br>" + type + "</br>"+ info + "</br>"+ foto + "</br>"+ sumber + "</br>";
        var icon = customIcons[type] || {};
        var marker = new google.maps.Marker({
          map: map,
          position: point,
          icon: icon.icon
        });
        bindInfoWindow(marker, map, infoWindow, html);
      }
      });
      }

      function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
      infoWindow.setContent(html);
      infoWindow.open(map, marker);
      });
      }

      function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

      request.onreadystatechange = function() {
      if (request.readyState == 4) {
        request.onreadystatechange = doNothing;
        callback(request, request.status);
      }
      };

      request.open('GET', url, true);
      request.send(null);
      }

      function doNothing() {}

      //]]>

      </script>

<script type="text/javascript">
      $(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  });
</script>
<script type="text/javascript">
      $(document).ready(function(){
  $(".button-collapse").sideNav();
  });
</script>
    </head>

    <?php include 'menu.php'; ?>