<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asisten_model extends CI_Model
{
    private $table = 'asisten';

    //validasi form, method ini akan mengembailkan data berupa rules validasi form       
    public function rules()
    {
        return [
            [
                'field' => 'IdMhs',  //samakan dengan atribute name pada tags input
                'label' => 'ID Mahasiswa',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'MataKuliah',  //samakan dengan atribute name pada tags input
                'label' => 'ID Dosen',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'MataKuliah',  //samakan dengan atribute name pada tags input
                'label' => 'Mata Kuliah',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'JamTerabang',
                'label' => 'Jam Terbang',
                'rules' => 'trim|required'
            ]
        ];
    }

    //menampilkan data mahasiswa berdasarkan id
    function getDataIdMhs()
    {
        $query = $this->db->query("SELECT * FROM mahasiswa ORDER BY IdMhs ASC");

        return $query->result();
    }

    //menampilkan data dosen berdasarkan id
    function getDataIdDsn()
    {
        $query = $this->db->query("SELECT * FROM dosen ORDER BY IdDsn ASC");

        return $query->result();
    }

    //menampilkan data asisten berdasarkan id asisten
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["IdAst" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from asisten where IdAst='$id'
    }

    //menampilkan semua data asisten
    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->order_by("IdAst", "desc");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from asisten order by IdAst desc
    }

    //menyimpan data asisten
    public function save()
    {
        $data = array(
            "IdMhs" => $this->input->post('IdMhs'),
            "IdDsn" => $this->input->post('IdDsn'),
            "MataKuliah" => $this->input->post('MataKuliah'),
            "JamTerabang" => $this->input->post('JamTerabang')
        );
        return $this->db->insert($this->table, $data);
    }

    //edit data asisten
    public function update()
    {
        $data = array(
            "IdMhs" => $this->input->post('IdMhs'),
            "IdDsn" => $this->input->post('IdDsn'),
            "MataKuliah" => $this->input->post('MataKuliah'),
            "JamTerabang" => $this->input->post('JamTerabang')
        );
        return $this->db->update($this->table, $data, array('IdAst' => $this->input->post('IdAst')));
    }

    //hapus data asisten
    public function delete($id)
    {
        return $this->db->delete($this->table, array("IdAst" => $id));
    }
}