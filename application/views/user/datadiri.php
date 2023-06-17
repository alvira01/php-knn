<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SagaApp</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?= $this->session->flashdata('pesan'); ?>
    <form action="<?= base_url('user/datadiri'); ?>" method="post">
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<form>
  <div class="form-group row">
    <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="name" id="name" disabled value="<?= $user['name']; ?> ">
    </div>
    </div>

    <div class="form-group row">
    <label for="nis" class="col-sm-2 col-form-label">NIS</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="nis" id="nis" disabled value="<?= $user['nis']; ?> ">
    </div>
    </div>

    <div class="form-group row">
    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="kelas" id="kelas">
      <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    </div>

    <div class="form-group row">
    <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir">
      <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    </div>

    <div class="form-group row">
    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
    <div class="col-sm-4">
      <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
      <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
    </div> 
    </div>

    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-save"></i>Simpan</button>
    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i>Reset</button>
</form>
</div>
</form>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

    <script>
      $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html (fileName);
      });
      </script>

</body>

</html>