
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
                            <div class="col-sm-12 mb-5">
                               <a href="<?php echo base_url()?>admin/semester" style="float: right;"><button class="btn btn-success" >Semester Add</button></a>
                            </div>
                            <br>
                            <br>

    <div class="col-sm-4 col-md-4 col-lg-4">

  

          <div class="box box-primary add-study-year-box" >
                    <div class="box-header with-border">
                        <h3 class="box-title">Semester List</h3>
                    </div>
                    <form id="form1" action="<?php echo site_url('admin/semester/add') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                        <div class="box-body">
                           
                                
                            <?php echo $this->customlib->getCSRF(); ?> 
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Year</label><small class="req"> *</small>
                               <select class="form-control" name="year" onchange="location = '<?php echo base_url()?>admin/semester/year/'+this.value;">
                                 <option>Select Year</option>
                              

                                <?php foreach($data['year'] as $key=>$list){?>
                                 <option value="<?php echo $list['year']?>"><?php echo $list['year']?></option>
                          

                                  <?php }?>

                               </select>
                                <span class="text-danger"><?php echo form_error('year'); ?></span>
                            </div>                    
                           


                        </div>
                       
                    </form>
                </div>
                
  
 
    </div>
     <div class="col-sm-8 col-md-6 col-lg-8">
    

     <?php 

     if(isset($data['semester_data']) && !empty($data['semester_data'])){



     ?>
     <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Semester List</h3>
      </div>
     <table class="table text-center">
       <tr>
         <th>Sr.No</th>
         <th>Year</th>
         <th>Semester Name</th>
         <th>Status</th>
         <th>Action</th>
       </tr>
       <?php
         foreach($data['semester_data'] as $key=> $semester_list){?>
          <tr>
            <td><?php echo $key+1?></td>
            <td><?php echo $semester_list['year'] ?></td>
            <td><?php echo $semester_list['name'];?></td>
            <td>
              <div class="d-flex justify-content-center align-items-center">
                <?php if($semester_list['status']==1){?>
                <a href="" class="btn btn-success">Active</a>

              <?php } else{?>
                <a href="" class="btn btn-danger">Deactive</a>

                <?php 

              }
                ?>
              </div>
            </td>
            <td>
              <div>
                <button class="btn btn-success"><i class="fa fa-edit"></i></button>
                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
              </div>
            </td>

          </tr>


         <?php }?>

     </table>
   </div>
 </div>


      <?php
    }
    else{

      ?>
<h1 class="text-danger">No Any Semster Created in this Year</h1>

    <?php }?>

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
