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
                          <h6 class="m-0">List History</h6>
                          <!-- <a href="<?=base_url('dashboard/editCart_action')?>" class="mb-2 btn btn-outline-primary mr-2">Confirm</a> -->
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
                                      <td><?php echo date('d M Y H:i:s', strtotime($row->cart_date)); ?></td>
                                      <td>
                                        <?php 
                                          $start_time = $row->cart_date; // waktu mulai
                                          $end_time = date('Y-m-d H:i:s'); // waktu selesai                                          
                                          $start_timestamp = strtotime($start_time); // mengonversi waktu mulai menjadi timestamp
                                          $end_timestamp = strtotime($end_time); // mengonversi waktu selesai menjadi timestamp                                          
                                          $diff_in_seconds = $end_timestamp - $start_timestamp; // menghitung selisih waktu dalam detik                                          
                                          $diff_in_hours = floor($diff_in_seconds / 3600); // menghitung selisih waktu dalam jam                                                                                    
                                          if ($diff_in_hours > 3) {
                                        ?>
                                          <button type="submit" class="mb-2 btn btn-outline-success mr-2">Closed</button>
                                        <?php } else { ?>
                                          <button type="submit" class="mb-2 btn btn-outline-success mr-2">Open</button>
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