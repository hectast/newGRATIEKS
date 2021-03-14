<?php 

function tampil_data($mysqli)
{	

    $no = 1;
    $query = "SELECT * FROM lokasi";
    $result = $mysqli->query($query);
    while($row = mysqli_fetch_assoc($result)){
    	$id_lokasi1 = $row['id'];
    ?>
    <tr>
    <td><?= $no++; ?></td>
    <td><?= $row['nama_lokasi']; ?> <?= $id_lokasi1 ?></td>
    <td><a href="<?= $row['latlong']; ?>"><?= $row['latlong']; ?></a></td>
    <td>
    	<form action="" method="post">
    	<input type="hidden" name="id_lokasi" value="<?= $id_lokasi1 ?>">
    	<button type="button" class="btn btn-xs btn-info" data-toggle="modal" data-target="#defaultModal<?= $id_lokasi1; ?>"><i class="fa fa-edit"></i></button><button type="submit" name="hapus_data" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
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
                                <label for="pilih-lokasi">Nama Lokasi (Desa/Kec/Kab)</label>
                                <select class="form-control select2 <?= $id_lokasi1; ?>" id="pilih-lokasi" name="nama_lokasi">
                                    <option>--Pilih Lokasi--</option>
                                    <?php
                                    $query2 = "SELECT * FROM tbl_gratieks";
                                    $to_lokasi2 = $mysqli->prepare($query2);
                                    $to_lokasi2->execute();
                                    $result_lokasi2 = $to_lokasi2->get_result();
                                    while ($row_lokasi2 = $result_lokasi2->fetch_object()) {
                                        if ($row_lokasi2->kec == $row['nama_lokasi']) {
                                            echo "";
                                    ?>
                                            <option value="<?= $row_lokasi2->kec; ?>" selected><?= $row_lokasi2->kec; ?></option>
                                        <?php
                                            echo "";
                                        } else {
                                            echo "";
                                        ?>
                                            <option value="<?= $row_lokasi2->kec; ?>"><?= $row_lokasi2->kec; ?></option>
                                    <?php
                                            echo "";
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

		<script src="../../../assets/plugins/select2/js/select2.full.min.js"></script>
        <script>
              $('.select2.<?= $id_lokasi1; ?>').select2({
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