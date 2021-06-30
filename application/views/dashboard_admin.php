<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <div class="content-header">
 <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">DASHBOARD</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Monitoring</a></li>
              <li class="breadcrumb-item active">Beranda</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$siswa;?></h3>
                <a class="text-light link-light" href="<?=base_url('home/data_siswa/');?>">   
                <p>SISWA</p>
                </a>
              </div>
              <div class="icon">
                <i class="fa fa-user-graduate"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->

        <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">          
              <a class="text-light link-light" href="<?=base_url('home/data_admin/');?>">   
                <h3><?=$terapis;?></h3>
                <p>TERAPIS</p>
                </a>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
            </div>
          </div>
         
          <!-- ./col -->
        <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
              <a class="text-light link-light" href="<?=base_url('home/data_admin/');?>">
                <h3><?=$admin;?></h3>
                <p>ADMIN</p>
                </a>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
            </div>
          </div>

   <!-- ./col -->
   <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <a class="text-light link-light" href="<?=base_url('home/program/');?>">
                <h3><?=$program;?></h3>
                <p>PROGRAM</p>
                </a>
              </div>
              <div class="icon">
                <i class="fa fa-chalkboard-teacher"></i>
              </div>
            </div>
          </div>

             <!-- ./col -->
        <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <a class="text-light link-light" href="<?=base_url('home/aktivitas/');?>">
                <h3><?=$aktivitas;?></h3>
                <p>AKTIVITAS</p>
                </a>
              </div>
              <div class="icon">
                <i class="fa fa-american-sign-language-interpreting"></i>
              </div>
            </div>
          </div>
        <!-- <div class="col-lg-3 col-3">
            <div class="small-box bg-success">
              <div class="inner">
             
                <h3>1863</h3>
                <p>Prestasi</p>
              </div>
              <div class="icon">
                <i class="fa fa-user-graduate"></i>
              </div>
            </div>
          </div> -->

          

          


        </div>
          
          <!-- ./col -->
        </div>
        
        
    </section>
    
    </div>
</div>
<!-- Button trigger modal -->



</div>

