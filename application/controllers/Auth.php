<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
       
        }
    
    public function index()
    {
        if($this->session->userdata('nis')) {
            redirect('user');
        }
        $this->form_validation->set_rules('nis','NIS','trim|required');
        $this->form_validation->set_rules('password','Password ','trim|required');

        if($this->form_validation->run() == false) {
        $data['title'] = 'Login';
        $this->load->view('auth/login');
        }else {
            $this->_login();
        }
    }
    private function _login()
    {
        $nis = $this->input->post('nis');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['nis' => $nis])->row_array();
  
        //usernya ada
        if($user) {
            //jika usernya aktif
            if($user['is_active'] == 1) {
                //cek password
                if(password_verify($password, $user['password'])) {
                    $data = [
                        'nis' => $user['nis'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if($user['role_id'] == 1) {
                    redirect('panitia');
                    } else{
                        redirect('user');
                    }

            
                }else{
                    $this->session->set_flashdata ('message', '<div class="alert alert-danger" role="alert">
                Password Yang Anda Masukkan Salah! </div>');
                redirect('auth');
                }

            }else{
                $this->session->set_flashdata ('message', '<div class="alert alert-danger" role="alert">
                NIS Anda Belum Aktif! </div>');
                redirect('auth');
            }
            
        } else {
            $this->session->set_flashdata ('message', '<div class="alert alert-danger" role="alert">
            NIS Anda Belum Terdaftar! Silakan Buat Akun! </div>');
            redirect('auth');
    }
}
    public function registration()
    {
        if($this->session->userdata('nis')) {
            redirect('user');
        }
        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nis', 'NIS', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        
        if( $this->form_validation->run() == false) {
        $this->load->view('auth/registration');  
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name',true)),
                'nis' => htmlspecialchars($this->input->post('nis', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata ('message', '<div class="alert alert-success" role="alert">
            Selamat Akun Anda Berhasil Dibuat. Silakan Login! </div>');
            redirect('auth');
        }

    }

    public function _sendEmail()
    {
        $config = [
            'protocol' =>'smtp',
            'smtp_host'=>'ssl://smtp.googlemail.com',
            'smtp_user'=>'paskisagasmea@gmail.com',
            'smpt_pass'=>'saga1234',
            'smtp_port'=>465,
            'mailtype'=> 'html',
            'charset'=>'utf-8',
            'newline'=>"\r\n"
        ];

        $this->load->library('email', $config);

        $this->email->from('paskisagasmea@gmail.com','SAGA APP');
        $this->email->to($this->input->post('email'));

        $this->email->subject('Reset Password');
        $this->email->message('Click this link to reset your password : <a href="'.base_url().'auth/
        resetpassword?email='.$this->input->post('email').
        '&token='.urlencode($token). '">Reset Password</a>');

        if($this->email->send()) {
            return true;
        }else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nis');
        $this->session->unset_userdata('password');

            $this->session->set_flashdata ('message', '<div class="alert alert-success" role="alert">
            Anda Berhasil Logout! </div>');
            redirect('auth');
    }

    public function blocked()
    {
        echo 'access blocked!';
    }

    public function lupaPassword()
    {
        
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if($this->form_validation->run() ==  false) {
        $data['title'] = 'Lupa Password';
        $this->load->view('auth/lupapassword');
    } else {
        $email = $this->input->post('email');
        $user = $this->db->get_where('user',['email'=> $email, 'is_active'=> 1]) -> row_array();

        if($user) {
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user_token', $user_token);
            $this->_sendEmail('$token', 'forgot');

            $this->session->set_flashdata ('message', '<div class="alert alert-danger" role="alert">
            Cek Email Anda Untuk Mengatur Ulang Kata Sandi</div>');
            redirect('auth/lupapassword');

        } else {
            $this->session->set_flashdata ('message', '<div class="alert alert-danger" role="alert">
            Email Belum Terdaftar!</div>');
            redirect('auth/lupapassword');
        }
    }
}
}
