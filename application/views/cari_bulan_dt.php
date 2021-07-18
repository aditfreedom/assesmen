<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">PERHITUNGAN DATA DT</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Monitoring</a></li>
                        <li class="breadcrumb-item active">Cari DT</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
       
    <div class="container">
            <!-- <p align="left">
            <a href="<?= base_url('home/tambah_dt'); ?>" class="btn btn-success">
            <i class="fa fa-plus"></i> Tambah Data</a>
            </p> -->

            <h3 class="m-0 text-dark">Silahkan Cari Data Terlebih Dahulu</h3>
            <hr>
            <form method="get" action="<?php echo base_url('home/cari_dt'); ?>">

                <div class="row">
                <div class="col">
                         <div class="form-group">
                            <label for="">Nama Siswa</label>
                            <select class="form-control selectpicker" data-size="5" name="id_user" id="bulan" data-style="btn-danger" data-live-search="true">
                            <?php foreach ($user as $data) : ?>
                            <option value="<?= $data->id_user; ?>"><?php echo $data->nama; ?></option>
                            <?php endforeach;?>
                            </select>
                            </div>             
                    </div>
                    <div class="col">
                         <div class="form-group">
                            <label for="">Bulan</label>
                            <select class="form-control selectpicker" data-size="5" name="bulan" id="bulan" data-style="btn-danger" data-live-search="true">
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                            </select>
                            </div>             
                    </div>
                    <div class="col">
                        <div class="form-group">
                        <label for="">Tahun</label>
                        <input type="number" name="tahun" class="form-control" required>
                        </div>               
                    </div>
                </div>
                
                <div class="form-group">
                <button type="submit" class="btn text-bold btn-primary form-control" style="height:40px;">CARI DATA</button>                    
                </div>
            </form>
        </div>

    </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url('home/tambahprogram'); ?>">

                    <div class="form-group">
                    <label for="">Kode Program</label>
                    <input type="text" name="kode_program" class="form-control" maxlength="100">
                    </div>

                    <div class="form-group">
                    <label for="">Nama Program</label>
                    <input type="text" name="nama_program" class="form-control" maxlength="100">
                    </div>

                    <div class="form-group">
                    <button type="submit" class="btn text-bold btn-primary form-control" style="height:40px;">SIMPAN DATA</button>                    
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>