<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$datauser = $this->session->userdata('login');
		if ($datauser != "Berhasil") {
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







	//  PROJEK ASSESMEN
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
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('dashboard_admin',$data);
		$this->load->view('template/footer');
	}

	public function data_siswa()
	{
		$sess_data = $this->session->userdata();
		$data['data_siswa'] = $this->M_assesmen->tampildatasiswa_assesmen()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('data_siswa', $data);
		$this->load->view('template/footer');
	}

	public function tambahsiswa()
	{
		$nama    			= $this->input->post('nama');
		$no_induk           = $this->input->post('no_induk');
		$jk           		= $this->input->post('jk');
		$alamat       		= $this->input->post('alamat');
		$email       		= $this->input->post('email');
		$tempat_lahir       = $this->input->post('tempat_lahir');
		$tanggal_lahir      = $this->input->post('tanggal_lahir');
		$rombel       		= $this->input->post('rombel');
		$layak_pip       	= $this->input->post('layak_pip');
		$role       		= $this->input->post('role');


		$data = array(
			'nama' => $nama,
			'no_induk' => $no_induk,
			'jk' => $jk,
			'alamat' => $alamat,
			'email' => $email,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'rombel' => $rombel,
			'layak_pip' => $layak_pip,
			'role' => $role

		);

		$this->M_assesmen->tambahsiswa($data, 'user');
		redirect(base_url('home/data_siswa'));

	}

	public function hapus_siswa($id)
	{
		$where = array('id_user' => $id);
		$this->M_assesmen->hapus_siswa('user', $where);
		redirect(base_url('home/data_siswa'));
	}

	public function edit_siswa($id)
	{
		$sess_data = $this->session->userdata();
		$data['edit_siswa'] = $this->M_assesmen->tampildatasiswa_assesmen_byid($id)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('edit_siswa', $data);
		$this->load->view('template/footer');
	}

	public function update_siswa()
	{
		$id_user    		= $this->input->post('id_user');
		$nama    			= $this->input->post('nama');
		$no_induk           = $this->input->post('no_induk');
		$jk           		= $this->input->post('jk');
		$alamat       		= $this->input->post('alamat');
		$email       		= $this->input->post('email');
		$tempat_lahir       = $this->input->post('tempat_lahir');
		$tanggal_lahir      = $this->input->post('tanggal_lahir');
		$rombel       		= $this->input->post('rombel');
		$layak_pip       	= $this->input->post('layak_pip');
		$role       		= $this->input->post('role');


		$data = array(
			'nama' => $nama,
			'no_induk' => $no_induk,
			'jk' => $jk,
			'alamat' => $alamat,
			'email' => $email,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'rombel' => $rombel,
			'layak_pip' => $layak_pip,
			'role' => $role

		);

		$where = array(
			'id_user' => $id_user
		);

		$this->M_assesmen->updatesiswa($where, $data, 'user');
		$this->load->view('berhasil_ubah_siswa');
	}



	public function data_admin()
	{
		$sess_data = $this->session->userdata();
		$data['data_admin'] = $this->M_assesmen->tampildataadmin_assesmen()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('data_admin', $data);
		$this->load->view('template/footer');
	}

	public function tambahadmin()
	{
		$nama    			= $this->input->post('nama');
		$no_induk           = $this->input->post('no_induk');
		$jk           		= $this->input->post('jk');
		$alamat       		= $this->input->post('alamat');
		$email       		= $this->input->post('email');
		$tempat_lahir       = $this->input->post('tempat_lahir');
		$tanggal_lahir      = $this->input->post('tanggal_lahir');
		$rombel       		= $this->input->post('rombel');
		$layak_pip       	= $this->input->post('layak_pip');
		$role       		= $this->input->post('role');


		$data = array(
			'nama' => $nama,
			'no_induk' => $no_induk,
			'jk' => $jk,
			'alamat' => $alamat,
			'email' => $email,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'rombel' => $rombel,
			'layak_pip' => $layak_pip,
			'role' => $role

		);

		$this->M_assesmen->tambahadmin($data, 'user');
		redirect(base_url('home/data_admin'));

	}

	public function hapus_admin($id)
	{
		$where = array('id_user' => $id);
		$this->M_assesmen->hapus_admin('user', $where);
		redirect(base_url('home/data_admin'));
	}

	public function edit_admin($id)
	{
		$sess_data = $this->session->userdata();
		$data['edit_admin'] = $this->M_assesmen->tampildataadmin_assesmen_byid($id)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('edit_admin', $data);
		$this->load->view('template/footer');
	}

	public function update_admin()
	{
		$id_user    		= $this->input->post('id_user');
		$nama    			= $this->input->post('nama');
		$no_induk           = $this->input->post('no_induk');
		$jk           		= $this->input->post('jk');
		$alamat       		= $this->input->post('alamat');
		$email       		= $this->input->post('email');
		$tempat_lahir       = $this->input->post('tempat_lahir');
		$tanggal_lahir      = $this->input->post('tanggal_lahir');
		$rombel       		= $this->input->post('rombel');
		$layak_pip       	= $this->input->post('layak_pip');
		$role       		= $this->input->post('role');


		$data = array(
			'nama' => $nama,
			'no_induk' => $no_induk,
			'jk' => $jk,
			'alamat' => $alamat,
			'email' => $email,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'rombel' => $rombel,
			'layak_pip' => $layak_pip,
			'role' => $role

		);

		$where = array(
			'id_user' => $id_user
		);

		$this->M_assesmen->updateadmin($where, $data, 'user');
		$this->load->view('berhasil_ubah_admin');
	}


	public function program()
	{
		$sess_data = $this->session->userdata();
		$data['program'] = $this->M_assesmen->tampilprogram()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('program', $data);
		$this->load->view('template/footer');
	}


	public function tambahprogram()
	{
		$data = array(
			'kode_program' => $this->input->post('kode_program'),
			'nama_program' => $this->input->post('nama_program')
		);

		$this->M_assesmen->tambahprogram($data, 'program');
		redirect(base_url('home/program'));

	}

	public function hapus_program($id)
	{
		$where = array('id_program' => $id);
		$this->M_assesmen->hapus_program('program', $where);
		redirect(base_url('home/program'));
	}

	public function edit_program($id)
	{
		$sess_data = $this->session->userdata();
		$data['edit_program'] = $this->M_assesmen->tampildataprogram_byid($id)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('edit_program', $data);
		$this->load->view('template/footer');
	}

	public function update_program()
	{
		$data = array(
			'kode_program' => $this->input->post('kode_program'),
			'nama_program' => $this->input->post('nama_program')
		);

		$where = array(
			'id_program' => $this->input->post('id_program'),
		);

		$this->M_assesmen->updateprogram($where, $data, 'program');
		$this->load->view('berhasil_ubah_program');
	}
	


	public function aktivitas()
	{
		$sess_data = $this->session->userdata();
		$data['aktivitas'] = $this->M_assesmen->tampilaktivitas()->result();
		$data['program'] = $this->M_assesmen->tampilprogram()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('aktivitas', $data);
		$this->load->view('template/footer');
	}

	public function tambahaktivitas()
	{
		$data = array(
			'id_program' => $this->input->post('id_program'),
			'aktivitas' => $this->input->post('aktivitas')
		);

		$this->M_assesmen->tambahaktivitas($data, 'aktivitas');
		redirect(base_url('home/aktivitas'));

	}

	public function hapus_aktivitas($id)
	{
		$where = array('id_aktivitas' => $id);
		$this->M_assesmen->hapus_aktivitas('aktivitas', $where);
		redirect(base_url('home/aktivitas'));
	}

	public function edit_aktivitas($id)
	{
		$sess_data = $this->session->userdata();
		$data['edit_aktivitas'] = $this->M_assesmen->tampildataaktivitas_byid($id)->result();
		$data['program'] = $this->M_assesmen->tampilprogram()->result();
		$data['program2'] = $this->M_assesmen->tampilprogram_byid($id)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('edit_aktivitas', $data);
		$this->load->view('template/footer');
	}


	public function update_aktivitas()
	{
		$data = array(
			'id_program' => $this->input->post('id_program'),
			'aktivitas' => $this->input->post('aktivitas')
		);

		$where = array(
			'id_aktivitas' => $this->input->post('id_aktivitas'),
		);

		$this->M_assesmen->updateaktivitas($where, $data, 'aktivitas');
		$this->load->view('berhasil_ubah_aktivitas');
	}

	public function penilaian_dt()
	{
		$sess_data = $this->session->userdata();
		$data['penilaian_dt'] = $this->M_assesmen->tampildt()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('penilaian_dt', $data);
		$this->load->view('template/footer');
	}

	public function tambah_dt()
	{
		$sess_data = $this->session->userdata();
		$data['tampil_user'] = $this->M_assesmen->tampil_user()->result();
		$data['tampil_program'] = $this->M_assesmen->tampil_program_input()->result();
		$data['tampil_aktivitas'] = $this->M_assesmen->tampil_aktivitas_input()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('tambah_dt',$data);
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
		redirect(base_url('home/penilaian_dt'));
	}

	public function edit_dt($id)
	{
		$sess_data = $this->session->userdata();
		$data['edit_dt'] = $this->M_assesmen->tampilpenilaiandt_byid($id)->result();
		$data['tampil_user'] = $this->M_assesmen->tampil_user()->result();
		$data['tampil_program'] = $this->M_assesmen->tampil_program_input()->result();
		$data['tampil_aktivitas'] = $this->M_assesmen->tampil_aktivitas_input()->result();

		// $data['program'] = $this->M_assesmen->tampilprogram()->result();
		// $data['program2'] = $this->M_assesmen->tampilprogram_byid($id)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('edit_dt', $data);
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
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('penilaian_dtt', $data);
		$this->load->view('template/footer');
	}

	public function tambah_dtt()
	{
		$sess_data = $this->session->userdata();
		$data['tampil_user'] = $this->M_assesmen->tampil_user()->result();
		$data['tampil_program'] = $this->M_assesmen->tampil_program_input()->result();
		$data['tampil_aktivitas'] = $this->M_assesmen->tampil_aktivitas_input()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('tambah_dtt',$data);
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
		redirect(base_url('home/penilaian_dtt'));
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
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('edit_dtt', $data);
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
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('cari_bulan_dt',$data);
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
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('rata_dt',$data);
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
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('cari_bulan_dtt',$data);
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
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('rata_dtt',$data);
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
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('rekap_penilaian');
		$this->load->view('template/footer');
	}

	public function rekap_dt()
	{
		$sess_data = $this->session->userdata();
		$data['user'] = $this->M_assesmen->tampil_user_siswa_rekap()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('rekap_dt',$data);
		$this->load->view('template/footer');
	}

	public function rekap_hasil_dt($id)
	{
		$sess_data = $this->session->userdata();
		$data['rekap'] = $this->M_assesmen->tampil_rekap_bulan_dt($id)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('rekap_hasil_dt',$data);
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
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('penilaian_dt_user',$data);
		$this->load->view('template/footer');
	}

	public function rekap_dtt()
	{
		$sess_data = $this->session->userdata();
		$data['user'] = $this->M_assesmen->tampil_user_siswa_rekap()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('rekap_dtt',$data);
		$this->load->view('template/footer');
	}

	public function rekap_hasil_dtt($id)
	{
		$sess_data = $this->session->userdata();
		$data['rekap'] = $this->M_assesmen->tampil_rekap_bulan_dtt($id)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('rekap_hasil_dtt',$data);
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
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('penilaian_dtt_user',$data);
		$this->load->view('template/footer');
	}

	public function grafik()
	{
		$sess_data = $this->session->userdata();
		$data['user'] = $this->M_assesmen->tampil_user_siswa_rekap()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('grafik_cariuser',$data);
		$this->load->view('template/footer');
	}

	public function grafik_hasil($id)
	{
		$sess_data = $this->session->userdata();
		$data['rekap'] = $this->M_assesmen->tampil_rekap_bulan_dt($id)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('grafik_hasil',$data);
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
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('tampil_grafik',$data);
		$this->load->view('template/footer');
	}

	
	// public function rata_dt()
	// {
	// 	$sess_data = $this->session->userdata();
	// 	$data['rata_dt'] = $this->M_assesmen->tampil_rata()->result();
	// 	$this->load->view('template/header');
	// 	$this->load->view('template/sidebar', $sess_data);
	// 	$this->load->view('rata_dt', $data);
	// 	$this->load->view('template/footer');
	// }
		//  PROJEK ASSESMEN


	


















		
	public function progress_data()
	{
		$this->load->model('M_ppdb');
		$sess_data = $this->session->userdata();
		$data['tampilsekolah'] = $this->M_ppdb->tampilsekolah()->result();
		$data['kecamatan'] = $this->M_ppdb->tampilkuotawilayah();


		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('progress_data',$data);
		$this->load->view('template/footer');
	}


	public function data_balikan()
	{
		$this->load->model('M_ppdb');
		$sess_data = $this->session->userdata();
		$data['tampilsekolah'] = $this->M_ppdb->tampilsekolah()->result();
		$data['kecamatan'] = $this->M_ppdb->data_balikan()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('data_balikan',$data);
		$this->load->view('template/footer');
	}


	public function tampil_sekolah_wilayah($id)
	{
		$this->load->model('M_ppdb');
		$sess_data = $this->session->userdata();
		$data['tampil_sekolah_wilayah'] = $this->M_ppdb->tampil_sekolah_wilayah($id)->result();
		$data['tampil_sekolah_wilayah2'] = $this->M_ppdb->tampil_sekolah_wilayah2($id)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('tampil_sekolah_wilayah',$data);
		$this->load->view('template/footer');
	}


	public function getDesaByWilayah()
	{
		$post = $this->input->post(NULL, TRUE);
		$where['kode_wilayah'] = $post['kode_wilayah'];
		$desa = $this->M_ppdb->getData('data_desa', $where);

		if (count($desa)) {
			$result = array(
				'status' => 'success',
				'data' => $desa
			);
		}
		else {
			$result = array(
				'status' => 'failed',
				'msg' => 'Data Tidak Ditemukan'
			);
		}

		echo json_encode($result);
	}

	public function getSekolahByDesa()
	{
		$post = $this->input->post(NULL, TRUE);
		$where['z.id_desa'] = $post['id_desa'];
		$sekolah = $this->M_ppdb->getZonasi($where);

		if (count($sekolah)) {
			$result = array(
				'status' => 'success',
				'data' => $sekolah
			);
		}
		else {
			$result = array(
				'status' => 'failed',
				'msg' => 'Data Tidak Ditemukan'
			);
		}

		echo json_encode($result);
	}

	public function kuota()
	{
		$data['kuota2'] = $this->M_ppdb->tampilsekolah_kuota()->result();
		$data['kuota'] 	= $this->M_ppdb->tampil_data_kuota();
		$data['js']		= 'kuota';
		$sess_data = $this->session->userdata();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('kuota', $data);
		$this->load->view('template/footer');
	}

	public function tambahkuota()
	{
		$post = $this->input->post(NULL, TRUE);
		$id_sekolah  = $post['id_sekolah'];
		$total       = $post['total'];
		$zonasi      = $post['zonasi'];
		$afirmasi    = $post['afirmasi'];
		$pindahan    = $post['pindahan'];
		$prestasi    = $post['prestasi'];
		$umum    	 = $post['umum'];

		$data = array(
			'id_sekolah' => $id_sekolah,
			'total' => $total,
			'sisa_zonasi' => $zonasi,
			'sisa_afirmasi' => $afirmasi,
			'sisa_pindahan' => $pindahan,
			'sisa_prestasi' => $prestasi,
			'sisa_umum' => $umum,
			'total_in' => 0,
		);

		$this->M_ppdb->tambahkuota($data, 'kuota');
		redirect(base_url('home/kuota'));
	}

	public function getDetailKuota()
	{
		$post = $this->input->post(NULL, TRUE);
		$where['id_kuota'] = $post['id_kuota'];
		$kuota = $this->M_ppdb->tampil_data_kuota($where);

		if (count($kuota)) {
			$result = array(
				'status' => 'success',
				'data' => $kuota
			);
		}
		else {
			$result = array(
				'status' => 'failed',
				'msg' => 'Data Tidak Ditemukan'
			);
		}

		echo json_encode($result);
	}

	public function tambahpengguna_sekolah()
	{
		$id_pesertadidik    = $this->input->post('id_pesertadidik');
		$username           = $this->input->post('username');
		$password           = $this->input->post('password');
		$nama_sekolah       = $this->input->post('nama_sekolah');

		$data = array(
			'id_pesertadidik' => $id_pesertadidik,
			'username' => $username,
			'password' => $password,
			'role' => "1",
			'approve_formulir' 	=> $nama_sekolah,
			'approve_lulus' 	=> $nama_sekolah,
			'approve_daftarulang' => $nama_sekolah,
			'status' => 0

		);

		$hitungusername = $this->M_ppdb->tampilakunsekolah($id_pesertadidik)->num_rows();

		if ($hitungusername >= 1) {
			$this->load->view('username_gagal');
		} else {
			$this->M_ppdb->tambahuser($data, 'pengguna');
			$this->load->view('akunsekolah_sukses');
		}
	}

	public function hapuskuota($id)
	{
		$id =    array('id_kuota' => $id);
		$this->M_ppdb->hapuskuota($id, 'kuota');
		redirect(base_url('home/kuota'));
	}

	public function hapus_sekolah($id)
	{
		$id =    array('id' => $id);
		$this->M_ppdb->hapus_sekolah($id, 'pengguna');
		redirect(base_url('home/data_sekolah'));
	}

	public function editkuota($id)
	{
		$post = $this->input->post(NULL, TRUE);
		$id_sekolah  = $post['id_sekolah'];
		$total       = $post['total'];
		$zonasi      = $post['zonasi'];
		$afirmasi    = $post['afirmasi'];
		$pindahan    = $post['pindahan'];
		$prestasi    = $post['prestasi'];
		$umum		 = $post['umum'];

		$data = array(
			'id_sekolah' => $id_sekolah,
			'total' => $total,
			'sisa_zonasi' => $zonasi,
			'sisa_afirmasi' => $afirmasi,
			'sisa_pindahan' => $pindahan,
			'sisa_prestasi' => $prestasi,
			'sisa_umum' => $umum,
		);
		$where['id_kuota']	= $id;

		$this->M_ppdb->updatekuota($where, $data);
		redirect(base_url('home/kuota'));
	}

	public function edit_sekolah($id)
	{
		$sess_data = $this->session->userdata();
		$id =    array('id' => $id);
		$data['data_sekolah'] = $this->M_ppdb->edit_sekolah($id, 'pengguna')->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('edit_sekolah', $data);
		$this->load->view('template/footer');
	}

	public function updatekuota()
	{
		$id       = $this->input->post('id');
		$jenis       = $this->input->post('jenis');
		$kuota        = $this->input->post('kuota');
		$keterangan        = $this->input->post('keterangan');


		$data = array(
			'jenis' => $jenis,
			'kuota' => $kuota,
			'keterangan' => $keterangan

		);

		$where = array(
			'id' => $id
		);

		$this->M_ppdb->updatekuota($where, $data, 'kuota');
		$this->load->view('berhasil_ubah');
		$this->load->view('kuota');
	}

	public function approve_formulir()
	{
		$data['formulir'] = $this->M_ppdb->tampil_approval()->result();
		$sess_data = $this->session->userdata();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('approve_formulir', $data);
		$this->load->view('template/footer');
	}

	public function data_sekolah()
	{
		$data['pengguna2'] = $this->M_ppdb->tampilsekolah_kuota()->result();
		$data['data_sekolah'] = $this->M_ppdb->tampilsekolah_admin()->result();
		$sess_data = $this->session->userdata();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('data_sekolah', $data);
		$this->load->view('template/footer');
	}

	public function cetak_kartu($id)
	{
		$sess_data = $this->session->userdata();
		$id =    array('id' => $id);
		$data['cetak_kartu'] = $this->M_ppdb->tampilpengguna($id, 'pengguna')->result();
		$data2 = $this->M_ppdb->tampilpengguna($id, 'pengguna')->result();

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('cetak_kartu2', $data);
		$this->load->view('template/footer');
	}

	public function update_sekolah()
	{
		$id    = $this->input->post('id');
		$id_pesertadidik    = $this->input->post('id_pesertadidik');
		$username           = $this->input->post('username');
		$password           = $this->input->post('password');
		$approve_formulir       = $this->input->post('approve_formulir');



		$data = array(
			'id_pesertadidik' => $id_pesertadidik,
			'username' => $username,
			'password' => $password,
			'role' => "1",
			'approve_formulir' 	=> $approve_formulir,
			'approve_lulus' 	=> $approve_formulir,
			'approve_daftarulang' => $approve_formulir,
			'status' => 0

		);

		$where = array(
			'id' => $id
		);

		$this->M_ppdb->update_sekolah($where, $data, 'pengguna');
		$this->load->view('berhasil_ubah_sekolah');
	}

	public function editapproval($id)
	{
		$sess_data = $this->session->userdata();
		$id =    array('id' => $id);
		$data['approval'] = $this->M_ppdb->tampilpengguna($id, 'pengguna')->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('editapproval', $data);
		$this->load->view('template/footer');
	}

	public function updateapproval()
	{
		$id                = $this->input->post('id');
		$nama              = $this->input->post('nama');
		$tptlahir              = $this->input->post('tptlahir');
		$tgllahir              = $this->input->post('tgllahir');
		$jenis             = $this->input->post('jenis');
		$nisn              = $this->input->post('nisn');
		$alamat            = $this->input->post('alamat');
		$sekolah_asal      = $this->input->post('sekolah_asal');
		$namaayah              = $this->input->post('namaayah');
		$namaibu              = $this->input->post('namaibu');
		$no_wa              = $this->input->post('no_wa');
		$akte          = $this->input->post('akte');
		$no_hp             = $this->input->post('no_hp');
		$foto             = $this->input->post('foto');
		$bukti_tf          = $this->input->post('bukti_tf');
		$username          = $this->input->post('username');
		$password          = $this->input->post('password');
		$role              = $this->input->post('role');
		$approve_formulir       = $this->input->post('approve_formulir');
		$approve_lulus          = $this->input->post('approve_lulus');
		$approve_daftarulang    = $this->input->post('approve_daftarulang');



		$data = array(
			'nama_lengkap' => $nama,
			'tptlahir' => $tptlahir,
			'tgllahir' => $tgllahir,
			'namaayah' => $namaayah,
			'namaibu' => $namaibu,
			'no_wa' => $no_wa,
			'akte' => $akte,
			'jenis' => $jenis,
			'nisn' => $nisn,
			'alamat' => $alamat,
			'sekolah_asal' => $sekolah_asal,
			'no_hp' => $no_hp,
			'foto' => $foto,
			'bukti_tf' => $bukti_tf,
			'username' => $username,
			'password' => $password,
			'role' => $role,
			'approve_formulir' => $approve_formulir,
			'approve_lulus' => $approve_lulus,
			'approve_daftarulang' => $approve_daftarulang
		);

		$where = array(
			'id' => $id
		);
		$this->M_ppdb->updateformulir($where, $data, 'pengguna');
		$this->load->view('berhasil_ubah_formulir');
		$this->load->view('approve_formulir');
	}


	public function cetakformulir()
	{
		// membaca data dari form
		$jenis      	 = $this->input->post('jenis');
		$nama            = $this->input->post('nama');
		$nisn	         = $this->input->post('nisn');
		$alamat	         = $this->input->post('alamat');
		$sekolah_asal    = $this->input->post('sekolahasal');
		$no_hp           = $this->input->post('no_hp');

		// memanggil dan membaca template dokumen yang telah kita buat
		$document = file_get_contents("formulir_pendaftaran.rtf");

		// isi dokumen dinyatakan dalam bentuk string
		$document = str_replace("#JENIS", $jenis, $document);
		$document = str_replace("#NAMA", $nama, $document);
		$document = str_replace("#NISN", $nisn, $document);
		$document = str_replace("#ALAMAT", $alamat, $document);
		$document = str_replace("#SEKOLAHASAL", $sekolah_asal, $document);
		$document = str_replace("#NO_HP", $no_hp, $document);

		// header untuk membuka file output RTF dengan MS. Word

		header("Content-type: application/msword");
		header("Content-disposition: inline; filename=formulir_pendaftaran.doc");
		header("Content-length: " . strlen($document));
		echo $document;
	}

	public function approve_lulus()
	{
		$data['lulus'] = $this->M_ppdb->tampil_lulus()->result();
		$sess_data = $this->session->userdata();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('approve_lulus', $data);
		$this->load->view('template/footer');
	}

	public function editlulus($id)
	{
		$sess_data = $this->session->userdata();
		$id =    array('id' => $id);
		$data['lulus'] = $this->M_ppdb->tampilpengguna($id, 'pengguna')->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('editlulus', $data);
		$this->load->view('template/footer');
	}

	public function updatelulus()
	{
		$id                = $this->input->post('id');
		$nama              = $this->input->post('nama');
		$tptlahir              = $this->input->post('tptlahir');
		$tgllahir              = $this->input->post('tgllahir');
		$jenis             = $this->input->post('jenis');
		$nisn              = $this->input->post('nisn');
		$alamat            = $this->input->post('alamat');
		$sekolah_asal      = $this->input->post('sekolah_asal');
		$namaayah              = $this->input->post('namaayah');
		$namaibu              = $this->input->post('namaibu');
		$no_wa              = $this->input->post('no_wa');
		$akte          = $this->input->post('akte');
		$no_hp             = $this->input->post('no_hp');
		$foto             = $this->input->post('foto');
		$bukti_tf          = $this->input->post('bukti_tf');
		$username          = $this->input->post('username');
		$password          = $this->input->post('password');
		$role              = $this->input->post('role');
		$approve_formulir       = $this->input->post('approve_formulir');
		$approve_lulus          = $this->input->post('approve_lulus');
		$approve_daftarulang    = $this->input->post('approve_daftarulang');



		$data = array(
			'nama_lengkap' => $nama,
			'tptlahir' => $tptlahir,
			'tgllahir' => $tgllahir,
			'namaayah' => $namaayah,
			'namaibu' => $namaibu,
			'no_wa' => $no_wa,
			'akte' => $akte,
			'jenis' => $jenis,
			'nisn' => $nisn,
			'alamat' => $alamat,
			'sekolah_asal' => $sekolah_asal,
			'no_hp' => $no_hp,
			'foto' => $foto,
			'bukti_tf' => $bukti_tf,
			'username' => $username,
			'password' => $password,
			'role' => $role,
			'approve_formulir' => $approve_formulir,
			'approve_lulus' => $approve_lulus,
			'approve_daftarulang' => $approve_daftarulang
		);

		$where = array(
			'id' => $id
		);

		$data2 = array(
			'id' => $id, 'tingkat' => "", 'nama_lengkap' => "", 'nama_panggilan' => "", 'nisn' => "",
			'tpt_lahir' => "", 'tgl_lahir' => "", 'agama' => "", 'suku' => "", 'jk' => "", 'goldar' => "",
			'anak_ke' => "", 'dari_saudara' => "", 'alamat' => "", 'jarak' => "", 'desa' => "", 'kecamatan' => "",
			'kabupaten' => "", 'provinsi' => "", 'nama_ayah' => "", 'tptlahir_ayah' => "", 'tgllahir_ayah' => "",
			'pendidikan_ayah' => "", 'pekerjaan_ayah' => "", 'penghasilan_ayah' => "", 'alamat_ayah' => "",
			'desa_ayah' => "", 'kecamatan_ayah' => "", 'kabupaten_ayah' => "", 'provinsi_ayah' => "", 'hp_ayah' => "",
			'nama_ibu' => "", 'tptlahir_ibu' => "", 'tgllahir_ibu' => "",
			'pendidikan_ibu' => "", 'pekerjaan_ibu' => "", 'penghasilan_ibu' => "", 'alamat_ibu' => "",
			'desa_ibu' => "", 'kecamatan_ibu' => "", 'kabupaten_ibu' => "", 'provinsi_ibu' => "", 'hp_ibu' => "",
			'sekolah_asal' => "", 'npsn' => "", 'alamat_sekolah' => "", 'kabupaten_sekolah' => "", 'provinsi_sekolah' => "",
			'penyakit' => "", 'olah_raga' => "", 'seni' => "", 'tari' => "", 'lukis' => "", 'drama' => "", 'sastra' => "",
			'organisasi' => "", 'prestasi' => "", 'alasan' => "", 'tentang_sekolah' => ""
		);



		if ($approve_lulus == "Lulus") {
			$hitungid = $this->M_ppdb->hitungidlulus($id);

			if ($hitungid == 0) {
				$this->M_ppdb->tambahiddaftarulang($data2, 'daftarulang');
			}
		}

		$this->M_ppdb->updatelulus($where, $data, 'pengguna');
		$this->load->view('berhasil_ubah_lulus');
		$this->load->view('approve_lulus');
	}

	public function approve_daftarulang()
	{
		$data['daftarulang'] = $this->M_ppdb->tampil_daftarulang()->result();
		$sess_data = $this->session->userdata();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('approve_daftarulang', $data);
		$this->load->view('template/footer');
	}

	public function editdaftarulang($id)
	{
		$sess_data = $this->session->userdata();
		$id =    array('id' => $id);
		$data['daftarulang'] = $this->M_ppdb->editdaftarulang($id, 'daftarulang')->result();
		$data2['approval_daftarulang'] = $this->M_ppdb->tampilpengguna($id, 'pengguna')->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('editdaftarulang', $data);
		$this->load->view('konfirm_daftarulang', $data2);
		$this->load->view('template/footer');
	}

	public function updatedaftarulang()
	{
		$id              = $this->input->post('id');
		$nama            = $this->input->post('nama');
		$jenis      	 = $this->input->post('jenis');
		$nisn	         = $this->input->post('nisn');
		$alamat	         = $this->input->post('alamat');
		$sekolah_asal    = $this->input->post('sekolah_asal');
		$no_hp           = $this->input->post('no_hp');
		$foto            = $this->input->post('foto');
		$bukti_tf        = $this->input->post('bukti_tf');
		$username        = $this->input->post('username');
		$password        = $this->input->post('password');
		$role            = $this->input->post('role');
		$approve_formulir    = $this->input->post('approve_formulir');
		$approve_lulus       = $this->input->post('approve_lulus');
		$approve_daftarulang = $this->input->post('approve_daftarulang');



		$data = array(
			'nama_lengkap' => $nama,
			'jenis' => $jenis,
			'nisn' => $nisn,
			'alamat' => $alamat,
			'sekolah_asal' => $sekolah_asal,
			'no_hp' => $no_hp,
			'foto' => $foto,
			'bukti_tf' => $bukti_tf,
			'username' => $username,
			'password' => $password,
			'role' => $role,
			'approve_formulir' => $approve_formulir,
			'approve_lulus' => $approve_lulus,
			'approve_daftarulang' => $approve_daftarulang
		);

		$where = array(
			'id' => $id
		);
		$this->M_ppdb->updatedaftarulang($where, $data, 'pengguna');
		$this->load->view('berhasil_ubah_daftarulang');
		$this->load->view('approve_daftarulang');
	}

	public function datapengguna()
	{
		$data['pengguna'] = $this->M_ppdb->tampildatapengguna()->result();
		$sess_data = $this->session->userdata();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('datapengguna', $data);
		$this->load->view('template/footer');
	}

	public function editpengguna($id)
	{
		$data['editpengguna'] = $this->M_ppdb->tampil_data_pengguna($id)->result();
		$sess_data = $this->session->userdata();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sess_data);
		$this->load->view('editpengguna', $data);
		$this->load->view('template/footer');
	}

	public function updatedatapengguna()
	{
		$id              = $this->input->post('id');
		$nama            = $this->input->post('nama');
		$jenis      	 = $this->input->post('jenis');
		$nisn	         = $this->input->post('nisn');
		$alamat	         = $this->input->post('alamat');
		$sekolah_asal    = $this->input->post('sekolah_asal');
		$no_hp           = $this->input->post('no_hp');
		$foto            = $this->input->post('foto');
		$bukti_tf        = $this->input->post('bukti_tf');
		$username        = $this->input->post('username');
		$password        = $this->input->post('password');
		$role            = $this->input->post('role');
		$approve_formulir    = $this->input->post('approve_formulir');
		$approve_lulus       = $this->input->post('approve_lulus');
		$approve_daftarulang = $this->input->post('approve_daftarulang');



		$data = array(
			'nama_lengkap' => $nama,
			'jenis' => $jenis,
			'nisn' => $nisn,
			'alamat' => $alamat,
			'sekolah_asal' => $sekolah_asal,
			'no_hp' => $no_hp,
			'foto' => $foto,
			'bukti_tf' => $bukti_tf,
			'username' => $username,
			'password' => $password,
			'role' => $role,
			'approve_formulir' => $approve_formulir,
			'approve_lulus' => $approve_lulus,
			'approve_daftarulang' => $approve_daftarulang
		);

		$where = array(
			'id' => $id
		);
		$this->M_ppdb->updatedatapengguna($where, $data, 'pengguna');
		$this->load->view('berhasil_ubah_password');
		$this->load->view('datapengguna');
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('adminuser/login'));
	}
}
