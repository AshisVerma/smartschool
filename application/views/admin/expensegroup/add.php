
<style type="text/css">
  .d-none{
    display: none;
  }

.modal-confirm {    
  color: #636363;
  width: 400px;
}
.modal-confirm .modal-content {
  padding: 20px;
  border-radius: 5px;
  border: none;
  text-align: center;
  font-size: 14px;
}
.modal-confirm .modal-header {
  border-bottom: none;   
  position: relative;
}
.modal-confirm h4 {
  text-align: center;
  font-size: 26px;
  margin: 30px 0 -10px;
}
.modal-confirm .close {
  position: absolute;
  top: -5px;
  right: -2px;
}
.modal-confirm .modal-body {
  color: #999;
}
.modal-confirm .modal-footer {
  border: none;
  text-align: center;   
  border-radius: 5px;
  font-size: 13px;
  padding: 10px 15px 25px;
}
.modal-confirm .modal-footer a {
  color: #999;
}   
.modal-confirm .icon-box {
  width: 80px;
  height: 80px;
  margin: 0 auto;
  border-radius: 50%;
  z-index: 9;
  text-align: center;
  border: 3px solid #f15e5e;
}
.modal-confirm .icon-box i {
  color: #f15e5e;
  font-size: 46px;
  display: inline-block;
  margin-top: 13px;
}
.modal-confirm .btn, .modal-confirm .btn:active {
  color: #fff;
  border-radius: 4px;
  background: #60c7c1;
  text-decoration: none;
  transition: all 0.4s;
  line-height: normal;
  min-width: 120px;
  border: none;
  min-height: 40px;
  border-radius: 3px;
  margin: 0 5px;
}
.modal-confirm .btn-secondary {
  background: #c1c1c1;
}
.modal-confirm .btn-secondary:hover, .modal-confirm .btn-secondary:focus {
  background: #a8a8a8;
}
.modal-confirm .btn-danger {
  background: #f15e5e;
}
.modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
  background: #ee3535;
}
.trigger-btn {
  display: inline-block;
  margin: 100px auto;
}

</style>
<div class="content-wrapper" style="min-height: 946px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-calendar-check-o"></i> <?php echo $this->lang->line('attendance'); ?> <small> <?php echo $this->lang->line('by_date1'); ?> </small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
   
  <div class="row">

    <div class="col-sm-12"> <?php if ($this->session->flashdata('msg')) { ?>
                                <?php echo $this->session->flashdata('msg') ?>
                            <?php } ?></div>
    <div class="col-sm-5 col-md-5 col-lg-5">

  

          <div class="box box-primary add-transportation-box" >
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Expense Group</h3>
                    </div>
                    <form id="form1" action="<?php echo site_url('admin/expensegroup/add') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="box-body">
                           
                                
                            <?php echo $this->customlib->getCSRF(); ?> 

                             <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                <label for="exampleInputEmail1">Select Expense Head</label><small class="req"> *</small>
                                  <select class="form-control" name="expense-head">
                                    <option>Select Expense Head</option>
                                    <?php foreach($expensehead as $expensehead_list){?>
                                      <option><?php echo $expensehead_list['exp_category']?></option>

                                  <?php }?>

                                  </select>
                                <span class="text-danger"><?php echo form_error('studyclass'); ?></span>
                            </div>  
                                  </div>

                                  
                                 
                                </div>   
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                <label for="exampleInputEmail1">Expense Group</label><small class="req"> *</small>
                                  <input type="text" name="name" class="form-control" placeholder="Expense Group">
                                <span class="text-danger"><?php echo form_error('studyclass'); ?></span>
                            </div>  
                                  </div>

                                  
                                 
                                </div>   

                                

                                 

                                
                             
                             

                             
                            
                             

                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                        </div>
                    </form>
                </div>

                <div class="box box-primary edit-transportation-box d-none" >
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Expense Group</h3>
                    </div>
                    <form id="edit-form" action="<?php echo site_url('admin/expensegroup/update') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                        <div class="box-body">
                           
                                <input type="hidden" name="id">
                            <?php echo $this->customlib->getCSRF(); ?> 
                             <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                <label for="exampleInputEmail1">Select Expense Head</label><small class="req"> *</small>
                                  <select class="form-control" name="expense-head">
                                    <option>Select Expense Head</option>
                                    <?php foreach($expensehead as $expensehead_list){?>
                                      <option><?php echo $expensehead_list['exp_category']?></option>

                                  <?php }?>

                                  </select>
                                <span class="text-danger"><?php echo form_error('studyclass'); ?></span>
                            </div>  
                                  </div>

                                  
                                 
                                </div>   
                                              
                           <div class="col-md-12">
                                    <div class="form-group">
                                <label for="exampleInputEmail1">Expense Group</label><small class="req"> *</small>
                                  <input type="text" name="name" class="form-control" placeholder="Expense Group">
                                <span class="text-danger"><?php echo form_error('studyclass'); ?></span>
                            </div>  
                                  </div>
                             

                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('update'); ?></button>
                        </div>
                    </form>
                </div>
                
  
 
    </div>

    <div class="col-md-7">
      <div class="box box-primary">
                        <div class="box-header ptbnull">
                            <h3 class="box-title titlefix"> <?php echo ('Expense Group List'); ?></h3>
                            <div class="box-tools pull-right">
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="mailbox-messages table-responsive">
                                <div class="download_label"><?php echo $this->lang->line('item_list'); ?></div>
                                <table class="table table-hover table-striped table-bordered example text-center">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Expense Head</th>
                                            <th>Expense Group</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                     <?php  if(!empty($expensegroup)) ?>
                                      <?php foreach($expensegroup as $key=>$list){?>
                                        <tr>
                                          <td><?php echo $key+1?></td>
                                          <td><?php echo  $list['expense_head'] ?></td>
                                          <td><?php echo  $list['name'] ?></td>

                                          <td>
                                            <?php if($list['status']==1)

                                            {

                                              ?>
                                               <a class="badge badge-success p-2 p-font" style="padding: 6px 10px;background: green;color: white;font-size: 12px;border-radius: 3rem;" data-toggle="tooltip" title="Status Active" href="<?php echo base_url();?>admin/expensegroup/status/<?php echo $list['id']?>">Active</a>

                                              <?php

                                            }
                                            else{
                                            ?>
                                             <a class="badge badge-success p-2 p-font" style="padding: 6px 10px;background: red;color: white;font-size: 12px;border-radius: 3rem;" data-toggle="tooltip" title="Status Deactive" href="<?php echo base_url();?>admin/expensegroup/status/<?php echo $list['id']?>">Deactive</a>
                                            <?php
                                          }?>

                                          </td>
                                          <td>
                                            <button class="btn btn-success edit-btn" data="<?php echo $list['id']?>"><i class="fa fa-edit" ></i></button>
                                            <button class="btn btn-danger delete-btn" data="<?php echo $list['id']?>"><i class="fa fa-trash"></i></button>
                                          </td>
                                        </tr>

                                    <?php }?>

                                     <?php ?>
                                   </tbody>
                                </table><!-- /.table -->



                            </div><!-- /.mail-box-messages -->
                        </div><!-- /.box-body -->
                    </div>
    </div>
   
  </div>
  </section>
</div>
<div id="delete-modal" class="modal fade">
  <div class="modal-dialog modal-confirm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header flex-column">
        <div class="icon-box">
          <i class="material-icons">&#xE5CD;</i>
        </div>            
        <h4 class="modal-title w-100">Are you sure?</h4>  
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p>Do you want to remove Expense Group ? </p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger delete-confirm-btn">Delete</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $(".edit-btn").each(function(){
      $(this).click(function(e){
        e.preventDefault();
        var id=$(this).attr("data");
       
        
          $("input[name='id']").val(id);
          var tr=this.parentElement.parentElement;
          var td=tr.getElementsByTagName("TD");
          
          $("#edit-form").find("input[name='name']").val(td[2].innerHTML);
           $

        $(".add-transportation-box").addClass("d-none");
        $(".edit-transportation-box").removeClass("d-none");
      });
    });

    //delete
    $(".delete-btn").each(function(){
      $(this).click(function(e){
        e.preventDefault();
        var id=($(this).attr("data"));
        $("#delete-modal").modal("show");
        $(".delete-confirm-btn").click(function(){
          $("#delete-modal").modal("hide");
          window.location.href="<?php echo base_url()?>/admin/expensegroup/delete/"+id;
        });

      });
    });
  //ajax calling for  get semester 

  

  //end ajax calling for get semester
  
  });


  
</script>
