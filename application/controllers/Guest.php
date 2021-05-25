<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * author ryanadi
 */

class Guest extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Model_Guest');

			if ($this->session->userdata('email') !== null) {
            redirect('welcome/donthaveaccess');
        }

			
		}
		

		public function index()
		{
			
			$data['title'] = 'Mejapintar';

			
			$data['feedback'] = $this->Model_Guest->get_feedback();
			
			
			
			$this->load->view('page/guest_header', $data);
			$this->load->view('guest/guest',$data);
			$this->load->view('page/guest_footer');
			
		}

		public function search_all()
		{
			$data['title'] = 'Mejapintar';
			$data['user'] = $this->Model_Guest->datauser();
	        $data['profil'] = $this->Model_Guest->profil($data['user']['id_user']);
			$data['keyword'] = $this->input->get('input');
			$data['materi'] = $this->Model_Guest->keyword_all($data['keyword']);

			$this->load->view('page/guest_header', $data);
	        $this->load->view('guest/search', $data);
	        $this->load->view('page/guest_footer');
			
		}

		public function materi_sd()
		{
			$keyword_math = $this->input->post('keyword_math');
			$keyword_ind = $this->input->post('keyword_ind');
			$keyword_english = $this->input->post('keyword_english');
			$keyword_ipa = $this->input->post('keyword_ipa'); 
			$data['title'] = 'Mejapintar';
			$data['matematika'] = $this->Model_Guest->get_math($keyword_math);
			$data['indonesia'] = $this->Model_Guest->get_ind($keyword_ind);
			$data['english'] = $this->Model_Guest->get_english($keyword_english);
			$data['ipa'] = $this->Model_Guest->get_ipa($keyword_ipa);
			$this->load->view('page/guest_header', $data);
			$this->load->view('guest/materi_sd',$data);
			$this->load->view('page/guest_footer');
		}

		public function materi_smp()
		{
			$keyword_math = $this->input->post('keyword_math');
			$keyword_ind = $this->input->post('keyword_ind');
			$keyword_english = $this->input->post('keyword_english');
			$keyword_ipa = $this->input->post('keyword_ipa');
			$data['title'] = 'Mejapintar';
			$data['matematika'] = $this->Model_Guest->get_math2($keyword_math);
			$data['indonesia'] = $this->Model_Guest->get_ind2($keyword_ind);
			$data['english'] = $this->Model_Guest->get_english2($keyword_english);
			$data['ipa'] = $this->Model_Guest->get_ipa2($keyword_ipa);
			$this->load->view('page/guest_header', $data);
			$this->load->view('guest/materi_smp',$data);
			$this->load->view('page/guest_footer');
		}

		public function materi_smak()
		{
			$keyword_math = $this->input->post('keyword_math');
			$keyword_ind = $this->input->post('keyword_ind');
			$keyword_english = $this->input->post('keyword_english');
			$keyword_ipa = $this->input->post('keyword_ipa'); 
			$data['title'] = 'Mejapintar';
			$data['matematika'] = $this->Model_Guest->get_math3($keyword_math);
			$data['indonesia'] = $this->Model_Guest->get_ind3($keyword_ind);
			$data['english'] = $this->Model_Guest->get_english3($keyword_english);
			$data['ipa'] = $this->Model_Guest->get_ipa3($keyword_ipa);
			$this->load->view('page/guest_header', $data);
			$this->load->view('guest/materi_smak',$data);
			$this->load->view('page/guest_footer');
		}

		public function about()
		{
			$data['title'] = 'Mejapintar';
			$data['feedback'] = $this->Model_Guest->get_feedback();
			$this->load->view('page/guest_header', $data);
			$this->load->view('guest/about',$data);
			$this->load->view('page/guest_footer');
		}

		
	}

?>