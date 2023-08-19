<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class text_model extends CI_Model {

    public function get_text()
    {
        $data_text= $this->db->get('text')->result();
        return $data_text; 
    }
    public function masuk_db()
    {
        
      
            $data_text = array(
               
                'data'=>$this->input->post('data')
            );
                $sql_masuk= $this->db->insert('text', $data_text);
                return $sql_masuk;
        
        

    }

    public function detail_text($id_text='')
    {
        return $this->db->where('id_text',$id_text)->get('text')->row();
    }

    public function update_text()
    {
      
            $dt_up_text=array(
               
                'data'=>$this->input->post('data')
                
            );
            return $this->db->where('id_text',$this->input->post('id_text'))
                            ->update('text', $dt_up_text);
        
        
        
    }
    public function hapus_text($id_text)
    {
        $delete = $this->db->where('id_text', $id_text)->delete('text');
        return $delete;
    }
}

/* End of file Kategori_model.php */
