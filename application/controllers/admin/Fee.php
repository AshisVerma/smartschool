<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Fee extends Admin_Controller {

    public function __construct() {
        parent::__construct();
          $this->load->model(["Studyyear_model","Semesters_model","Class_model","Studylevel_model","Feetype_model","Fee_model"]);
          $this->load->library("form_validation");
          $this->load->helper("url");
          $this->load->library("session");
    }

    public function index() {
        if (!$this->rbac->hasPrivilege('studyyear', 'can_view')) {
            access_denied();
        }
             
     


        $json_array = array();
        $this->session->set_userdata('top_menu', 'Studyyear');
        $this->session->set_userdata('sub_menu', 'studyyear/index');
        $data['title'] = 'Fee';
        $data['title_list'] = 'Fee_list';
        $year = $this->Studyyear_model->get();
        $data['year'] = $year;
        $data['class']=$this->Class_model->all();
        $data['section_array'] = $json_array;
        $feetype=$this->Feetype_model->all();
      
        $this->load->view('layout/header', $data);
        $this->load->view('admin/fee/add', ['data'=>$data,"feetype"=>$feetype]);
        $this->load->view('layout/footer', $data);

       
        
    }
// add study year
    public function add() {
        if (!$this->rbac->hasPrivilege('subject_group', 'can_delete')) {
            access_denied();
        }
        
         $data=array(
            "year"=>$this->input->post("year"),
            "class"=>$this->input->post("class"),
            "semester"=>$this->input->post("semester"),
            "level"=>$this->input->post("level"),
            "amount"=>$this->input->post("amount"),
            "fee_type"=>$this->input->post("fee_type"),

        );

         
        // $checkExist=$this->Fee_model->checkExistFee($data);
        if(1){
           $create=$this->Fee_model->add($data);
           if($create){
            $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Fee created successfully</div>");
            redirect("admin/fee");
           }
           else{
                $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Whoops! something is wrong try again</div>");
            redirect("admin/fee");
           }
        }
        else{
            $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Studyyear already exists</div>");
            redirect("admin/fee");
        }

    }

//end add study year


    //change status coding start

    public function status($id)
    {
       $check=$this->Studyyear_model->status($id);
       if($check){
         $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Fee Status Updated successfully</div>");
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


    
    public function semester_details(){

        $classname= $_GET['class'];
        $year=$_GET['year'];
        $data=$this->Semesters_model->semester_details($classname,$year);
        $level=$this->Studylevel_model->get_level_by_class($classname);


      

        if(!empty($data) && !empty($level)){
            echo json_encode(['data'=>$data,"level"=>$level]);
        }
    }


    public function list(){
         
         $request_type= $this->input->server("REQUEST_METHOD");
         if($request_type=="GET"){
             $data['title'] = 'Fee';
        $data['title_list'] = 'Fee_list';
        $year = $this->Studyyear_model->get();
        $data['year'] = $year;
        $data['class']=$this->Class_model->all();
       
       
        $feetype=$this->Feetype_model->all();
        $feedata=array();//empty array assign so that error not come in when listing url hit
        $this->load->view('layout/header', $data);
        $this->load->view('admin/fee/list', ['data'=>$data,"feetype"=>$feetype,"feedata"=>$feedata]);
        $this->load->view('layout/footer', $data);
         }

         if($request_type=="POST"){
                      $post_data=array(
            "year"=>$this->input->post("year"),
            "class"=>$this->input->post("class"),
            "semester"=>$this->input->post("semester"),
            "level"=>$this->input->post("level"), );


     $getfeeDetails=$this->Fee_model->getfeeDetails($post_data);
    
                    $data['title'] = 'Fee';
        $data['title_list'] = 'Fee_list';
        $year = $this->Studyyear_model->get();
        $data['year'] = $year;
        $data['class']=$this->Class_model->all();
       
       
        $feetype=$this->Feetype_model->all();
        $feedata=$getfeeDetails;//empty array assign so that error not come in when listing url hit
        $this->load->view('layout/header', $data);
        $this->load->view('admin/fee/list', ['data'=>$data,"feetype"=>$feetype,"feedata"=>$feedata]);
        $this->load->view('layout/footer', $data);
         }
        
          
    }

    public function search(){
        $data=array(
            "year"=>$this->input->post("year"),
            "class"=>$this->input->post("class"),
            "semester"=>$this->input->post("semester"),
            "level"=>$this->input->post("level"), );


     $getfeeDetails=$this->Fee_model->getfeeDetails($data);
         $this->session->set_userdata("fee_details",$data);
         $data['title'] = 'Fee';
        $data['title_list'] = 'Fee_list';
        $year = $this->Studyyear_model->get();
        $data['year'] = $year;
        $data['class']=$this->Class_model->all();
       
        $feetype=$this->Feetype_model->all();
        $feedata=$getfeeDetails;
        $this->load->view('layout/header', $data);
        $this->load->view('admin/fee/list', ['data'=>$data,"feetype"=>$feetype,"feedata"=>$feedata]);
        $this->load->view('layout/footer', $data);

    }

}
