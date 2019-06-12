<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class asses_model extends CI_Model {

    public function getPemdabyID($idpemda){
        $query = $this->db->get_where('pemdackan', array('id_pemda' => $idpemda));
        return $query;
    }

    public function getAllPemda(){
        $result = array();
        $query = $this ->db->get('pemdackan');
        foreach ($query->result_array() as $row){
            $result[] =
                array("id_pemda" => $row['id_pemda'],
                "nama_pemda" => $row["nama_pemda"],
                "link" => $row["link_package"],
                "numDataset" => $row["numdataset"],
                "numResource"=> $row["numresource"]);
        }
        return $result;
    }

    public function getPenilaian($idpemda){
        $query = $this->db->get_where('penliaiankualitas', array('id_pemda' => $idpemda));
        return $query;
    }


    public function getJoinedTable(){
        $this->db->select('*');
        $this->db->from('pemdackan');
        $this->db->join('penliaiankualitas', 'pemdackan.id_pemda = penliaiankualitas.id_pemda');
        $query = $this->db->get();
        return $query->result_array();
    }

}
