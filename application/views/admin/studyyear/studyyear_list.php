
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
    <div class="col-sm-4 col-md-4 col-lg-4">

  

          <div class="box box-primary add-study-year-box" >
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Study Year</h3>
                    </div>
                    <form id="form1" action="<?php echo site_url('admin/studyyear/add') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                        <div class="box-body">
                           
                                
                            <?php echo $this->customlib->getCSRF(); ?>                     
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('year'); ?></label><small class="req"> *</small>
                                <input autofocus="" id="name" name="year" placeholder="Year" type="text" class="form-control"  value="<?php echo set_value('year'); ?>" />
                                <span class="text-danger"><?php echo form_error('year'); ?></span>
                            </div>


                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                        </div>
                    </form>
                </div>
                 <div class="box box-primary edit-study-year-box d-none">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Study Year</h3>
                    </div>
                    <form id="edit-form" action="<?php echo site_url('admin/studyyear/update') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                        <div class="box-body">
                           
                                <input type="hidden" name="id">
                            <?php echo $this->customlib->getCSRF(); ?>                     
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('year'); ?></label><small class="req"> *</small>
                                <input autofocus="" id="name" name="year" placeholder="Year" type="text" class="form-control"  value="<?php echo set_value('year'); ?>" required />
                                <span class="text-danger"><?php echo form_error('year'); ?></span>
                            </div>


                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('update'); ?></button>
                        </div>
                    </form>
                </div>
  
 
    </div>
     <div class="col-sm-7 col-md-7 col-lg-7">
      <div class="box box-primary" >
                    <div class="box-header with-border">
                        <h3 class="box-title">Study Year List</h3>
                    </div>
                   <!--- study year list 21/06/2022  ----------->
                   <table class="table text-center">
                     <tr>
                       <th>Sr.No</th>
                       <th>Year</th>
                       <th>Status</th>
                       <th>Action</th>
                     </tr>

                       <?php foreach($data['year'] as $key=>$list){?>
                         <tr>
                        <td><?php  echo $key+1 ?></td>
                        <td><?php echo $list['year']?></td>
                        <td >
                          <div class="d-flex justify-content-center align-items-center">

                          <?php if($list['status']==1){?>
                           
                            <a class="btn btn-success" href="<?php echo base_url()?>/admin/studyyear/status/<?php echo $list['id']?>">Active</a>
                             
                        
                          <?php } else{?>
                       
                            <a class="btn btn-danger" href="<?php echo base_url()?>/admin/studyyear/status/<?php echo $list['id']?>">Deactive</a>
                             
                          

                        <?php }?>
                      </div>


                        </td>
                        <td><div class="d-flex"><button class="btn btn-success edit-btn" data="<?php echo $list['id']?>"><i class="fa fa-edit"></i></button>
                          <a href="<?php echo base_url()?>/admin/studyyear/delete/<?php echo $list['id']?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete')"><i class="fa fa-trash"></i></a></div></td>
                          </tr>
                       <?php }?>
                    
                   </table>
                   <!--end study year list 21/06/2022 ----------->
                </div>
    </div>
  </div>
  </section>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $(".edit-btn").each(function(){
      $(this).click(function(){
        var id=$(this).attr("data");
        
          $("input[name='id']").val(id);
          var tr=this.parentElement.parentElement.parentElement;
          var td=tr.getElementsByTagName("TD");
          $("#edit-form").find("input[name='year']").val(td[1].innerHTML);
        $(".add-study-year-box").addClass("d-none");
        $(".edit-study-year-box").removeClass("d-none");
      });
    });
  });
</script>
