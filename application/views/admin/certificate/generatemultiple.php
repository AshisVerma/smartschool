<style type="text/css">

    @media print {

      .page-break { display: block; page-break-before: always; }

    }

    *{ margin:0; padding: 0;}



    /*table{ font-family: 'arial'; margin:0; padding: 0;font-size: 12px; color: #000;}*/

    .tc-container{width: 100%;position: relative; text-align: center;}

    .tcmybg {

        background: top center;

        background-size: contain;

        position: absolute;

        left: 0;

        bottom: 10px;

        width: 200px;

        height: 200px;

        margin-left: auto;

        margin-right: auto;

        right: 0;

        opacity: 0.10;

    }

    /*begin students id card*/

    .studentmain{background: #efefef;width: 100%; margin-bottom: 30px;}

    .studenttop img{vertical-align: top;}

    .studenttop{padding:2px;color: #fff;overflow: hidden;position: relative;z-index: 1;}

    .sttext1{font-size: 24px;font-weight: bold;line-height: 30px;}

    .stgray{background: #efefef;padding-top: 5px; padding-bottom: 10px;}

    .staddress{margin-bottom: 0; padding-top: 2px;}

    .stdivider{border-bottom: 2px solid #000;margin-top: 5px; margin-bottom: 5px;}

    .stlist{padding: 0; margin:0; list-style: none;}

    .stlist li{text-align: left;display: inline-block;width: 100%;padding: 0px 5px;}

    .stlist li span{width:65%;float: right;}

    .stimg{width: 80px;height: auto;}

    .stimg img{width: 100%;height: auto,border-radius: 2px;display: block;}

    .img-circle {border-radius:16px;}

    .center-block {display: block;margin-right: auto;margin-left: auto;}

    .staround{padding:3px 10px 3px 0;position: relative;overflow: hidden;}

    .staround2{position: relative; z-index: 9;}

    .stbottom{background: #453278;height: 20px;width: 100%;clear: both;margin-bottom: 5px;}

    .principal{margin-top: -40px;margin-right:10px; float:right;}

    .stred{color: #000;}

    .spanlr{padding-left: 5px; padding-right: 5px;}

    .cardleft{width: 20%;float: left;}

    .cardright{width: 77%;float: right; }

    .width32{width: 32.55%; padding: 3px;}

    .signature{border:1px solid #ddd; display:block; text-align: center; padding: 5px 20px; margin-top: 20px;}

    .vertlist{padding: 0; margin:0; list-style: none;}

    .vertlist li{text-align: left;display: inline-block;width: 100%; padding-bottom: 5px;color: #000;}

    .vertlist li span{width:65%;float: right;}

</style>



<?php

$school = $sch_setting[0];

$i = 0;



?>

<?php 

if($id_card[0]->enable_vertical_card)

{

?>



<table cellpadding="0" cellspacing="0" width="100%" background=" <?php echo $id_card[0]->header_color; ?>; !important" >

        <tr>

                <?php

                foreach ($students as $student) {

                    $i++;

                    $id_card_size=explode(',',$id_card[0]->id_card_size);
                    $logo_size=explode(',',$id_card[0]->logo_size);
                    $photo_size=explode(',',$id_card[0]->photo_size);
                    ?>

            <td valign="top" style="text-align: center;color: #fff;padding: 10px;min-height: 110px;display: block;">

                <table cellpadding="0" cellspacing="0" width="100%" >
                    <tr>
                        <td valign="top">
                            <div style="color: #fff;position: relative; z-index: 1; text-align: center;vertical-align: top">
                                <div class="sttext1" style="font-size: 16px;line-height: 8px;">
                                    <img src="<?php echo base_url('uploads/student_id_card/logo/'.$id_card[0]->logo); ?>" <?php if(!empty($id_card[0]->logo_size)){ ?> width="<?php print_r($logo_size[0]) ?>" height="<?php print_r($logo_size[1]) ?>" <?php } else { ?> width="30" height="30" <?php } ?> >
                                    <span style="font-size:<?php echo $id_card[0]->font_size."px" ?>;color: <?php echo $id_card[0]->font_color?>;font-style: <?php echo $id_card[0]->font_style?>"><?php echo $id_card[0]->school_name ?>
                                        
                                    </span>
                               </div>
                            </div>
                        </td>
                    </tr>
                    <tr style="margin-top: 10px">
                        <td valign="top" style="color: #fff;text-align: center; font-size:20px;"><?php echo $id_card[0]->school_address; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td valign="top" >
               <table cellpadding="0" cellspacing="0" width="100%" style="margin-top: -30px; ">
                   <tr>

                        <td valign="top" style="text-align: center;">

                            <div class="stimg center-block">

                                <img src="<?php

									if (!empty($student->image)) {

										echo base_url() . $student->image;

									} else {

										if ($student->gender == 'Female') {

											echo base_url() . "uploads/student_images/default_female.jpg";

										} elseif ($student->gender == 'Male') {

											echo base_url() . "uploads/student_images/default_male.jpg";

										}



									}

									?>" class="img-responsive img-circle block-center"  style="border-radius: 8px; border:3px solid <?php echo $id_card[0]->header_color; ?>">

                            </div>

                        </td>

                    </tr>

                    <tr>

                        <td valign="top" style="text-align: center;">

                            <h4 style="margin:0; text-transform: uppercase;font-weight: bold; margin-top: 10px;"> <?php echo $this->customlib->getFullName($student->firstname,$student->middlename,$student->lastname,$sch_settingdata->middlename,$sch_settingdata->lastname); ?></h4>

                            <p style="font-size: 15px;color: #9b1818;">Student</p>

                        </td>

                    </tr>  

               </table> 

            </td>

        </tr>

        <tr>

            <td valign="top">

              <table cellpadding="0" cellpadding="0" width="80%" align="center" style="background: #fff;padding: 20px 20px;display: block;width: 90%; margin:0 auto">

                    <tr >

                        <td valign="top" >

                            <ul class="vertlist">

                             

                                            <?php if ($id_card[0]->enable_student_name == 1) { ?><!-- <li><?php //echo $this->lang->line('student_name'); ?><span> <?php //echo $this->customlib->//getFullName($student->firstname,$student->middlename,$student->lastname,$sch_settingdata->middlename,$sch_settingdata->lastname); ?></span></li> --><?php } ?>

                                            <?php if ($id_card[0]->enable_admission_no == 1) { ?><li><?php echo $this->lang->line('admission_no'); ?><span> <?php echo $student->admission_no; ?></span></li><?php } ?>

                                            <?php if ($id_card[0]->enable_class == 1) { ?><li><?php echo $this->lang->line('class'); ?><span><?php echo $student->class . ' - ' . $student->section . " (" . $school['current_session']['session'] . ")"; ?></span></li><?php } ?>

                                            <?php if ($id_card[0]->enable_fathers_name == 1) { ?><li><?php echo $this->lang->line('father_name'); ?><span><?php echo $student->father_name; ?></span></li><?php } ?>

                                            <?php if ($id_card[0]->enable_mothers_name == 1) { ?><li><?php echo $this->lang->line('mother_name')?><span><?php echo $student->mother_name; ?></span></li><?php } ?>

                                            <?php if ($id_card[0]->enable_address == 1) { ?><li><?php echo $this->lang->line('address')?><span><?php echo $student->current_address; ?></span></li><?php } ?>

                                            <?php if ($id_card[0]->enable_phone == 1) { ?><li>Phone<span><?php echo $student->mobileno; ?></span></li><?php } ?>

                                            <?php

                                            if ($id_card[0]->enable_dob == 1) {

                                                ?>

                                             <li><?php echo $this->lang->line('d_o_b');?>

                                            <span>

                                                        <?php

                                                        echo $dob = "";

                                                        if ($student->dob != "0000-00-00") {

                                                            $dob = date($this->customlib->getSchoolDateFormat(), $this->customlib->dateYYYYMMDDtoStrtotime($student->dob));

                                                        }

                                                        echo $dob;

                                                        ?>

                                                    </span></li>

                                                <?php

                                            }

                                            ?>



                                            <?php if ($id_card[0]->enable_blood_group == 1) { ?><li class="stred"><?php echo $this->lang->line('blood_group'); ?><span><?php echo $student->blood_group; ?></span></li><?php } ?>

                            </ul>

                            <div class="signature"><img src="<?php echo base_url('uploads/student_id_card/signature/'.$id_card[0]->sign_image); ?>" width="200" height="24" />
                            </div>

                        </td>

                    </tr>

                </table>

            </td>

        </tr>



            <?php

            if ($i == 3) {

                // three items in a row. Edit this to get more or less items on a row

                ?></tr><tr><?php

                $i = 0;

            }

        }

        ?>

</table>
    <?php
}else{

    ?>

<table cellpadding="0" cellspacing="0" width="100%">

    <tr>

        <?php

        foreach ($students as $student) {

            $i++;

            $id_card_size=explode(',',$id_card[0]->id_card_size);
            $logo_size=explode(',',$id_card[0]->logo_size);
            $photo_size=explode(',',$id_card[0]->photo_size);
            ?>

            <td valign="top" <?php if(!empty($id_card[0]->id_card_size)){ ?> width="<?php print_r($id_card_size[0]) ?>" height="<?php print_r($id_card_size[1]) ?>" <?php } else { ?> width="32%" <?php } ?> style="padding: 3px;float:left">

                <table cellpadding="0" cellspacing="0" width="100%" class="tc-container" style="background: #efefef;">

                    <tr>

                        <td valign="top">

                            <img src="<?php echo base_url('uploads/student_id_card/background/' . $id_card[0]->background); ?>" class="tcmybg" style="opacity: .1"/></td>

                    </tr>

                    <tr>

                        <td valign="top">

                            <div class="studenttop" style="background: <?php echo $id_card[0]->header_color ?>">



                                <div class="sttext1"><img src="<?php echo base_url('uploads/student_id_card/logo/'.$id_card[0]->logo); ?>" <?php if(!empty($id_card[0]->logo_size)){ ?> width="<?php print_r($logo_size[0]) ?>" height="<?php print_r($logo_size[1]) ?>" <?php } else { ?> width="30" height="30" <?php } ?> >

                                    <span style="font-size:<?php echo $id_card[0]->font_size."px" ?>;color: <?php echo $id_card[0]->font_color?>;font-style: <?php echo $id_card[0]->font_type?>"><?php echo $id_card[0]->school_name ?></span>
                                </div>

                            </div>

                        </td>

                    </tr>

                    <tr>
                        <td valign="top" align="center" style="padding: 1px 0;">
                            <p>  <?php echo $id_card[0]->school_address ?></p>
                        </td>

                    </tr>
                     <tr>
                        <td valign="top" style="color: #fff;font-size: 16px; padding: 2px 0 0; position: relative; z-index: 1;background: <?php echo $id_card[0]->header_color ?>;text-transform: uppercase;"><?php echo $id_card[0]->title ?>
                            
                        </td>

                    </tr>
                    <tr>

                        <td valign="top">

                            <div class="staround">

                                <div class="cardleft">
                                    <div class="stimg">

                                        <img src="<?php

											if (!empty($student->image)) {

												echo base_url() . $student->image;

											} else {



												if ($student->gender == 'Female') {

													echo base_url() . "uploads/student_images/default_female.jpg";

												} elseif ($student->gender == 'Male') {

													echo base_url() . "uploads/student_images/default_male.jpg";

												}



											}

											?>" class="img-responsive" <?php if(!empty($id_card[0]->photo_size)){ ?> width="<?php print_r($photo_size[0]) ?>" height="<?php print_r($photo_size[1]) ?>" <?php } else { ?> width="30" height="30" <?php } ?>/>

                                    </div>

                                </div><!--./cardleft-->

                                <div class="cardright">

                                    <ul class="stlist">



                                       

                                        <?php if ($id_card[0]->enable_student_name == 1) { ?><li><?php echo $this->lang->line('student_name'); ?><span> <?php echo $this->customlib->getFullName($student->firstname,$student->middlename,$student->lastname,$sch_settingdata->middlename,$sch_settingdata->lastname); ?></span></li><?php } ?>

                                        <?php if ($id_card[0]->enable_admission_no == 1) { ?><li><?php echo $this->lang->line('admission_no'); ?><span> <?php echo $student->admission_no; ?></span></li><?php } ?>

                                        <?php if ($id_card[0]->enable_class == 1) { ?><li><?php echo $this->lang->line('class'); ?><span><?php echo $student->class . ' - ' . $student->section . " (" . $school['current_session']['session'] . ")"; ?></span></li><?php } ?>

                                        <?php if ($id_card[0]->enable_fathers_name == 1) { ?><li><?php echo $this->lang->line('father_name'); ?><span><?php echo $student->father_name; ?></span></li><?php } ?>

                                        <?php if ($id_card[0]->enable_mothers_name == 1) { ?><li><?php echo $this->lang->line('mother_name')?><span><?php echo $student->mother_name; ?></span></li><?php } ?>

                                        <?php if ($id_card[0]->enable_address == 1) { ?><li><?php echo $this->lang->line('address')?><span><?php echo $student->current_address; ?></span></li><?php } ?>

                                        <?php if ($id_card[0]->enable_phone == 1) { ?><li>Phone<span><?php echo $student->mobileno; ?></span></li><?php } ?>

                                        <?php

                                        if ($id_card[0]->enable_dob == 1) {

                                            ?>

                                         <li><?php echo $this->lang->line('d_o_b');?>

                                        <span>

                                                    <?php

                                                    echo $dob = "";

                                                    if ($student->dob != "0000-00-00") {

                                                        $dob = date($this->customlib->getSchoolDateFormat(), $this->customlib->dateYYYYMMDDtoStrtotime($student->dob));

                                                    }

                                                    echo $dob;

                                                    ?>

                                                </span></li>

                                            <?php

                                        }

                                        ?>



                                        <?php if ($id_card[0]->enable_blood_group == 1) { ?><li class="stred"><?php echo $this->lang->line('blood_group'); ?><span><?php echo $student->blood_group; ?></span></li><?php } ?>

                                    </ul>

                                </div><!--./cardright-->

                            </div><!--./staround-->

                        </td>

                    </tr>

                    <tr>

                        <td valign="top" align="right" class="principal"><img src="<?php echo base_url('uploads/student_id_card/signature/' . $id_card[0]->sign_image); ?>" width="66" height="40" /></td>

                    </tr>

                </table>

            </td>



            <?php

            if ($i == 2) {

                // three items in a row. Edit this to get more or less items on a row

                ?></tr><tr><?php

                $i = 0;

            }

        }

        ?>

    </tr>



</table>

    <?php

}



 ?>