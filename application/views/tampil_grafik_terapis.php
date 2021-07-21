<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">GRAFIK HASIL : <b class="text-danger"><?=$nama;?></b></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Monitoring</a></li>
                        <li class="breadcrumb-item active">Grafik</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
       
    <div class="container">

    <?php foreach ($penilaian_dt as $data){
        $tanggal[]=$data->tanggal;
        $perhitungan[]=$data->perhitungan;
        $bulan=$data->bulan;
        $tahun=$data->tahun;


    }
    ?>

<?php foreach ($penilaian_dtt as $data){
        $tanggal2[]=$data->tanggal;
        $perhitungan2[]=$data->perhitungan;
    }
    ?>

    <div id="container" style="width:100%; height:400px;"></div>



        </div>

    </div>
</div>
</div>



<script>
document.addEventListener('DOMContentLoaded', function () {
    Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'GRAFIK HASIL PENILAIAN'
    },
    subtitle: {
        text: 'Assesmen <b>Bulan <?=$bulan?> Tahun <?=$tahun?></b>'
    },
    xAxis: {
        categories: <?=json_encode($tanggal)?>
    },
    yAxis: {
        title: {
            text: 'Hasil Asesmen (%)'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'DT',
        data: <?=json_encode($perhitungan,JSON_NUMERIC_CHECK)?>
    },{
        name: 'DTT',
        data: <?=json_encode($perhitungan2,JSON_NUMERIC_CHECK)?>
    }]
});
    });
</script>

