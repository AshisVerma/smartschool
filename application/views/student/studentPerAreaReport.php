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
                <div class="box box-primary">
                    <div class="">
                        <div class="box-header ptbnull"></div>

                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('select_criteria'); ?></h3>
                        </div>
                        <form id='form1' action="<?php echo site_url('student/studentperareareport') ?>"  method="post" accept-charset="utf-8">
                                    <div class="box-body">
                                        <?php echo $this->customlib->getCSRF(); ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('address'); ?></label><small class="req"> *</small>
                                                    <select autofocus="" id="listaddress" name="listaddress" class="form-control" >
                                                        <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                        <?php
                                                        foreach ($listaddress as $rkey => $value) {
                                                            if(!empty($value["current_address"])){
                                                            ?>
                                                            <option value="<?php echo $value['current_address'] ?>" <?php if (set_value('listaddress') == $value['current_address']) echo "selected=selected" ?>><?php echo $value['current_address'] ?></option>
                                                                    <?php
                                                                    $count++;
                                                                }
                                                            }
                                                                ?>
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('listaddress'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="dhide" style="display: block; visibility:hidden;">address</label>
                                                <div class="form-group">
                                                    <button type="submit" name="search" value="search" class="btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>  
                                </form>


                        <div class="box-header ptbnull">
                            <h3 class="box-title titlefix"><i class="fa fa-users"></i> <?php echo $this->lang->line('student')." Area ".$this->lang->line('report') ?></h3>
                        </div>
                        <div class="box-body table-responsive">
                            <div class="download_label">
                                <?php echo $this->lang->line('student_transport_report') . " ";
                                        $this->customlib->get_postmessage();
                                        ?></div>
                            <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('s_no'); ?></th>
                                        
                                        <th><?php echo "Area" ?></th>                                     
                                        <th><?php echo $this->lang->line('students'); ?></th>  
                                        <th class="text text-right noExport"><?php echo $this->lang->line('action'); ?></th>                                  
                                        


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                        $count = 1;
                                        
                                           
                                            if(!empty($address)){
                                            
                                                ?>
                                                <tr>
                                                    <td> <?php echo $count; ?></td>
                                                    <td> <?php echo $address ?></td>
                                        
                                                    <td > <?php echo countStudentAreaAddress($address) ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-default btn-xs studentlist" id="load" data-toggle="tooltip"  data-clssection-id="<?php echo $address; ?>" title="<?php echo $this->lang->line('view').' '.$this->lang->line('students'); ?>" data-loading-text="<i class='fa fa-spinner fa-spin'></i>"><i class="fa fa-eye"></i></button></td>
                                                    </td>

                                                </tr>
                                                <?php
                                               
                                            } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!--./box box-primary-->
            </div><!--./col-md-12--> 
        </div>   
</div>  
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
    function getSectionByClass(class_id, section_id) {
        if (class_id != "" && section_id != "") {
            $('#section_id').html("");
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
                        var sel = "";
                        if (section_id == obj.section_id) {
                            sel = "selected";
                        }
                        div_data += "<option value=" + obj.section_id + " " + sel + ">" + obj.section + "</option>";
                    });
                    $('#section_id').append(div_data);
                }
            });
        }
    }

    $(document).ready(function () {
        var class_id = $('#class_id').val();
        var section_id = '<?php echo set_value('section_id') ?>';
        getSectionByClass(class_id, section_id);
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
    });

    $(document).on('click', '.studentlist', function () {

        var $this = $(this);

        var date=$this.data('date');    

        $.ajax({

            type: 'POST',

            url: baseurl + "student/getStudentByAddress",

            data: {'address':$this.data('clssectionId')},

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
</script>