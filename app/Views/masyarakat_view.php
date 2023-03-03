<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
Masyarakat
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-info">
                <div class="card-header bg-info">
                    <h3 class="fw-bold text-light">MASYARAKAT</h3>
                </div>
                <div class="card-body">
                    <table class="table table-border" id="masyarakat">
                        <tr>
                            <th>No</th>
                            <th>Nik</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>No Telepon</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $no = 0;
                        foreach ($masyarakat as $row) {
                            $data = $row['id_masyarakat'] . "," . $row['nik'] . "," . $row['nama'] . "," . $row['username'] . "," . $row['password'] . "," . $row['telp'] . "," . base_url('masyarakat/edit/' . $row['id_masyarakat']);
                            # code...
                            $no++;
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['nik'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['telp'] ?></td>
                                <td>
                                    <!-- <a href="" data-masyarakat="<?= $data ?>" data-target="#fMasyarakat" data-toggle="modal" class="btn btn-info"><i class="fas fa-edit"></i></a> -->
                                    <a href="<?= base_url('masyarakat/delete/' . $row['id_masyarakat']) ?>" onclick="return confirm('yakin mau hapus?')" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>

                <?php if (!empty(session()->getFlashdata("message"))) : ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata("message") ?>
                    </div>
                <?php endif ?>


                <div class="modal fade" id="fMasyarakat" tabindex="-1" aria-labelledby="modalMasyarakatLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-info text-light">
                                <h5 class="modal-title" id="exampleModalLabel">Form Masyarakat</h5>
                                <button type="button" class="close" data-dismis="modal" aria-label="Close"></button>
                            </div>
                            <form action="" id="editMasyarakat" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" name="nik" id="nik" value="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" id="nama" value="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" value="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" value="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="telp">No. Telp</label>
                                        <input type="number" name="telp" id="telp" value="" class="form-control">
                                    </div>
                                    <!-- <div class="form-group">
                                        <input type="checkbox" name="password2" id="password2" value="" class="form-form-control">
                                        <label for="password2">Ubah Password</label>
                                    </div> -->
                                    <div class="form-group">
                                        <input type="checkbox" name="ubahpassword" id="ubahpassword" value="" aria-label="Ingin Mengubah Password?">
                                        <label for="ubahpassword">Ubah Password</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info">Save Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        $("#fMasyarakat").on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var data = button.data('masyarakat');

            if (data != "add") {
                const barisdata = data.split(",");

                $('#nik').val(barisdata[1]);
                $('#nama').val(barisdata[2]);
                $('#username').val(barisdata[3]);
                $('#password').val(barisdata[4]);
                $('#telp').val(barisdata[5]).change();
                $('#editMasyarakat').attr('action', barisdata[6]);
                $("#ubahpassword").show();
            } else {
                $('#nik').val("");
                $('#nama').val("");
                $('#username').val("");
                $('#password').val("");
                $('#telp').val("");
                $('#editMasyarakat').attr('action', "masyarakat");
                $("#ubahpassword").hide();
            }
        });

    })
</script>
<?= $this->endSection() ?>