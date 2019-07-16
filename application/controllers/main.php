<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {
    private $ne = 0;
   public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('asses_model');
        $this->load->library('table');
    }


    public function index()
    {
        $pemda = $this->asses_model->getAllPemda();
        $numdataset = $this->asses_model->getAllPemda();
        $ahp = $this->asses_model->getAHPval();
        $val = array_column($numdataset, 'numDataset');
        array_multisort($val, SORT_DESC, $numdataset);

        $this->load->view('/dashboard/index', array("pemda" => $pemda, "datapemda" => $numdataset, "ahp" => $ahp));
    }

    public function detailpemda($id){
        $ne = (int)$this->uri->segment(2);
        $data['data'] = $this->asses_model->getSpesJoinedTable($ne);
        $this->load->view('/dashboard/detail', $data);
    }

    public function detailAjax(){
        $ne = (int)$this->uri->segment(2);
        $query = $this->asses_model->getDetailChart($ne);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($query));
    }



//    public function getDataPemda(){
//        $pemda = $this->asses_model->getAllPemda();
//        $data = array('data'=>$pemda);
//        return $data;
//    }
//
//
//    public function getPenilaian(){
//        $data = $this->asses_model->getJoinedTable();
//        $bE = 1;
//        $bC = 1;
//        $bO = 1;
//
//        foreach ($data as $a){
//            $result [] = array(
//                "id_pemda" => $a['id_pemda'],
//                "nama_pemda" => $a['nama_pemda'],
//                "existence" =>  round(($a['access'] + $a['discovery'] + $a['right']+$a['contact'] +$a['preservation']+ $a['date'])/6,2),
//                "conformance" => round(($a['accessurl'] + $a['contacturl'] + $a['dateformat'] +$a['license']+ $a['fileformat'] + $a['contactemail'])/6,2),
//                "opendata" => round(($a['openformat'] + $a['machineread'] + $a['openlicense'])/3,2),
//                "total" => (round(($a['access'] + $a['discovery'] + $a['right']+$a['contact'] +$a['preservation']+ $a['date'])/6,2)*$bE) +
//                    (round(($a['accessurl'] + $a['contacturl'] + $a['dateformat'] +$a['license']+ $a['fileformat'] + $a['contactemail'])/6,2)*$bC) +
//                    (round(($a['openformat'] + $a['machineread'] + $a['openlicense'])/3,2)*$bO)
//            );
//        }
//
//        return $this->output
//            ->set_content_type('application/json')
//            ->set_status_header(200)
//            ->set_output(json_encode($result));
//    }
//
//    public function datametriks(){
//        $data = $this->asses_model->getJoinedTable();
//
//
//        return $this->output
//            ->set_content_type('application/json')
//            ->set_status_header(200)
//            ->set_output(json_encode($data));
//
//    }

    //--------------------------------------Fungsi Baru -----------------------------------//
    public function windrose(){
        $nilai = $this->asses_model->getAvgNilai();

        foreach ($nilai as $n){
            foreach ($n as $k => $v){
                $res [] = array(
                    $k,(float)$v
                );
            }
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($res));
    }

    public function getnilaiAHP(){
        $data = $this->asses_model->getNilai("");
        $ahp = $this->asses_model->getAHPval();



        $bE = $ahp[0]['existence'];
        $bC = $ahp[0]['conformance'];
        $bO = $ahp[0]['opendata'];

        foreach ($data as $a){
            $res [] = array(
                'id' => $a['id_pemda'],
                'nama' => $a['nama_pemda'],
                'totalAHP' => round(($bE*$a['Existence'])+($bC*$a['Conformance'])+($bO*$a['OpenData']),3),

            );

        }
//        Sorting array
        $val = array_column($res, 'totalAHP');
        array_multisort($val, SORT_DESC, $res);

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($res));
    }

    public function getNilaiMetrik(){
        $data = $this->asses_model->getNilai("order by Total desc");
        foreach ($data as $a){
            if ($a['numdataset'] > 5000)
            {
                $a['numdataset'] = 5000;
                $ukuran = 7;
            }elseif ($a['numdataset'] <= 5000 and $a['numdataset'] > 900){
                $ukuran = 6;
            }else{
                $ukuran = 5;
            }
            $res []= array(
                'id' => $a['id_pemda'],
                'nama' => $a['nama_pemda'],
                'numdataset' => (int)$a['numdataset'],
                'ukuran' => $ukuran,
                'Existence' =>round($a['Existence'],3),
                'Conformance' =>round($a['Conformance'],3),
                'OpenData' =>round($a['OpenData'],3),
                'stdExistence' =>round($a['sExistence'],3),
                'stdConformance' =>round($a['sConformance'],3),
                'stdOpenData' =>round($a['sOpenData'],3),
                'stdTotal' =>round($a['sTotal'],3),
                'Total' => round($a['Total'],3)
            );
        }

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($res));

    }



}