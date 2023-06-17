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

<body class="bg-gradient-primary"> 
    
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-6">

        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('user/ubahpassword'); ?>" method="post">
          <div class="form-group">
            <label for="password_lama">Password Lama</label>
            <input type="password" class="form-control" id="password_lama" name="password_lama">
            <?= form_error('password_lama', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="password_baru1">Password Baru</label>
            <input type="password" class="form-control" id="password_baru1" name="password_baru1">
            <?= form_error('password_baru1', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
         <div class="form-group">
            <label for="password_baru2">Ulangi Password</label>
            <input type="password" class="form-control" id="password_baru2" name="password_baru2">
            <?= form_error('password_baru2', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Ubah Password</button>
        </div>
    </form>
    </div>

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

</body>

</html>