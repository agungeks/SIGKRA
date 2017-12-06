<?php include 'session.php'; ?>
<?php
require_once 'dbconfig.php';

if(isset($_GET['delete_id']))
    {
        // select image from db to delete
        $stmt_select = $DB_con->prepare('SELECT foto FROM kesehatan WHERE idkesehatan =:uid');
        $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
        $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
        unlink("images/kesehatan/".$imgRow['foto']);
        
        // it will delete an actual record from db
        $stmt_delete = $DB_con->prepare('DELETE FROM kesehatan WHERE idkesehatan =:uid');
        $stmt_delete->bindParam(':uid',$_GET['delete_id']);
        $stmt_delete->execute();
        
        header("Location: kesehatan.php");
    }

?>
            <!-- //////////////////////////////////////////////////////////////////////////// -->
<?php include 'atas.php'; ?>
            <!-- START CONTENT -->
            <section id="content">

                <!--start container-->
                <div class="container">
    </br>
    <center><a class="btn-floating btn-large waves-effect waves-light " href="forminputkesehatan.php"><i class="mdi-content-add"></i></a></center>
    <div id="table-datatables">

      <table id="data-table-simple" class="responsive-table display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Type</th>
                <th>Info</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Sumber</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
                
        <tbody>

        <?php
            $stmt = $DB_con->prepare('SELECT idkesehatan, namakesehatan, alamat,type, info,sumber, lng, lat, foto FROM kesehatan ORDER BY idkesehatan DESC');
            $stmt->execute();
    
            if($stmt->rowCount() > 0)
            {
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                ?>
            <tr>
                <td><?php echo $namakesehatan;?></td>
                <td><?php echo $alamat;?></td>
                <td><?php echo $type;?></td>
                <td><?php echo $info;?></td>
                <td><?php echo $lng;?></td>
                <td><?php echo $lat;?></td>
                <td><?php echo $sumber;?></td>
                <td>
                    <img src="images/kesehatan/<?php echo $row['foto']; ?>" width="90px" height="90px" />
                </td>

                <td>
                    <a class="btn-floating waves-effect waves-light " href="editkesehatan.php?edit_id=<?php echo $row['idkesehatan']; ?>">
                    <i class="mdi-content-content-cut"></i></a>

                    <a class="btn-floating btn-flat waves-effect waves-light pink accent-2 white-text" href="?delete_id=<?php echo $row['idkesehatan']; ?>  title="click for delete" onclick="return confirm('Yakin Menghapus Data Ini ?')"">
                    <i class="mdi-content-clear"></i></a>
                </td>
            </tr>
            <?php
            }
            }
    else
    {
        ?>
        <div class="col-xs-12">
            <div class="alert alert-warning">
                <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
            </div>
        </div>
        <?php
    }
        ?>
        </tbody>
    </table>
    </div>

                </div>
                <!--end container-->
            </section>
            <!-- END CONTENT -->

            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <!-- LEFT RIGHT SIDEBAR NAV-->
<?php include 'bawah.php'; ?>