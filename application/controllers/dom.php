<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class dom extends CI_Controller{
      function __construct() { 
 parent::__construct();
 } 
 function index()
 {
 $this->load->library('pdf');
 $dompdf = new Dompdf\Dompdf();
 // Set Font Style
 $dompdf->set_option('defaultFont', 'Courier');
 $html = "<p style='text-align: center'>My First Dom Pdf Example</p>";
 $dompdf->loadHtml($html);
 // To Setup the paper size and orientation
 $dompdf->setPaper('A4', 'landscape');
 // Render the HTML as PDF
 $dompdf->render();
 // Get the generated PDF file contents
 $pdf = $dompdf->output();
 // Output the generated PDF to Browser
 $dompdf->stream();
 }
}