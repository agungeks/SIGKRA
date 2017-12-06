var idkec =[];
var nama_kecamatan = [];
var warna = [];
var foto = [];
var lokasi = [];
var cords = '';
var area = [];
var infoWindow;
var email = [];
var alamat = [];
var desa = [];
var penduduk = [];
var geografis = [];
var industri = [];
var pertanian = [];
var pertambangan = [];
var pariwisata = [];
var pasar = [];


function peta_awal(){
    var karanganyar = new google.maps.LatLng(-7.608880457556658, 111.07536147837756);
    
    var petaoption = {
        zoom: 12,
        center: karanganyar,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    peta = new google.maps.Map(document.getElementById("map-canvas"),petaoption);

    url = "ambildata.php";
    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        success: function(msg){
            var polygon;
            var cords = [];
            for(i=0;i<msg.karanganyar.lahan.length;i++){
                idkec[i] = msg.karanganyar.lahan[i].idkec;
                nama_kecamatan[i] = msg.karanganyar.lahan[i].nama_kecamatan;
                warna[i] = msg.karanganyar.lahan[i].warna;
                email[i] = msg.karanganyar.lahan[i].email;
                alamat[i] = msg.karanganyar.lahan[i].alamat;
                desa[i] = msg.karanganyar.lahan[i].desa;
                penduduk[i] = msg.karanganyar.lahan[i].penduduk;
                geografis[i] = msg.karanganyar.lahan[i].geografis;
                industri[i] = msg.karanganyar.lahan[i].industri;
                pertanian[i] = msg.karanganyar.lahan[i].pertanian;
                pertambangan[i] = msg.karanganyar.lahan[i].pertambangan;
                pariwisata[i] = msg.karanganyar.lahan[i].pariwisata;
                pasar[i] = msg.karanganyar.lahan[i].pasar;
                foto[i] = msg.karanganyar.lahan[i].foto;
                lokasi[i] = msg.karanganyar.lahan[i].polygon;
               


                var str = lokasi[i].split(" "); 
                
                for (var j=0; j < str.length; j++) { 
                    var point = str[j].split(",");
                    cords.push(new google.maps.LatLng(parseFloat(point[0]), parseFloat(point[1])));
                }

               var contentString = '<b>'+nama_kecamatan[i]+'</b><br>' +
                                    'Warna: '+ warna[i] +'<br>'+
                                    'Email: '+ email[i] +'<br>'+
                                    'Alamat: '+ alamat[i] +'<br>'+
                                    'Desa: '+ desa[i] +'<br>'+
                                    'Penduduk: '+ penduduk[i] +'<br>'+
                                    'Geografis: '+ geografis[i] +'<br>'+
                                    'Industri: '+ industri[i] +'<br>'+
                                    'Pertanian: '+ pertanian[i] +'<br>'+
                                    'Pertambangan: '+ pertambangan[i] +'<br>'+
                                    'Periwisata: '+ pariwisata[i] +'<br>'+
                                    'Pesar: '+ pasar[i] +'<br>'+
                                    'Foto: '+ foto[i] +
                                    '<br>' ;

                polygon = new google.maps.Polygon({
                    paths: [cords],
                    strokeColor: msg.karanganyar.lahan[i].warna,
                    strokeOpacity: 0,
                    strokeWeight: 1,
                    fillColor: msg.karanganyar.lahan[i].warna,
                    fillOpacity: 0.5,
                    html: contentString
                });     

                cords = []; 
                polygon.setMap(peta); 
                infoWindow = new google.maps.InfoWindow({
                    maxWidth: 200
                });
                google.maps.event.addListener(polygon, 'click', function(event) {
                    infoWindow.setContent(this.html);
                    infoWindow.setPosition(event.latLng);
                    infoWindow.open(peta);
                });
            }               
        }
    });
}