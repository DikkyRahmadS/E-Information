<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class gambar_model extends CI_Model {

    public function get_gambar()
    {
        $data_gambar= $this->db->get('gambar')->result();
        return $data_gambar; 
    }
    public function masuk_db()
    {
        
        $config['upload_path'] = './assets/gambar';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '10000';
        $config['max_width']  = '102400';
        $config['max_height']  = '76800';
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('gambar')){
            $this->session->set_flashdata('pesan', $this->upload->display_errors());
            return false;
            
        }
        else{
            $data_gambar = array(
                'gambar' => $this->upload->data('file_name'),
                'keterangan'=>$this->input->post('keterangan')
            );
                $sql_masuk= $this->db->insert('gambar', $data_gambar);
                return $sql_masuk;
        }
        

    }

    public function detail_gambar($id_gambar='')
    {
        return $this->db->where('id_gambar',$id_gambar)->get('gambar')->row();
    }

    public function update_gambar()
    {
        $nama_gambar = $_FILES['gambar']['name'];
        if($nama_gambar!=""){
            
            $config['upload_path'] = './assets/gambar';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']  = '1000000';
            $config['max_width']  = '1024000';
            $config['max_height']  = '768000';
            
            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('gambar')){
                 $this->session->set_flashdata('pesan', $this->upload->display_errors());
                 
                 return false;           
            }
            else{
                $dt_up_gambar=array(
                'gambar' => $this->upload->data('file_name'),
                'keterangan'=>$this->input->post('keterangan')
                );
                return $this->db->where('id_gambar',$this->input->post('id_gambar'))
                                ->update('gambar', $dt_up_gambar);
            }
            
        } else {
            $dt_up_gambar=array(
               
                'keterangan'=>$this->input->post('keterangan')
                
            );
            return $this->db->where('id_gambar',$this->input->post('id_gambar'))
                            ->update('gambar', $dt_up_gambar);
        }
        
        
    }
    public function hapus_gambar($id_gambar)
    {
        $delete = $this->db->where('id_gambar', $id_gambar)->delete('gambar');
        return $delete;
    }
}

/* End of file Kategori_model.php */
