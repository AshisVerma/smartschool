
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
<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-gears"></i> <?php echo $this->lang->line('system_settings'); ?></h1>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                 <?php if ($this->session->flashdata('msg')) { ?>
                                <?php echo $this->session->flashdata('msg') ?>
                            <?php } ?>
            </div>
            <div class="col-md-4">
                <div class="box box-primary add-usergroup-box" >
                    <div class="box-header ">
                        <h3 class="box-title"><!-- <?php echo $this->lang->line('role'); ?> --> Add New UserGroup</h3>
                    </div>
                    <form id="form1" action="<?php echo site_url('admin/usergroup/add') ?>"  id="employeeform"  method="post" accept-charset="utf-8" class="add-usergroup-year-box">
                        <div class="box-body">
                           
                            <?php
                            if (isset($error_message)) {
                                echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                            }
                            ?>      
                            <?php echo $this->customlib->getCSRF(); ?>                     
                            <div class="row">
                                <div class="">
                                    <div class="form-group">
                                <label for="exampleInputEmail1">UserGroup Name</label><small class="req"> *</small>
                                <input autofocus="" id="name" name="name" placeholder="Name" type="text" class="form-control"  value="<?php echo set_value('name'); ?>" />
                                <span class="text-danger"><?php echo form_error('name'); ?></span>
                            </div>
                                </div>

                               

                                

                            </div>

                           


                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                        </div>
                    </form>
                  
                </div>

                 <div class="box box-primary edit-usergroup-box d-none" >
                    <div class="box-header ">
                        <h3 class="box-title"><!-- <?php echo $this->lang->line('role'); ?> --> Edit UserGroup</h3>
                    </div>
                    <form id="edit-form" action="<?php echo site_url('admin/usergroup/update') ?>"  id="employeeform"  method="post" accept-charset="utf-8" class="add-usergroup-year-box">
                        <div class="box-body">
                           <input type="hidden" name="id">
                            <?php
                            if (isset($error_message)) {
                                echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                            }
                            ?>      
                            <?php echo $this->customlib->getCSRF(); ?>                     
                            <div class="row">
                                <div class="">
                                    <div class="form-group">
                                <label for="exampleInputEmail1">UserGroup Name</label><small class="req"> *</small>
                                <input autofocus="" id="name" name="name" placeholder="Name" type="text" class="form-control"  value="<?php echo set_value('name'); ?>" />
                                <span class="text-danger"><?php echo form_error('name'); ?></span>
                            </div>
                                </div>

                               

                                

                            </div>

                           


                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('update'); ?></button>
                        </div>
                    </form>
                  
                </div>
            </div>         
          <div class="col-sm-8 col-lg-8 col-md-8">
              <div class="box box-primary">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix">UserGroup List<?php echo $this->lang->line('usergroup_list'); ?></h3>
                    </div>
                    <div class="box-body">
                        <?php if ($this->session->flashdata('list_msg')) { ?>
                            <?php echo $this->session->flashdata('list_msg') ?>
                        <?php } ?>
                        <div class="mailbox-messages">
                            <div class="">
                                <div class="download_label">Usergroup list</div>
                                <table class="table table-striped table-bordered table-hover example text-center">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data['group'] as $key=> $group){ ?>

                                          <tr>
                                              <td><?php echo $key+1?></td>
                                              <td><?php echo $group['name'] ?></td>
                                              <td>
                                                  <?php if($group['status']==1){?>
                                                   <a href="<?php echo base_url()?>admin/usergroup/status/<?php echo $group['id']?>" class="btn btn-success">Active</a>
                                                  <?php } else {?>
                                                    <a href="<?php echo base_url()?>admin/usergroup/status/<?php echo $group['id']?>" class="btn btn-danger">Deactive</a>
                                                  <?php }?>
                                              </td>
                                              <td>
                                                  <a href="<?php echo base_url()?>admin/usergroup/status/<?php echo $group['id']?>" class="btn btn-success edit-btn" data="<?php echo $group['id']?>">
                                                      <i class="fa fa-edit"></i>
                                                  </a>
                                                  <a href="<?php echo base_url()?>admin/usergroup/status/<?php echo $group['id']?>" class="btn btn-danger delete-btn" data="/<?php echo $group['id']?>">
                                                      <i class="fa fa-trash"></i>
                                                  </a>
                                              </td>
                                          </tr>


                                        <?php }?>

                                    </tbody>
                                    
                                </table>
                            </div>
                        </div> 
                    </div>

                </div>
          </div>     
        </div>
        <div class="row">           
            <div class="col-md-12">
            </div>
        </div> 
    </section>

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
        <p>Do you really want to delete these Usergroup ? </p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger delete-confirm-btn">Delete</button>
      </div>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
      
        $("#btnreset").click(function () {
            $("#form1")[0].reset();
        });
    });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".edit-btn").each(function(){
      $(this).click(function(e){
        e.preventDefault();
        var id=$(this).attr("data");
        
          $("input[name='id']").val(id);
          var tr=this.parentElement.parentElement;
          var td=tr.getElementsByTagName("TD");
          $("#edit-form").find("input[name='name']").val(td[1].innerHTML);
        $(".add-usergroup-box").addClass("d-none");
        $(".edit-usergroup-box").removeClass("d-none");
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
          window.location.href="<?php echo base_url()?>/admin/usergroup/delete/"+id;
        });

      });
    });
  });
</script>