<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Dashboard</span>
      <h3 class="page-title">Overview</h3>
    </div>
  </div>
  <!-- End Page Header -->
  <!-- Small Stats Blocks -->
  <?php if ($this->session->userdata('type') == 'admin') {?>
  <div class="row">
    <div class="col-lg col-md-6 col-sm-6 mb-4">
      <div class="stats-small stats-small--1 card card-small">
        <div class="card-body p-0 d-flex">
          <div class="d-flex flex-column m-auto">
            <div class="stats-small__data text-center">
              <span class="stats-small__label text-uppercase">Posts</span>
              <h6 class="stats-small__value count my-3"><?=$countPost?></h6>
            </div>
          </div>
          <canvas height="120" class="blog-overview-stats-small-1"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg col-md-6 col-sm-6 mb-4">
      <div class="stats-small stats-small--1 card card-small">
        <div class="card-body p-0 d-flex">
          <div class="d-flex flex-column m-auto">
            <div class="stats-small__data text-center">
              <span class="stats-small__label text-uppercase">Gallery</span>
              <h6 class="stats-small__value count my-3"><?=$countGallery?></h6>
            </div>          
          </div>
          <canvas height="120" class="blog-overview-stats-small-2"></canvas>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <!-- End Small Stats Blocks -->
  
  <div class="row">
    <!-- Users Stats -->
    <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
      <div class="card-header border-bottom">
        <div class="page-header row no-gutters py-4">
          <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <h3 class="page-title">List Products</h3>
          </div>
        </div>
      </div>
    </div>
    <!-- End Users Stats -->
  </div>
  
  <div class="row">
    <?php foreach ($data->result() as $row) { ?>
    <div class="col-lg-3 col-md-3 col-sm-6 mb-2">
      <div class="card card-small card-post card-post--1">
        <div class="card-post__image">
          <img class="col-lg-12" style="padding:0px;" src="<?=base_url('style/upload/'.$row->image)?>" alt="">            
        </div>
        <div class="card-body">
          <span class="text-muted"><h5><?=$row->product.'-'.$row->price ?></h4></span>
          <span class="text-muted"><?=date('d M Y', strtotime($row->datetime))?></span>
        </div>
        <div class="card-footer">
        <a href="<?=base_url('dashboard/listgallery')?>" class="mb-2 btn btn-outline-primary mr-2">Cart</a>
        </div>
      </div>
    </div>
    <?php } ?>   
  </div>
</div>