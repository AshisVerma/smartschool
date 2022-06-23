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
                        <div class="box-header ptbnull">
                            <h3 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('select_criteria'); ?></h3>
                        </div>
                        <form id='form1' action="<?php echo site_url('student/pertransporterReport') ?>"  method="post" accept-charset="utf-8">
                            <div class="box-body">
                                <?php echo $this->customlib->getCSRF(); ?>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('route_title'); ?></label><small class="req"> *</small>
                                            <select autofocus="" id="listroute" name="listroute" class="form-control" >
                                                <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                    <?php
                                                    foreach ($listroute as $rkey => $rvalue) {
                                                    ?>
                                                    <option value="<?php echo $rvalue['id'] ?>" <?php if (set_value('listroute') == $rvalue['id']) echo "selected=selected" ?>> <?php echo $rvalue["route_title"] ?>
                                                            
                                                    </option>
                                                    <?php 
                                                    }
                                                    ?>
                                                            
                                            </select>
                                            <span class="text-danger"><?php echo form_error('class_id'); ?></span>
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
                            <div class="download_label"><?php echo $this->lang->line('student_transport_report') . " ";
                                        $this->customlib->get_postmessage();
                                        ?></div>
                            <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('s_no'); ?></th>
                                        
                                        <th><?php echo $this->lang->line('route_title'); ?></th>                                     
                                        <th><?php echo $this->lang->line('vehicle_no'); ?></th>                                     
                                        <th><?php echo $this->lang->line('students'); ?></th>                                    
                                        <th><?php echo $this->lang->line('action'); ?></th>                                    
                                        


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($studentlist)) {
                                        ?>

                                        <?php
                                    } else {
                                        $count = 1;
                                        foreach ($studentlist as $rkey => $rvalue) {
                                            
                                            ?>
                                            <tr>
                                                <td> <?php echo $count; ?></td>
                                                <td> <?php echo $rvalue["route_title"] ?></td>
                                                <td> <?php echo $rvalue["vehicle_no"] ?></td>
                                                <td > <?php echo countPerTransLineStudent($rvalue["vehicle_id"]) ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-default btn-xs studentlist" id="load" data-toggle="tooltip"  data-clssection-id="<?php echo $rvalue["vehicle_id"]; ?>" title="<?php echo $this->lang->line('view').' '.$this->lang->line('students'); ?>" data-loading-text="<i class='fa fa-spinner fa-spin'></i>"><i class="fa fa-eye"></i></button>
                                                </td>

                                            </tr>
                                            <?php
                                            $count++;
                                        }
                                    }
                                    ?>
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
    $(document).ready(function(){
  $('#studentModal').modal({backdrop:'static', keyboard:false, show: false});
});

      $(document).on('click', '.studentlist', function () {
        var $this = $(this);
        var date=$this.data('date');    
     
        $.ajax({
            type: 'POST',
            url: baseurl + "student/getStudentByvehicleId",
            data: {'vehicle_id':$this.data('clssectionId')},
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