
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

  

          <div class="box box-primary add-study-year-box" >
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Semester</h3>
                    </div>
                    <form id="form1" action="<?php echo site_url('admin/semester/add') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                        <div class="box-body">
                           
                                
                            <?php echo $this->customlib->getCSRF(); ?> 
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Year</label><small class="req"> *</small>
                               <select class="form-control" name="year">
                                 <option>Select Year</option>
                              

                                <?php foreach($data['year'] as $key=>$list){?>
                                 <option value="<?php echo $list['year']?>"><?php echo $list['year']?></option>
                          

                                  <?php }?>

                               </select>
                                <span class="text-danger"><?php echo form_error('year'); ?></span>
                            </div>                    
                            <div class="form-group">
                                <label for="exampleInputEmail1">Semester Name</label><small class="req"> *</small>
                                <input autofocus="" id="name" name="name" placeholder="Semester Name" type="text" class="form-control"  value="<?php echo set_value('year'); ?>" />
                                <span class="text-danger"><?php echo form_error('year'); ?></span>
                            </div>


                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                        </div>
                    </form>
                </div>
                
  
 
    </div>
     <div class="col-sm-6 col-md-6 col-lg-6">
     <a href="<?php echo base_url()?>admin/semester/list" style="float: right;"><button class="btn btn-success" >Semester List</button></a>
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
