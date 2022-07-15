
<style type="text/css">
  .d-none{
    display: none;
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
    <div class="col-sm-6 col-md-6 col-lg-6">

  

          <div class="box box-primary add-classroom-box" >
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Gmeet Classes</h3>
                    </div>
                    <form id="form1" action="<?php echo site_url('admin/Gmeetclasses/create') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                        <div class="box-body">
                           
                                
                            <?php echo $this->customlib->getCSRF(); ?> 
                                              
                            <div class="form-group">
                                <label for="exampleInputEmail1">Class Title</label><small class="req"> *</small>
                                <input autofocus="" id="name" name="class_title" placeholder="Class title" type="text" class="form-control"  value="<?php echo set_value('year'); ?>" />
                                <span class="text-danger"><?php echo form_error('class_title'); ?></span>
                            </div>
                             <div class="row">
                               <div class="col-md-6">
                                 <div class="form-group">
                                <label for="exampleInputEmail1">Class date</label><small class="req"> *</small>
                                <input autofocus="" id="class_title" name="date" placeholder="Date" type="text" class="form-control date"  value="<?php echo set_value('year'); ?>" />
                                <span class="text-danger"><?php echo form_error('class_title'); ?></span>
                            </div>
                               </div>
                               <div class="col-md-6">
                                 <div class="form-group">
                                <label for="exampleInputEmail1">Duration</label><small class="req"> *</small>
                                <input autofocus="" id="duration" name="duration" placeholder="Duration" type="text" class="form-control"  value="<?php echo set_value('duration'); ?>" />
                                <span class="text-danger"><?php echo form_error('duration'); ?></span>
                            </div>
                               </div>
                             </div>

                              <div class="form-group">
                                <label for="exampleInputEmail1">Select Role</label>
                              <select class="form-control" name="role" id="role">
                                <option>Select Role</option>
                                <?php foreach($role as $role_list){?>
                                  <option value="<?php echo $role_list['id'] ?>"><?php echo $role_list['name'] ?></option>
                              <?php }?>
                              </select>
                                <span class="text-danger"><?php echo form_error('duration'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Staff</label>
                              <select class="form-control" name="staff">
                                <option>Select Staff</option>
                              </select>
                                <span class="text-danger"><?php echo form_error('duration'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Class</label>
                              <select class="form-control" name="class">
                                <option>Select Class</option>
                                 <?php foreach($class as $class_list){?>
                                  <option><?php echo $class_list['class']; ?></option>
                              <?php }?>
                              </select>
                                <span class="text-danger"><?php echo form_error('duration'); ?></span>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Section</label>
                              <select class="form-control" name="section">
                                <option>Select Section</option>
                              </select>
                                <span class="text-danger"><?php echo form_error('duration'); ?></span>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Gmeet URL</label><small class="req"> *</small>
                                <input autofocus=""  name="gmeet_url" placeholder="Gmeet URL" type="text" class="form-control"  value="<?php echo set_value('gmeet_url'); ?>" />
                                <span class="text-danger"><?php echo form_error('duration'); ?></span>
                            </div>

                           
                             <div class="form-group">
                                <label for="exampleInputEmail1">Description</label><small class="req"> *</small>
                               <textarea class="form-control" name="description"></textarea>
                                <span class="text-danger"><?php echo form_error('description'); ?></span>
                            </div>




                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                        </div>
                    </form>
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
        <p>Do you really want to delete these Classroom ? </p>
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
   $("#role").change(function(){
    var role_id=$(this).val();
    $.ajax({
      type:"GET",
      url:"<?php echo base_url()?>admin/Gmeetclasses/getStaff",
      data:{
        role_id:role_id,
      },
      success:function(response){
        console.log(response);
      }
    });
   });
  
  });


  
</script>
