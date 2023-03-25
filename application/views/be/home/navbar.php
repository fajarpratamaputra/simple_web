<nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
  <ul class="navbar-nav border-left flex-row ">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <span class="d-none d-md-inline-block"><?php echo $this->session->userdata('nama')?></span>
      </a>
      <div class="dropdown-menu dropdown-menu-small">
        <a class="dropdown-item text-danger" href="<?=base_url('auth/logout')?>">
          <i class="material-icons text-danger">&#xE879;</i> Logout </a>
      </div>
    </li>
  </ul>
  <nav class="nav">
    <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
      <i class="material-icons">&#xE5D2;</i>
    </a>
  </nav>
</nav>