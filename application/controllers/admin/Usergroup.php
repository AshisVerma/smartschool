<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Usergroup extends Admin_Controller {

    public function __construct() {
        parent::__construct();
          $this->load->model(["UserGroup_model"]);
          $this->load->library("form_validation");
          $this->load->helper("url");
          $this->load->library("session");
    }

    public function index() {
        if (!$this->rbac->hasPrivilege('semester', 'can_view')) {
            access_denied();
        }
             
       


        $json_array = array();
        $this->session->set_userdata('top_menu', 'Classroom');
        $this->session->set_userdata('sub_menu', 'classroom/index');
        $data['title'] = 'Add Classroom';
        $data['title_list'] = 'Add Classroom';
        $group = $this->UserGroup_model->get();
        $data['group'] = $group;
        $data['section_array'] = $json_array;



        $this->load->view('layout/header', $data);
        $this->load->view('admin/usergroup/add', ['data'=>$data]);
        $this->load->view('layout/footer', $data);

        
        
    }
// add study year
    public function add() {
        if (!$this->rbac->hasPrivilege('subject_group', 'can_delete')) {
            access_denied();
        }
      
         $data=array(
            "name"=>$this->input->post("name"),
           
        );
        $checkExist=$this->UserGroup_model->checkExistUserGroup($data);
        if(!$checkExist){
           $create=$this->UserGroup_model->add($data);
           if($create){
            $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Usergroup created successfully</div>");
            redirect("admin/usergroup");
           }
           else{
                $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Whoops! something is wrong try again</div>");
            redirect("admin/usergroup");
           }
        }
        else{
            $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Usergroup already exists</div>");
            redirect("admin/usergroup");
        }

    }

//end add study year


    //change status coding start

    public function status($id)
    {


       $check=$this->UserGroup_model->status($id);
       if($check){
         $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Usergroup Status Updated successfully</div>");
            redirect("admin/usergroup");
       }
       else{
        $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Whoops! something is wrong try again</div>");
            redirect("admin/usergroup");
       }
    }
    //end change status coding start
    public function update() {
        if (!$this->rbac->hasPrivilege('subject_group', 'can_edit')) {
            access_denied();
        }
        $data=array("id"=>$this->input->post("id"),"name"=>$this->input->post("name"));
      
        $update=$this->UserGroup_model->update($data);
        if($update['status']){
            $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Usergroup  Updated successfully</div>");
            redirect("admin/usergroup");
        }
        else{
            $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>".$update['message']."</div>");
            redirect("admin/usergroup");
        }
        
    }

  
    public function delete($id){
        $check=$this->UserGroup_model->delete($id);
        if($check){
             $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i><b>Usergroup  Deleted successfully</b></div>");
            redirect("admin/usergroup");
        }
        else{
               $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i><b>Whoops! something is wrong try again</b>/div>");
            redirect("admin/usergroup");
        }

    }


    public function list(){
         $json_array = array();
        $this->session->set_userdata('top_menu', 'Semester');
        $this->session->set_userdata('sub_menu', 'semester/index');
        $data['title'] = 'Add Semester';
        $data['title_list'] = 'Add Semester';
        $year = $this->UserGroup_model->all();
        $data['year'] = $year;
        $data['section_array'] = $json_array;
        


        $this->load->view('layout/header', $data);
        $this->load->view('admin/semester/list', ['data'=>$data]);
        $this->load->view('layout/footer', $data);

    }


    public function year($year){

       $json_array = array();
        $this->session->set_userdata('top_menu', 'Semester');
        $this->session->set_userdata('sub_menu', 'semester/index');
        $data['title'] = 'Add Semester';
        $data['title_list'] = 'Add Semester';
        $year_data = $this->UserGroup_model->all();
        $data['year'] = $year_data;
        $data['section_array'] = $json_array;
          $data['semester_data']=$this->Classroom_model->semester($year);


        $this->load->view('layout/header', $data);
        $this->load->view('admin/semester/list', ['data'=>$data]);
        $this->load->view('layout/footer', $data); 
    }

}
