
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SagaApp</title>

    <!-- Custom fonts for this template -->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">Tabel Data Testing</h4>
                    </div>

                    <!-- DataTales Example -->   
                        <div class="card-body">
                        <a href="<?= base_url('panitia/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah Data Testing</a>
                        <div>
                            <?= $this->session->flashdata('pesan'); ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>NIS</th>
                                            <th>PBB</th>
                                            <th>Fisik</th>
                                            <th>Pengetahuan</th>
                                            <th>Klasifikasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php $no = 1;
                                    foreach($panitia as $pnt) : ?>
                                    <tbody>
                                        <td><?= $no++ ?></td>
                                        <td><?= $pnt->name ?></td>
                                        <td><?= $pnt->nis ?></td>
                                        <td><?= $pnt->pbb ?></td>
                                        <td><?= $pnt->fisik ?></td>
                                        <td><?= $pnt->pengetahuan ?></td>
                                        <td><?= $pnt->klasifikasi ?></td>

                                        <td>
                                            <button data-toggle="modal" data-target="#edit<?= $pnt->id ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i></button>
                                            <a href="<?= base_url('panitia/hapus/' . $pnt->id) ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                    </td>
                                    </tbody>
                                    <?php  
                                endforeach; ?>
                                </table>
   
    </div>
    </div>
    </div>
    </div>
    <!-- /.container-fluid --> 

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">Normalisasi</h4>
                    </div>  
                        <!-- Button trigger modal --> 
                    <div class="card-body">  
                    <form method="post" action="<?php echo site_url('panitia/normalisasi'); ?>">
                    <input type="submit" name="submit" value="Normalisasi" class="btn btn-primary btn-sm">
                    </form>
                    </div>
                    <!-- DataTales Example -->   
                    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>NIS</th>
                                            <th>PBB</th>
                                            <th>Fisik</th>
                                            <th>Pengetahuan</th>
                                            <th>Klasifikasi</th>
                                        </tr>
                                    </thead>
                                   
                                    <?php $no = 1;
                                    foreach($peserta as $pst) : ?>
                                    <tbody>
                                        <td><?= $no++ ?></td>
                                        <td><?= $pst->name ?></td>
                                        <td><?= $pst->nis ?></td>
                                        <td><?= $pst->pbb ?></td>
                                        <td><?= $pst->fisik ?></td>
                                        <td><?= $pst->pengetahuan ?></td>
                                        <td><?= $pst->klasifikasi ?></td>
                                    </tbody>
                                    <?php endforeach ?>
                                </table>
                                    </div>
                                    </div>
    </div>
    <!-- End of Page Wrapper -->

                            <!-- Modal Edit Data Testing-->
                            <?= $this->session->flashdata('pesan'); ?>
                            <?php foreach($panitia as $pnt) { ?>
                            <div class="modal fade" id="edit<?= $pnt->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Testing</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                            
                                <div class="modal-body">
                                <form action="<?= base_url('panitia/edit/' . $pnt->id) ?>" method="post">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" name="name" id="name" value="<?= $pnt->name ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    </div>

                                    <div class="form-group row">
                                    <label for="nis" class="col-sm-4 col-form-label">NIS</label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" name="nis" id="nis" value="<?= $pnt->nis ?>">
                                    <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    </div>

                                    <div class="form-group row">
                                    <label for="pbb" class="col-sm-4 col-form-label">PBB</label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" name="pbb" id="pbb" value="<?= $pnt->pbb ?>">
                                    <?= form_error('pbb', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    </div>

                                    <div class="form-group row">
                                    <label for="fisik" class="col-sm-4 col-form-label">Fisik</label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" name="fisik" id="fisik" value="<?= $pnt->fisik ?>">
                                    <?= form_error('fisik', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    </div>

                                    <div class="form-group row">
                                    <label for="pengetahuan" class="col-sm-4 col-form-label">Pengetahuan</label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" name="pengetahuan" id="pengetahuan" value="<?= $pnt->pengetahuan ?>">
                                    <?= form_error('pengetahuan', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div> 
                                    </div>
                            
                                    <div class="form-group row">
                                    <label for="klasifikasi" class="col-sm-4 col-form-label">Klasifikasi</label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" name="klasifikasi" id="klasifikasi" value="<?= $pnt->klasifikasi ?>">
                                    <?= form_error('klasifikasi', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div> 
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                                    <button type="reset" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> Reset</button>
                                    </div>
                            </form>
                                    </div>
                                </div>
                            </div>
                                <?php } ?>
                                </div>
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

</body>

</html>