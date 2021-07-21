<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
        parent::__construct();
        $datauser = $this->session->userdata('login'); 
		if ($datauser!= "Berhasil") {
            $this->session->sess_destroy();
			redirect(base_url('adminuser/login'));
		}
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('M_assesmen');
		$sess_data = $this->session->userdata();
		$data['siswa'] = $this->M_assesmen->tampilsiswa_hitung()->num_rows();
		$data['terapis'] = $this->M_assesmen->tampilterapis_hitung()->num_rows();
		$data['admin'] = $this->M_assesmen->tampiladmin_hitung()->num_rows();
		$data['program'] = $this->M_assesmen->tampilprogram_hitung()->num_rows();
		$data['aktivitas'] = $this->M_assesmen->tampilaktivitas_hitung()->num_rows();

		$this->load->view('template/header');
		$this->load->view('template/sidebar_terapis', $sess_data);
		$this->load->view('dashboard_terapis',$data);
		$this->load->view('template/footer');
	}

	public function penilaian_dt()
	{
		$sess_data = $this->session->userdata();
		$data['penilaian_dt'] = $this->M_assesmen->tampildt()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_terapis', $sess_data);
		$this->load->view('penilaian_dt_terapis', $data);
		$this->load->view('template/footer');
	}

	public function tambah_dt()
	{
		$sess_data = $this->session->userdata();
		$data['tampil_user'] = $this->M_assesmen->tampil_user()->result();
		$data['tampil_program'] = $this->M_assesmen->tampil_program_input()->result();
		$data['tampil_aktivitas'] = $this->M_assesmen->tampil_aktivitas_input()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_terapis', $sess_data);
		$this->load->view('tambah_dt_terapis',$data);
		$this->load->view('template/footer');
	}


	public function insert_dt()
	{
		$id_user    		= $this->input->post('id_user');
		$id_program    		= $this->input->post('id_program');
		$id_aktivitas       = $this->input->post('id_aktivitas');
		$bulan         		= $this->input->post('bulan');
		$tahun       		= $this->input->post('tahun');
		$tanggal       		= $this->input->post('tanggal');
		$hari 			    = $this->input->post('hari');
		$jam			    = $this->input->post('jam');
		$op1	       		= $this->input->post('op1');
		$op2 		      	= $this->input->post('op2');
		$op3	       		= $this->input->post('op3');
		$op4	       		= $this->input->post('op4');
		$op5	       		= $this->input->post('op5');
		$op6	       		= $this->input->post('op6');
		$op7	       		= $this->input->post('op7');
		$op8	       		= $this->input->post('op8');
		$op9	       		= $this->input->post('op9');
		$op10	       		= $this->input->post('op10');
		$sesi	       		= $this->input->post('sesi');
		$op_total	       	= $this->input->post('op_total');


		$rp = $op1+$op2+$op3+$op4+$op5+$op6+$op7+$op8+$op9+$op10;
		$perhitungan = ($rp/$op_total)*100;

		$data = array(
			'id_user' => $id_user,
			'id_program' => $id_program,
			'id_aktivitas' => $id_aktivitas,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'tanggal' => $tanggal,
			'hari' => $hari,
			'jam' => $jam,
			'op1' => $op1,
			'op2' => $op2,
			'op3' => $op3,
			'op4' => $op4,
			'op5' => $op5,
			'op6' => $op6,
			'op7' => $op7,
			'op8' => $op8,
			'op9' => $op9,
			'op10' => $op10,
			'op_total' => $op_total,
			'rp' => $rp,
			'perhitungan' => $perhitungan,
			'sesi' => $sesi

		);

		$this->M_assesmen->insert_dt($data, 'penilaian_dt');
		$this->load->view('berhasil_tambah_dt');
	}

	public function hapus_dt($id)
	{
		$where = array('id' => $id);
		$this->M_assesmen->hapus_dt('penilaian_dt', $where);
		redirect(base_url('admin/penilaian_dt'));
	}

	public function edit_dt($id)
	{
		$sess_data = $this->session->userdata();
		$data['edit_dt'] = $this->M_assesmen->tampilpenilaiandt_byid($id)->result();
		$data['tampil_user'] = $this->M_assesmen->tampil_user()->result();
		$data['tampil_program'] = $this->M_assesmen->tampil_program_input()->result();
		$data['tampil_aktivitas'] = $this->M_assesmen->tampil_aktivitas_input()->result();

		$this->load->view('template/header');
		$this->load->view('template/sidebar_terapis', $sess_data);
		$this->load->view('edit_dt_terapis', $data);
		$this->load->view('template/footer');
	}


	public function update_dt()
	{
		$id_user    		= $this->input->post('id_user');
		$id_program    		= $this->input->post('id_program');
		$id_aktivitas       = $this->input->post('id_aktivitas');
		$bulan         		= $this->input->post('bulan');
		$tahun       		= $this->input->post('tahun');
		$tanggal       		= $this->input->post('tanggal');
		$hari 			    = $this->input->post('hari');
		$jam			    = $this->input->post('jam');
		$op1	       		= $this->input->post('op1');
		$op2 		      	= $this->input->post('op2');
		$op3	       		= $this->input->post('op3');
		$op4	       		= $this->input->post('op4');
		$op5	       		= $this->input->post('op5');
		$op6	       		= $this->input->post('op6');
		$op7	       		= $this->input->post('op7');
		$op8	       		= $this->input->post('op8');
		$op9	       		= $this->input->post('op9');
		$op10	       		= $this->input->post('op10');
		$sesi	       		= $this->input->post('sesi');
		$op_total	       	= $this->input->post('op_total');


		$rp = $op1+$op2+$op3+$op4+$op5+$op6+$op7+$op8+$op9+$op10;
		$perhitungan = ($rp/$op_total)*100;

		$data = array(
			'id_user' => $id_user,
			'id_program' => $id_program,
			'id_aktivitas' => $id_aktivitas,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'tanggal' => $tanggal,
			'hari' => $hari,
			'jam' => $jam,
			'op1' => $op1,
			'op2' => $op2,
			'op3' => $op3,
			'op4' => $op4,
			'op5' => $op5,
			'op6' => $op6,
			'op7' => $op7,
			'op8' => $op8,
			'op9' => $op9,
			'op10' => $op10,
			'op_total' => $op_total,
			'rp' => $rp,
			'perhitungan' => $perhitungan,
			'sesi' => $sesi

		);

		$where = array(
			'id' => $this->input->post('id'),
		);

		$this->M_assesmen->update_dt($where, $data, 'penilaian_dt');
		$this->load->view('berhasil_update_dt');
	}

	public function penilaian_dtt()
	{
		$sess_data = $this->session->userdata();
		$data['penilaian_dtt'] = $this->M_assesmen->tampildtt()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_terapis', $sess_data);
		$this->load->view('penilaian_dtt_terapis', $data);
		$this->load->view('template/footer');
	}

	public function tambah_dtt()
	{
		$sess_data = $this->session->userdata();
		$data['tampil_user'] = $this->M_assesmen->tampil_user()->result();
		$data['tampil_program'] = $this->M_assesmen->tampil_program_input()->result();
		$data['tampil_aktivitas'] = $this->M_assesmen->tampil_aktivitas_input()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_terapis', $sess_data);
		$this->load->view('tambah_dtt_terapis',$data);
		$this->load->view('template/footer');
	}


	public function insert_dtt()
	{
		$id_user    		= $this->input->post('id_user');
		$id_program    		= $this->input->post('id_program');
		$id_aktivitas       = $this->input->post('id_aktivitas');
		$bulan         		= $this->input->post('bulan');
		$tahun       		= $this->input->post('tahun');
		$tanggal       		= $this->input->post('tanggal');
		$hari 			    = $this->input->post('hari');
		$jam			    = $this->input->post('jam');
		$op1	       		= $this->input->post('op1');
		$op2 		      	= $this->input->post('op2');
		$op3	       		= $this->input->post('op3');
		$op4	       		= $this->input->post('op4');
		$op5	       		= $this->input->post('op5');
		$op6	       		= $this->input->post('op6');
		$op7	       		= $this->input->post('op7');
		$op8	       		= $this->input->post('op8');
		$op9	       		= $this->input->post('op9');
		$op10	       		= $this->input->post('op10');
		$sesi	       		= $this->input->post('sesi');
		$op_total	       	= $this->input->post('op_total');


		$rp = $op1+$op2+$op3+$op4+$op5+$op6+$op7+$op8+$op9+$op10;
		$perhitungan = ($rp/$op_total)*100;

		$data = array(
			'id_user' => $id_user,
			'id_program' => $id_program,
			'id_aktivitas' => $id_aktivitas,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'tanggal' => $tanggal,
			'hari' => $hari,
			'jam' => $jam,
			'op1' => $op1,
			'op2' => $op2,
			'op3' => $op3,
			'op4' => $op4,
			'op5' => $op5,
			'op6' => $op6,
			'op7' => $op7,
			'op8' => $op8,
			'op9' => $op9,
			'op10' => $op10,
			'op_total' => $op_total,
			'rp' => $rp,
			'perhitungan' => $perhitungan,
			'sesi' => $sesi

		);

		$this->M_assesmen->insert_dtt($data, 'penilaian_dtt');
		$this->load->view('berhasil_tambah_dtt');
	}

	public function hapus_dtt($id)
	{
		$where = array('id' => $id);
		$this->M_assesmen->hapus_dt('penilaian_dtt', $where);
		redirect(base_url('admin/penilaian_dtt'));
	}

	public function edit_dtt($id)
	{
		$sess_data = $this->session->userdata();
		$data['edit_dtt'] = $this->M_assesmen->tampilpenilaiandtt_byid($id)->result();
		$data['tampil_user'] = $this->M_assesmen->tampil_user()->result();
		$data['tampil_program'] = $this->M_assesmen->tampil_program_input()->result();
		$data['tampil_aktivitas'] = $this->M_assesmen->tampil_aktivitas_input()->result();

		// $data['program'] = $this->M_assesmen->tampilprogram()->result();
		// $data['program2'] = $this->M_assesmen->tampilprogram_byid($id)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_terapis', $sess_data);
		$this->load->view('edit_dtt_terapis', $data);
		$this->load->view('template/footer');
	}


	public function update_dtt()
	{
		$id_user    		= $this->input->post('id_user');
		$id_program    		= $this->input->post('id_program');
		$id_aktivitas       = $this->input->post('id_aktivitas');
		$bulan         		= $this->input->post('bulan');
		$tahun       		= $this->input->post('tahun');
		$tanggal       		= $this->input->post('tanggal');
		$hari 			    = $this->input->post('hari');
		$jam			    = $this->input->post('jam');
		$op1	       		= $this->input->post('op1');
		$op2 		      	= $this->input->post('op2');
		$op3	       		= $this->input->post('op3');
		$op4	       		= $this->input->post('op4');
		$op5	       		= $this->input->post('op5');
		$op6	       		= $this->input->post('op6');
		$op7	       		= $this->input->post('op7');
		$op8	       		= $this->input->post('op8');
		$op9	       		= $this->input->post('op9');
		$op10	       		= $this->input->post('op10');
		$sesi	       		= $this->input->post('sesi');
		$op_total	       	= $this->input->post('op_total');


		$rp = $op1+$op2+$op3+$op4+$op5+$op6+$op7+$op8+$op9+$op10;
		$perhitungan = ($rp/$op_total)*100;

		$data = array(
			'id_user' => $id_user,
			'id_program' => $id_program,
			'id_aktivitas' => $id_aktivitas,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'tanggal' => $tanggal,
			'hari' => $hari,
			'jam' => $jam,
			'op1' => $op1,
			'op2' => $op2,
			'op3' => $op3,
			'op4' => $op4,
			'op5' => $op5,
			'op6' => $op6,
			'op7' => $op7,
			'op8' => $op8,
			'op9' => $op9,
			'op10' => $op10,
			'op_total' => $op_total,
			'rp' => $rp,
			'perhitungan' => $perhitungan,
			'sesi' => $sesi

		);

		$where = array(
			'id' => $this->input->post('id'),
		);

		$this->M_assesmen->update_dtt($where, $data, 'penilaian_dtt');
		$this->load->view('berhasil_update_dtt');
	}
	

	public function hitung_dt()
	{
		$sess_data = $this->session->userdata();
		$data['user'] = $this->M_assesmen->tampil_user_siswa()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_terapis', $sess_data);
		$this->load->view('cari_bulan_dt_terapis',$data);
		$this->load->view('template/footer');
	}

	public function cari_dt()
	{
		$sess_data 		= $this->session->userdata();
		$bulan    		= $this->input->get('bulan');
		$tahun    		= $this->input->get('tahun');
		$id_user    	= $this->input->get('id_user');
		$data['tampil_data_dt'] = $this->M_assesmen->tampil_data_dt($bulan,$tahun,$id_user)->result();
		$data['tampil_jumlah_dt'] = $this->M_assesmen->tampil_data_dt($bulan,$tahun,$id_user)->num_rows();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_terapis', $sess_data);
		$this->load->view('rata_dt_terapis',$data);
		$this->load->view('template/footer');
	}

	public function proses_hitung_dt()
	{
		$sess_data 		= $this->session->userdata();
		$bulan    		= $this->input->post('bulan');
		$tahun    		= $this->input->post('tahun');
		$data    		= $this->input->post('data');
		$perhitungan	= $this->input->post('perhitungan');
		$id_user		= $this->input->post('id_user');



		$rata=$perhitungan/$data;

		$rata_penilaian=$this->M_assesmen->tampil_rata_penilaian()->result();
		$rata_penilaian2= $this->M_assesmen->tampil_rata_penilaian()->num_rows();

  
        
        for ($i=0; $i < $rata_penilaian2; $i++) {

			$jarak= json_decode( json_encode($rata_penilaian), true);
			$rata2[$i] = $jarak[$i]['rata'];
			$kategori2 = $jarak[$i]['kategori'];
			$hasil[$i] = ['rata'=>sqrt(($rata-$rata2[$i])*($rata-$rata2[$i])),'kategori'=>$kategori2];

		}

		sort($hasil);
		$clength = count($hasil);
		for($x = 0; $x < $clength; $x++) {
		  $hasil[$x];
		}

		$k=3;
		$knn = array_slice($hasil, 0, $k);


		$kategori_baik = 0;
		$kategori_cukup = 0;
		$kategori_kurang = 0;

		for ($row = 0; $row < 3; $row++) {
			if($knn[$row]["kategori"]=="Baik") {
				 $kategori_baik++;
			}
			if($knn[$row]["kategori"]=="Cukup") {
				$kategori_cukup++;
		   }
		   if($knn[$row]["kategori"]=="Kurang") {
			$kategori_kurang++;
	   }
		}

		$kategori_baik = $kategori_baik ."Baik";
		$kategori_cukup = $kategori_cukup ."Cukup";
		$kategori_kurang = $kategori_kurang ."Kurang";

		// echo(max($kategori_baik,$kategori_cukup,$kategori_kurang));

		$kategori = "-";
		if (strpos(max($kategori_baik,$kategori_cukup,$kategori_kurang),"Baik")!== false) {
			$kategori = "Baik";
		}
		if (strpos(max($kategori_baik,$kategori_cukup,$kategori_kurang),"Cukup")!== false) {
			$kategori = "Cukup";
		}
		if (strpos(max($kategori_baik,$kategori_cukup,$kategori_kurang),"Kurang")!== false) {
			$kategori = "Kurang";
		}


		$data = array(
			'id_user' => $id_user,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'rata' => $rata,
			'kategori' => $kategori
		);

		$data2 = array(
			'rata' => $rata,
			'kategori' => $kategori
		);

		$where = array(
			'id_user' => $id_user,
			'bulan' => $bulan,
			'tahun' => $tahun
		);


		$cek_inputan= $this->M_assesmen->cek_dt($id_user,$bulan,$tahun)->num_rows();

		if ($cek_inputan==0) {
			$this->M_assesmen->insert_perhitungan_dt($data, 'perhitungan_dt');
		}

		if ($cek_inputan==1) {
			$this->M_assesmen->update_perhitungan_dt($where,$data, 'perhitungan_dt');
		}

		$this->load->view('berhasil_hitung_dt',$data);

	}

	public function hitung_dtt()
	{
		$sess_data = $this->session->userdata();
		$data['user'] = $this->M_assesmen->tampil_user_siswa()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_terapis', $sess_data);
		$this->load->view('cari_bulan_dtt_terapis',$data);
		$this->load->view('template/footer');
	}

	public function cari_dtt()
	{
		$sess_data 		= $this->session->userdata();
		$bulan    		= $this->input->get('bulan');
		$tahun    		= $this->input->get('tahun');
		$id_user    	= $this->input->get('id_user');
		$data['tampil_data_dtt'] = $this->M_assesmen->tampil_data_dtt($bulan,$tahun,$id_user)->result();
		$data['tampil_jumlah_dtt'] = $this->M_assesmen->tampil_data_dtt($bulan,$tahun,$id_user)->num_rows();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_terapis', $sess_data);
		$this->load->view('rata_dtt_terapis',$data);
		$this->load->view('template/footer');
	}


	public function proses_hitung_dtt()
	{
		$sess_data 		= $this->session->userdata();
		$bulan    		= $this->input->post('bulan');
		$tahun    		= $this->input->post('tahun');
		$data    		= $this->input->post('data');
		$perhitungan	= $this->input->post('perhitungan');
		$id_user		= $this->input->post('id_user');



		$rata=$perhitungan/$data;

		$rata_penilaian=$this->M_assesmen->tampil_rata_penilaian_dt()->result();
		$rata_penilaian2= $this->M_assesmen->tampil_rata_penilaian_dt()->num_rows();

  
        
        for ($i=0; $i < $rata_penilaian2; $i++) {

			$jarak= json_decode( json_encode($rata_penilaian), true);
			$rata2[$i] = $jarak[$i]['rata'];
			$kategori2 = $jarak[$i]['kategori'];
			$hasil[$i] = ['rata'=>sqrt(($rata-$rata2[$i])*($rata-$rata2[$i])),'kategori'=>$kategori2];

		}

		sort($hasil);
		$clength = count($hasil);
		for($x = 0; $x < $clength; $x++) {
		  $hasil[$x];
		}

		$k=3;
		$knn = array_slice($hasil, 0, $k);


		$kategori_baik = 0;
		$kategori_cukup = 0;
		$kategori_kurang = 0;

		for ($row = 0; $row < 3; $row++) {
			if($knn[$row]["kategori"]=="Baik") {
				 $kategori_baik++;
			}
			if($knn[$row]["kategori"]=="Cukup") {
				$kategori_cukup++;
		   }
		   if($knn[$row]["kategori"]=="Kurang") {
			$kategori_kurang++;
	   }
		}

		$kategori_baik = $kategori_baik ."Baik";
		$kategori_cukup = $kategori_cukup ."Cukup";
		$kategori_kurang = $kategori_kurang ."Kurang";

		// echo(max($kategori_baik,$kategori_cukup,$kategori_kurang));

		$kategori = "-";
		if (strpos(max($kategori_baik,$kategori_cukup,$kategori_kurang),"Baik")!== false) {
			$kategori = "Baik";
		}
		if (strpos(max($kategori_baik,$kategori_cukup,$kategori_kurang),"Cukup")!== false) {
			$kategori = "Cukup";
		}
		if (strpos(max($kategori_baik,$kategori_cukup,$kategori_kurang),"Kurang")!== false) {
			$kategori = "Kurang";
		}


		$data = array(
			'id_user' => $id_user,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'rata' => $rata,
			'kategori' => $kategori
		);

		$data2 = array(
			'rata' => $rata,
			'kategori' => $kategori
		);

		$where = array(
			'id_user' => $id_user,
			'bulan' => $bulan,
			'tahun' => $tahun
		);


		$cek_inputan= $this->M_assesmen->cek_dtt($id_user,$bulan,$tahun)->num_rows();

		if ($cek_inputan==0) {
			$this->M_assesmen->insert_perhitungan_dtt($data, 'perhitungan_dtt');
		}

		if ($cek_inputan==1) {
			$this->M_assesmen->update_perhitungan_dtt($where,$data, 'perhitungan_dtt');
		}


		$this->load->view('berhasil_hitung_dtt',$data);

	}
	
	public function rekap_penilaian()
	{
		$sess_data = $this->session->userdata();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_terapis', $sess_data);
		$this->load->view('rekap_penilaian_terapis');
		$this->load->view('template/footer');
	}

	public function rekap_dt()
	{
		$sess_data = $this->session->userdata();
		$data['user'] = $this->M_assesmen->tampil_user_siswa_rekap()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_terapis', $sess_data);
		$this->load->view('rekap_dt_terapis',$data);
		$this->load->view('template/footer');
	}

	public function rekap_hasil_dt($id)
	{
		$sess_data = $this->session->userdata();
		$data['rekap'] = $this->M_assesmen->tampil_rekap_bulan_dt($id)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_terapis', $sess_data);
		$this->load->view('rekap_hasil_dt_terapis',$data);
		$this->load->view('template/footer');
	}

	public function rekap_hasil_bulanan_dt()
	{

		$sess_data 		= $this->session->userdata();
		$bulan    		= $this->input->get('bulan');
		$tahun    		= $this->input->get('tahun');
		$id_user    		= $this->input->get('id');

		$data['penilaian_dt'] = $this->M_assesmen->tampildt_siswa($id_user,$bulan,$tahun)->result();

		$this->load->view('template/header');
		$this->load->view('template/sidebar_terapis', $sess_data);
		$this->load->view('penilaian_dt_user_terapis',$data);
		$this->load->view('template/footer');
	}

	public function rekap_dtt()
	{
		$sess_data = $this->session->userdata();
		$data['user'] = $this->M_assesmen->tampil_user_siswa_rekap()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_terapis', $sess_data);
		$this->load->view('rekap_dtt_terapis',$data);
		$this->load->view('template/footer');
	}

	public function rekap_hasil_dtt($id)
	{
		$sess_data = $this->session->userdata();
		$data['rekap'] = $this->M_assesmen->tampil_rekap_bulan_dtt($id)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_terapis', $sess_data);
		$this->load->view('rekap_hasil_dtt_terapis',$data);
		$this->load->view('template/footer');
	}

	public function rekap_hasil_bulanan_dtt()
	{

		$sess_data 		= $this->session->userdata();
		$bulan    		= $this->input->get('bulan');
		$tahun    		= $this->input->get('tahun');
		$id_user    		= $this->input->get('id');

		$data['penilaian_dt'] = $this->M_assesmen->tampildtt_siswa($id_user,$bulan,$tahun)->result();

		$this->load->view('template/header');
		$this->load->view('template/sidebar_terapis', $sess_data);
		$this->load->view('penilaian_dtt_user_terapis',$data);
		$this->load->view('template/footer');
	}


	public function grafik()
	{
		$sess_data = $this->session->userdata();
		$data['user'] = $this->M_assesmen->tampil_user_siswa_rekap()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_terapis', $sess_data);
		$this->load->view('grafik_cariuser_terapis',$data);
		$this->load->view('template/footer');
	}

	public function grafik_hasil($id)
	{
		$sess_data = $this->session->userdata();
		$data['rekap'] = $this->M_assesmen->tampil_rekap_bulan_dt($id)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_terapis', $sess_data);
		$this->load->view('grafik_hasil_terapis',$data);
		$this->load->view('template/footer');
	}
	
	public function tampil_grafik()
	{

		$sess_data 		= $this->session->userdata();
		$bulan    		= $this->input->get('bulan');
		$tahun    		= $this->input->get('tahun');
		$id_user    		= $this->input->get('id');
		$nama    		= $this->input->get('nama');

		$data['nama']=$nama;
		$data['penilaian_dt'] = $this->M_assesmen->tampildt_siswa($id_user,$bulan,$tahun)->result();
		$data['penilaian_dtt'] = $this->M_assesmen->tampildtt_siswa($id_user,$bulan,$tahun)->result();


		$this->load->view('template/header');
		$this->load->view('template/sidebar_terapis', $sess_data);
		$this->load->view('tampil_grafik_terapis',$data);
		$this->load->view('template/footer');
	}

		public function logout(){
			$this->session->sess_destroy();
			redirect(base_url('adminuser/login'));    
		}

}
