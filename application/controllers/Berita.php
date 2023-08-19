                    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login')!=true){
            
            redirect(base_url('index.php/login'),'refresh');
            
        } 
            
 }

    public function index()
    {
        $data['konten']="v_berita";
        $this->load->model('berita_model');
        $data['data_berita']=$this->berita_model->get_berita();
        $this->load->view('template', $data, FALSE);
    }

    public function simpan_berita()
    {
        
        $this->form_validation->set_rules('data', 'Data', 'trim|required',
        array('required' => 'SEMUA HARUS DIISI !!'));
        if ($this->form_validation->run() == TRUE) {
            $this->load->model('berita_model','brt');
            $masuk=$this->brt->masuk_db();
            if($masuk==true){
                $this->session->set_flashdata('pesan','Sukses masuk');
            }
            else{
                // $this->session->set_flashdata('pesan', 'gagal masuk');            
            }
            
            redirect(base_url('index.php/berita'),'refresh');
            
        } else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect(base_url('index.php/berita'),'refresh');
            
        }
    }

    public function get_detail_berita($id_berita='')
    {
        $this->load->model('berita_model');
        $data_detail=$this->berita_model->detail_berita($id_berita);
        echo json_encode($data_detail); 
    }
    public function update_berita()
    {
        
        $this->form_validation->set_rules('data', 'Data', 'trim|required');
        

        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', validation_errors());
            
            redirect(base_url('index.php/berita'),'refresh');   
        } else {
            $this->load->model('berita_model');
            $proses_update=$this->berita_model->update_berita();
            if($proses_update){
                $this->session->set_flashdata('pesan', 'sukses update');        
            } else {
                $this->session->set_flashdata('pesan', 'gagal update');
            }      
            redirect(base_url('index.php/berita'),'refresh');
            
        }
        
    }

    public function hapus_berita($id_berita)
    {
        $this->load->model('berita_model');
        $proses_delete = $this->berita_model->hapus_berita($id_berita);

        if ($proses_delete == TRUE) {
        $this->session->set_flashdata('pesan', 'Sukses Hapus Data');
            
        } else {
            $this->session->set_flashdata('pesan', 'Gagal Hapus Data');
            
        }

        redirect(base_url('index.php/berita'),'refresh');
        
    }
}

/* End of file Controllername.php */
