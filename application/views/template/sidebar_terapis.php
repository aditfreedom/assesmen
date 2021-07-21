 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?=base_url()?>assets/img/logoapp1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b style="font-size:15px;">MONITORING TERAPI ABA</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url()?>asset/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><b>TERAPIS<br><?php echo $nama; ?></b></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2 text-sm">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">      
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item ">
            <a href="<?=base_url('admin');?>" class="nav-link">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

        

          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
                Penilaian
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/penilaian_dt/');?>" class="nav-link">
                  <i class="far fa fa-clipboard-check nav-icon"></i>
                  <p>Penilaian DT</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/penilaian_dtt/');?>" class="nav-link">
                  <i class="far fa fa-clipboard-check nav-icon"></i>
                  <p>Penilaian DTT</p>
                </a>
              </li>
              </ul>
              </li>

              <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Perhitungan Rata & KNN
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?=base_url('admin/hitung_dt/');?>" class="nav-link">
                  <i class="far fa fa-copy nav-icon"></i>
                  <p>Perhitungan DT</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/hitung_dtt/');?>" class="nav-link">
                  <i class="far fa fa-copy nav-icon"></i>
                  <p>Perhitungan DTT</p>
                </a>
              </li>
              
              </ul>
              </li>     

              <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
                Hasil Penilaian
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?=base_url('admin/rekap_penilaian/');?>" class="nav-link">
                  <i class="far fa fa-table nav-icon"></i>
                  <p>Rekap Penilaian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/grafik/');?>" class="nav-link">
                  <i class="far fa fa-chart-bar nav-icon"></i>
                  <p>Grafik</p>
                </a>
              </li>
              </ul>
              </li>       

          <li class="nav-item">
            <a href="<?= base_url('admin/logout')?>" class="nav-link bg-danger">
              <i class="nav-icon fa fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>