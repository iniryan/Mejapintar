<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * author ryanadi
 */

class Model_Admin extends CI_Model
{
	
	public function __construct()
	{

		parent::__construct();
	}

	//datauser
	public function datauser()
    {

        return $this->db->get_where('mejauser', ['email' => $this->session->userdata('email')])->row_array();
    }

    public function user($id)
    {

        return $this->db->where('id_user',$id)->get('mejauser')->row_array();
    }

    public function get_riwayat($id_user)
    {
        return $this->db->get_where('riwayat',['id_user'=>$id_user])->result_array();
    }

    public function get_record($id_user)
    {
        return $this->db->get_where('record',['id_user'=>$id_user])->result_array();
    }

    //delete user
    public function delete_user($id)
    {

        $this->db->delete('mejauser', ['id_user' => $id]);
        $this->db->delete('profil', ['id_user' => $id]);
        $this->db->delete('comment2', ['id_user' => $id]);
        $this->db->delete('comment', ['id_user' => $id]);
        $this->db->delete('riwayat', ['id_user' => $id]);
        $this->db->delete('record', ['id_user' => $id]);
        $this->db->delete('diskusi', ['id_user' => $id]);

    }

    //unactivate user
    public function block_user($id)
    {
        $this->db->where('id_user', $id);
        $this->db->set('activate', '0');
        $this->db->update('mejauser');
    }

    public function active_user($id)
    {
        
        $this->db->where('id_user', $id);
        $this->db->set('activate', '1');
        $this->db->update('mejauser');
    }
    
    //===============================================================================================================================

    //unactivate soal
    public function unactivate($id)
    {
        $this->db->where('id_soal', $id);
        $this->db->set('activate', '0');
        $this->db->update('soal');
    }

    public function activate($id)
    {
        
        $this->db->where('id_soal', $id);
        $this->db->set('activate', '1');
        $this->db->update('soal');
    }

    //recom materi
    public function rekomen($id)
    {
        
        $this->db->where('id_materi', $id);
        $this->db->set('recomended', '1');
        $this->db->update('materi');
    }

    public function rekomen2($id)
    {
        
        $this->db->where('id_materi', $id);
        $this->db->set('recomended', '0');
        $this->db->update('materi');
    }

    //===============================================================================================================================

    // Feed
    public function feedback()
    {
        $query = $this->db->get('feed');
        return $query;
    }

    public function usersendfeed($id)
    {
        return $this->db->get_where('mejauser', ['id_user' => $id])->row_array();
    }

    //Testing di Admin
    public function create_feedback($id)
    {
        $data = [
            
            'judul_feedback' => $this->input->post('judul_feedback'),
            'isi_feed' => $this->input->post('isi_feed'),
            'id_user' => $id,
        ];
        $this->db->insert('feed', $data);
    }

    public function delete_feed($id)
    {
        $this->db->delete('feed', ['id_feedback' => $id]);
    }

    public function detail_feed($id)
    {
        return $this->db->get_where('feed', ['id_feedback' => $id])->row_array();
    }

    public function usernamefeed($id)
    {
        return $this->db->get_where('mejauser', ['id_user' => $id])->row_array();   
    }   
    

    //===============================================================================================================================

    //materi
    public function detail_materi($id)
    {

        return $this->db->get_where('materi', ['id_materi' => $id])->row_array();
    }

    //delete materi
    public function delete_materi($id)
    {

        $this->db->delete('materi', ['id_materi' => $id]);
    }

    public function get_relasi_materi()
    {
        $this->db->from('materi b');
        $this->db->select([ 'b.nama_mapel','b.id_materi', 'c.sub_kategori', 'c.id_sub']);

        $this->db->join('sub_kategori c', 'c.id_sub = b.id_sub', 'left');
        $this->db->order_by('sub_kategori', 'asc');
        $return =  $this->db->get();
        return $return->result();

    }

     //create materi
     public function create_materi($data)
    {
        $upload_image = $_FILES['image']['name'];

        if($upload_image){
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['upload_path'] = './assets/img/';

            $this->load->library('upload', $config);

            if($this->upload->do_upload('image')){
                $image = $this->upload->data('file_name');
            } else {
                $image = null;
            }
        }

        $data = [
                'id_materi' => $this->input->post('id_materi'),
                'id_sub' => $this->input->post('id_sub'),
                'nama_mapel' => $this->input->post('nama_mapel'),
                'judul_bab' => $this->input->post('judul_bab'),
                'image' => $image,
                'rangkuman' => $this->input->post('rangkuman'),
                'video' => $this->input->post('video'),
                'isi_materi' => $this->input->post('isi_materi'),
            ];

        $this->db->insert('materi', $data);
    }

    public function update_materi($data,$where)
    {
        $upload_image = $_FILES['image']['name'];

        if($upload_image){
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['upload_path'] = './assets/img/';

            $this->load->library('upload', $config);

            if($this->upload->do_upload('image')){
                $image = $this->upload->data('file_name');
                $this->db->where($where)->set('image', $image)->update('materi');
            }
        }

        return $this->db->where($where)->set($data)->update('materi');
    }

    //===============================================================================================================================


     public function detail_soal($id)
    {

        return $this->db->get_where('soal', ['id_soal' => $id])->row_array();
    }

    public function update_soal($data, $where)
    {


        return $this->db->where($where)->set($data)->update('soal');
    }    

    public function delete_soal($id)
    {

        $this->db->delete('soal', ['id_soal' => $id]);
    }


    public function get_relasi_soal()
    {
        $this->db->from('soal e');
        $this->db->select([ 'e.judul_soal','e.id_soal', 'c.sub_kategori', 'c.id_sub']);

        $this->db->join('sub_kategori c', 'c.id_sub = e.id_sub', 'left');
        $this->db->order_by('sub_kategori', 'asc');
        $return =  $this->db->get();
        return $return->result();

    }

    public function create_soal($data)
    {


        $this->db->insert('soal', $data);
    }

    //===============================================================================================================================

    // kategori
    public function kategori()
    {
        return $this->db->get('kategori');
    }

    public function update_kategori($data, $where)
    {
        return $this->db->where($where)->set($data)->update('kategori');
    }

    public function detail_sub($id)
    {

        return $this->db->get_where('sub_kategori', ['id_sub' => $id])->row_array();
    }

     public function update_sub($data, $where)
    {


        return $this->db->where($where)->set($data)->update('sub_kategori');
    }   

    public function detail_kategori($id)
    {
        return $this->db->get_where('kategori', ['id_kategori' => $id])->row_array();
    }

    public function sub_kategori()
    {
        return $this->db->get('sub_kategori');
    }

    public function get_relasi()
    {
        $this->db->select([ 'a.nama_kategori','a.id_kategori', 'b.sub_kategori','b.id_sub']);
        $this->db->from('sub_kategori b');
        $this->db->join('kategori a', 'a.id_kategori = b.id_kategori', 'left');
        $this->db->order_by('nama_kategori', 'asc');
        $return =  $this->db->get('');
        return $return->result();

    }

    public function get_subkategori()
    {
        return $this->db->join('kategori','kategori.id_kategori=sub_kategori.id_kategori')
        ->get('sub_kategori');

    }

    public function get_kategori()
    {
        return $this->db->get('kategori');
    }

    public function insert_relasi($data)
    {
        $this->db->insert('sub_kategori', $data);
        return TRUE;
    }

    //delete kategori
    public function delete_sub($id)
    {

        $this->db->delete('sub_kategori', ['id_sub', 'id_sub'=> $id]);
    }

    public function delete_kategori($id)
    {

        $this->db->delete('kategori', ['id_kategori', 'id_kategori'=> $id]);
    }

    public function create_kategori($data)
    {
        $data = [

            'nama_kategori' => $this->input->post('nama_kategori')
        ];
        
        $this->db->insert('kategori', $data);
    }

    //===============================================================================================================================

    public function profil($id)
    {
        return $this->db->get_where('profil', ['id_user' => $id])->row_array();
    }

    //editprofl
    public function editprofil($data)
    {

        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $biodata = $this->input->post('biodata');
        $id = $data['user']['id_user'];

        // Cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['foto']['name'];

        if ($upload_image) {

            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = '2048';
            $config['upload_path'] = './assets/img/';
            $config['file_name'] = 'profil-'.$data['user']['id_user'];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                $old_image = $data['profil']['foto'];
                if ($old_image != 'avatar-1.jpg') {

                    unlink(FCPATH . './assets/img/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('foto', $new_image)
                ->where('id_user', $id)
                ->update('profil');
            } 
            else {

                echo $this->upload->display_errors();
            }
        }

        $this->db->set('username', $username)
        ->where('email', $email)
        ->update('mejauser');


        $this->db->set('telepon', $telepon)
        ->set('biodata', $biodata)
        ->where('id_user', $id)
        ->update('profil');
    }

    //changepass
    public function changepass($data)
    {

        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password1');

        if (!password_verify($old_password, $data['user']['password'])) {

            $this->session->set_flashdata('messagepassword', '<div class="alert alert-danger mt-3" role="alert">Old password is wrong!</div>');
            redirect('admin/changepass');
        }
        else {

            if ($old_password == $new_password) {

                $this->session->set_flashdata('messagepassword', '<div class="alert alert-danger mt-3" role="alert">New password cant be the same as old password!</div>');
                redirect('admin/changepass');
            } 
            else {

                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $this->db->set('password', $password_hash);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('mejauser');
                $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Password changed success'
                ]);
                redirect('admin/home');
            }
        }
    }

    //===============================================================================================================================

    // News
    public function news()
    {
        $query = $this->db->get('news');
        return $query;
    }

    public function create_news($data)
    {
        // $no  = 1;
        $upload_image = $_FILES['gambar']['name'];

        if($upload_image){
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['upload_path'] = './assets/img/';
            $config['file_name'] = 'news-';

            $this->load->library('upload', $config);

            if($this->upload->do_upload('gambar')){
                $image = $this->upload->data('file_name');
            } else {
                $image = null;
            }
        }

        $data = [
            'judul' => $this->input->post('judul'),
            'tipe' => $this->input->post('tipe'),
            'konten' => $this->input->post('konten'),
            'gambar' => $image
            
        ];
        $this->db->insert('news', $data);
    }

    public function detail_news($id)
    {

        return $this->db->get_where('news', ['id_news' => $id])->row_array();
    }

    public function update_news($data, $where)
    {
       // $no  = 1;
       $upload_image = $_FILES['gambar']['name'];

        if($upload_image){
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['upload_path'] = './assets/img/';
            $config['file_name'] = 'news-';

            $this->load->library('upload', $config);

            if($this->upload->do_upload('gambar')){
                $image = $this->upload->data('file_name');
                $this->db->where($where)->set('gambar', $image)->update('news');
            }
        }

        return $this->db->where($where)->set($data)->update('news');
    }

    public function delete_news($id)
    {
        $this->db->delete('news', ['id_news' => $id]);
    }

    //===============================================================================================================================

    public function comment_materi()
    {
        $comment = $this->db->get('comment2');

        return $comment;

    }

    public function comment_news()
    {
        $comment = $this->db->get('comment');

        return $comment;

    }

    public function delete_komen2($id)
    {
        $this->db->delete('comment2', ['id_komen' => $id]);
    }

    public function delete_komen($id)
    {
        $this->db->delete('comment', ['id_komen' => $id]);
    }   

    //===============================================================================================================================

    //diskusi
    public function diskusi()
    {
        return $this->db->get('diskusi');
    }

    public function delete_diskusi($id)
    {
        $this->db->delete('diskusi', ['id_diskusi' => $id]);
        $this->db->delete('diskusi', ['id_parent' => $id]);
    }


    public function show_diskusi_detail($id_diskusi)
    { 
        //$limit, $start,, $limit, $start
        return $this->db->order_by('date', 'desc')
            // ->where('id_parent', '0')
            ->where('id_diskusi', $id_diskusi)
            ->get('diskusi')
            ->result_array();
    }


}

?>