<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$id = $this->session->userdata('id');
		if (!$id) {
			$this->tdk_ada_sesion();
		} elseif ($this->session->userdata('level') == '1') {
			$data['title'] = $title = 'Administrator';
			$this->layout->display('DashboardV', $data);
		} elseif ($this->session->userdata('level') == '2') {
			$data['title'] = $title = 'User';
			$this->layout->display('DashUserV', $data);
		}
	}

	public function login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required',
			array('required' => 'email harus di isi')
		);
		$this->form_validation->set_rules(
			'password',
			'password',
			'required',
			array('required' => 'password harus di isi')
		);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('LoginV');
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->proses_masuk($email, $password);
		}
	}


	public function daftar()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|valid_email|is_unique[tbl_user.email]',
			array(
				'required' => 'Email Tidak Boleh Kosong',
				'is_unique' => 'Email Sudah Terdaftar',
				'valid_email' => 'Email Tidak Sah'
			)
		);

		$this->form_validation->set_rules(
			'password',
			'Password',
			'required',
			array('required' => 'Tidak Boleh Kosong')
		);

		$this->form_validation->set_rules(
			'confirm_password',
			'Password Confirmation',
			'required|matches[password]',
			array(
				'required' => 'Tidak Boleh Kosong',
				'matches' => 'Password Harus Sama'
			)
		);



		if ($this->form_validation->run() == FALSE) {
			$this->load->view('RegistV');
		} else {

			$email = $this->input->post('email', true);
			$password0 = $this->input->post('password', true);
			$password = $this->input->post('confirm_password', true);
			$data = array(
				'email' => $email,
				'password' => password_hash($password, PASSWORD_BCRYPT),
				'level' => 2,
				'aktif' => 1

			);
			$this->UserM->daftar_baru($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success " role="alert"><strong>Terimakasih telah mendaftar</strong></div>');
			redirect('login');
		}
	}


	public function proses_masuk($email, $password)
	{
		$data = $this->UserM->cek_email_member($email);
		if ($data['email'] == '') {
			$this->session->set_flashdata('error_email', 'Email salah');
			$this->load->view('LoginV');
		} else {
			if (password_verify($password, $data['password'])) {

				$this->load->library('user_agent');
				$data_browser = [
					'id_user' => $data["id"],
					'browser' => $this->agent->browser(),
					'browser_version' => $this->agent->version(),
					'os' => $this->agent->platform(),
					'waktu_login' => date("Y-m-m h:i:s"),
					'ip_address' => $this->input->ip_address()
				];

				$input_browser = $this->UserM->input_browser($data_browser);
				if ($input_browser) {
					$cookie = $this->_acak($data['id']);
					$cookie_id = $data['id'];
					$data_input_cookie = [
						'cookie' => $cookie,
						'id_user_cookie' => $data['id']
					];
					$data_update_cookie = [
						'cookie' => $cookie,
					];
					$data_session = [
						'id'  => $data['id'],
						'email'  => $data['email'],
						'level'  => $data['level']
					];
					$this->_input_cookie($data_input_cookie, $data_update_cookie, $data_session, $cookie_id);
					$this->_cookie_session($data_session, $cookie);
					$this->header->get();
				}
			} else {
				$this->session->set_flashdata('error_password', 'Dicek lagi passwordnya');
				$this->load->view('LoginV');
			}
		}
	}


	public function logout()
	{
		$this->load->helper('cookie');
		delete_cookie('id');
		$this->session->sess_destroy();
		$this->header->get();
	}

	public function tdk_ada_sesion()
	{
		$this->load->helper('cookie');
		$user_cookie = get_cookie('id');
		if (empty($user_cookie)) {
			$this->load->view('LoginV');
		} else {
			$this->cek_cookie_ke_db($user_cookie);
		}
	}

	public function cek_cookie_ke_db($user_cookie)
	{
		$data = $this->UserM->validasi_cookie($user_cookie);
		if ($data == "") {
			$this->load->view('LoginV');
		} else {
			$get = $this->UserM->get_member($data['id_user_cookie']);
			$this->load->library('user_agent');
			$data_browser = [
				'id_user' => $get->id,
				'browser' => $this->agent->browser(),
				'browser_version' => $this->agent->version(),
				'os' => $this->agent->platform(),
				'waktu_login' => date("Y-m-m h:i:s"),
				'ip_address' => $this->input->ip_address()
			];
			$input_browser = $this->UserM->input_browser($data_browser);
			if ($input_browser) {
				$cookie = $this->_acak($get->id);
				$cookie_id = $get->id;
				$data_input_cookie = [
					'cookie' => $cookie,
					'id_user_cookie' => $get->id
				];
				$data_update_cookie = [
					'cookie' => $cookie,
				];
				$data_session = [
					'id'  => $get->id,
					'email'  => $get->email,
					'level'  => $get->level
				];
				$this->_input_cookie($data_input_cookie, $data_update_cookie, $data_session, $cookie_id);
				$this->_cookie_session($data_session, $cookie);
				$this->header->get();
			}
		}
	}

	private function _acak($n)
	{
		$key = 'q6w7ert4yu8iop3asd2fgh0jk5lzx9cvb1nm';
		$text = strlen($key) - 1;
		$hasil = array();
		$hasil = '';
		for ($i = 0; $i < $n; $i++) {
			for ($j = 0; $j < 32; $j++) {
				$buat = rand(0, strlen($key) - 1);
				$hasil .= $key[$buat];
			}
		}
		return $hasil;
	}

	private function _input_cookie($data_input_cookie, $data_update_cookie, $data_session, $cookie_id)
	{

		$cek_cookie = $this->UserM->cek_cookie_db($cookie_id);
		if ($cek_cookie) {
			$this->UserM->update_cookie($data_update_cookie, $cookie_id);
			return;
		} else {
			$input_cookie = $this->UserM->input_cookie($data_input_cookie);
			return;
		}
	}

	private function _cookie_session($data_session, $cookie)
	{
		$this->load->helper('cookie');
		delete_cookie('id');
		set_cookie('id', $cookie, '604800');
		$this->session->set_userdata($data_session);
		return;
	}
}
