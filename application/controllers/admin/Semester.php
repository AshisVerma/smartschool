<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Semester extends Admin_Controller {

    public function __construct() {
        parent::__construct();
          $this->load->model(["Studyyear_model","Semesters_model","Class_model"]);
          $this->load->library("form_validation");
          $this->load->helper("url");
          $this->load->library("session");
    }

    public function index() {
        if (!$this->rbac->hasPrivilege('semester', 'can_view')) {
            access_denied();
        }
            


       


        $json_array = array();
        $this->session->set_userdata('top_menu', 'Semester');
        $this->session->set_userdata('sub_menu', 'semester/index');
        $data['title'] = 'Add Semester';
        $data['title_list'] = 'Add Semester';
        $year = $this->Studyyear_model->all();
        $data['year'] = $year;
        $data['class']=$this->Class_model->all();
        $data['section_array'] = $json_array;

     
        $this->load->view('layout/header', $data);
        $this->load->view('admin/semester/add', ['data'=>$data]);
        $this->load->view('layout/footer', $data);

        
        
    }
// add study year
    public function add() {
        if (!$this->rbac->hasPrivilege('subject_group', 'can_delete')) {
            access_denied();
        }
      
         $data=array(
            "year"=>$this->input->post("year"),
            "name"=>$this->input->post("name"),
           
        );
        $checkExist=$this->Semesters_model->checkExistYear($data);
        if(!$checkExist){
           $create=$this->Semesters_model->add($data);
           if($create){
            $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Semester created successfully</div>");
            redirect("admin/semester");
           }
           else{
                $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Whoops! something is wrong try again</div>");
            redirect("admin/semester");
           }
        }
        else{
            $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Semester already exists</div>");
            redirect("admin/semester");
        }

    }

//end add study year


    //change status coding start

    public function status($id)
    {
       $check=$this->Semesters_model->status($id);
       if($check){
         $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Semester Status Updated successfully</div>");
            redirect("admin/semester/semesterDetails?year=".$this->session->userdata("year"));
       }
       else{
        $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Whoops! something is wrong try again</div>");
            redirect("admin/semester/semesterDetails?year=".$this->session->userdata("year"));
       }
    }
    //end change status coding start

    public function edit($id){
      
          if (!$this->rbac->hasPrivilege('semester', 'can_view')) {
            access_denied();
        }
            


       


        $json_array = array();
        $this->session->set_userdata('top_menu', 'Semester');
        $this->session->set_userdata('sub_menu', 'semester/index');
        $data['title'] = 'Add Semester';
        $data['title_list'] = 'Add Semester';
        $year = $this->Studyyear_model->all();
        $data['year'] = $year;
        $data['semester_data']=$this->Semesters_model->edit($id);

        $data['section_array'] = $json_array;

     
        $this->load->view('layout/header', $data);
        $this->load->view('admin/semester/edit', ['data'=>$data]);
        $this->load->view('layout/footer', $data);


    }
    public function update() {
        if (!$this->rbac->hasPrivilege('subject_group', 'can_edit')) {
            access_denied();
        }
        $data=array("id"=>$this->input->post("id"),"year"=>$this->input->post("year"),"name"=>$this->input->post("name"));
        $update=$this->Semesters_model->update($data);
        if($update['status']){
            $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Semester  Updated successfully</div>");
           redirect("admin/semester/semesterDetails?year=".$this->session->userdata("year"));
        }
        else{
            $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>".$update['message']."</div>");
           redirect("admin/semester/semesterDetails?year=".$this->session->userdata("year"));
        }
        
    }

  
    public function delete($id){
        $check=$this->Semesters_model->delete($id);
        if($check){
             $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i><b>Semester  Deleted successfully</b></div>");
           redirect("admin/semester/semesterDetails?year=".$this->session->userdata("year"));
        }
        else{
               $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i><b>Whoops! something is wrong try again</b>/div>");
            redirect("admin/semester/semesterDetails?year=".$this->session->userdata("year"));
        }

    }


    public function list(){
         $json_array = array();
        $this->session->set_userdata('top_menu', 'Semester');
        $this->session->set_userdata('sub_menu', 'semester/index');
        $data['title'] = 'Add Semester';
        $data['title_list'] = 'Add Semester';
        $year = $this->Studyyear_model->all();
        $data['year'] = $year;
         $data['class']=$this->Class_model->all();

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
        $year_data = $this->Studyyear_model->all();
        $data['year'] = $year_data;
         $data['class']=$this->Class_model->all();
        $data['section_array'] = $json_array;
          $data['semester_data']=$this->Semesters_model->semester($year);


        $this->load->view('layout/header', $data);
        $this->load->view('admin/semester/list', ['data'=>$data]);
        $this->load->view('layout/footer', $data); 
    }


    public function semesterDetails(){
        
        $year=$_GET['year'];
         $this->session->set_userdata("year",$year);
        if(!empty($year)){
         $data['semester_data']=$this->Semesters_model->semester_details($year);
         $json_array = array();
        $this->session->set_userdata('top_menu', 'Semester');
        $this->session->set_userdata('sub_menu', 'semester/index');
        $data['title'] = 'Add Semester';
        $data['title_list'] = 'Add Semester';
        $year_data = $this->Studyyear_model->all();
        $data['year'] = $year_data;
         // $data['class']=$this->Class_model->all();
        $data['section_array'] = $json_array;
        $this->load->view('layout/header', $data);
        $this->load->view('admin/semester/list', ['data'=>$data]);
        $this->load->view('layout/footer', $data); 
        }
        else{
           redirect(base_url()."admin/semester/list");

        }
       
        // $data=$this->Semesters_model->semester_details()

    }

}
