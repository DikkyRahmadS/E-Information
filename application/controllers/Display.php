<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Display extends CI_Controller {

  public function index()
  {
  	$data['gambar'] = $this->db->get('gambar')->result_array();
    $data['berita'] = $this->db->get('berita')->result_array();
    $data['text'] = $this->db->get('text')->result_array();
    $this->load->view('template_display', $data);
  }

}
