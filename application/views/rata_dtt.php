<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">PERHITUNGAN DTT </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Monitoring</a></li>
                        <li class="breadcrumb-item active">Rata-Rata DTT</li>
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

        <table class="table table-hover" id="example">
            <thead class="text-center">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">BULAN</th>
                    <th scope="col">TAHUN</th>
                    <th scope="col">TANGGAL</th>
                    <th scope="col">HARI</th>
                    <th scope="col">JAM</th>
                    <th scope="col">PERHITUNGAN %</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($tampil_data_dtt as $data) : ?>
                    <tr class="nomor text-center">
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $data->nama; ?></td>
                        <td><?php echo $data->bulan; ?></td>
                        <td><?php echo $data->tahun; ?></td>
                        <td><?php echo $data->tanggal; ?></td>
                        <td><?php echo $data->hari; ?></td>
                        <td><?php echo $data->jam; ?></td>
                        <td><?php echo $data->perhitungan; ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach;?>
            </tbody>
        </table>
        </div>

        
        <?php 
            $perhitungan = 0;
        foreach ($tampil_data_dtt as $data){
            $perhitungan1 = $data->perhitungan;
            $perhitungan=$perhitungan+$perhitungan1;
        } 
         ?>


        <form method="post" action="<?= base_url('home/proses_hitung_dtt'); ?>">
            <div class="row" hidden>
                <div class="col">

                <div class="form-group" >
                    <label for="">Bulan</label>
                    <input type="text" name="bulan" class="form-control" value="<?=$this->input->get('bulan');?>">
                    </div>         
                </div>

                <div class="col">
                    <div class="form-group" >
                    <label for="">Tahun</label>
                    <input type="number" name="tahun" class="form-control" value="<?=$this->input->get('tahun');?>">
                    </div>               
                </div>

                <div class="col">
                    <div class="form-group" >
                    <label for="">Siswa</label>
                    <input type="text" name="id_user" class="form-control" value="<?=$this->input->get('id_user');?>">
                    </div>               
                </div>


                <div class="col">
                    <div class="form-group" >
                    <label for="">Data</label>
                    <input type="number" name="data" class="form-control" value="<?=$tampil_jumlah_dtt?>">
                    </div>               
                </div>

                <div class="col">
                    <div class="form-group" >
                    <label for="">Perhitungan</label>
                    <input type="text" name="perhitungan" class="form-control" value="<?=$perhitungan?>">
                    </div>               
                </div>
            </div>

            <?php
            if ($tampil_jumlah_dtt<"1") {
                $hidden="hidden";
            }else{
                $hidden="";
            }
            ?>

            <br>
            <div class="form-group" <?=$hidden;?>>
            <button type="submit" class="btn text-bold btn-danger form-control" style="height:40px;">PROSES HITUNG DATA</button>                    
            </div>

            </form>



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