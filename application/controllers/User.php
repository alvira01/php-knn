<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
    $this->load->model('edit_model');
    }
    public function index()
    {
        $data['title'] ='Profil'; 
        $data['user'] = $this->db->get_where('user', ['nis' =>
        $this->session->userdata('nis')])-> row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    public function datadiri()
    {
    $data['title'] ='Input Data Diri'; 
    $data['user'] = $this->db->get_where('user', ['nis' =>
    $this->session->userdata('nis')])-> row_array();

    $this->_rules();
    if ($this->form_validation->run() == FALSE){
    
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('user/datadiri', $data);
    $this->load->view('templates/footer');
    }else{
        $data = array(
            'name'=> $this->input->post('name'),
            'nis'=> $this->input->post('nis'),
            'kelas'=> $this->input->post('kelas'),
            'tempat_lahir'=> $this->input->post('tempat_lahir'),
            'tanggal_lahir'=> $this->input->post('tanggal_lahir'), 
         
        );
        $this->db->insert('data_peserta', $data);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Ditambahkan!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('user');
    }
    }
    public function editdata()
    {
    $data['title'] ='Edit Data Diri'; 
    $data['user'] = $this->db->get_where('user', ['nis' =>
    $this->session->userdata('nis')])-> row_array();
    
    $this->_rules();
    if ($this->form_validation->run() == FALSE){
        
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('user/editdata', $data);
    $this->load->view('templates/footer');
    }else{
            $data = array(
                'name'=> $this->input->post('name'),
                'nis'=> $this->input->post('nis'),
                'kelas'=> $this->input->post('kelas'),
                'tempat_lahir'=> $this->input->post('tempat_lahir'),
                'tanggal_lahir'=> $this->input->post('tanggal_lahir'),
                
            );
            $this->db->update('data_peserta',$data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Diubah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('user/editdata');
    }
    }
    public function ubahPassword()
    {
        $data['title'] ='Ubah Password'; 
        $data['user'] = $this->db->get_where('user', ['nis' =>
        $this->session->userdata('nis')])-> row_array(); 

        $this->load->library('form_validation');
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[3]|matches[password_baru2]');
        $this->form_validation->set_rules('password_baru2', 'Ulangi Password', 'required|trim|min_length[3]|matches[password_baru1]');

        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/ubahpassword', $data);
        $this->load->view('templates/footer');
    }
    else{
        $password_lama=$this->input->post('password_lama');
        $password_baru = $this->input->post('password_baru1');
        if(!password_verify($password_lama, $data['user']['password'])) {
           $this->session->set_flashdata('message', '<div class="alert
           alert-danger" role="alert">Password Yang Anda Masukkan Salah!</div>');
           redirect('user/ubahpassword'); 
        }else {
            if ($password_lama == $password_baru) {
                $this->session->set_flashdata('message', '<div class="alert
           alert-danger" role="alert">Password Baru Tidak Boleh Sama Dengan Password Lama!</div>');
           redirect('user/ubahpassword');
            } else {
                // password oke
                $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('nis', $this->session->userdata('nis'));
                $this->db->update('user');

                $this->session->set_flashdata('message', '<div class="alert
                alert-success" role="alert">Password Anda Berhasil Diubah!</div>');
                redirect('user/ubahpassword'); 
            }
        }
    }
}
public function view_datadiri()
{
$data['title'] ='View Data Diri'; 
$data['user'] = $this->db->get_where('data_peserta', ['nis' =>
$this->session->userdata('nis')])-> row_array();

$this->load->view('templates/header', $data);
$this->load->view('templates/sidebar', $data);
$this->load->view('templates/topbar', $data);
$this->load->view('user/view_datadiri', $data);
$this->load->view('templates/footer');
}
public function _rules()
{
    $this->form_validation->set_rules('name', 'Nama Lengkap','required',array (
        'required' => '%s harus diisi !!'
    ));
    $this->form_validation->set_rules('nis', 'NIS','required',array (
        'required' => '%s harus diisi !!'
    ));
    $this->form_validation->set_rules('kelas', 'Kelas','required',array (
        'required' => '%s harus diisi !!'
    ));
    $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir','required',array (
        'required' => '%s harus diisi !!'
    ));
    $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir','required',array (
        'required' => '%s harus diisi !!'
    ));
}

}
