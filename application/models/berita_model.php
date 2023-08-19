<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class berita_model extends CI_Model {

    public function get_berita()
    {
        $data_berita= $this->db->get('berita')->result();
        return $data_berita; 
    }
    public function masuk_db()
    {
        
      
            $data_berita = array(
               
                'data'=>$this->input->post('data')
            );
                $sql_masuk= $this->db->insert('berita', $data_berita);
                return $sql_masuk;
        
        

    }

    public function detail_berita($id_berita='')
    {
        return $this->db->where('id_berita',$id_berita)->get('berita')->row();
    }

    public function update_berita()
    {
      
            $dt_up_berita=array(
               
                'data'=>$this->input->post('data')
                
            );
            return $this->db->where('id_berita',$this->input->post('id_berita'))
                            ->update('berita', $dt_up_berita);
        
        
        
    }
    public function hapus_berita($id_berita)
    {
        $delete = $this->db->where('id_berita', $id_berita)->delete('berita');
        return $delete;
    }
}

/* End of file Kategori_model.php */
