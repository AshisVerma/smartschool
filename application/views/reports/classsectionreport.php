<div class="content-wrapper" style="min-height: 946px;">

    <section class="content-header">

        <h1>

            <i class="fa fa-line-chart"></i> <?php echo $this->lang->line('reports'); ?> <small> <?php echo $this->lang->line('filter_by_name1'); ?></small></h1>

    </section>

    <!-- Main content -->

    <section class="content" >

        <?php $this->load->view('reports/_studentinformation'); ?>

        <div class="row">

            <div class="col-md-12">



                <div class="box removeboxmius">                

                         

                            <div class="box-header ptbnull"></div>

                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('select_criteria'); ?></h3>
                            </div>


                                <!-- <h3 class="box-title titlefix"><i class="fa fa-users"></i> <?php echo $this->lang->line('class_section_report'); ?> </h3> -->

                                <form id='form1' action="<?php echo site_url('student/classsectionreport') ?>"  method="post" accept-charset="utf-8">
                                    <div class="box-body">
                                        <?php echo $this->customlib->getCSRF(); ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('class'); ?></label><small class="req"> *</small>
                                                    <select autofocus="" id="class_id" name="class_id" class="form-control" >
                                                        <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                        <?php
                                                        foreach ($classlist as $class) {
                                                            ?>
                                                            <option value="<?php echo $class['id'] ?>" <?php
                                                            if ($class_id == $class['id']) {
                                                                echo "selected =selected";
                                                            }
                                                            ?>><?php echo $class['class'] ?></option>
                                                                    <?php
                                                                    $count++;
                                                                }
                                                                ?>
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('section'); ?></label><small class="req"> *</small>
                                                    <select  id="section_id" name="section_id" class="form-control" >
                                                        <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="dhide" style="display: block; visibility:hidden;">Teacher</label>
                                                <div class="form-group">
                                                    <button type="submit" name="search" value="search" class="btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>  
                                </form>

                            <div class="box-body table-responsive">

                                <?php 
                                    if(!empty($class_section_list)){

                                ?>

                                <div class="download_label"><?php echo $this->lang->line('class_section_report'); ?></div>

                                    <table class="table table-striped table-bordered table-hover example">

                                        <thead>

                                            <tr>

                                                <th><?php echo $this->lang->line('s_no'); ?></th>

                                                <th class="text text-center"><?php echo $this->lang->line('class'); ?></th>

                                                <th class="text text-center"><?php echo $this->lang->line('students'); ?></th>

                                                <th class="text text-right noExport"><?php echo $this->lang->line('action'); ?></th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <?php 

                                                $count=1;

                                            foreach ($class_section_list as $class_section_key => $class_section_value) {
                                                if($class_section_value->student_count!=0){

                                                ?>

                                                <tr>

                                                        <td><?php echo $count; ?></td>

                                                        <td class="text text-center"><?php echo $class_section_value->class . " (" . $class_section_value->section . ")" ?></td>

                                                        <td class="text text-center"><?php echo $class_section_value->student_count; ?></td>

                                                        <td class="text text-right">    

                                                          

                                                   <button type="button" class="btn btn-default btn-xs studentlist" id="load" data-toggle="tooltip"  data-clssection-id="<?php echo $class_section_value->id; ?>" title="<?php echo $this->lang->line('view').' '.$this->lang->line('students'); ?>" data-loading-text="<i class='fa fa-spinner fa-spin'></i>"><i class="fa fa-eye"></i></button></td>

                                                </tr>

                                                <?php

                                                      $count+=1;  

                                                    }
                                                }



                                                ?>

                                        </tbody>

                                    </table>

                                <?php   

                                }else{

                                    ?>

                                    <div class="alert alert-info">

										<?php echo $this->lang->line('no_record_found'); ?>

                                    </div>

                                    <?php

                                }

                                 ?>

                            </div>

                        </div>

                    </div><!--./box box-primary -->

            </div><!-- ./col-md-12 -->  

    </section>

</div>       



<div id="studentModal" class="modal fade" role="dialog">

    <div class="modal-dialog modal-xl">

        <!-- Modal content-->

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title"><?php echo $this->lang->line('student').' '.$this->lang->line('list'); ?></h4>

            </div>



            <div class="modal-body">



            </div>

        </div>

    </div>

</div>



      

<script type="text/javascript">



$(document).ready(function(){

  $('#studentModal').modal({backdrop:'static', keyboard:false, show: false});

});



      $(document).on('click', '.studentlist', function () {

        var $this = $(this);

        var date=$this.data('date');    

     

        $.ajax({

            type: 'POST',

            url: baseurl + "student/getStudentByClassSection",

            data: {'cls_section_id':$this.data('clssectionId')},

            dataType: 'JSON',

            beforeSend: function () {

                $this.button('loading');

            },

            success: function (data) {

                $('#studentModal .modal-body').html(data.page);

                $('#studentModal').modal('show');

                $this.button('reset');

            },

            error: function (xhr) { // if error occured

                alert("Error occured.please try again");

                $this.button('reset');

            },

            complete: function () {

                $this.button('reset');

            }

        });



    });

      $(document).on('change', '#class_id', function (e) {
            $('#section_id').html("");
            var class_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            $.ajax({
                type: "GET",
                url: base_url + "sections/getByClass",
                data: {'class_id': class_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.section_id + ">" + obj.section + "</option>";
                    });
                    $('#section_id').append(div_data);
                }
            });
        });

</script>