<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Gmeetclasses extends Admin_Controller {

    public function __construct() {
        parent::__construct();
          $this->load->model(["Gmeetclasses_model","Role_model","Class_model"]);
          $this->load->library("form_validation");
          $this->load->helper("url");
          $this->load->library("session");
    }

    public function index() {
        if (!$this->rbac->hasPrivilege('semester', 'can_view')) {
            access_denied();
        }
             
       


        $json_array = array();
        $this->session->set_userdata('top_menu', 'gmeet');
        $this->session->set_userdata('sub_menu', 'gmeet/index');
        $data['title'] = 'Add Classroom';
        $data['title_list'] = 'Add Classroom';
        $classroom = $this->Gmeetclasses_model->get();
        $data['classroom'] = $classroom;
        $data['section_array'] = $json_array;



        $this->load->view('layout/header', $data);
        $this->load->view('admin/gmeet_class/gmeet_list', ['data'=>$data]);
        $this->load->view('layout/footer', $data);

        
        
    }
// add study year
    public function add() {

        if (!$this->rbac->hasPrivilege('subject_group', 'can_delete')) {
            access_denied();
        }
         $data['title'] = 'Add Gmeet Classes';
        $data['title_list'] = 'Add Gmeet Classes';
        $role=$this->Role_model->getAllRole();
        $class=$this->Class_model->getAll();
        

         $this->load->view('layout/header', $data);
        $this->load->view('admin/gmeet_class/gmeet_add', ['data'=>$data,"role"=>$role,"class"=>$class]);
        $this->load->view('layout/footer', $data);
        
       
    }

//end add study year


 public function create(){
    print_r($this->input->post());
 }

    //change status coding start

    public function status($id)
    {


       $check=$this->Classroom_model->status($id);
       if($check){
         $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Classroom Status Updated successfully</div>");
            redirect("admin/classroom");
       }
       else{
        $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Whoops! something is wrong try again</div>");
            redirect("admin/classroom");
       }
    }
    //end change status coding start
    public function update() {
        if (!$this->rbac->hasPrivilege('subject_group', 'can_edit')) {
            access_denied();
        }
        $data=array("id"=>$this->input->post("id"),"room_no"=>$this->input->post("room_no"),"capacity"=>$this->input->post("capacity"));
        $update=$this->Classroom_model->update($data);
        if($update['status']){
            $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Classroom  Updated successfully</div>");
            redirect("admin/classroom");
        }
        else{
            $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>".$update['message']."</div>");
            redirect("admin/classroom");
        }
        
    }

  
    public function delete($id){
        $check=$this->Classroom_model->delete($id);
        if($check){
             $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i><b>Classroom  Deleted successfully</b></div>");
            redirect("admin/classroom");
        }
        else{
               $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i><b>Whoops! something is wrong try again</b>/div>");
            redirect("admin/classroom");
        }

    }


    public function list(){
         $json_array = array();
        $this->session->set_userdata('top_menu', 'Semester');
        $this->session->set_userdata('sub_menu', 'semester/index');
        $data['title'] = 'Add Semester';
        $data['title_list'] = 'Add Semester';
        $year = $this->Classroom_model->all();
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
        $year_data = $this->Classroom_model->all();
        $data['year'] = $year_data;
        $data['section_array'] = $json_array;
          $data['semester_data']=$this->Classroom_model->semester($year);


        $this->load->view('layout/header', $data);
        $this->load->view('admin/semester/list', ['data'=>$data]);
        $this->load->view('layout/footer', $data); 
    }


    public function getStaff(){
        // $role_id=$this->input->get("role_id");
        // $staff=$this->Gmeetclasses_model->getStaff($role_id);
        // print_r($staff);
    }

}
