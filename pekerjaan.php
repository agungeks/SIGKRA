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
    <!-- untuk meload peta -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEIAOa6sUw5v4RyfchsJK2IXcJ1mwUcEs&callback=initMap" 
    type="text/javascript">
    </script>
    <!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=drawing&geometry"></script> -->
    <script src="http://localhost/fixmagang/apppekerjaan.js"></script>
    </head>
    <?php include 'menu2.php'; ?>