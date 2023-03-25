<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
    <div class="main-navbar">
        <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
            <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <span class="d-none d-md-inline ml-1">Simple Cart</span>
                </div>
            </a>
            <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
            </a>
        </nav>
    </div>
    <div class="nav-wrapper">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php if(($this->uri->segment(2)==NULL) && ($this->uri->segment(1)=='dashboard')) { echo "active"; }?>" href="<?=base_url('dashboard')?>">
                  <i class="material-icons">edit</i>
                  <span>Dashboard</span>
                </a>                
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if(($this->uri->segment(2)=='listproduct') && ($this->uri->segment(1)=='dashboard')) { echo "active"; }?>" href="<?=base_url('dashboard/listproduct')?>">
                  <i class="material-icons">vertical_split</i>
                  <span>Product</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if(($this->uri->segment(2)=='listcart') && ($this->uri->segment(1)=='dashboard')) { echo "active"; }?>" href="<?=base_url('dashboard/listcart')?>">
                  <i class="material-icons">vertical_split</i>
                  <span>Cart</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="<?=base_url('dashboard/listsummary')?>">
                  <i class="material-icons">vertical_split</i>
                  <span>Summary</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="<?=base_url('dashboard/listhistory')?>">
                  <i class="material-icons">vertical_split</i>
                  <span>History</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="<?=base_url('auth/logout')?>">
                  <i class="material-icons">error</i>
                  <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>