<div class="content-wrapper">   

    <section class="content-header">

        <h1>

            <i class="fa fa-mortar-board"></i> <?php echo $this->lang->line('academics'); ?> <small><?php echo $this->lang->line('student_fees1'); ?></small>        </h1>

    </section>

    <!-- Main content -->

    <section class="content">

        <div class="row">

            <?php

            if ($this->rbac->hasPrivilege('semester', 'can_add') || $this->rbac->hasPrivilege('semester', 'can_edit')) {

                ?>

                <div class="col-md-4">

                    <div class="box box-primary">

                        <div class="box-header with-border">

                            <h3 class="box-title"><?php echo $this->lang->line('edit'); ?> <?php echo 'semester'; ?></h3>

                        </div>

                        <form action="<?php echo site_url("semester/edit/" . $id) ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">

                            <div class="box-body">

                                <?php if ($this->session->flashdata('msg')) { ?>

                                    <?php echo $this->session->flashdata('msg') ?>

                                <?php } ?>   

                                <?php echo $this->customlib->getCSRF(); ?>

                                <div class="form-group">

                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('section'); ?></label><small class="req"> *</small>

                                    <input autofocus="" id="semester" name="semester" placeholder="" type="text" class="form-control"  value="<?php echo set_value('semester', $semester['semester']); ?>" />

                                    <span class="text-danger"><?php echo form_error('semester'); ?></span>

                                </div>

                            </div>

                            <div class="box-footer">

                                <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>

                            </div>

                        </form>

                    </div>              

                </div>

            <?php } ?>

            <div class="col-md-<?php

            if ($this->rbac->hasPrivilege('section', 'can_add') || $this->rbac->hasPrivilege('section', 'can_edit')) {

                echo "8";

            } else {

                echo "12";

            }

            ?>">             

                <div class="box box-primary">

                    <div class="box-header ptbnull">

                        <h3 class="box-title titlefix"><?php echo $this->lang->line('section_list'); ?></h3>

                    </div>

                    <div class="box-body ">

                        <div class="table-responsive mailbox-messages">

                            <div class="download_label"><?php echo $this->lang->line('section_list'); ?></div>

                            <table class="table table-striped table-bordered table-hover example">

                                <thead>

                                    <tr>

                                        <th><?php echo "Semester"; ?></th>

                                        <th class="text-right"><?php echo $this->lang->line('action'); ?></th>

                                    </tr>

                                </thead>

                                <tbody>                                   



                                    <?php

                                    $count = 1;

                                    foreach ($semesterlist as $semester) {

                                        ?>

                                        <tr>

                                            <td class="mailbox-name"> <?php echo $semester['semester'] ?></td>

                                            <td class="mailbox-date pull-right">

                                                <?php

                                                if ($this->rbac->hasPrivilege('semester', 'can_edit')) {

                                                    ?>

                                                    <a data-placement="left" href="<?php echo base_url(); ?>semester/edit/<?php echo $semester['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">

                                                        <i class="fa fa-pencil"></i>

                                                    </a>

                                                    <?php

                                                }

                                                if ($this->rbac->hasPrivilege('section', 'can_delete')) {

                                                    ?>

                                                    <a data-placement="left" href="<?php echo base_url(); ?>semester/delete/<?php echo $semester['id'] ?>"class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('semester will also delete all students under this semester so be careful as this action is irreversible --r');">

                                                        <i class="fa fa-remove"></i>

                                                    </a>

                                                <?php } ?>

                                            </td>

                                        </tr>

                                        <?php

                                    }

                                    $count++;

                                    ?>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div> 



        </div> 

    </section>

</div>