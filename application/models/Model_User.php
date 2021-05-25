<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * author ryanadi
 */

class Model_User extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function datauser()
    {

        return $this->db->get_where('mejauser', ['email' => $this->session->userdata('email')])->row_array();
    }

    public function user($id)
    {

        return $this->db->where('id_user',$id)->get('mejauser')->row_array();
    }

    //delete user
    public function delete_user($id)
    {

        $this->db->delete('mejauser', ['id_user' => $id]);
        $this->db->delete('profil', ['id_user' => $id]);
        $this->db->delete('comment', ['id_user' => $id]);
        $this->db->delete('comment2', ['id_user' => $id]);
        $this->db->delete('feed', ['id_user' => $id]);
        $this->db->delete('riwayat', ['id_user' => $id]);
        $this->db->delete('diskusi', ['id_user' => $id]);

    }

    public function keyword_all($keyword)
    {
        return $this->db->select('*')
        ->from('materi')
        ->like('nama_mapel', $keyword)
        ->or_like('judul_bab', $keyword)
        ->get()->result();
    }

    public function create_feedback($id)
    {
        $data = [
            
            'judul_feedback' => $this->input->post('judul_feedback'),
            'isi_feed' => $this->input->post('isi_feed'),
            'id_user' => $id,
        ];
        $this->db->insert('feed', $data);
    }

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
        // ->where('id_user', $id)
        ->update('mejauser');


        $this->db->set('telepon', $telepon)
        ->set('biodata', $biodata)
        ->where('id_user', $id)
        ->update('profil');
    }

    public function get_feedback()
    {

        return $this->db->from('feed')
        ->join('mejauser','mejauser.id_user=feed.id_user')
        ->join('profil','profil.id_user=mejauser.id_user')
        ->get()->result_array();
    }

    // public function get_video()
    // {

    //     return $this->db->get_where('materi')->result_array();
    // }


    //changepass
    public function changepass($data)
    {

        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password1');

        if (!password_verify($old_password, $data['user']['password'])) {

            $this->session->set_flashdata('messagepassword', '<div class="alert alert-danger mt-3" role="alert">Old password is wrong!</div>');
            redirect('user/changepass');
        }
        else {

            if ($old_password == $new_password) {

                $this->session->set_flashdata('messagepassword', '<div class="alert alert-danger mt-3" role="alert">New password cant be the same as old password!</div>');
                redirect('user/changepass');
            } 
            else {

                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $this->db->set('password', $password_hash);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('mejauser');
                $this->session->set_flashdata([
                'type' => 'success',
                'msg' => 'Password changed success!!'
                ]);
                redirect('user/changepass');
            }
        }
    }

    //materi
    public function isi($id)
    {

        return $this->db->get_where('materi', ['id_materi' => $id])->row_array();
    }



    public function get_math($keyword_math)
    {
        if($keyword_math){
        return $this->db
        ->like('judul_bab',$keyword_math)
        ->get_where('materi',['id_sub'=>31])
        ->result_array();
        }
        return $this->db->query('SELECT * FROM materi where nama_mapel = "matematika" and id_sub = 31')->result_array();
    }

    public function get_ind($keyword_ind)
    {
        if($keyword_ind){
        return $this->db
        ->like('judul_bab',$keyword_ind)
        ->get_where('materi',['id_sub'=>34])
        ->result_array();
        }
        return $this->db->query('SELECT * FROM materi where nama_mapel = "bahasa indonesia" and id_sub = 34')->result_array();
    }

    public function get_english($keyword_english)
    {
        if($keyword_english){
        return $this->db
        ->like('judul_bab',$keyword_english)
        ->get_where('materi',['id_sub'=>37])
        ->result_array();
        }
        return $this->db->query('SELECT * FROM materi where nama_mapel = "bahasa inggris" and id_sub = 37')->result_array();
    }

    public function get_ipa($keyword_ipa)
    {
        if($keyword_ipa){
        return $this->db
        ->like('judul_bab',$keyword_ipa)
        ->get_where('materi',['id_sub'=>40])
        ->result_array();
        }
        return $this->db->query('SELECT * FROM materi where nama_mapel = "ipa" and id_sub = 40')->result_array();
    }
    
    public function get_math2($keyword_math)
    {
        if($keyword_math){
        return $this->db
        ->like('judul_bab',$keyword_math)
        ->get_where('materi',['id_sub'=>32])
        ->result_array();
        }
        return $this->db->query('SELECT * FROM materi where nama_mapel = "matematika" and id_sub = 32')->result_array();
    }

    public function get_ind2($keyword_ind)
    {
        if($keyword_ind){
        return $this->db
        ->like('judul_bab',$keyword_ind)
        ->get_where('materi',['id_sub'=>35])
        ->result_array();
        }
        return $this->db->query('SELECT * FROM materi where nama_mapel = "bahasa indonesia" and id_sub = 35')->result_array();
    }

    public function get_english2($keyword_english)
    {
        if($keyword_english){
        return $this->db
        ->like('judul_bab',$keyword_english)
        ->get_where('materi',['id_sub'=>38])
        ->result_array();
        }
        return $this->db->query('SELECT * FROM materi where nama_mapel = "bahasa inggris" and id_sub = 38')->result_array();
    }

    public function get_ipa2($keyword_ipa)
    {
        if($keyword_ipa){
        return $this->db
        ->like('judul_bab',$keyword_ipa)
        ->get_where('materi',['id_sub'=>41])
        ->result_array();
        }
        return $this->db->query('SELECT * FROM materi where nama_mapel = "ipa" and id_sub = 41')->result_array();
    }

    public function get_math3($keyword_math)
    {
        if($keyword_math){
        return $this->db
        ->like('judul_bab',$keyword_math)
        ->get_where('materi',['id_sub'=>33])
        ->result_array();
        }
        return $this->db->query('SELECT * FROM materi where nama_mapel = "matematika" and id_sub = 33')->result_array();
    }

    public function get_ind3($keyword_ind)
    {
        if($keyword_ind){
        return $this->db
        ->like('judul_bab',$keyword_ind)
        ->get_where('materi',['id_sub'=>36])
        ->result_array();
        }
        return $this->db->query('SELECT * FROM materi where nama_mapel = "bahasa indonesia" and id_sub = 36')->result_array();
    }

    public function get_english3($keyword_english)
    {
        if($keyword_english){
        return $this->db
        ->like('judul_bab',$keyword_english)
        ->get_where('materi',['id_sub'=>39])
        ->result_array();
        }
        return $this->db->query('SELECT * FROM materi where nama_mapel = "bahasa inggris" and id_sub = 39')->result_array();
    }

    public function get_ipa3($keyword_ipa)
    {
        if($keyword_ipa){
        return $this->db
        ->like('judul_bab',$keyword_ipa)
        ->get_where('materi',['id_sub'=>42])
        ->result_array();
        }
        return $this->db->query('SELECT * FROM materi where nama_mapel = "ipa" and id_sub = 42')->result_array();
    }

    public function quiz($id)
    {
        return $this->db->get_where('soal', ['id_soal' => $id])->row_array();
    }


    public function getquestion($id_materi)
    {
        return $this->db->where('id_materi', $id_materi)
        ->where('activate', 1)->get('soal')->result_array();
    }

    public function baca($id_user,$id_sub,$id_materi)
    {
        $data = [
            'id_user' => $id_user,
            'id_sub' => $id_sub,
            'id_materi' => $id_materi
        ];
        $this->db->insert('riwayat', $data);
    }

    public function get_riwayat($id_user)
    {
        return $this->db->get_where('riwayat',['id_user'=>$id_user])->result_array();
    }

    public function get_record($id_user)
    {
        return $this->db->get_where('record',['id_user'=>$id_user])->result_array();
    }

    public function isi_news($id)
    {
        return $this->db->get_where('news', ['id_news' => $id])->row_array();
    }

    //comen materi
    public function comment2($id)
    {
        $id_user = $this->input->post('id_user');
        $data = [
            'id_materi' => $id,
            'id_user' => $id_user,
            'komen' => $this->input->post('komen'),
        ];
       $this->db->insert('comment2', $data);
    }

    //show comen materi
    public function show2($id_news)
    {
        return $this->db->order_by('date', 'desc')
            ->limit(10)
            ->get_where('comment2', ['id_materi' => $id_news])->result_array();
    }

    //count comen materi
    public function hitungkomen2($id_materi)
    {
        return $this->db->get_where('comment2', ['id_materi' => $id_materi])->num_rows();
    }

    //delete comen materi
    public function delete_komen2($id)
    {
        $this->db->delete('comment2', ['id_komen' => $id]);
    }

    //comen news
    public function comment($id)
    {
        $id_user = $this->input->post('id_user');
        $data = [
            'id_news' => $id,
            'id_user' => $id_user,
            'komen' => $this->input->post('komen'),
        ];
       $this->db->insert('comment', $data);
    }

    //show comen news
    public function show($id_news)
    {
        return $this->db->order_by('date_komen', 'desc')
            ->limit(10)
            ->get_where('comment', ['id_news' => $id_news])->result_array();
    }

    //count comen news
    public function hitungkomen($id_news)
    {
        return $this->db->get_where('comment', ['id_news' => $id_news])->num_rows();
    }

    //delete comen news
    public function delete_komen($id)
    {
        $this->db->delete('comment', ['id_komen' => $id]);
    }

    public function recent()
    {
        return $this->db->order_by('date', 'desc')
            ->limit(8)
            ->get('news')
            ->result_array();
    }

    public function show_diskusi($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('isi', $keyword);
        }
        return $this->db->order_by('date', 'desc')
            ->get_where('diskusi', ['id_parent' => '0'], $limit, $start)
            ->result_array();
    }

    public function count_diskusi()
    {
        return $this->db->get_where('diskusi', ['id_parent' => '0'])->num_rows();
    }

    public function start_discus($data)
    {
        $this->db->insert('diskusi', $data);
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

    // public function count_diskusi_detail($id_diskusi)
    // {
    //     return $this->db->get_where('diskusi', ['id_parent' => $id_diskusi])->num_rows();
    // }

    public function hitung_nilai($quiz,$ques)
    {
        $nilai=0;
        $no=1;
        foreach ($quiz as $key) {
            $loop = $no++;
            if($ques['ques'.$loop] == $key['kunci']){
                 $nilai += 20;
            }
        }

        return $nilai;
    }

    public function insert_nilai($id_user, $id_materi, $nilai)
    {
        $data=[
            'id_user' => $id_user,
            'id_materi' => $id_materi,
            'nilai' => $nilai
        ];

        $exp = $nilai/2;

        $get_record = $this->db->get_where('record',['id_user'=>$id_user, 'id_materi'=>$id_materi])->row_array();

        if(isset($get_record)){
            $where=[
                'id_user' => $id_user,
                'id_materi' => $id_materi,
            ];
            $time = date('Y-m-d H:i:s', time());
             $set=[
                'remed' => $nilai,
                'date_remed' => $time
            ];

            $this->db->set($set)
            ->where($where)
            ->update('record');
        } else {    
            $this->db->insert('record', $data);
            $get_user = $this->db->get_where('profil',['id_user'=>$id_user])->row_array();
            $update_exp = $get_user['exp'] + $exp;
            $this->db->set('exp', $update_exp)
            ->where('id_user', $id_user)
            ->update('profil');
        }

    }

    public function insert_remedial($id_user, $id_materi, $nilai)
    {
        $set=[
            'remed' => $nilai,
            'date_remed' => datetime(),
        ];

        $where=[
            'id_user' => $id_user,
            'id_materi' => $id_materi,
        ];

        $this->db->set($set)
        ->where($where)
        ->update('record');
    }



}

?>