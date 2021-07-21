<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">TABEL PENILAIAN DT</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Monitoring</a></li>
                        <li class="breadcrumb-item active">Penilaian DT</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
       
    <div class="container">
            <p align="left">
            <a href="<?= base_url('admin/tambah_dt'); ?>" class="btn btn-success">
            <i class="fa fa-plus"></i> Tambah Data</a>
            </p>

        <table class="table table-hover" id="example">
            <thead class="text-center">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NAMA SISWA</th>
                    <th scope="col">PROGRAM</th>
                    <th scope="col">AKTIVITAS</th>
                    <th scope="col">BULAN - TAHUN</th>
                    <th scope="col">SESI KE</th>
                    <th scope="col">OPPORTUNITY</th>
                    <th scope="col">RESPON BENAR</th>
                    <th scope="col">PERHITUNGAN %</th>



                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($penilaian_dt as $data) : ?>
                    <tr class="nomor text-center">
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $data->nama; ?></td>
                        <td><b>(<?php echo $data->kode_program;?>)</b> <?php echo $data->nama_program;?></td>
                        <td><?php echo $data->aktivitas; ?></td>
                        <td><?php echo $data->bulan; ?> - <?php echo $data->tahun; ?></td>
                        <td>Ke-<?php echo $data->sesi; ?></td>
                        <td><?php echo $data->op_total; ?></td>
                        <td><?php echo $data->rp; ?></td>
                        <td><?php echo $data->perhitungan; ?></td>
                        <td><?php echo anchor('admin/edit_dt/'.$data->id,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?>
                        <?php echo anchor('admin/hapus_dt/'.$data->id,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?></td>	
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
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
                <form method="post" action="<?php echo base_url('admin/tambahprogram'); ?>">

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