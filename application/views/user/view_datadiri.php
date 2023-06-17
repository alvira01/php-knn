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
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-sm-8">
      <img src="<?= base_url('assets/img/profil/') . $user['image']; ?>" class="card-img" > 
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= $user['name']; ?></h5>
        <p class="card-text"><?= $user['nis'];?></p>
        <p class="card-text"><?= $user['kelas'];?></p>
        <p class="card-text"><?= $user['tempat_lahir'];?></p>
        <p class="card-text"><?= $user['tanggal_lahir'];?></p>
        
      </div>
    </div>
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

    <script>
      $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html (fileName);
      });
      </script>

</body>

</html>


             

