<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * author ryanadi
 */

class Model_Loginreg extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function registration()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'email' => $email,
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            // 'foto' => 'avatar-1.jpg',
            // 'telepon' => htmlspecialchars($this->input->post('telepon', true)),
            // 'role' => 2,
            'activate' => 1,
        ];
        $this->db->insert('mejauser', $data);

        $datauser = $this->db->get_where('mejauser', ['email' => $email])->row_array();
        $id = $datauser['id_user'];
        $data_profil = [
            'id_user' => $id,
            'telepon' => null,
            'biodata' => null,
            'foto' => 'avatar-1.jpg',
            // 'exp' => 0,
        ];
        $this->db->insert('profil', $data_profil);
    }

}
