<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('asses_model');
        $this->load->library('table');
    }


    public function index()
    {
        $pemda = $this->asses_model->getAllPemda();
        $header = array('Id Pemda', 'Nama', 'Link', 'Jumlah Dataset' , 'Jumlah Resource');
        $this->table->set_heading($header);
        $template = array(
            'table_open'  => '<table cellspacing=1 class="table table-striped table-inverse table-responsive">'
        );
        $this->table->set_template($template);
        $this->load->view('/dashboard/index', array("pemda" => $pemda));
    }



    public function getDataPemda(){
        $pemda = $this->asses_model->getAllPemda();
        $data = array('data'=>$pemda);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }


    public function getPenilaian(){
        $data = $this->asses_model->getJoinedTable();
        $bE = 1;
        $bC = 1;
        $bO = 1;
        foreach ($data as $a){
            $result [] = array(
                "id_pemda" => $a['id_pemda'],
                "nama_pemda" => $a['nama_pemda'],
                "existence" => round(($a['access'] + $a['discovery'] + $a['right']+$a['contact'] +$a['preservation']+ $a['date'])/6,2),
                "conformance" => round(($a['accessurl'] + $a['contacturl'] + $a['dateformat'] +$a['license']+ $a['fileformat'] + $a['contactemail'])/6,2),
                "opendata" => round(($a['openformat'] + $a['machineread'] + $a['openlicense'])/3,2),
                "total" => (round(($a['access'] + $a['discovery'] + $a['right']+$a['contact'] +$a['preservation']+ $a['date'])/6,2)*$bE) +
                    (round(($a['accessurl'] + $a['contacturl'] + $a['dateformat'] +$a['license']+ $a['fileformat'] + $a['contactemail'])/6,2)*$bC) +
                    (round(($a['openformat'] + $a['machineread'] + $a['openlicense'])/3,2)*$bO)
            );
        }

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($result));
    }

    public function datametriks(){
        $data = $this->asses_model->getJoinedTable();

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));

    }



}