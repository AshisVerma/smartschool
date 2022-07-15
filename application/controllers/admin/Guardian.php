<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Guardian extends Admin_Controller {

    public function __construct() {
        parent::__construct();
          $this->load->model("Guardian_model");
          $this->load->library("form_validation");
          $this->load->helper("url");
          $this->load->library("session");
    }

    public function index() {
        if (!$this->rbac->hasPrivilege('guardian', 'can_view')) {
            access_denied();
        }
             
     


        $json_array = array();
        $this->session->set_userdata('top_menu', 'Studyyear');
        $this->session->set_userdata('sub_menu', 'studyyear/index');
        $data['title'] = 'Fee';
        $data['title_list'] = 'Fee_list';
        // $data['disc']=$this->Guardian_model->get();
        
        $data['section_array'] = $json_array;
        
      
        $this->load->view('layout/header', $data);
        $this->load->view('admin/guardian/add', ['data'=>$data]);
        $this->load->view('layout/footer', $data);

        // $this->form_validation->set_rules(
        //         'name', $this->lang->line('name'), array(
        //     'required',
        //     array('class_exists', array($this->subjectgroup_model, 'class_exists')),
        //         )
        // );

        // $this->form_validation->set_rules('class_id', $this->lang->line('class'), 'trim|required|xss_clean');

        // $this->form_validation->set_rules('subject[]', $this->lang->line('subject'), 'trim|required|xss_clean');



        // $this->form_validation->set_rules(
        //         'sections[]', $this->lang->line('section'), array(
        //     'required',
        //     array('check_section_exists', array($this->subjectgroup_model, 'check_section_exists'))
        //         )
        // );


        // if ($this->form_validation->run() == false) {
        //     $data['section_array'] = $this->input->post('sections');
        // } else {
        //     $name = $this->input->post('name');
        //     $session = $this->setting_model->getCurrentSession();
        //     $class_array = array(
        //         'name' => $this->input->post('name'),
        //         'session_id' => $session,
        //         'description' => $this->input->post('description'),
        //     );
        //     $subject = $this->input->post('subject');
        //     $sections = $this->input->post('sections');

        //     $this->subjectgroup_model->add($class_array, $subject, $sections);
        //     $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
        //     redirect('admin/subjectgroup');
        // }
        // $subject_list = $this->subject_model->get();
        // $data['subjectlist'] = $subject_list;
        // $subjectgroupList = $this->subjectgroup_model->getByID();
        // $data['subjectgroupList'] = $subjectgroupList;
        
    }
// add study year
    public function add() {
        if (!$this->rbac->hasPrivilege('subject_group', 'can_delete')) {
            access_denied();
        }
      

      $file=$_FILES['image'];
      $filename=$file['name'];

         $data=array(
            "name"=>$this->input->post("name"),
            "email"=>$this->input->post("email"),
            "phone"=>$this->input->post("phone"),
            "religion"=>$this->input->post("religion"),
            "username"=>$this->input->post("username"),
            // "password"=>password_hash($this->input->post("password"), PASSWORD_DEFAULT),
            "password"=>$this->input->post("password"),
            "profession"=>$this->input->post("profession"),
            "present_address"=>$this->input->post("present_address"),
            "permanent_address"=>$this->input->post("permanent_address"),
            "status"=>$this->input->post("status"),
            "other_info"=>$this->input->post("other_info"),
            "image"=>$filename,

        );
        $checkExist=$this->Guardian_model->checkExist($data);
        if(!$checkExist){
           $create=$this->Guardian_model->add($data);
           if($create){
              move_uploaded_file($file['tmp_name'], "./upload/guardian/images/".$filename);
            $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Guardian  Registered successfully</div>");
            redirect("admin/guardian");
           }
           else{
                $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Whoops! something is wrong try again</div>");
            redirect("admin/guardian");
           }
        }
        else{
            $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Guardian Email already exists</div>");
            redirect("admin/guardian");
        }

    }

//end add study year


    //change status coding start

    public function status($id)
    {

       $check=$this->Guardian_model->status($id);
       if($check){
         $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Guardian Status Updated successfully</div>");
            redirect("admin/guardian/list");
       }
       else{
        $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Whoops! something is wrong try again</div>");
            redirect("admin/guardian/list");
       }
    }
    //end change status coding start
    public function update() {
        if (!$this->rbac->hasPrivilege('subject_group', 'can_edit')) {
            access_denied();
        }
           if($_FILES['image']['name']!=""){
               $file=$_FILES['image'];
               $fileinfo=pathinfo($file['name']);
                $image_name=rand(99,999999).time().".png";
                move_uploaded_file($file['tmp_name'],"./uploads/guardian/images/".$image_name );
                unlink("uploads/guardian/images/".$_POST['image']);
               
             $data=array(
            "name"=>$this->input->post("name"),
            "email"=>$this->input->post("email"),
            "phone"=>$this->input->post("phone"),
            "religion"=>$this->input->post("religion"),
            "username"=>$this->input->post("username"),
            // "password"=>password_hash($this->input->post("password"), PASSWORD_DEFAULT),
            "password"=>$this->input->post("password"),
            "profession"=>trim($this->input->post("profession")),
            "present_address"=>trim($this->input->post("present_address")),
            "permanent_address"=>trim($this->input->post("permanent_address")),
            "status"=>$this->input->post("status"),
            "other_info"=>trim($this->input->post("other_info")),
            "id"=>$this->input->post("id"),
            "image"=>$image_name,

        );
              $update=$this->Guardian_model->update($data);
        if($update['status']){
            $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Guardian Details   Updated successfully</div>");
            redirect("admin/guardian/list");
        }
        else{
            $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>".$update['message']."</div>");
            redirect("admin/guardian/list");
        }
            
           }
           else{

            $data=array(
            "name"=>$this->input->post("name"),
            "email"=>$this->input->post("email"),
            "phone"=>$this->input->post("phone"),
            "religion"=>$this->input->post("religion"),
            "username"=>$this->input->post("username"),
            // "password"=>password_hash($this->input->post("password"), PASSWORD_DEFAULT),
            "password"=>$this->input->post("password"),
            "profession"=>trim($this->input->post("profession")),
            "present_address"=>trim($this->input->post("present_address")),
            "permanent_address"=>trim($this->input->post("permanent_address")),
            "status"=>$this->input->post("status"),
            "other_info"=>trim($this->input->post("other_info")),
            "id"=>$this->input->post("id"),

        );
              $update=$this->Guardian_model->update($data);
        if($update['status']){
            $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Guardian Details   Updated successfully</div>");
            redirect("admin/guardian/list");
        }
        else{
            $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>".$update['message']."</div>");
            redirect("admin/guardian/list");
        }

            
           }
     
        
      
        
    }

  
    public function delete($id){
        $check=$this->Guardian_model->delete($id);
        if($check){
             $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i><b>Discount Type  Deleted successfully</b></div>");
            redirect("admin/discounttype");
        }
        else{
               $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i><b>Whoops! something is wrong try again</b>/div>");
            redirect("admin/discounttype");
        }

    }


    
    public function list(){

      $data=$this->Guardian_model->get();
  
      $this->load->view('layout/header', $data);
        $this->load->view("admin/guardian/list",['guardian'=>$data]);
        $this->load->view('layout/footer', $data);
     
        
    }

    public function edit($id){
        $data=$this->Guardian_model->edit($id);
         $this->load->view('layout/header', $data);
        $this->load->view('admin/guardian/edit', ['data'=>$data]);
        $this->load->view('layout/footer', $data);

    }

}
