<?php include 'session.php'; ?>
<?php
require_once 'dbconfig.php';

if(isset($_GET['delete_id']))
    {
        // select image from db to delete
        $stmt_select = $DB_con->prepare('SELECT foto FROM keckra WHERE idkec =:uid');
        $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
        $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
        unlink("images/profil/".$imgRow['foto']);
        
        // it will delete an actual record from db
        $stmt_delete = $DB_con->prepare('DELETE FROM keckra WHERE idkec =:uid');
        $stmt_delete->bindParam(':uid',$_GET['delete_id']);
        $stmt_delete->execute();
        
        header("Location: kecamatan.php");
    }

?>
<?php include 'atas.php'; ?>
            <!-- //////////////////////////////////////////////////////////////////////////// -->

            <!-- START CONTENT -->
            <section id="content">

                <!--start container-->
                <div class="container">
                  
    </br>
    <!-- <center><a class="btn-floating btn-large waves-effect waves-light " href="forminputkecamatan.php"><i class="mdi-content-add"></i></a></center> -->
    <div id="table-datatables">

      <table id="data-table-simple" class="responsive-table display" cellspacing="0" width="100%">

        <thead>

            <tr>
                <th>Nama Kec.</th>
                <th>Warna</th>
                <th>Polygon</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
                
        <tbody>

        <?php
            $stmt = $DB_con->prepare('SELECT idkec,nama_kecamatan,warna,polygon,foto FROM keckra ORDER BY idkec DESC');
            $stmt->execute();
    
            if($stmt->rowCount() > 0)
            {
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                ?>
            <tr>

            	<td><?php echo $nama_kecamatan;?></td>
                <td><?php echo $warna;?></td>
                <td><?php echo $polygon;?></td>
                
                <td>
                    <img src="images/<?php echo $row['foto']; ?>" width="90px" height="90px" />
                </td>
                               
                <td>
                    <a class="btn-floating waves-effect waves-light " href="editkec.php?edit_id=<?php echo $row['idkec']; ?>">
                    <i class="mdi-content-content-cut"></i></a>

                    <a class="btn-floating btn-flat waves-effect waves-light pink accent-2 white-text" href="?delete_id=<?php echo $row['idkec']; ?>  title="click for delete" onclick="return confirm('Yakin Menghapus Data Ini ?')"">
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
