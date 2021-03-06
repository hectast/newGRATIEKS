<?php 

/* at the top of page */
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
    header('HTTP/1.0 403 Forbidden', TRUE, 403);

    /* choose the appropriate page to redirect users */
    die(header('location: lokasi.php'));
}

function tampil_data($mysqli)
{	

    $no = 1;
    $query = "SELECT * FROM lokasi";
    $result = $mysqli->query($query);
    while($row = mysqli_fetch_assoc($result)){
    	$id_lokasi1 = $row['id'];
        $nama_lokasi1 = $row['nama_lokasi'];
    ?>
    <tr>
    <td><?= $no++; ?></td>
    <td><?= $row['nama_lokasi']; ?></td>
    <td><a href="<?= $row['latlong']; ?>" class="btn btn-default" target="_blank"><i class="fas fa-link"></i></a></td>
    <td>
    	<form action="" method="post">
    	<input type="hidden" name="id_lokasi" value="<?= $id_lokasi1 ?>">
    	<button type="button" class="btn btn-xs btn-info" data-toggle="modal" data-target="#defaultModal<?= $id_lokasi1; ?>"><i class="fa fa-edit"></i></button> <button type="submit" name="hapus_data" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
    	</form>
    </td>
   	</tr>

   	<div class="modal fade" id="defaultModal<?= $id_lokasi1?>" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="defaultModalLabel">Form Ubah Share Lokasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_lokasi" value="<?= $id_lokasi1; ?>">
                            <div class="form-group">
                                <label>Nama Lokasi (Desa/Kec/Kab) - </label>
                                <select class="form-control select2" id="<?= $no; ?>" name="nama_lokasi">
                                    <option>--Pilih Nama Lokasi--</option>
                                    <?php
                                    $query2 = $mysqli->query("SELECT * FROM tbl_gratieks");
                                    while($row2 = $query2->fetch_assoc()) {
                                        if ($row2['kec'] == $nama_lokasi1) {                                            
                                            echo "
                                                <option value='{$row2['kec']}' selected>{$row2['kec']}</option>
                                            ";
                                        } else {
                                            echo "
                                                <option value='{$row2['kec']}'>{$row2['kec']}</option>
                                            ";
                                        }
                                    }
                                    ?>
                                </select>


                            </div>
                            <div class="form-group">
                                <label for="link_lokasi" class="col-form-label">Share Lokasis</label>
                                <input type="text" id="link_lokasi" name="link_lokasi" class="form-control" value="<?= $row['latlong']
                                ; ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="ubah_data" class="btn mb-2 btn-primary">Simpan Perubahan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <script src="../../../assets/plugins/jquery/jquery.min.js"></script>
        <script src="../../../assets/plugins/select2/js/select2.full.min.js"></script>
        <script>
              $('select2.#<?= $no; ?>').select2({
                theme: 'bootstrap4',
              });
        </script>
<?php
     }
}

function simpan_data($nama_lokasi, $link_lokasi, $mysqli)
{
    $save = $mysqli->prepare("INSERT INTO lokasi (nama_lokasi,latlong) VALUES ('$nama_lokasi','$link_lokasi')");
    $save->execute();
}


function hapus_data($id_lokasi, $mysqli)
{
    $delete = $mysqli->prepare("DELETE FROM lokasi WHERE id='$id_lokasi'");
    $delete->execute();
}

function ubah_data($id_lokasi, $lokasi, $nama_lokasi, $mysqli)
{
    $update = $mysqli->prepare("UPDATE lokasi SET nama_lokasi='$lokasi', latlong='$nama_lokasi' WHERE id='$id_lokasi'");
    $update->execute();
}

 ?>