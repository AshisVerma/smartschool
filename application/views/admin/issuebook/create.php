<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();

?>
<style type="text/css">
    .d-none{
        display: none;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-book"></i> <?php echo $this->lang->line('library'); ?> </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
             <?php if ($this->session->flashdata('msg')) { ?>
                                <?php echo $this->session->flashdata('msg') ?>
                            <?php } ?>
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $this->lang->line('add_book_category'); ?></h3>
                        <div class="box-tools pull-right">
                            <?php if ($this->rbac->hasPrivilege('import_book', 'can_view')) {
                                ?>
                              
                            <?php }
                            ?>


                        </div>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <form id="form1" action="<?php echo site_url('admin/bookcategory/create') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                        <div class="box-body row">
                           
                            <?php
                            if (isset($error_message)) {
                                echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                            }
                            ?>      
                            <?php echo $this->customlib->getCSRF(); ?>   
                            <div class="form-group col-md-12">
                                <label>Select Book</label>
                                <select class="form-control" name="book">
                                    <option>Select Books</option>
                                    <?php foreach($booklist as $list){?>
                                       <option><?php echo $list['book_title'];?></option>

                                    <?php }?>
                                </select>
                            </div>                  
                            

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">User Type</label><small class="req"> *</small>
                                <select class="form-control" name="user-type" id="user-type">
                                    <option>Select User Type</option>
                                    <option>Student</option>
                                    <option>Employee</option>
                                </select>
                               <?php echo form_error('book_category'); ?></span>

                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Book Issue Date</label><small class="req"> *</small>
                               <input type="date" name="issue_date" class="form-control">
                               <?php echo form_error('book_category'); ?></span>
                               
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Due Date</label><small class="req"> *</small>
                               <input type="date" name="due_date" class="form-control">
                               <?php echo form_error('book_category'); ?></span>
                               
                            </div>

                           
                            <div class="box-of-student d-none">
                                 <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Select Class</label><small class="req"> *</small>
                                <select class="form-control" name="class" id="class">
                                    <option>Select Class</option>
                                     <option>Select Books</option>
                                    <?php foreach($classlist as $list1){?>
                                       <option value="<?php echo $list1['id'];?>"><?php echo $list1['class'];?></option>

                                    <?php }?>
                                </select>
                               <?php echo form_error('book_category'); ?></span>

                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Select Section</label><small class="req"> *</small>
                                <select class="form-control" id="section">
                                    <option>Select Section</option>
                                </select>
                               
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Select Student</label><small class="req"> *</small>
                               
                              <select class="form-control" name="student">
                                  
                              </select>
                               
                            </div>
                            </div>
                        

                           
                          

                            
                            
                            
                          
                         
                           
                           
                            
                        </div><!-- /.box-body -->

                        <div class="box-footer">

                            <button type="submit" class="btn btn-info pull-right">Create</button>
                        </div>
                    </form>
                </div>

            </div><!--/.col (right) -->

        </div>
        <div class="row">

            <div class="col-md-12">
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script type="text/javascript">


    $(document).ready(function () {



        $("#btnreset").click(function () {
            /* Single line Reset function executes on click of Reset Button */
            $("#form1")[0].reset();
        });

    });


</script>
<script>
    $(document).ready(function () {
      $("#user-type").change(function(){
        if($(this).val().toLowerCase()=="student"){
           $(".box-of-student").fadeIn("slow");
        }
      });

      //get class all section alfter selected class
      $("#class").change(function(){


       $.ajax({
        type:"GET",
        url:"<?php echo base_url()?>admin/issuebook/getSection/"+$(this).val(),
        success:function(response){
            console.log(response);
            var data=JSON.parse(response);
            $(data).each(function(index,sectiondata){
                var option=document.createElement("OPTION");
                option.innerHTML=(sectiondata.section);
                option.value=sectiondata.id;
                $("#section").append(option);
                 

            });
        }
       });
      });

      $("#section").change(function(){
        // alert();
      });

    });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/js/savemode.js"></script>