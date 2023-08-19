                    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Text extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login')!=true){
            
            redirect(base_url('index.php/login'),'refresh');
            
        } 
            
 }

    public function index()
    {
        $data['konten']="v_text";
        $this->load->model('text_model');
        $data['data_text']=$this->text_model->get_text();
        $this->load->view('template', $data, FALSE);
    }

    public function simpan_text()
    {
        
        $this->form_validation->set_rules('data', 'Data', 'trim|required',
        array('required' => 'SEMUA HARUS DIISI !!'));
        if ($this->form_validation->run() == TRUE) {
            $this->load->model('text_model','txt');
            $masuk=$this->txt->masuk_db();
            if($masuk==true){
                $this->session->set_flashdata('pesan','Sukses masuk');
            }
            else{
                // $this->session->set_flashdata('pesan', 'gagal masuk');            
            }
            
            redirect(base_url('index.php/text'),'refresh');
            
        } else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect(base_url('index.php/text'),'refresh');
            
        }
    }

    public function get_detail_text($id_text='')
    {
        $this->load->model('text_model');
        $data_detail=$this->text_model->detail_text($id_text);
        echo json_encode($data_detail); 
    }
    public function update_text()
    {
        
        $this->form_validation->set_rules('data', 'Data', 'trim|required');
        

        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', validation_errors());
            
            redirect(base_url('index.php/text'),'refresh');   
        } else {
            $this->load->model('text_model');
            $proses_update=$this->text_model->update_text();
            if($proses_update){
                $this->session->set_flashdata('pesan', 'sukses update');        
            } else {
                $this->session->set_flashdata('pesan', 'gagal update');
            }      
            redirect(base_url('index.php/text'),'refresh');
            
        }
        
    }

    public function hapus_text($id_text)
    {
        $this->load->model('text_model');
        $proses_delete = $this->text_model->hapus_text($id_text);

        if ($proses_delete == TRUE) {
        $this->session->set_flashdata('pesan', 'Sukses Hapus Data');
            
        } else {
            $this->session->set_flashdata('pesan', 'Gagal Hapus Data');
            
        }

        redirect(base_url('index.php/text'),'refresh');
        
    }
}

/* End of file Controllername.php */
