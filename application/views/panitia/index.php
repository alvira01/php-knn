

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    <div class="card" style="width: 18rem;">
  <div class="col-sm-6">              
  <img src="<?= base_url('assets/img/profil/') . $user['image']; ?>" class="card-img" > 
</div>
  <div class="card-body">
</div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?= $user['name']; ?></li>
    <li class="list-group-item"><?= $user['nis'];?></li>
  </ul>
  
  <div class="card-body">
  <p class="card-text"><small class="text-muted">Last updated <?= date('d F Y', $user['date_created']); ?></small></p>
  </div>
</div>
</div>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

             

