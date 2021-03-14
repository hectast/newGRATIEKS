<?php
    $jdl = "Data Gratieks";
    $ttl = $jdl . " | GRATIEKS";
?>
<?php include "../../../koneksi.php" ?>

<?php include "../../layout/header.php" ?>

<?php include "../../layout/navbar.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content">
        <div class="container">
        <div class="row mt-2">
         <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h4><?= $ttl; ?></h4>
                <a href="tambahdatagratieks.php" class="btn btn-primary"><i class="fa fa-plus"></i> Data Gratieks </a><br><br>
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Komoditas</th>
                            <th>Sub Sektor</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = "SELECT * FROM tbl_gratieks";
                        $result = $mysqli->query($query);
                        while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['komodi'] ?></td>
                            <td><?= $row['subsektor'] ?></td>
                            <td><a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-xs btn-success"><i class="fa fa-search"></i></a> <a href="" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a> <a href="hapusdata.php?id=<?= $row['id'] ?>" onclick="return confirm('Anda Yakin?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                    
                </div>
            </div>
         </div>
        </div>

           
        </div>
    </div>
</div>
<!-- /.content-wrapper -->

<?php include '../../layout/footer.php'; ?>

<?php include '../..//layout/js.php'; ?>