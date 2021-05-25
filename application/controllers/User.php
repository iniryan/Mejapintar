<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * author ryanadi
 */

class User extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Model_User');

			if (!isset($_SESSION['email'])) {
            echo redirect('welcome/errorlogin');
            exit;
	        } 
	        else if ($_SESSION['role'] != "2") {
	            echo redirect('welcome/donthaveaccess');
	            exit;
	        }
	        // else if ($this->session->userdata('activate') == "0") {
	        //     echo redirect('welcome/donthaveaccess');
	        // }
	        // else{}


		}

		public function index()
		{
			$data['title'] = 'Mejapintar';
			$data['user'] = $this->Model_User->datauser();
	        $data['profil'] = $this->Model_User->profil($data['user']['id_user']);
			// $data['video'] = $this->Model_User->get_video();

	        $this->load->view('page/user_header', $data);
	        $this->load->view('user/user', $data);
	        $this->load->view('page/user_footer');
			
		}

		public function search_all()
		{
			$data['title'] = 'Mejapintar';
			$data['user'] = $this->Model_User->datauser();
	        $data['profil'] = $this->Model_User->profil($data['user']['id_user']);
			$data['keyword'] = $this->input->get('input');
			$data['materi'] = $this->Model_User->keyword_all($data['keyword']);

			$this->load->view('page/user_header', $data);
	        $this->load->view('user/search', $data);
	        $this->load->view('page/user_footer');
			
		}

// =================================================================================================================
		
		

		public function print($nama_mapel,$id)
		{
			$this->load->library('dompdf_gen');
			$data['isi'] = $this->Model_User->isi($id);
			$this->load->view('user/laporan_pdf', $data);

			$paper_size = 'A4';
			$orientation = 'potrait';
			$html = $this->output->get_output();
			$this->dompdf->set_paper($paper_size, $orientation);
			// $this->dompdf->set('isRemoteEnabled', true);

			// $this->dompdf->load_html_file($html);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("Materi_Mejapintar.pdf", array('Attachment' => 0));
		}

		public function cetak($id)
		{
			$this->load->library('dompdf_gen');
			$data['user'] = $this->Model_User->datauser($id);
			$data['profil'] = $this->Model_User->profil($data['user']['id_user']);
			$this->load->view('user/sertifikat_pdf', $data);

			$paper_size = 'A4';
			$orientation = 'landscape';
			$html = $this->output->get_output();
			$this->dompdf->set_paper($paper_size, $orientation);
			// $this->dompdf->set('isRemoteEnabled', true);

			// $this->dompdf->load_html_file($html);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("Sertifikat_Mejapintar.pdf", array('Attachment' => 0));
		}

// ====================================================================================================================

			//delete
	    // public function hapusakun($id)
	    // {

	    //     $this->Model_User->delete_user($id);
	    //     $this->session->set_flashdata([
     //            'type' => 'success',
     //            'msg' => 'Account deleted success!!'
     //            ]);
	    //     redirect('guest');
	    // }

		public function about()
		{
			$data['title'] = 'Mejapintar';
			$data['user'] = $this->Model_User->datauser();
			$data['feedback'] = $this->Model_User->get_feedback();
			$this->load->view('page/user_header', $data);
			$this->load->view('user/about',$data);
			$this->load->view('page/user_footer');
		}

		public function profiluser()
		{
			$data['title'] = 'Mejapintar';
			$data['user'] = $this->Model_User->datauser();
			$data['riwayat'] = $this->Model_User->get_riwayat($data['user']['id_user']);
			$data['record'] = $this->Model_User->get_record($data['user']['id_user']);
			$data['profil'] = $this->Model_User->profil($data['user']['id_user']);
			$this->load->view('page/user_header', $data);
			$this->load->view('user/profil_user',$data);
			$this->load->view('page/user_footer');
		}

		//edit
    public function editprofil()
    {

        $data['title'] = 'Mejapintar';
        $data['user'] = $this->Model_User->datauser();
        $data['profil'] = $this->Model_User->profil($data['user']['id_user']);


        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username is required!'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Email is required!'
        ]);

        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim|min_length[12]|max_length[13]', [
        	'min_length' => 'minimum number at least 12 character!',
        	'max_length' => 'maximum number must be 13 character!',
            'required' => 'Telephone is required!'
        ]);

        $this->form_validation->set_rules('biodata', 'Biodata', 'required|trim', [
            'required' => 'Bio is required!'
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('page/user_header', $data);
            $this->load->view('user/edit_profil', $data);
            $this->load->view('page/user_footer');
        } 
        else {

            $this->Model_User->editprofil($data);
            $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Profil changed success!!'
                ]);
            redirect('user/profiluser');
        }
    }

    //change pass (update)
    public function changepass()
    {

        $data['title'] = 'Admin Panel';
        $data['user'] = $this->Model_User->datauser();
        // $data['profil'] = $this->Model_User->profil($data['user']['id_user']);

        $this->form_validation->set_rules('old_password', 'Old Password', 'required|trim', [
            'required' => 'Old password is required!'
        ]);

        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[7]|matches[new_password2]', [
            'required' => 'New password is required!',
            'min_length' => 'Password is too short! Its needed at least 8 character!',
            'matches' => 'Password doesnt match! Try again!'
        ]);

        $this->form_validation->set_rules('new_password2', 'New Password', 'required|trim', [
            'required' => 'Confirm your password!'
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('page/user_header', $data);
            $this->load->view('user/changepass', $data);
            $this->load->view('page/user_footer');
        } else {
            $this->Model_User->changepass($data);
        }
    }

    public function materi_mejapintar()
    {
  		$data['title'] = 'Mejapintar';
		$data['user'] = $this->Model_User->datauser();
		$data['profil'] = $this->Model_User->profil($data['user']['id_user']);
		$this->load->view('page/user_header', $data);
		$this->load->view('user/materi',$data);
		$this->load->view('page/user_footer');
   
    }


    public function materi_sd()
		{
			$keyword_math = $this->input->post('keyword_math');
			$keyword_ind = $this->input->post('keyword_ind');
			$keyword_english = $this->input->post('keyword_english');
			$keyword_ipa = $this->input->post('keyword_ipa'); 
			$data['title'] = 'Mejapintar';
			$data['user'] = $this->Model_User->datauser();
			$data['profil'] = $this->Model_User->profil($data['user']['id_user']);
			$data['matematika'] = $this->Model_User->get_math($keyword_math);
			$data['indonesia'] = $this->Model_User->get_ind($keyword_ind);
			$data['english'] = $this->Model_User->get_english($keyword_english);
			$data['ipa'] = $this->Model_User->get_ipa($keyword_ipa);
			$this->load->view('page/user_header', $data);
			$this->load->view('user/materi_sd',$data);
			$this->load->view('page/user_footer');
		}

	public function materi_smp()
		{
			$keyword_math = $this->input->post('keyword_math');
			$keyword_ind = $this->input->post('keyword_ind');
			$keyword_english = $this->input->post('keyword_english');
			$keyword_ipa = $this->input->post('keyword_ipa'); 
			$data['title'] = 'Mejapintar';
			$data['user'] = $this->Model_User->datauser();
			$data['profil'] = $this->Model_User->profil($data['user']['id_user']);
			$data['matematika'] = $this->Model_User->get_math2($keyword_math);
			$data['indonesia'] = $this->Model_User->get_ind2($keyword_ind);
			$data['english'] = $this->Model_User->get_english2($keyword_english);
			$data['ipa'] = $this->Model_User->get_ipa2($keyword_ipa);
			$this->load->view('page/user_header', $data);
			$this->load->view('user/materi_smp',$data);
			$this->load->view('page/user_footer');
		}

	public function materi_smak()
		{
			$keyword_math = $this->input->post('keyword_math');
			$keyword_ind = $this->input->post('keyword_ind');
			$keyword_english = $this->input->post('keyword_english');
			$keyword_ipa = $this->input->post('keyword_ipa'); 
			$data['title'] = 'Mejapintar';
			$data['user'] = $this->Model_User->datauser();
			$data['profil'] = $this->Model_User->profil($data['user']['id_user']);
			$data['matematika'] = $this->Model_User->get_math3($keyword_math);
			$data['indonesia'] = $this->Model_User->get_ind3($keyword_ind);
			$data['english'] = $this->Model_User->get_english3($keyword_english);
			$data['ipa'] = $this->Model_User->get_ipa3($keyword_ipa);
			$this->load->view('page/user_header', $data);
			$this->load->view('user/materi_smak',$data);
			$this->load->view('page/user_footer');
		}

	public function materi($nama_mapel,$id)
	{
		$data['title'] = 'Mejapintar';
		$data['user'] = $this->Model_User->datauser();
		$data['profil'] = $this->Model_User->profil($data['user']['id_user']);
		$data['isi'] = $this->Model_User->isi($id);

		$data['komen'] = $this->Model_User->show2($data['isi']['id_materi']);
		$data['banyak_komen'] = $this->Model_User->hitungkomen2($data['isi']['id_materi']);

		$this->load->view('page/user_header', $data);
		$this->load->view('user/isi',$data);
		$this->load->view('page/user_footer');
	}

	public function comment2($id)
    {
    	$this->Model_User->comment2($id);
		redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete_comment2($id_komen)
    {
    	$this->Model_User->delete_komen2($id_komen);
    	$this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Comment deleted success!!'
                ]);
    	redirect($_SERVER['HTTP_REFERER']);
    }


	public function create_feedback()
    {
        $data['title'] = 'Admin Panel';
        $data['user'] = $this->Model_User->datauser();

        $this->form_validation->set_rules('judul_feedback', 'judul_feedback', 'required|trim', [
            'required' => 'Title is required'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('page/user_header', $data);
	        $this->load->view('user/about', $data);
	        $this->load->view('page/user_footer');
        } else {
            $this->Model_User->create_feedback($data['user']['id_user']);
            $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Feedback successfully sended!!'
                ]);
            redirect('user/about');
        }
    }


	public function quiz()
    {
  		$data['title'] = 'Mejapintar';
		$data['user'] = $this->Model_User->datauser();
		$data['profil'] = $this->Model_User->profil($data['user']['id_user']);
		$this->load->view('page/user_header', $data);
		$this->load->view('user/quiz',$data);
		$this->load->view('page/user_footer');
    }


    public function quiz_sd()
    {
 	    $keyword_math = $this->input->post('keyword_math');
		$keyword_ind = $this->input->post('keyword_ind');
		$keyword_english = $this->input->post('keyword_english');
		$keyword_ipa = $this->input->post('keyword_ipa'); 

    	$data['title'] = 'Mejapintar';
		$data['user'] = $this->Model_User->datauser();
		$data['profil'] = $this->Model_User->profil($data['user']['id_user']);
		
		$data['matematika'] = $this->Model_User->get_math($keyword_math);
		$data['indonesia'] = $this->Model_User->get_ind($keyword_ind);
		$data['english'] = $this->Model_User->get_english($keyword_english);
		$data['ipa'] = $this->Model_User->get_ipa($keyword_ipa);

		$this->load->view('page/user_header', $data);
		$this->load->view('user/quiz_sd',$data);
		$this->load->view('page/user_footer');
		
    }

    public function quiz_smp()
    {
    	$keyword_math = $this->input->post('keyword_math');
		$keyword_ind = $this->input->post('keyword_ind');
		$keyword_english = $this->input->post('keyword_english');
		$keyword_ipa = $this->input->post('keyword_ipa'); 

    	$data['title'] = 'Mejapintar';
		$data['user'] = $this->Model_User->datauser();
		$data['profil'] = $this->Model_User->profil($data['user']['id_user']);

		$data['matematika'] = $this->Model_User->get_math2($keyword_math);
		$data['indonesia'] = $this->Model_User->get_ind2($keyword_ind);
		$data['english'] = $this->Model_User->get_english2($keyword_english);
		$data['ipa'] = $this->Model_User->get_ipa2($keyword_ipa);

		$this->load->view('page/user_header', $data);
		$this->load->view('user/quiz_smp',$data);
		$this->load->view('page/user_footer');
		
    }

    public function quiz_smak()
    {
   		$keyword_math = $this->input->post('keyword_math');
		$keyword_ind = $this->input->post('keyword_ind');
		$keyword_english = $this->input->post('keyword_english');
		$keyword_ipa = $this->input->post('keyword_ipa');

    	$data['title'] = 'Mejapintar';
		$data['user'] = $this->Model_User->datauser();
		$data['profil'] = $this->Model_User->profil($data['user']['id_user']);

		$data['matematika'] = $this->Model_User->get_math3($keyword_math);
		$data['indonesia'] = $this->Model_User->get_ind3($keyword_ind);
		$data['english'] = $this->Model_User->get_english3($keyword_english);
		$data['ipa'] = $this->Model_User->get_ipa3($keyword_ipa);

		$this->load->view('page/user_header', $data);
		$this->load->view('user/quiz_smak',$data);
		$this->load->view('page/user_footer');
		
    }

    public function quiz_list($id_sub)
    {
    	$data['title'] = 'Mejapintar';
		$data['user'] = $this->Model_User->datauser();
		$data['profil'] = $this->Model_User->profil($data['user']['id_user']);
		$data['quiz'] = $this->Model_User->get_list($id_sub);
		$data['id_sub'] = $id_sub;

			$this->load->view('page/user_header', $data);
			$this->load->view('user/list_quiz',$data);
			$this->load->view('page/user_footer');
		
    }

    public function quiz_begin($id_sub, $id_materi)
    {
    	$data['title'] = 'Mejapintar';
		$data['user'] = $this->Model_User->datauser();
		$data['profil'] = $this->Model_User->profil($data['user']['id_user']);
		$data['quiz'] = $this->Model_User->getquestion($id_materi);
		$data['id_sub'] = $id_sub;
		$data['id_materi'] = $id_materi;
		// var_dump($data['quiz']); die;

			$this->load->view('page/user_header', $data);
			$this->load->view('user/isi_quiz',$data);
			$this->load->view('page/user_footer');
		
    }


    public function quiz_result($id_sub, $id_materi)
    {

    	$data['ques'] = [	
    	'ques1' => $this->input->post('jawaban1'),
    	'ques2' => $this->input->post('jawaban2'),
    	'ques3' => $this->input->post('jawaban3'),
    	'ques4' => $this->input->post('jawaban4'),
    	'ques5' => $this->input->post('jawaban5'),
    	];
    	$data['title'] = 'Mejapintar';
		$data['user'] = $this->Model_User->datauser();
		$data['profil'] = $this->Model_User->profil($data['user']['id_user']);
    	
    	$data['quiz'] = $this->Model_User->getquestion($id_materi);
    	$data['nilai'] = $this->Model_User->hitung_nilai($data['quiz'],$data['ques']);
    	$data['id_sub'] = $id_sub;
    	$data['id_materi'] = $id_materi;

    	// if () {
    		
    	// 	$this->Model_User->insert_remedial($data['user']['id_user'], $id_materi, $data['nilai']);
    	// }else{
    		$this->Model_User->insert_nilai($data['user']['id_user'], $id_materi, $data['nilai']);
    	// }


    		$this->load->view('page/user_header', $data);
			$this->load->view('user/hasil_quiz',$data);
			$this->load->view('page/user_footer');
		
    }


    public function baca($id_sub,$id_materi)
    {
    	$data['user'] = $this->Model_User->datauser();
    	$this->Model_User->baca($data['user']['id_user'],$id_sub,$id_materi);
    	$jenjang = ($id_sub == 31 || $id_sub == 34 || $id_sub == 37 || $id_sub == 40 ? 'user/materi_sd' : ($id_sub == 32 || $id_sub == 35 || $id_sub == 38 || $id_sub == 41 ? 'user/materi_smp' : ($id_sub == 33 || $id_sub == 36 || $id_sub == 39 || $id_sub == 42 ? 'user/materi_smak' : '')));
    	redirect($jenjang);
    }

    //==============================================================================================================================

    public function news($judul, $id)
    {
    	$data['title'] = 'Mejapintar';
		$data['user'] = $this->Model_User->datauser();
		$data['profil'] = $this->Model_User->profil($data['user']['id_user']);
		$data['isi'] = $this->Model_User->isi_news($id);
		$data['recent'] = $this->Model_User->recent();
		$data['komen'] = $this->Model_User->show($data['isi']['id_news']);
		$data['banyak_komen'] = $this->Model_User->hitungkomen($data['isi']['id_news']);

		$this->load->view('page/user_header', $data);
		$this->load->view('user/isi_news', $data);
		$this->load->view('page/user_footer');
    }

    public function comment($id)
    {
    	$this->Model_User->comment($id);
		redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete_comment($id_komen)
    {
    	$this->Model_User->delete_komen($id_komen);
    	$this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Comment deleted success!!'
                ]);
    	redirect($_SERVER['HTTP_REFERER']);
    }




    //=============================================================================================================================

		public function diskusi()
		{
			$data['title'] = 'Mejapintar';
			$data['user'] = $this->Model_User->datauser();
			$data['profil'] = $this->Model_User->profil($data['user']['id_user']);

			if ($this->input->get('search')) {
				$data['keyword'] = $this->input->get('search');
			} else {
				$data['keyword'] = null;
			}

			$this->db->like('isi', $data['keyword']);

			$config['base_url'] = 'http://localhost/mejapintar/user/diskusi';
			$config['total_rows'] = $this->Model_User->count_diskusi();
			$config['per_page'] = 15;

			// diinilisiasi
			$this->pagination->initialize($config);

			$data['start'] = $this->uri->segment(3);
			$data['diskusi'] = $this->Model_User->show_diskusi($config['per_page'], $data['start'], $data['keyword']);

			$this->load->view('page/user_header', $data);
			$this->load->view('user/diskusi',$data);
			$this->load->view('page/user_footer');
		}

		public function detail_diskusi($id_diskusi)
		{
			$data['title'] = 'Mejapintar';
			$data['user'] = $this->Model_User->datauser();
			$data['profil'] = $this->Model_User->profil($data['user']['id_user']);
			$data['diskusi'] = $this->Model_User->show_diskusi_detail($id_diskusi);
			// var_dump($data['diskusi']) or die;

			$this->load->view('page/user_header', $data);
			$this->load->view('user/detail_diskusi',$data);
			$this->load->view('page/user_footer');
		}

    public function start_discus()
    {
    	$data['user'] = $this->Model_User->datauser();
		$data['profil'] = $this->Model_User->profil($data['user']['id_user']);

		$id_user = $data['user']['id_user'];
		$isi = $this->input->post('isi');

		$upload_image = $_FILES['file']['name'];

        if($upload_image){
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['upload_path'] = './assets/img/';

            $this->load->library('upload', $config);

            if($this->upload->do_upload('file')){
                $image = $this->upload->data('file_name');
            } else {
                $image = null;
            }
        }
		$data = [
			'id_parent' => 0,
			'id_user' => $id_user,
			'isi' => $isi,
			'file' => $image
		];
		$this->Model_User->start_discus($data);
		redirect('user/diskusi');
    }

    public function reply_discus($id_diskusi)
    {
    	$data['user'] = $this->Model_User->datauser();
		$data['profil'] = $this->Model_User->profil($data['user']['id_user']);

		$id_user = $data['user']['id_user'];
		$isi = $this->input->post('isi');
		$upload_image = $_FILES['file']['name'];

        if($upload_image){
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['upload_path'] = './assets/img/';

            $this->load->library('upload', $config);

            if($this->upload->do_upload('file')){
                $image = $this->upload->data('file_name');
            } else {
                $image = null;
            }
        }

		$data = [
			'id_parent' => $id_diskusi,
			'id_user' => $id_user,
			'isi' => $isi,
			'file' => $image
		];

		$this->db->insert('diskusi',$data);
		redirect('user/diskusi');
    }

    public function delete_diskusi($id)
	{
		$this->Model_User->delete_diskusi($id);
		$this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Deleted success!!'
                ]);
    	redirect($_SERVER['HTTP_REFERER']);
	}

	//reply di detail
	public function reply_discus2($id_diskusi)
    {
    	$data['user'] = $this->Model_User->datauser();
		$data['profil'] = $this->Model_User->profil($data['user']['id_user']);

		$id_user = $data['user']['id_user'];
		$isi = $this->input->post('isi');
		$upload_image = $_FILES['file']['name'];

        if($upload_image){
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['upload_path'] = './assets/img/';

            $this->load->library('upload', $config);

            if($this->upload->do_upload('file')){
                $image = $this->upload->data('file_name');
            } else {
                $image = null;
            }
        }

		$data = [
			'id_parent' => $id_diskusi,
			'id_user' => $id_user,
			'isi' => $isi,
			'file' => $image
		];

		$this->db->insert('diskusi',$data);
		redirect($_SERVER['HTTP_REFERER']);
    }


	




}

?>