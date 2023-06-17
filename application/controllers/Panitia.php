<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Panitia extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->database();
        $this->load->model('tabel_model');
        $this->load->model('training_model');
        $this->load->model('testing_model');
        $this->load->model('testing_normal_model');
        }

    
    public function index()
    {
        $data['title'] ='Dashboard'; 
        $data['user'] = $this->db->get_where('user', ['nis' =>
        $this->session->userdata('nis')])-> row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('panitia/dashboard', $data);
        $this->load->view('templates/footer');
}
public function tabel()
{
    $data['title'] ='Data Peserta'; 
    $data['panitia'] = $this->db->get_where('user')->result();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('panitia/tabel', $data);
    $this->load->view('templates/footer');
}

public function kriteria()
{
    $data['title'] ='Kriteria'; 
    $data['panitia']= $this->training_model->get_data('kriteria')->result();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('panitia/kriteria');
    $this->load->view('templates/footer');
}
public function testing()
{
    $data['title'] ='Data Testing'; 
    $data['panitia']= $this->testing_model->get_data('testing')->result();
    $data['peserta']= $this->testing_normal_model->get_data('testing_normal')->result();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('panitia/testing');
    $this->load->view('templates/footer');
}

public function tambah()
{
    $data['title']= 'Tambah Data Testing';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('panitia/tambah');
        $this->load->view('templates/footer');
}
public function aksi()
{
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
        $this->tambah();
    }else {
    $data = array(
    'name'=> $this->input->post('name'),
    'nis'=> $this->input->post('nis'),
    'pbb'=> $this->input->post('pbb'),
    'fisik'=> $this->input->post('fisik'),
    'pengetahuan'=> $this->input->post('pengetahuan'),
    'klasifikasi'=> $this->input->post('klasifikasi'),
    );
    $this->testing_model->insert_data($data, 'testing');

    $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Ditambahkan!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('panitia/testing');
}
}


public function edit($id_peserta)
{
    $this->_rules();
    if ($this->form_validation->run() == FALSE) {
        $this->testing();
    }else{
        $data = array(
            'id_peserta '=> $id_peserta,
            'name'=> $this->input->post('name'),
            'nis'=> $this->input->post('nis'),
            'pbb'=> $this->input->post('pbb'),
            'fisik'=> $this->input->post('fisik'),
            'pengetahuan'=> $this->input->post('pengetahuan'),
            'klasifikasi'=> $this->input->post('klasifikasi'),
            );
            $this->testing_model->update_data($data, 'testing');
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data Berhasil Diubah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
              redirect('panitia/testing');
        }
}


public function training()
{
    $data['title'] ='Data Training'; 
    $data['panitia']= $this->training_model->get_data('training')->result();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('panitia/training');
    $this->load->view('templates/footer');
}
public function prediksi()
{
    $data['title'] ='Prediksi'; 
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('panitia/prediksi');
    $this->load->view('templates/footer');
}
public function tambah_aksi()
{
    $this->_rules();
    if ($this->form_validation->run() == FALSE) {
        $this->training();
    }else {
    $data = array(
    'name'=> $this->input->post('name'),
    'nis'=> $this->input->post('nis'),
    'pbb'=> $this->input->post('pbb'),
    'fisik'=> $this->input->post('fisik'),
    'pengetahuan'=> $this->input->post('pengetahuan'),
    'klasifikasi'=> $this->input->post('klasifikasi'),
    );
    $this->training_model->insert_data($data, 'training');

    $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Ditambahkan!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('panitia/training');
    }
}

public function normalisasi()
{

    if ($this->input->post('submit')) {
        // Logika atau aksi yang ingin Anda lakukan saat tombol diklik
    
    $data = "Nathan";
echo "<script>console.log('{$data}' );</script>";

    
    $this->testing_normal_model-->clear( );//kosongka normalisasi
        $panitia = $this->testing_normal_model-->read(  );
        $min_max = $this->testing_model-->get_min_max(  );

        if( empty( $min_max ) ) {
            redirect(site_url('panitia/testing'));
            return;
        }
        // echo json_encode( $min_max );
        // prosedur untuk menormalisasi
        for( $i=0; $i< count( $panitia ); $i++ )
        {
            // echo round( $panitia[ $i ]->data_UKT,3)."<br>";
            $len = $min_max["max_pbb"] -  $min_max["min_pbb"];
            $panitia[ $i ]->pbb  =  ( ( $panitia[ $i ]->pbb - $min_max["min_pbb"] )/( $len ) )* 1 + 0 ;
            $panitia[ $i ]->pbb = round( $panitia[ $i ]->pbb, 4 );

            $len = $min_max["max_fisik"] -  $min_max["min_fisik"];
            $panitia[ $i ]->fisik  =  ( ( $panitia[ $i ]->fisik - $min_max["min_fisik"] )/( $len ) )* 1 + 0 ;
            $panitia[ $i ]->fisik = round( $panitia[ $i ]->fisik, 4 );

            $len = $min_max["max_pengetahuan"] -  $min_max["min_pengetahuan"];
            $panitia[ $i ]->pengetahuan  =  ( ( $panitia[ $i ]->pengetahuan - $min_max["min_pengetahuan"] )/( $len ) )* 1 + 0 ;
            $panitia[ $i ]->pengetahuan = round( $panitia[ $i ]->pengetahuan, 4 );

        }
        
        if( $this->testing_normal_model-->create( $panitia ) ){
            $this->session->set_flashdata('info', array(
                'from' => 1,
                'message' =>  'item berhasil di normalisasi'
              ));
              redirect(site_url('panitia/testing'));
              return;
        }
        $this->session->set_flashdata('info', array(
            'from' => 0,
            'message' =>  'terjadi kesalahan saat mengirim data'
          ));
          redirect(site_url('panitia/testing'));
        }
}
public function delete($id)
{
    $where = array ('id_peserta' => $id);

    $this->tabel_model->delete($where, 'data_peserta');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Berhasil Dihapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('panitia/tabel');
}

public function hapus($id_peserta)
{
    $where = array ('id_peserta' => $id_peserta);

    $this->tabel_model->delete($where, 'testing');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Berhasil Dihapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('panitia/testing');
}

public function _rules()
{
    $this->form_validation->set_rules('name', 'Nama Lengkap','required',array (
        'required' => '%s harus diisi !!'
    ));
    $this->form_validation->set_rules('nis', 'NIS','required',array (
        'required' => '%s harus diisi !!'
    ));
    $this->form_validation->set_rules('pbb', 'PBB','required',array (
        'required' => '%s harus diisi !!'
    ));
    $this->form_validation->set_rules('fisik', 'Fisik','required',array (
        'required' => '%s harus diisi !!'
    ));
    $this->form_validation->set_rules('pengetahuan', 'Pengetahuan','required',array (
        'required' => '%s harus diisi !!'
    ));
    $this->form_validation->set_rules('klasifikasi', 'Klasifikasi','required',array (
        'required' => '%s harus diisi !!'
    ));
}

}

