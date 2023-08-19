<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gambar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login')!=true){
            
            redirect(base_url('index.php/login'),'refresh');
            
        } 
            
 }

    public function index()
    {
        $data['konten']="v_gambar";
        $this->load->model('gambar_model');
        $data['data_gambar']=$this->gambar_model->get_gambar();
        $this->load->view('template', $data, FALSE);
    }

    public function simpan_gambar()
    {
        
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required',
        array('required' => 'SEMUA HARUS DIISI !!'));
        if ($this->form_validation->run() == TRUE) {
            $this->load->model('gambar_model','gmbr');
            $masuk=$this->gmbr->masuk_db();
            if($masuk==true){
                $this->session->set_flashdata('pesan','Sukses masuk');
            }
            else{
                // $this->session->set_flashdata('pesan', 'gagal masuk');            
            }
            
            redirect(base_url('index.php/gambar'),'refresh');
            
        } else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect(base_url('index.php/gambar'),'refresh');
            
        }
    }

    public function get_detail_gambar($id_gambar='')
    {
        $this->load->model('gambar_model');
        $data_detail=$this->gambar_model->detail_gambar($id_gambar);
        echo json_encode($data_detail); 
    }
    public function update_gambar()
    {
        
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        

        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', validation_errors());
            
            redirect(base_url('index.php/gambar'),'refresh');   
        } else {
            $this->load->model('gambar_model');
            $proses_update=$this->gambar_model->update_gambar();
            if($proses_update){
                $this->session->set_flashdata('pesan', 'sukses update');        
            } else {
                $this->session->set_flashdata('pesan', 'gagal update');
            }      
            redirect(base_url('index.php/gambar'),'refresh');
            
        }
        
    }

    public function hapus_gambar($id_gambar)
    {
        $this->load->model('gambar_model');
        $proses_delete = $this->gambar_model->hapus_gambar($id_gambar);

        if ($proses_delete == TRUE) {
        $this->session->set_flashdata('pesan', 'Sukses Hapus Data');
            
        } else {
            $this->session->set_flashdata('pesan', 'Gagal Hapus Data');
            
        }

        redirect(base_url('index.php/gambar'),'refresh');
        
    }
}

/* End of file Controllername.php */
