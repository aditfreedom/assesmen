<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">PENILAIAN DT</h1>
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
        <form method="post" action="<?php echo base_url('admin/insert_dt'); ?>">

            <div class="row">
                <div class="col">

                    <div class="form-group">
                    <label for="">Nama Siswa</label>
                    <select class="form-control selectpicker" data-size="5" name="id_user" id="id_user" data-style="btn-primary" data-live-search="true">
                    <?php foreach ($tampil_user as $data) : ?>
                    <option value="<?=$data->id_user;?>"><?=$data->nama;?></option>
                    <?php endforeach; ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="">Nama Program</label>
                    <select class="form-control selectpicker" data-size="5" name="id_program" id="id_program" data-style="btn-primary" data-live-search="true">
                    <?php foreach ($tampil_program as $data) : ?>
                    <option value="<?=$data->id_program;?>"><b>(<?=$data->kode_program;?>) </b><?=$data->nama_program;?></option>
                    <?php endforeach; ?>
                    </select>
                    </div>

                </div>

                <div class="col">
                    <div class="row">
                        <div class="col">

                            <div class="form-group">
                            <label for="">Bulan</label>
                            <select class="form-control selectpicker" data-size="5" name="bulan" id="bulan" data-style="btn-primary" data-live-search="true">
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
                            <option value="Desembers">Desember</option>
                            </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                            <label for="">Tahun</label>
                            <select class="form-control selectpicker" data-size="5" name="tahun" id="tahun" data-style="btn-primary" data-live-search="true">
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            </select>
                            </div>
                        </div>
                    </div>

                            <div class="form-group">
                            <label for="">Nama Aktivitas</label>
                            <select class="form-control selectpicker" data-size="5" name="id_aktivitas" id="id_aktivitas" data-style="btn-primary" data-live-search="true">
                            <?php foreach ($tampil_aktivitas as $data) : ?>
                            <option value="<?=$data->id_aktivitas;?>"><b><?=$data->aktivitas;?> (Kode : <?=$data->kode_program;?>) </b></option>
                            <?php endforeach; ?>
                            </select>
                            </div>
                </div>
            </div>

                <hr>

                <h1>DATA PENILAIAN</h1>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required>
                        </div>               
                    </div>

                    <div class="col">
                        <div class="form-group">
                        <label for="">Hari</label>
                        <select class="form-control selectpicker" data-size="3" name="hari" id="hari" data-style="btn-primary" data-live-search="true">
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                        </select>
                         </div>  
                    </div>

                    <div class="col">
                        <div class="form-group">
                        <label for="">Jam</label>
                        <input type="time" name="jam" class="form-control" required> 
                        </div>
                    </div>  
                    
                    <div class="col">
                        <div class="form-group">
                        <label for="">Sesi</label>
                        <input type="number" name="sesi" class="form-control" required>
                        </div>
                    </div>  

                    <div class="col">
                        <div class="form-group">
                        <label for="">Opportunity</label>
                        <input type="number" name="op_total" class="form-control" required>
                        </div>
                    </div>  
                </div>

                            

                <div class="row">

                <div class="col">
                            <div class="form-group">
                            <label for="">OP 1</label>
                            <select class="form-control selectpicker" data-size="3" name="op1" id="op1" data-style="btn-success" data-live-search="true">
                            <option value="0">--Belum Diisi--</option>
                            <option value="1">(+) Benar</option>
                            <option value="0">(x) Salah</option>
                            <option value="0">(-) Tak Berespon</option>
                            <option value="0">(P+) Prompt Sebagian</option>
                            <option value="0">(A) Aprokmasi</option>
                            <option value="0">(O) Off-Task</option>
                            </select>
                            </div>  
                </div>

                <div class="col">
                            <div class="form-group">
                            <label for="">OP 2</label>
                            <select class="form-control selectpicker" data-size="3" name="op2" id="op2" data-style="btn-success" data-live-search="true">
                            <option value="0">--Belum Diisi--</option>
                            <option value="1">(+) Benar</option>
                            <option value="0">(x) Salah</option>
                            <option value="0">(-) Tak Berespon</option>
                            <option value="0">(P+) Prompt Sebagian</option>
                            <option value="0">(A) Aprokmasi</option>
                            <option value="0">(O) Off-Task</option>
                            </select>
                            </div>  
                </div>

                <div class="col">
                            <div class="form-group">
                            <label for="">OP 3</label>
                            <select class="form-control selectpicker" data-size="3" name="op3" id="op3" data-style="btn-success" data-live-search="true">
                            <option value="0">--Belum Diisi--</option>
                            <option value="1">(+) Benar</option>
                            <option value="0">(x) Salah</option>
                            <option value="0">(-) Tak Berespon</option>
                            <option value="0">(P+) Prompt Sebagian</option>
                            <option value="0">(A) Aprokmasi</option>
                            <option value="0">(O) Off-Task</option>
                            </select>
                            </div>  
                </div>

                <div class="col">
                            <div class="form-group">
                            <label for="">OP 4</label>
                            <select class="form-control selectpicker" data-size="3" name="op4" id="op4" data-style="btn-success" data-live-search="true">
                            <option value="0">--Belum Diisi--</option>
                            <option value="1">(+) Benar</option>
                            <option value="0">(x) Salah</option>
                            <option value="0">(-) Tak Berespon</option>
                            <option value="0">(P+) Prompt Sebagian</option>
                            <option value="0">(A) Aprokmasi</option>
                            <option value="0">(O) Off-Task</option>
                            </select>
                            </div>  
                </div>

                <div class="col">
                            <div class="form-group">
                            <label for="">OP 5</label>
                            <select class="form-control selectpicker" data-size="3" name="op5" id="op5" data-style="btn-success" data-live-search="true">
                            <option value="0">--Belum Diisi--</option>
                            <option value="1">(+) Benar</option>
                            <option value="0">(x) Salah</option>
                            <option value="0">(-) Tak Berespon</option>
                            <option value="0">(P+) Prompt Sebagian</option>
                            <option value="0">(A) Aprokmasi</option>
                            <option value="0">(O) Off-Task</option>
                            </select>
                            </div>  
                </div>

                </div>


                <div class="row">

                <div class="col">
                            <div class="form-group">
                            <label for="">OP 6</label>
                            <select class="form-control selectpicker" data-size="3" name="op6" id="op6" data-style="btn-danger" data-live-search="true">
                            <option value="0">--Belum Diisi--</option>
                            <option value="1">(+) Benar</option>
                            <option value="0">(x) Salah</option>
                            <option value="0">(-) Tak Berespon</option>
                            <option value="0">(P+) Prompt Sebagian</option>
                            <option value="0">(A) Aprokmasi</option>
                            <option value="0">(O) Off-Task</option>
                            </select>
                            </div>  
                </div>

                <div class="col">
                            <div class="form-group">
                            <label for="">OP 7</label>
                            <select class="form-control selectpicker" data-size="3" name="op7" id="op7" data-style="btn-danger" data-live-search="true">
                            <option value="0">--Belum Diisi--</option>
                            <option value="1">(+) Benar</option>
                            <option value="0">(x) Salah</option>
                            <option value="0">(-) Tak Berespon</option>
                            <option value="0">(P+) Prompt Sebagian</option>
                            <option value="0">(A) Aprokmasi</option>
                            <option value="0">(O) Off-Task</option>
                            </select>
                            </div>  
                </div>

                <div class="col">
                            <div class="form-group">
                            <label for="">OP 8</label>
                            <select class="form-control selectpicker" data-size="3" name="op8" id="op8" data-style="btn-danger" data-live-search="true">
                            <option value="0">--Belum Diisi--</option>
                            <option value="1">(+) Benar</option>
                            <option value="0">(x) Salah</option>
                            <option value="0">(-) Tak Berespon</option>
                            <option value="0">(P+) Prompt Sebagian</option>
                            <option value="0">(A) Aprokmasi</option>
                            <option value="0">(O) Off-Task</option>
                            </select>
                            </div>  
                </div>

                <div class="col">
                            <div class="form-group">
                            <label for="">OP 9</label>
                            <select class="form-control selectpicker" data-size="3" name="op9" id="op9" data-style="btn-danger" data-live-search="true">
                            <option value="0">--Belum Diisi--</option>
                            <option value="1">(+) Benar</option>
                            <option value="0">(x) Salah</option>
                            <option value="0">(-) Tak Berespon</option>
                            <option value="0">(P+) Prompt Sebagian</option>
                            <option value="0">(A) Aprokmasi</option>
                            <option value="0">(O) Off-Task</option>
                            </select>
                            </div>  
                </div>

                <div class="col">
                            <div class="form-group">
                            <label for="">OP 10</label>
                            <select class="form-control selectpicker" data-size="3" name="op10" id="op10" data-style="btn-danger" data-live-search="true">
                            <option value="0">--Belum Diisi--</option>
                            <option value="1">(+) Benar</option>
                            <option value="0">(x) Salah</option>
                            <option value="0">(-) Tak Berespon</option>
                            <option value="0">(P+) Prompt Sebagian</option>
                            <option value="0">(A) Aprokmasi</option>
                            <option value="0">(O) Off-Task</option>
                            </select>
                            </div>  
                </div>

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
    </div>
</div>
</div>