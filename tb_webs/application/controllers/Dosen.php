<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Dosen_model"); //load model dosen
    }

    //method pertama yang akan di eksekusi
    public function index()
    {

        $data["title"] = "List Data Dosen";
        //ambil fungsi getAll untuk menampilkan semua data dosen
        $data["data_dosen"] = $this->Dosen_model->getAll();
        //load view header.php pada folder views/templates
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        //load view index.php pada folder views/dosen
        $this->load->view('dosen/index', $data);
        $this->load->view('templates/footer');
    }

    //method add digunakan untuk menampilkan form tambah data dosen
    public function add()
    {
        $Dosen = $this->Dosen_model; //objek model
        $validation = $this->form_validation; //objek form validation
        $validation->set_rules($Dosen->rules()); //menerapkan rules validasi pada dosen_model
        //kondisi jika semua kolom telah divalidasi, maka akan menjalankan method save pada dosen_model
        if ($validation->run()) {
            $Dosen->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Dosen berhasil disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("dosen");
        }
        $data["title"] = "Tambah Data Dosen";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('dosen/add', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('dosen');

        $Dosen = $this->Dosen_model;
        $validation = $this->form_validation;
        $validation->set_rules($Dosen->rules());

        if ($validation->run()) {
            $Dosen->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Dosen berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("dosen");
        }
        $data["title"] = "Edit Data Dosen";
        $data["data_dosen"] = $Dosen->getById($id);
        if (!$data["data_dosen"]) show_404();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('dosen/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();
        $this->Dosen_model->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Dosen berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        $this->output->set_output(json_encode($msg));
    }
}