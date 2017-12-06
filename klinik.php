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
      'klinik': {
         icon: 'http://localhost/fixmagang/images/iconkra/klinik.png'
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
      downloadUrl("generateklinik.php", function(data) {
      var xml = data.responseXML;
      var markers = xml.documentElement.getElementsByTagName("marker");
      for (var i = 0; i < markers.length; i++) {
        var name = markers[i].getAttribute("nama");
        var point = new google.maps.LatLng(
            parseFloat(markers[i].getAttribute("lat")),
            parseFloat(markers[i].getAttribute("lng")));
        var alamat = markers[i].getAttribute("alamat");
        var info = markers[i].getAttribute("info");
        var sumber = markers[i].getAttribute("sumber");
        var type = markers[i].getAttribute("type");

       var foto = 
        '<img src="./admin/images/kesehatan/'+markers[i].getAttribute("foto")+'" alt="FOTO" width="100px" height="100px" />';
        
        var html = "<b><u>" + name + "</u></b> <br/>" ;
        var html1 = "<b>Telp :</b> " + info +"</b> <br/>" ;
        var html2 = "<b>Type :</b> " + type +"</b> <br/>";
        var html3 = "<b>Alamat :</b> " + alamat;
        var html4 = "</br> <b> Foto Tempat : </b>" + "<br/>";
        var html5 = "</br> <b>Sumber :</b> " + sumber +"</b> <br/>" ;
 
        var icon = customIcons[type] || {};
        var marker = new google.maps.Marker({
          map: map,
          position: point,
          icon: icon.icon
        });
        bindInfoWindow(marker, map, infoWindow, html ,html1 ,html2 ,html3 ,html4,html5,foto);
      }
      });
      }

      function bindInfoWindow(marker, map, infoWindow,html,html1,html2,html3,html4,html5,foto) {
        google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html+html1+html2+html3+html4+foto+html5);
        infoWindow.open(map, marker,foto);
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