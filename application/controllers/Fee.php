<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Studyyear extends Admin_Controller {

    public function __construct() {
        parent::__construct();
          $this->load->model("Feetype_model");
          $this->load->library("form_validation");
          $this->load->helper("url");
          $this->load->library("session");
    }

    public function index() {
        if (!$this->rbac->hasPrivilege('fee', 'can_view')) {
            access_denied();
        }
             
       
      

        $json_array = array();
        $this->session->set_userdata('top_menu', 'Studyyear');
        $this->session->set_userdata('sub_menu', 'studyyear/index');
        $data['title'] = 'Studyyear';
        $data['title_list'] = 'Class List';
        $year = $this->Studyyear_model->get();
        $data['year'] = $year;
        $data['section_array'] = $json_array;


        $this->load->view('layout/header', $data);
        $this->load->view('admin/fee/add', ['data'=>$data]);
        $this->load->view('layout/footer', $data);

       
        
    }
// add study year
    public function add() {
        if (!$this->rbac->hasPrivilege('subject_group', 'can_delete')) {
            access_denied();
        }
      
         $data=array(
            "year"=>$this->input->post("year")
        );
        $checkExist=$this->Studyyear_model->checkExistYear($data);
        if(!$checkExist){
           $create=$this->Studyyear_model->add($data);
           if($create){
            $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Studyyear created successfully</div>");
            redirect("admin/studyyear");
           }
           else{
                $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Whoops! something is wrong try again</div>");
            redirect("admin/studyyear");
           }
        }
        else{
            $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Studyyear already exists</div>");
            redirect("admin/studyyear");
        }

    }

//end add study year


    //change status coding start

    public function status($id)
    {
       $check=$this->Studyyear_model->status($id);
       if($check){
         $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Studyyear Status Updated successfully</div>");
            redirect("admin/studyyear");
       }
       else{
        $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Whoops! something is wrong try again</div>");
            redirect("admin/studyyear");
       }
    }
    //end change status coding start
    public function update() {
        if (!$this->rbac->hasPrivilege('subject_group', 'can_edit')) {
            access_denied();
        }
        $data=array("id"=>$this->input->post("id"),"year"=>$this->input->post("year"));
        $update=$this->Studyyear_model->update($data);
        if($update['status']){
            $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Studyyear  Updated successfully</div>");
            redirect("admin/studyyear");
        }
        else{
            $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>".$update['message']."</div>");
            redirect("admin/studyyear");
        }
        
    }

  
    public function delete($id){
        $check=$this->Studyyear_model->delete($id);
        if($check){
             $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i><b>Studyyear  Deleted successfully</b></div>");
            redirect("admin/studyyear");
        }
        else{
               $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i><b>Whoops! something is wrong try again</b>/div>");
            redirect("admin/studyyear");
        }

    }

}

