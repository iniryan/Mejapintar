<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * author ryanadi
 */

class Admin extends CI_Controller
{
	
	public function __construct()
	{

		parent::__construct();
        $this->load->model('Model_Admin');
        $this->load->library('form_validation');


        if (!isset($_SESSION['email'])) {
            echo redirect('welcome/errorlogin');
            exit;
        } 
        else if ($_SESSION['role'] != "1") {
            echo redirect('welcome/donthaveaccess');
            exit;
        }
	}

	//halaman utama
	public function home()
    {

        $data['title'] = 'Dashboard | Mejapintar';
        $data['user'] = $this->Model_Admin->datauser();
        $data['profil'] = $this->Model_Admin->profil($data['user']['id_user']);

        $this->load->view('page/admin_header', $data);
        $this->load->view('panel/home', $data);
        $this->load->view('page/admin_footer');
    }

    //===============================================================================================================================

    //panel user
    public function user()
    {

        $data['title'] = 'Dashboard | Mejapintar';
        $data['user'] = $this->Model_Admin->datauser();

        $this->load->view('page/admin_header', $data);
        $this->load->view('panel/user', $data);
        $this->load->view('page/admin_footer');
    }

    //delete
    public function delete_user($id)
    {

        $this->Model_Admin->delete_user($id);
        $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'User deleted success'
                ]);
        redirect('admin/user');
    }

    //unactivated user
    public function block_user($id)
    {

        $this->Model_Admin->block_user($id);
        $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'User blocked success'
                ]);
        redirect('admin/user');
    }

    //active user
    public function active_user($id)
    {

        $this->Model_Admin->active_user($id);
        $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'User activate success'
                ]);
        redirect('admin/user');
    }

    //===============================================================================================================================

    //unactivate soal
    public function unactivate($id)
    {

        $this->Model_Admin->unactivate($id);
        $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Soal unactivated success'
                ]);
        redirect('admin/soal');
    }

    public function activate($id)
    {

        $this->Model_Admin->activate($id);
        $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Soal activated success'
                ]);
        redirect('admin/soal');
    }

    //===============================================================================================================================

    //recom materi
    public function rekomen($id)
    {

        $this->Model_Admin->rekomen($id);
        $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Materi recommended success'
                ]);
        redirect('admin/materi');
    }

    public function rekomen2($id)
    {

        $this->Model_Admin->rekomen2($id);
        $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Materi unrecommended success'
                ]);
        redirect('admin/materi');
    }

    //===============================================================================================================================

    public function soal()
    {

        $data['title'] = 'Dashboard | Mejapintar';
        $data['user'] = $this->Model_Admin->datauser();
        // $data['mapel'] = $this->Model_Admin->getAllMapel();

        $this->load->view('page/admin_header', $data);
        $this->load->view('panel/soal', $data);
        $this->load->view('page/admin_footer');
    }

    // detail soal
    public function detail_soal($id)
    {

        $data['title'] = 'Dashboard | Mejapintar';
        $data['user'] = $this->Model_Admin->datauser();
        $data['detail'] = $this->Model_Admin->detail_soal($id);

        $this->load->view('page/admin_header', $data);
        $this->load->view('panel/detail_soal', $data);
        $this->load->view('page/admin_footer');
    }

    //===============================================================================================================================

    public function kategori()
    {

        $data['title'] = 'Dashboard | Mejapintar';
        $kategori = array(
            'kategori' => $this->Model_Admin->kategori(),
            'sub_kategori' => $this->Model_Admin->sub_kategori()
            );

        $this->load->view('page/admin_header', $data);
        $this->load->view('panel/kategori', $data);
        $this->load->view('page/admin_footer');
    }

    //================================================================================================================================

    public function delete_kategori($id)
    {

        $this->Model_Admin->delete_kategori($id);
        $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Jenjang deleted success'
                ]);
        redirect('admin/kategori');
    }

    public function create_kategori()
    {
        $data['title'] = 'Dashboard | Mejapintar';
        
        $this->form_validation->set_rules('nama_kategori', 'nama_kategori', 'required|trim|is_unique[kategori.nama_kategori]', [
            'is_unique' => 'Kategori sudah ada coba yang lain!',
            'required' => 'Kategori is required!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('page/admin_header', $data);
            $this->load->view('panel/create_kategori', $data);
            $this->load->view('page/admin_footer');
        } else {
            $this->Model_Admin->create_kategori($data);
            $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Jenjang created success'
                ]);
            redirect('admin/kategori');

        
        }

    }

    public function update_kategori($id)
    {
        $data['title'] = 'Dashboard | Mejapintar';
        $data['user'] = $this->Model_Admin->datauser();
        $data['detail'] = $this->Model_Admin->detail_kategori($id);

         $this->form_validation->set_rules('nama_kategori', 'nama_kategori', 'required|trim|is_unique[kategori.nama_kategori]', [
            'is_unique' => 'Kategori sudah ada coba yang lain!',
            'required' => 'Kategori is required'
        ]);

        if ($this->form_validation->run() == false) {
            
            $this->load->view('page/admin_header', $data);
            $this->load->view('panel/update_kategori', $data);
            $this->load->view('page/admin_footer');
        } else {
            
            $kategori=$this->input->post('nama_kategori');


            $data = [
                'nama_kategori' => $kategori,
            ];
            $where=[
            'id_kategori' => $this->input->post('id_kategori')];
            $this->Model_Admin->update_kategori($data,$where);
            $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Jenjang updated success'
                ]);
            redirect('admin/kategori');
        }
    }

    //============================================================================================================================

    public function delete_sub($id)
    {

        $this->Model_Admin->delete_sub($id);
        $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Sub deleted success'
                ]);
        redirect('admin/kategori');
    }

    public function create_sub()
    {
        
        $data['title'] = 'Dashboard | Mejapintar';
        $data['data'] = $this->Model_Admin->get_relasi();
        $data['kategori'] = $this->Model_Admin->get_kategori();
        
        $this->form_validation->set_rules('kategori', 'kategori', 'required');

        $this->form_validation->set_rules('sub_kategori', 'sub_kategori', 'required|trim', [
            'required' => 'Sub_kategori is required!'
        ]);

        if ($this->form_validation->run()) {
            $kategori = $this->input->post('kategori');
            $sub_kategori = $this->input->post('sub_kategori');

            $relasi = array('id_kategori' => $kategori, 'sub_kategori' => $sub_kategori);

            $data = array_merge($relasi);
            if ($this->Model_Admin->insert_relasi($data)==TRUE) {
                
                $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Sub created success'
                ]);
                redirect('admin/kategori');
            }
        }
        else{
            
        }
        

        $this->load->view('page/admin_header', $data);
        $this->load->view('panel/create_sub', $data);
        $this->load->view('page/admin_footer');
    }

    public function update_sub($id)
    {
        $data['title'] = 'Dashboard | Mejapintar';
        $data['data'] = $this->Model_Admin->get_relasi();
        $data['detail'] = $this->Model_Admin->detail_sub($id);
        // $data['get_kategori'] = $this->Model_Admin->get_kategori();

        $this->form_validation->set_rules('sub_kategori', 'sub_kategori', 'required|trim', [
            'required' => 'Sub_kategori is required!'
        ]);       

        if ($this->form_validation->run() == false) {

            // $data['title'] = 'Dashboard | Mejapintar';
            
            // $this->session->set_flashdata([
            //     'type' => 'error',
            //     'msg' => 'Something wrong!! Please check again!'
            //     ]);
            $this->load->view('page/admin_header', $data);
            $this->load->view('panel/update_sub', $data);
            $this->load->view('page/admin_footer');
        } 
        else {
            $id_kategori = $this->input->post('id_kategori');
            $sub_kategori = $this->input->post('sub_kategori');
            
            $data = [
                'id_kategori' => $id_kategori,
                'sub_kategori' => $sub_kategori,
            ];

            $where=[
            'id_sub' => $this->input->post('id_sub')];
            $this->Model_Admin->update_sub($data,$where);
            $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Sub updated success'
                ]);
            redirect('admin/Kategori');
        }   
    }
     
        

    //===============================================================================================================================

    //feed
    public function feedback()
    {

        $data['title'] = 'Dashboard | Mejapintar';
        $data['feedback'] = $this->Model_Admin->feedback();

        $this->load->view('page/admin_header', $data);
        $this->load->view('panel/feedback', $data);
        $this->load->view('page/admin_footer');
    }

    //Testing create feedback tapi di admin
    public function create_feedback()
    {
        $data['title'] = 'Dashboard | Mejapintar';
        $data['user'] = $this->Model_Admin->datauser();

        $this->form_validation->set_rules('judul_feedback', 'judul_feedback', 'required|trim', [
            'required' => 'Title is required'
        ]);

        if ($this->form_validation->run() == false) {
            
            $this->load->view('page/admin_header', $data);
            $this->load->view('page/create_feedback', $data);
            $this->load->view('page/admin_footer');
        } else {
            $this->Model_Admin->create_feedback($data['user']['id_user']);
            $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Feedback created success'
                ]);
            redirect('admin/feedback');
        }
    }

    public function delete_feed($id)
    {
        $this->Model_Admin->delete_feed($id);
        $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Feedback deleted success'
                ]);
        redirect('admin/feedback');
    }


    // detail feed
    public function detail_feed($id)
    {

        $data['title'] = 'Dashboard | Mejapintar';
        $data['detail'] = $this->Model_Admin->detail_feed($id);
        $data['username'] = $this->Model_Admin->usernamefeed($data['detail']['id_user']);

        $this->load->view('page/admin_header', $data);
        $this->load->view('panel/detail_feed', $data);
        $this->load->view('page/admin_footer');
    }

    
    //===============================================================================================================================

    //materi
     public function materi()
    {

        $data['title'] = 'Dashboard | Mejapintar';
        $data['user'] = $this->Model_Admin->datauser();

        $this->load->view('page/admin_header', $data);
        $this->load->view('panel/materi', $data);
        $this->load->view('page/admin_footer');
    }

    public function create_materi()
    {

        $data['title'] = 'Dashboard | Mejapintar';
        $data['data'] = $this->Model_Admin->get_relasi_materi();
        $data['subkategori'] = $this->Model_Admin->get_subkategori();
        $data['kategori'] = $this->Model_Admin->get_kategori();


        $this->form_validation->set_rules('nama_mapel', 'nama_mapel', 'required|trim', [
            'required' => 'Mapel is required!'
        ]);

        $this->form_validation->set_rules('judul_bab', 'judul_bab', 'required|trim', [
            'required' => 'Title is required!'
        ]);

        $this->form_validation->set_rules('video', 'video', 'required|trim', [
            'required' => 'Content is required!'
        ]);

        $this->form_validation->set_rules('isi_materi', 'isi_materi', 'required|trim', [
            'required' => 'Content is required!'
        ]);

        $this->form_validation->set_rules('rangkuman', 'rangkuman', 'required|trim', [
            'required' => 'Content is required!'
        ]);

       

        if ($this->form_validation->run() == false) {
            
            $this->load->view('page/admin_header', $data);
            $this->load->view('panel/create_materi', $data);
            $this->load->view('page/admin_footer');
        } 
        else {
            $this->Model_Admin->create_materi($data);
            $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Materi created success'
                ]);
            redirect('admin/materi');
        }
    }

    // detail materi
    public function detail_materi($id)
    {

        $data['title'] = 'Dashboard | Mejapintar';
        $data['user'] = $this->Model_Admin->datauser();
        $data['detail'] = $this->Model_Admin->detail_materi($id);

        $this->load->view('page/admin_header', $data);
        $this->load->view('panel/detail_materi', $data);
        $this->load->view('page/admin_footer');
    }
    
    public function edit_materi($id)
    {

        $data['title'] = 'Dashboard | Mejapintar';
        $data['user'] = $this->Model_Admin->datauser();
         $data['subkategori'] = $this->Model_Admin->get_subkategori();
        $data['kategori'] = $this->Model_Admin->get_kategori();
        $data['detail'] = $this->Model_Admin->detail_materi($id);

        $this->load->view('page/admin_header', $data);
        $this->load->view('panel/update_materi', $data);
        $this->load->view('page/admin_footer');
    }

    public function update_materi()
    {
        $data['title'] = 'Dashboard | Mejapintar';
        $data['data'] = $this->Model_Admin->get_relasi_materi();
        $data['subkategori'] = $this->Model_Admin->get_subkategori();
        $data['kategori'] = $this->Model_Admin->get_kategori();


        $this->form_validation->set_rules('nama_mapel', 'nama_mapel', 'required|trim', [
            'required' => 'Mapel is required!'
        ]);

        $this->form_validation->set_rules('judul_bab', 'judul_bab', 'required|trim', [
            'required' => 'Title is required!'
        ]);

        $this->form_validation->set_rules('video', 'video', 'required|trim', [
            'required' => 'Content is required!'
        ]);

        $this->form_validation->set_rules('isi_materi', 'isi_materi', 'required|trim', [
            'required' => 'Content is required!'
        ]);

        $this->form_validation->set_rules('rangkuman', 'rangkuman', 'required|trim', [
            'required' => 'Content is required!'
        ]);

       

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Dashboard | Mejapintar';
            

            $this->load->view('page/admin_header', $data);
            $this->load->view('panel/materi', $data);
            $this->load->view('page/admin_footer');
        } 
        else {
            $id_sub=$this->input->post('id_sub');
            $nama_mapel= $this->input->post('nama_mapel');
            $judul_bab=$this->input->post('judul_bab');
            $isi_materi=$this->input->post('isi_materi');
            $rangkuman=$this->input->post('rangkuman');
            $video=$this->input->post('video');


            $data = [
                
                'id_sub' => $id_sub,
                'nama_mapel' => $nama_mapel,
                'judul_bab' => $judul_bab,
                'isi_materi' => $isi_materi,
                'video' => $video,
                'rangkuman' => $rangkuman,
            ];
            $where=[
            'id_materi' => $this->input->post('id_materi')];
            $this->Model_Admin->update_materi($data,$where);
            $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Materi updated success'
                ]);
            redirect('admin/materi');
        }
    }

    // delete
    public function delete_materi($id)
    {

        $this->Model_Admin->delete_materi($id);
        $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Materi deleted success'
                ]);
        redirect('admin/materi');
    }

    //===============================================================================================================================

    public function edit_soal($id)
    {

        $data['title'] = 'Dashboard | Mejapintar';
        $data['user'] = $this->Model_Admin->datauser();
        $data['subkategori'] = $this->Model_Admin->get_subkategori();
        $data['kategori'] = $this->Model_Admin->get_kategori();
        $data['detail'] = $this->Model_Admin->detail_soal($id);

        $this->load->view('page/admin_header', $data);
        $this->load->view('panel/update_soal', $data);
        $this->load->view('page/admin_footer');
    }

    public function update_soal()
    {
        $data['title'] = 'Dashboard | Mejapintar';
        $data['data'] = $this->Model_Admin->get_relasi_soal();
        $data['subkategori'] = $this->Model_Admin->get_subkategori();
        $data['kategori'] = $this->Model_Admin->get_kategori();

        $this->form_validation->set_rules('judul_soal', 'Judul_soal', 'required|trim', [
            'required' => 'Title is required!'
        ]);

        $this->form_validation->set_rules('isi_soal', 'Isi_soal', 'required|trim', [
            'required' => 'Content is required!'
        ]);

         $this->form_validation->set_rules('kunci', 'Kunci', 'required|trim', [
            'required' => 'Correct Answer is required!'
        ]);

          $this->form_validation->set_rules('opsi1', 'Opsi1', 'required|trim', [
            'required' => 'Choice A is required!'
        ]);

           $this->form_validation->set_rules('opsi2', 'Opsi2', 'required|trim', [
            'required' => 'Choice b is required!'
        ]);

           $this->form_validation->set_rules('opsi3', 'Opsi3', 'required|trim', [
            'required' => 'Choice c is required!'
        ]);

           $this->form_validation->set_rules('bahasan', 'Bahasan', 'required|trim', [
            'required' => 'Bahasan is required!'
        ]);

       

        if ($this->form_validation->run() == false) {

            // $data['title'] = 'Dashboard | Mejapintar';
            
            // $this->session->set_flashdata([
            //     'type' => 'error',
            //     'msg' => 'Something wrong!! Please check again!'
            //     ]);
            $this->load->view('page/admin_header', $data);
            $this->load->view('panel/soal', $data);
            $this->load->view('page/admin_footer');
        } 
        else {
            $id_sub = $this->input->post('id_sub');
            $id_materi = $this->input->post('id_materi');
            $judul_soal = $this->input->post('judul_soal');
            $isi_soal =  $this->input->post('isi_soal');
            // $gambar = $this->input->post('gambar');
            $kunci = $this->input->post('kunci');
            $opsi1 = $this->input->post('opsi1');
            $opsi2 = $this->input->post('opsi2');
            $opsi3 = $this->input->post('opsi3');
            // $d = $this->input->post('d');
            // $skor = $this->input->post('skor');
            $bahasan = $this->input->post('bahasan');
            $data = [
                'id_sub' => $id_sub,
                'id_materi' => $id_materi,
                'judul_soal' => $judul_soal,
                'isi_soal' => $isi_soal,
                // 'gambar' => $gambar,
                'kunci' => $kunci,
                'opsi1' => $opsi1,
                'opsi2' => $opsi2,
                'opsi3' => $opsi3,
                // 'd' => $d,
                // 'skor' => $skor,
                'bahasan' => $bahasan,
            ];

            $where=[
            'id_soal' => $this->input->post('id_soal')];
            $this->Model_Admin->update_soal($data,$where);
            $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Soal updated success'
                ]);
            redirect('admin/soal');
        }   
    }

    public function create_soal()
    {
        $data['title'] = 'Dashboard | Mejapintar';
        $data['data'] = $this->Model_Admin->get_relasi_soal();
        $data['subkategori'] = $this->Model_Admin->get_subkategori();
        $data['kategori'] = $this->Model_Admin->get_kategori();

        $this->form_validation->set_rules('judul_soal', 'Judul_soal', 'required|trim', [
            'required' => 'Title is required!'
        ]);

        $this->form_validation->set_rules('isi_soal', 'Isi_soal', 'required|trim', [
            'required' => 'Content is required!'
        ]);

         $this->form_validation->set_rules('kunci', 'Kunci', 'required|trim', [
            'required' => 'Correct Answer is required!'
        ]);

          $this->form_validation->set_rules('opsi1', 'Opsi1', 'required|trim', [
            'required' => 'Choice A is required!'
        ]);

           $this->form_validation->set_rules('opsi2', 'Opsi2', 'required|trim', [
            'required' => 'Choice b is required!'
        ]);

           $this->form_validation->set_rules('opsi3', 'Opsi3', 'required|trim', [
            'required' => 'Choice c is required!'
        ]);


           $this->form_validation->set_rules('bahasan', 'Bahasan', 'required|trim', [
            'required' => 'Bahasan is required!'
        ]);

       

        if ($this->form_validation->run() == false) {

            
            $this->load->view('page/admin_header', $data);
            $this->load->view('panel/create_soal', $data);
            $this->load->view('page/admin_footer');
        } 
        else {
            $data = [
                'id_soal' => $this->input->post('id_soal'),
                'id_sub' => $this->input->post('id_sub'),
                'id_materi' => $this->input->post('id_materi'),
                'judul_soal' => $this->input->post('judul_soal'),
                'isi_soal' => $this->input->post('isi_soal'),
                // 'gambar' => $this->input->post('gambar'),
                'kunci' => $this->input->post('kunci'),
                'opsi1' => $this->input->post('opsi1'),
                'opsi2' => $this->input->post('opsi2'),
                'opsi3' => $this->input->post('opsi3'),
                // 'd' => $this->input->post('d'),
                // 'skor' => $this->input->post('skor'),
                'bahasan' => $this->input->post('bahasan'),
            ];

            $this->Model_Admin->create_soal($data);
            $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Soal created success'
                ]);
            redirect('admin/soal');
        }
    }

    public function delete_soal($id)
    {

        $this->Model_Admin->delete_soal($id);
        $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Soal deleted success'
                ]);
        redirect('admin/soal');
    }

    //===============================================================================================================================

    //profil
    public function profile()
    {

        $data['title'] = 'Dashboard | Mejapintar';
        $data['user'] = $this->Model_Admin->datauser();
        $data['profil'] = $this->Model_Admin->profil($data['user']['id_user']);

        $this->load->view('page/admin_header', $data);
        $this->load->view('panel/profile', $data);
        $this->load->view('page/admin_footer');
    }

    //profil
    public function detail_user($id)
    {

        $data['title'] = 'Dashboard | Mejapintar';
        $data['user'] = $this->Model_Admin->user($id);
        $data['profil'] = $this->Model_Admin->profil($data['user']['id_user']);
        $data['riwayat'] = $this->Model_Admin->get_riwayat($data['user']['id_user']);
        $data['record'] = $this->Model_Admin->get_record($data['user']['id_user']);

        $this->load->view('page/admin_header', $data);
        $this->load->view('panel/detail_user', $data);
        $this->load->view('page/admin_footer');
    }

    //edit
    public function editprofil()
    {

        $data['title'] = 'Dashboard | Mejapintar';
        $data['user'] = $this->Model_Admin->datauser();
        $data['profil'] = $this->Model_Admin->profil($data['user']['id_user']);


        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username is required!'
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
            
            $this->load->view('page/admin_header', $data);
            $this->load->view('panel/edit_profil', $data);
            $this->load->view('page/admin_footer');
        } 
        else {

            $this->Model_Admin->editprofil($data);
            $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Profil changed success'
            ]);
            redirect('admin/profile');
        }
    }

    //change pass (update)
    public function changepass()
    {

        $data['title'] = 'Dashboard | Mejapintar';
        $data['user'] = $this->Model_Admin->datauser();

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
            
            $this->load->view('page/admin_header', $data);
            $this->load->view('panel/changepass', $data);
            $this->load->view('page/admin_footer');
        } else {
            $this->Model_Admin->changepass($data);
            
        }
    }

    //===============================================================================================================================

    //news
    public function news()
    {

        $data['title'] = 'Dashboard | Mejapintar';
        $data['news'] = $this->Model_Admin->news();

        $this->load->view('page/admin_header', $data);
        $this->load->view('panel/news', $data);
        $this->load->view('page/admin_footer');
    }

    public function create_news()
    {
        $data['title'] = 'Dashboard | Mejapintar';
        
        $this->form_validation->set_rules('judul', 'judul', 'required|trim', [
            'required' => 'Title is required'
        ]);

        $this->form_validation->set_rules('konten', 'konten', 'required|trim', [
            'required' => 'Content is required!'
        ]);

        if ($this->form_validation->run() == false) {
            
            $this->load->view('page/admin_header', $data);
            $this->load->view('panel/create_news', $data);
            $this->load->view('page/admin_footer');
        } else {
            $this->Model_Admin->create_news($data);
            $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'News created success'
                ]);
            redirect('admin/news');
        }

        
    }

    public function detail_news($id)
    {
        $data['title'] = 'Dashboard | Mejapintar';
        $data['user'] = $this->Model_Admin->datauser();
        $data['detail'] = $this->Model_Admin->detail_news($id);

        $this->load->view('page/admin_header', $data);
        $this->load->view('panel/detail_news', $data);
        $this->load->view('page/admin_footer');
    }

    public function update_news($id)
    {
        $data['title'] = 'Dashboard | Mejapintar';
        $data['user'] = $this->Model_Admin->datauser();
        $data['detail'] = $this->Model_Admin->detail_news($id);

         $this->form_validation->set_rules('judul', 'judul', 'required|trim', [
            'required' => 'Title is required'
        ]);

        $this->form_validation->set_rules('konten', 'konten', 'required|trim', [
            'required' => 'Content is required!'
        ]);

        if ($this->form_validation->run() == false) {
            
            $this->load->view('page/admin_header', $data);
            $this->load->view('panel/update_news', $data);
            $this->load->view('page/admin_footer');
        } else {
            
            $judul=$this->input->post('judul');
            $tipe=$this->input->post('tipe');
            $konten=$this->input->post('konten');


            $data = [
                'judul' => $judul,
                'tipe' => $tipe,
                'konten' => $konten,
            ];
            $where=[
            'id_news' => $this->input->post('id_news')];
            $this->Model_Admin->update_news($data,$where);
            $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'News updated success'
                ]);
            redirect('admin/news');
        }

    }

    public function delete_news($id)
    {
        $this->Model_Admin->delete_news($id);
        $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'News deleted success'
                ]);
        redirect('admin/news');
    }

    //===============================================================================================================================


    public function comment_materi()
    {
        $data['title'] = 'Dashboard | Mejapintar';
        $data['comment'] = $this->Model_Admin->comment_materi();

        $this->load->view('page/admin_header', $data);
        $this->load->view('panel/comment_materi', $data);
        $this->load->view('page/admin_footer');
    }

    public function comment_news()
    {
        $data['title'] = 'Dashboard | Mejapintar';
        $data['comment'] = $this->Model_Admin->comment_news();

        $this->load->view('page/admin_header', $data);
        $this->load->view('panel/comment', $data);
        $this->load->view('page/admin_footer');
    }

    public function delete_komen2($id_komen)
    {
        $this->Model_Admin->delete_komen2($id_komen);
        $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Comment deleted success'
                ]);
        redirect('admin/comment_materi');
    }

    public function delete_komen($id_komen)
    {
        $this->Model_Admin->delete_komen($id_komen);
        $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Comment deleted success'
                ]);
        redirect('admin/comment_news');
    }

    //===============================================================================================================================

    //diskusi
    public function diskusi()
    {

        $data['title'] = 'Dashboard | Mejapintar';
        $data['diskusi'] = $this->Model_Admin->diskusi();

        $this->load->view('page/admin_header', $data);
        $this->load->view('panel/diskusi', $data);
        $this->load->view('page/admin_footer');
    }

    public function delete_diskusi($id_diskusi)
    {
        $this->Model_Admin->delete_diskusi($id_diskusi);
        $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Disscussion deleted success'
                ]);
        redirect('admin/diskusi');
    }

    public function delete_diskusi2($id)
    {
        $this->Model_Admin->delete_diskusi($id);
        $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Deleted success!!'
                ]);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function detail_diskusi($id_diskusi)
        {
            $data['title'] = 'Dashboard | Mejapintar';
            $data['user'] = $this->Model_Admin->datauser();
            $data['profil'] = $this->Model_Admin->profil($data['user']['id_user']);
            $data['diskusi'] = $this->Model_Admin->show_diskusi_detail($id_diskusi);
            // var_dump($data['diskusi']) or die;

            $this->load->view('page/admin_header', $data);
            $this->load->view('panel/detail_diskusi',$data);
            $this->load->view('page/admin_footer');
        }

    //reply di detail
    public function reply_discus2($id_diskusi)
    {
        $data['user'] = $this->Model_Admin->datauser();
        $data['profil'] = $this->Model_Admin->profil($data['user']['id_user']);

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