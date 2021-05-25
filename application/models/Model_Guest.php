<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * author ryanadi
 */

class Model_Guest extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_feedback()
    {

    	return $this->db->from('feed')
        ->join('mejauser','mejauser.id_user=feed.id_user')
        ->join('profil','profil.id_user=mejauser.id_user')
        ->get()->result_array();
    }

    public function datauser()
    {

        return $this->db->get_where('mejauser', ['email' => $this->session->userdata('email')])->row_array();
    }

    public function profil($id)
    {
        return $this->db->get_where('profil', ['id_user' => $id])->row_array();
    }

    public function keyword_all($keyword)
    {
        return $this->db->select('*')
        ->from('materi')
        ->like('nama_mapel', $keyword)
        ->or_like('judul_bab', $keyword)
        ->get()->result();
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
}

?>