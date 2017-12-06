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
    </head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEIAOa6sUw5v4RyfchsJK2IXcJ1mwUcEs&callback=initMap" type="text/javascript">
      </script>
    
      <script type="text/javascript">
      //<![CDATA[

      var customIcons = {
      'supermarket': {
         icon: 'http://localhost/fixmagang/images/iconkra/supermarket.png'
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
      downloadUrl("phpsqlajax_genxmlekonomi.php", function(data) {
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
<!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=drawing&geometry"></script> -->
<!-- <script src="http://localhost/fixmagang/app.js"></script>
-->


    <body onload="peta_awal()">
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="materialize/js/materialize.min.js"></script>

<div style="width: 100%; height:100% ;">
    <?php require('connect.php'); ?>
    <div id="map" style="width:100%; height:665px;"></div>
    <!-- <div id="map-canvas" style="width:100%; height:665px;">
    </div>      
  
  -->
  <nav class="fixed-action-btn " style="width: 70%;top: 3%;left: 5%;">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Logo</a>
    </div>
  </nav>

  <div class="fixed-action-btn vertical click-to-toggle " style="top:2%;right: 5%;">
    <a class="waves-effect waves-light btn-large">
      <i class="material-icons">menu</i> 
    </a>
    <ul class="collapsible" data-collapsible="accordion" style="width:340%; overflow: auto;top: 70px;background: white;text-align: left; margin-left:-180px;">
      <li>
        <div class="collapsible-header"><i class="material-icons">whatshot</i>Data Umum</div>
        <div class="collapsible-body" >
          <div class="collection">
            <a href="#!" class="collection-item">Demografi</a>
            <a href="#!" class="collection-item ">Pekerjaan</a>
        </div>
        </div>
      </li>
      <li>
        <div class="collapsible-header"><i class="material-icons">filter_drama</i>Sosial Budaya</div>
        <div class="collapsible-body">
          <div class="collection">
            <a href="#!" class="collection-item">Penduduk</a>
            <a href="#!" class="collection-item ">XXX</a>
          </div>
        </div>
      </li>
      <li>
          <div class="collapsible-header"><i class="material-icons">filter_drama</i>Kesehatan</div>
          <div class="collapsible-body">
            <div class="collection">
              <a href="#!" class="collection-item">Apotik</a>
              <a href="#!" class="collection-item ">Rumah Sakit</a>
            </div>
          </div>
        </li>
      <li>
          <div class="collapsible-header"><i class="material-icons">filter_drama</i>Pendidikan</div>
          <div class="collapsible-body">
            <div class="collection">
              <a href="#!" class="collection-item">Sekolah Negeri</a>
              <a href="#!" class="collection-item ">Sekolah Swasta</a>
            </div>
          </div>
    </li>
      <li>
          <div class="collapsible-header"><i class="material-icons">filter_drama</i>Ekonomi</div>
          <div class="collapsible-body">
            <div class="collection">
              <a href="#!" class="collection-item">Pasar</a>
              <a href="#!" class="collection-item ">Supermarket</a>
              <a href="#!" class="collection-item ">Koperasi</a>
            </div>
          </div>
        </li>
      <li>
          <div class="collapsible-header"><i class="material-icons">filter_drama</i>Insfraktruktur</div>
          <div class="collapsible-body">
            <div class="collection">
              <a href="#!" class="collection-item">Terminal</a>
              <a href="#!" class="collection-item ">Pariwisata</a>
              <a href="#!" class="collection-item ">BTS</a>
              <a href="#!" class="collection-item ">SPBU</a>
            </div>
          </div>
    </li>
    <li>
          <div class="collapsible-header"><i class="material-icons">filter_drama</i>Pertanian</div>
          <div class="collapsible-body">
            <div class="collection">
              <a href="#!" class="collection-item">Toko Pupuk</a>
            </div>
          </div>
    </li>
    <li>
          <div class="collapsible-header"><i class="material-icons">filter_drama</i>Politik</div>
          <div class="collapsible-body">
            <div class="collection">
              <a href="#!" class="collection-item">Pos Polisi</a>
            </div>
          </div>
    </li>
    <li>
          <div class="collapsible-header"><i class="material-icons">filter_drama</i>Keagamaan</div>
          <div class="collapsible-body">
            <div class="collection">
              <a href="#!" class="collection-item">Masjid</a>
              <a href="#!" class="collection-item">Gereja</a>
            </div>
          </div>
    </li>
    </ul>
  </div>
  </div>
</body>
</html>