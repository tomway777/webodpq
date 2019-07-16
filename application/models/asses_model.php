<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class asses_model extends CI_Model {


    public function getAllPemda(){
        $result = array();
        $this ->db->select('*')->from('pemdackan');
        $this->db->where('tanggal IN (SELECT MAX(`tanggal`) FROM `pemdackan`)');
        $query = $this->db->get();
        foreach ($query->result_array() as $row){
            $result[] =
                array("id_pemda" => $row['id_pemda'],
                "nama_pemda" => $row["nama_pemda"],
                "link" => $row["link_package"],
                "numDataset" => (int)$row["numdataset"],
                "numResource"=> (int)$row["numresource"],
                    "tanggal" => $row["tanggal"]);
        }
        return $result;
    }

    //---------------------------------------------fungsi Baru----------------------------------//
    public function getDetailChart($id){
        $sql = "SELECT DISTINCT fileformattp, licensetp, emailtype, kategori FROM pemdackan WHERE id_pemda = {$id}";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getAvgNilai(){
        $sql = "SELECT FORMAT(avg(access),4) as access, Format(avg(discovery),4) as discovery,
                format(avg(contact),4) as contact, format(avg(`right`),4) as `right`,
                format(avg(preservation),4) as pres, format(avg(`date`),4) as `date`, format(avg(accessurl),4) as accessurl,
                format(avg(contacturl),4) as contacturl,format(avg(dateformat),4) as dateformat, format(avg(license),4) as license,format(avg(fileformat),4) as fileformat,
                format(avg(contactemail),4) as contactemail, format(avg(openformat),4) as openformat, format(avg(machineread),4) as machineread, format(avg(openlicense),4) as openlicense
                FROM tugasakhir.penliaiankualitas";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getNilai($orderby){
        $sql = "SELECT penilaiandimensi.id_pemda, pemdackan.nama_pemda, pemdackan.numdataset,
        std(Existence) as sExistence,
        std(Conformance) as sConformance,
        std(OpenData) as sOpenData,
        std(Total) as sTotal,
        avg(Existence) as Existence,
        avg(Conformance) as Conformance,
        avg(OpenData) as OpenData,
        avg(Total) as Total
        FROM penilaiandimensi JOIN pemdackan ON pemdackan.id_pemda = penilaiandimensi.id_pemda group by id_pemda {$orderby};";
        $res = $this->db->query($sql);
        return $res -> result_array();
    }
    public function getPemda(){
        $query = $this->db->get("pemdackan");
        return $query->result_array();
    }

    public function getSpesJoinedTable($id){
        $sql = "select distinct pemdackan.id_pemda,nama_pemda, DATE_FORMAT(created_at, '%d-%m-%Y') as created_at, `access`,
                discovery,`contact`,`right`,preservation,`date`,accessurl,contacturl,dateformat,penliaiankualitas.`license`,fileformat,
                contactemail,openformat,machineread,openlicense FROM pemdackan INNER JOIN penliaiankualitas
                ON pemdackan.id_pemda = penliaiankualitas.id_pemda WHERE pemdackan.id_pemda =".$id;
        $query = $this->db->query($sql);
       return $query->result_array();
    }

    public function getAHPval(){
        $query = $this->db->get('ahppemda');
        foreach ($query->result_array() as $a){
            $res [] = array(
                "id" => $a['idahp'],
                "existence" => (float)$a['existence'],
                "conformance"=> (float)$a['conformance'],
                "opendata" => (float)$a['opendata']
            );
        }
        return $res;
    }
}
