var idkec =[];
var nama_kecamatan = [];
var foto = [];
var warna = [];
var lokasi = [];
var cords = '';
var area = [];
var infoWindow;

var idpekerjaan =[];
var belumbekerja = [];
var irt = [];
var pelajarmhs = [];
var pensiun = [];
var pns = [];
var tni = [];
var polisi = [];
var perdagangan = [];
var petani = [];
var peternak = [];
var insdustri = [];
var konstruksi = [];
var transportasi = [];
var karyawanswasta = [];
var bumnbumd = [];
var bhl = [];
var perkebunan = [];
var dosen = [];
var guru = [];
var dokter = [];
var pedagang = [];
var perangkatdesa = [];
var wiraswasta = [];
var satuan = [];
var tahun = [];


function peta_awal(){
    var karanganyar = new google.maps.LatLng(-7.608880457556658, 111.07536147837756);
    
    var petaoption = {
        zoom: 12,
        center: karanganyar,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    peta = new google.maps.Map(document.getElementById("map-canvas"),petaoption);

    url = "ambildatapekerjaan.php";
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
                foto[i] = msg.karanganyar.lahan[i].foto;
                idpekerjaan[i] = msg.karanganyar.lahan[i].idpekerjaan;
                belumbekerja[i] = msg.karanganyar.lahan[i].belumbekerja;
                irt[i] = msg.karanganyar.lahan[i].irt;
                pelajarmhs[i] = msg.karanganyar.lahan[i].pelajarmhs;
                pensiun[i] = msg.karanganyar.lahan[i].pensiun;
                pns[i] = msg.karanganyar.lahan[i].pns;
                tni[i] = msg.karanganyar.lahan[i].tni;
                polisi[i] = msg.karanganyar.lahan[i].polisi;
                perdagangan[i] = msg.karanganyar.lahan[i].perdagangan;
                petani[i] = msg.karanganyar.lahan[i].petani;
                peternak[i] = msg.karanganyar.lahan[i].peternak;
                insdustri[i] = msg.karanganyar.lahan[i].insdustri;
                konstruksi[i] = msg.karanganyar.lahan[i].konstruksi;
                transportasi[i] = msg.karanganyar.lahan[i].transportasi;
                karyawanswasta[i] = msg.karanganyar.lahan[i].karyawanswasta;
                bumnbumd[i] = msg.karanganyar.lahan[i].bumnbumd;
                bhl[i] = msg.karanganyar.lahan[i].bhl;
                perkebunan[i] = msg.karanganyar.lahan[i].perkebunan;
                dosen[i] = msg.karanganyar.lahan[i].dosen;
                guru[i] = msg.karanganyar.lahan[i].guru;
                dokter[i] = msg.karanganyar.lahan[i].dokter;
                pedagang[i] = msg.karanganyar.lahan[i].pedagang;
                perangkatdesa[i] = msg.karanganyar.lahan[i].perangkatdesa;
                wiraswasta[i] = msg.karanganyar.lahan[i].wiraswasta;
                tahun[i] = msg.karanganyar.lahan[i].tahun;
                satuan[i] = msg.karanganyar.lahan[i].satuan;
                

                lokasi[i] = msg.karanganyar.lahan[i].polygon;
               


                var str = lokasi[i].split(" "); 
                
                for (var j=0; j < str.length; j++) { 
                    var point = str[j].split(",");
                    cords.push(new google.maps.LatLng(parseFloat(point[0]), parseFloat(point[1])));
                }

               var contentString = '<b>'+nama_kecamatan[i]+'</b><br>' +
                                    

                                    '<table>'+
                                    '<thead>'+
                                      '<tr>'+
                                       '<th>'+'Pekerjaan'+'</th>'+
                                       '<th>'+'Banyak'+'</th>'+
                                      '</tr>'+
                                     '</thead>'+
                                      '<tbody >'+
                                        '<tr>'+
                                            '<td>'+'Belum Bekerja'+'</td>'+
                                            '<td>'+belumbekerja[i]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+'IRT'+'</td>'+
                                            '<td>'+irt[i]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+'Pelajar/Mahasiswa'+'</td>'+
                                            '<td>'+pelajarmhs[i]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+'Pensiunan'+'</td>'+
                                            '<td>'+pensiun[i]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+'PNS'+'</td>'+
                                            '<td>'+pns[i]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+'TNI'+'</td>'+
                                            '<td>'+tni[i]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+'Kepolisian'+'</td>'+
                                            '<td>'+polisi[i]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+'Perdagangan'+'</td>'+
                                            '<td>'+perdagangan[i]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+'Petani'+'</td>'+
                                            '<td>'+petani[i]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+'Peternak'+'</td>'+
                                            '<td>'+peternak[i]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+'Industri'+'</td>'+
                                            '<td>'+insdustri[i]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+'Konstruksi'+'</td>'+
                                            '<td>'+konstruksi[i]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+'Transportasi'+'</td>'+
                                            '<td>'+transportasi[i]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+'Karyawan Swasta'+'</td>'+
                                            '<td>'+karyawanswasta[i]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+'BUMN / BUMD'+'</td>'+
                                            '<td>'+bumnbumd[i]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+'Buruh Harian'+'</td>'+
                                            '<td>'+bhl[i]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+'Perkebunan'+'</td>'+
                                            '<td>'+perkebunan[i]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+'Dosen'+'</td>'+
                                            '<td>'+dosen[i]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+'Guru'+'</td>'+
                                            '<td>'+guru[i]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+'Dokter'+'</td>'+
                                            '<td>'+dokter[i]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+'Pedagang'+'</td>'+
                                            '<td>'+pedagang[i]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+'Perangkat Desa'+'</td>'+
                                            '<td>'+perangkatdesa[i]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+'Wiraswasta'+'</td>'+
                                            '<td>'+wiraswasta[i]+'</td>'+
                                        '</tr>'+
                                        '<tbody>'+
                                    '</table>'+'<br>'+
                                    '<b>Satuan :</b>'+ satuan[i] +'<br>'+
                                    '<b>Tahun :</b>'+ tahun[i]+
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
                    height:50,
                    weight:50
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