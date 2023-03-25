<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <?php $this->load->view('be/home/head')?>
  </head>
  <body class="h-100">
    <div class="row">           
        <main class="main-content col-lg-12 col-md-12 col-sm-12" style="margin-top:100px;">          
          <div class="main-content-container container-fluid px-4">                        
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12 mb-4"></div>
              <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Login</h6>
                  </div>
                  <ul class="list-group list-group-flush">                                        
                    <li class="list-group-item p-3">
                      <div class="row">                        
                        <div class="col-sm-12 col-md-12">
                          <form action="<?=base_url('auth/login_action'); ?>" method="post">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div> 
                            <button type="submit" name="submit" value="publish" class="btn btn-sm btn-accent ml-auto">
                            <i class="material-icons">file_copy</i> Login</button>                           
                          </form>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>              
            </div>
          </div>          
        </main>
        <!-- End Main -->
      </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="<?=base_url('style/css/be/')?>scripts/extras.1.1.0.min.js"></script>
    <script src="<?=base_url('style/css/be/')?>scripts/shards-dashboards.1.1.0.min.js"></script>
    <script src="<?=base_url('style/css/be/')?>scripts/app/app-blog-overview.1.1.0.js"></script>
  </body>
</html>