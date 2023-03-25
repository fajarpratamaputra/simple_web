<div class="main-content-container container-fluid px-4">
              <!-- Page Header -->
              <div class="page-header row no-gutters py-4">
                  <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                      <span class="text-uppercase page-subtitle">Overview</span>
                      <h3 class="page-title">Data Tables</h3>
                  </div>
              </div>
              <!-- End Page Header -->
              <!-- Default Light Table -->
              <div class="row">
                  <div class="col">
                      <div class="card card-small mb-4">
                        <div class="card-header border-bottom">
                          <h6 class="m-0">List Products</h6>
                          <?php if ($this->session->userdata('type') == 'admin') {?>
                            <a href="<?=base_url('dashboard/addGallery')?>" class="mb-2 btn btn-outline-primary mr-2">Add</a>                          
                          <?php } ?>
                        </div>                        
                        <div class="card-body p-0 pb-3 text-center">
                          <table class="table mb-0">
                            <thead class="bg-light">
                              <tr>
                                <th scope="col" class="border-0">No</th>
                                <th scope="col" class="border-0">Product</th>
                                <th scope="col" class="border-0">Price</th>
                                <th scope="col" class="border-0">Image</th>
                                <th scope="col" class="border-0">Date</th>
                                <th scope="col" class="border-0">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if($this->uri->segment(3)==NULL) {$no=0;} else {$no=$this->uri->segment(3);} ; foreach ($data->result() as $row) { $no++;?>
                                  <tr>
                                      <td><?=$no?></td>
                                      <td><h5><?=$row->product ?></h5></td>
                                      <td><h5><?=$row->price ?></h5></td>
                                      <td><img width="110" height="70" src="<?=base_url('style/upload/'.$row->image)?>" alt=""></td>                                      
                                      <td><?php echo date('d M Y H:i:s', strtotime($row->datetime)); ?></td>
                                      <td>
                                        <?php if ($this->session->userdata('type') == 'admin') {?>
                                          <a href="<?=base_url('dashboard/deleteGallery/'.$row->id)?>" class="mb-2 btn btn-outline-danger mr-2">Delete</a>
                                        <?php } else { ?>  
                                          <a href="<?=base_url('dashboard/addCart_action/'.$row->id)?>" class="mb-2 btn btn-outline-danger mr-2">Add to Cart</a>
                                        <?php } ?>
                                      </td>
                                  </tr>
                              <?php } ?>       
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <?php echo $pagination; ?>                      
                  </div>
              </div>
              <!-- End Default Light Table -->            
          </div>