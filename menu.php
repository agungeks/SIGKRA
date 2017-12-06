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
  <!-- <nav class="fixed-action-btn nav-wrapper" style="width: 70%;top: 3%;left: 5%;background: #B6620E;height: 56px;">
    <div class="nav-wrapper">
        <img class="brand-logo" style="width: 50%;height: 56px;" src="http://localhost/fixmagang/images/iconkra/mapskra.png">
    </div>
  </nav>
 -->

  <nav class="fixed-action-btn nav-wrapper " style="width: 70%;top: 3%;left: 5%;background: #B6620E;height: 56px;">
    <div class="nav-wrapper">
        <img class="brand-logo" style="width: 50%;height: 56px;" src="http://localhost/fixmagang/images/iconkra/mapskra.png">
    </div>
  </nav>
  
  <div class="fixed-action-btn vertical click-to-toggle " style="top:2%;right: 5%;">
    <a class="waves-effect waves-light btn-large tooltipped" data-position="left" data-delay="50" data-tooltip="MENU">
      <i class="material-icons">menu</i> 
    </a>
    
    <ul class="collapsible" data-collapsible="accordion" style="width:340%; overflow: auto;top: 70px;background: white;text-align: left; margin-left:-180px;">
      <li>
        <div class="collapsible-header tooltipped data-position="right" data-delay="50" data-tooltip="Sekumpulandata yang berasal dari pemerintah kabupaten karanganyar"">
          <i class="material-icons">whatshot</i>Data Umum</div>
        <div class="collapsible-body" >
          <div class="collection">
            <a href="index.php" class="collection-item"><i class="material-icons">face</i>Profil</a>
            <a href="pekerjaan.php" class="collection-item "><i class="material-icons">explore</i>Pekerjaan</a>
            <a href="pendidikan.php" class="collection-item "><i class="material-icons">account_balance</i>Pendidikan</a>
        </div>
        </div>
      </li>
      <li>
          <div class="collapsible-header"><i class="material-icons">invert_colors</i>Kesehatan</div>
          <div class="collapsible-body">
            <div class="collection">
              <a href="apotik.php" class="collection-item"><i class="material-icons">local_pharmacy</i>Apotik</a>
              <a href="rumahsakit.php" class="collection-item "><i class="material-icons">local_hospital</i>Rumah Sakit</a>
              <a href="klinik.php" class="collection-item "><i class="material-icons">local_hotel</i>Klinik</a>
            </div>
          </div>
        </li>
      <li>
          <div class="collapsible-header"><i class="material-icons">school</i>Pendidikan</div>
          <div class="collapsible-body">
            <div class="collection">
              <a href="sd.php" class="collection-item"><i class="material-icons">filter_1</i>SD</a>
              <a href="smp.php" class="collection-item "><i class="material-icons">filter_2</i>SMP</a>
              <a href="sma.php" class="collection-item "><i class="material-icons">filter_3</i>SMA</a>
            </div>
          </div>
    </li>
      <li>
          <div class="collapsible-header"><i class="material-icons">payment</i>Ekonomi</div>
          <div class="collapsible-body">
            <div class="collection">
              <a href="pasar.php" class="collection-item"><i class="material-icons">local_grocery_store</i>Pasar</a>
              <a href="koperasi.php" class="collection-item "><i class="material-icons">local_mall</i>Koperasi</a>
            </div>
          </div>
        </li>
      <li>
          <div class="collapsible-header"><i class="material-icons">public</i>Insfraktruktur</div>
          <div class="collapsible-body">
            <div class="collection">
              <a href="terminal.php" class="collection-item"><i class="material-icons">directions_bus</i>Terminal</a>
              <a href="pariwisata.php" class="collection-item "><i class="material-icons">terrain</i>Pariwisata</a>
              <a href="spbu.php" class="collection-item "><i class="material-icons">local_gas_station</i>  SPBU</a>
            </div>
          </div>
    </li>
    <li>
          <div class="collapsible-header"><i class="material-icons">filter_vintage</i>Pertanian</div>
          <div class="collapsible-body">
            <div class="collection">
              <a href="tokopupuk.php" class="collection-item"><i class="material-icons">nature</i>Toko Pupuk</a>
            </div>
          </div>
    </li>
    <li>
          <div class="collapsible-header"><i class="material-icons">domain</i>Keamanan</div>
          <div class="collapsible-body">
            <div class="collection">
              <a href="polisi.php" class="collection-item"><i class="material-icons">local_taxi</i>Pos Polisi</a>
              <a href="tni.php" class="collection-item"><i class="material-icons">security</i>Pos TNI</a>
            </div>
          </div>
    </li>
    <li>
          <div class="collapsible-header"><i class="material-icons">local_mall</i>Keuangan</div>
          <div class="collapsible-body">
            <div class="collection">
              <a href="bank.php" class="collection-item"><i class="material-icons">local_drink</i>Bank</a>
              <a href="bank.php" class="collection-item"><i class="material-icons">local_atm</i>ATM</a>
            </div>
          </div>
    </li>
    <li>
          <div class="collapsible-header"><i class="material-icons">ac_unit</i>Keagamaan</div>
          <div class="collapsible-body">
            <div class="collection">
              <a href="masjid.php" class="collection-item"><i class="material-icons">brightness_5</i>Masjid</a>
              <a href="gereja.php" class="collection-item"><i class="material-icons">control_point</i>Gereja</a>
            </div>
          </div>
    </li>
    </ul>
  </div>
  </div>
</body>
</html>