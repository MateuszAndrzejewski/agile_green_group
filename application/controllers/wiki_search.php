<?php
class WikiSearch extends CI_Controller {
   public function view($page = 'wiki_api_test')
   {
      if ( ! file_exists(APPPATH.'views/'.$page.'.php'))
      {
              // Page does not exist
              show_404();
      }

      $data['title'] = ucfirst($page); // Capitalize the first letter

      $this->load->view('templates/header', $data);
      $this->load->view(.$page, $data);
      $this->load->view('templates/footer', $data);
   }
}
