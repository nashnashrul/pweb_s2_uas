<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asisten extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Asisten_model"); //load model asisten
    }

    //method pertama yang akan di eksekusi
    public function index()
    {

        $data["title"] = "List Data Asisten";
        //ambil fungsi getAll untuk menampilkan semua data asisten
        $data["data_asisten"] = $this->Asisten_model->getAll();
        //load view header.php pada folder views/templates
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        //load view index.php pada folder views/asisten
        $this->load->view('asisten/index', $data);
        $this->load->view('templates/footer');
    }

    //method add digunakan untuk menampilkan form tambah data asisten
    public function add()
    {
        $Asisten = $this->Asisten_model; //objek model
        $validation = $this->form_validation; //objek form validation
        $validation->set_rules($Asisten->rules()); //menerapkan rules validasi pada asisten_model
        //kondisi jika semua kolom telah divalidasi, maka akan menjalankan method save pada asisten_model
        if ($validation->run()) {
            $Asisten->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Asisten berhasil disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("asisten");
        }
        $data["title"] = "Tambah Data Asisten";

        $dataIdMhs['data_IdMhs'] = $this->Asisten_model->getDataIdMhs();
        $dataIdDsn['data_IdDsn'] = $this->Asisten_model->getDataIdDsn();
        // $dataIdDM['data_IdDM'] = $this->Asisten_model->getDataIdMD();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('asisten/add', $dataIdMhs);
        // $this->load->view('asisten/add', $dataIdDsn);
        // $this->load->view('asisten/add', $dataIdDM);
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('asisten');

        $Asisten = $this->Asisten_model;
        $validation = $this->form_validation;
        $validation->set_rules($Asisten->rules());

        if ($validation->run()) {
            $Asisten->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Asisten berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("asisten");
        }
        $data["title"] = "Edit Data Asisten";
        $data["data_asisten"] = $Asisten->getById($id);
        if (!$data["data_asisten"]) show_404();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('asisten/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();
        $this->Asisten_model->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Asisten berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        $this->output->set_output(json_encode($msg));
    }
}