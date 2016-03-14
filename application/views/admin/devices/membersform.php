    <div class="adminbody">
        <div class="col-sm-12 memberinfo">
            <div class="row">
                <div class="col-sm-8">
                    <h1><?php echo $title; ?></h1>
                </div>
                <div class="col-sm-4 text-right main-btn">
                    <a class="btn btn-default" title="Back to List" href="<?php echo base_url('admin/members'); ?>"><< Back to List</a>
                </div>
            </div>
            <hr />
            <?php echo form_open('admin/members/add'); ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-inline">
                            Date received by Edifying Ministry: <input type="text" class="form-control datepicker" id="datereceived" name="datereceived" value="<?php echo set_value('datereceived'); ?>">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label>
                            <input type="radio" name="applicationtype" value="B" <?php echo set_radio('applicationtype', 'B', TRUE); ?>> for baptism
                        </label>
                    </div>
                    <div class="col-sm-3">
                        <label>
                            <input type="radio" name="applicationtype" value="T" <?php echo set_radio('applicationtype', 'T'); ?>> transferee
                        </label>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-sm-12">
                        <h4>A. PERSONAL INFORMATION</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <h5>Full Name</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="lastname" class="control-label">Last Name:</label> <?php echo form_error('lastname', '<span class="form-error">- ', '</span>'); ?>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name" value="<?php echo set_value('lastname'); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="firstname" class="control-label">First Name:</label> <?php echo form_error('firstname', '<span class="form-error">- ', '</span>'); ?>
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name" value="<?php echo set_value('firstname'); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="middlename" class="control-label">Middle Name:</label> <?php echo form_error('middlename', '<span class="form-error">- ', '</span>'); ?>
                            <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Enter Middle Name" value="<?php echo set_value('middlename'); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="nickname" class="control-label">Nick Name:</label>
                            <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Enter Nickname" value="<?php echo set_value('nickname'); ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="homeaddress" class="control-label">Home Address:</label> <?php echo form_error('homeaddress', '<span class="form-error">- ', '</span>'); ?>
                            <input type="text" class="form-control" id="homeaddress" name="homeaddress" placeholder="Enter Home Address" value="<?php echo set_value('homeaddress'); ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Date of Birth:</label> <?php echo form_error('bdday', '<span class="form-error">- ', '</span>'); ?>
                            <div class="form-inline">
                                <?php echo form_dropdown('bdmonth', $months, set_value('bdmonth'), 'id="bdmonth" class="form-control"'); ?>
                                <input type="text" class="form-control" id="bdday" name="bdday" maxlength="2" size="2" placeholder="Day" value="<?php echo set_value('bdday'); ?>"> <input type="text" class="form-control" id="bdyear" name="bdyear" maxlength="4" placeholder="Year" value="<?php echo set_value('bdyear'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="placeofbirth" class="control-label">Place of Birth:</label>
                            <input type="text" class="form-control" id="placeofbirth" name="placeofbirth" placeholder="Enter Place of Birth" value="<?php echo set_value('placeofbirth'); ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="homenumber" class="control-label">Home Number:</label>
                            <input type="text" class="form-control" id="homenumber" name="homenumber" placeholder="Enter Home Number" value="<?php echo set_value('homenumber'); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="cellphone" class="control-label">Cellphone:</label> <?php echo form_error('homeaddress', '<span class="form-error">- ', '</span>'); ?>
                            <input type="text" class="form-control" id="cellphone" name="cellphone" placeholder="Enter Cellphone" maxlength="11" value="<?php echo set_value('cellphone'); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="emailaddress" class="control-label">Personal E-Mail Address:</label> <?php echo form_error('emailaddress', '<span class="form-error">- ', '</span>'); ?>
                            <input type="text" class="form-control" id="emailaddress" name="emailaddress" placeholder="Enter Personal E-Mail Address" value="<?php echo set_value('emailaddress'); ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="companyoffice" class="control-label">Company/Office:</label>
                            <input type="text" class="form-control" id="companyoffice" name="companyoffice" placeholder="Enter Company/Office" value="<?php echo set_value('companyoffice'); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="occupation" class="control-label">Occupation:</label>
                            <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Enter Occupation" value="<?php echo set_value('occupation'); ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="officenumber" class="control-label">Office Number:</label>
                            <input type="text" class="form-control" id="officenumber" name="officenumber" placeholder="Enter Office Number" value="<?php echo set_value('officenumber'); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="fax" class="control-label">Fax:</label>
                            <input type="text" class="form-control" id="fax" name="fax" placeholder="Enter Fax" value="<?php echo set_value('fax'); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="officeemail" class="control-label">Office E-Mail Address:</label>
                            <input type="text" class="form-control" id="officeemail" name="officeemail" placeholder="Enter Office E-Mail Address" value="<?php echo set_value('officeemail'); ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label>Civil Status:</label> <?php echo form_error('civilstatus', '<span class="form-error">- ', '</span>'); ?> <?php echo form_error('ocivilstatus', '<span class="form-error">- ', '</span>'); ?>
                    </div>
                    <div class="col-sm-2">
                        <label>
                            <input type="radio" name="civilstatus" value="S" <?php echo set_radio('civilstatus', 'S', TRUE); ?>> Single
                        </label>
                    </div>
                    <div class="col-sm-2">
                        <label>
                            <input type="radio" name="civilstatus" value="M" <?php echo set_radio('civilstatus', 'M'); ?>> Married
                        </label>
                    </div>
                    <div class="col-sm-3">
                        <label>
                            <input type="radio" name="civilstatus" value="O" <?php echo set_radio('civilstatus', 'O'); ?>> Others (please specify):
                        </label>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="ocivilstatus" name="ocivilstatus" placeholder="Enter Civil Status" <?php echo $ocivil_disable; ?> value="<?php echo set_value('ocivilstatus'); ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="datefirstvisit" class="control-label">Date First Visited GCF:</label>
                            <input type="text" class="form-control" id="datefirstvisit" name="datefirstvisit" placeholder="Enter Date First Visited GCF" value="<?php echo set_value('datefirstvisit'); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="invitedby" class="control-label">Invited By:</label>
                            <input type="text" class="form-control" id="invitedby" name="invitedby" placeholder="Enter Invited By" value="<?php echo set_value('invitedby'); ?>" />
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-12">
                        <h4>B. FAMILY BACKGROUND</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <h5>Name of Spouse</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="slastname" class="control-label">Last Name:</label> <?php echo form_error('slastname', '<span class="form-error">- ', '</span>'); ?>
                            <input type="text" class="form-control" id="slastname" name="slastname" placeholder="Enter Last Name" value="<?php echo set_value('slastname'); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="sfirstname" class="control-label">First Name:</label> <?php echo form_error('sfirstname', '<span class="form-error">- ', '</span>'); ?>
                            <input type="text" class="form-control" id="sfirstname" name="sfirstname" placeholder="Enter First Name" value="<?php echo set_value('sfirstname'); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="smiddlename" class="control-label">Middle Name:</label> <?php echo form_error('smiddlename', '<span class="form-error">- ', '</span>'); ?>
                            <input type="text" class="form-control" id="smiddlename" name="smiddlename" placeholder="Enter Middle Name" value="<?php echo set_value('smiddlename'); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="snickname" class="control-label">Nick Name:</label>
                            <input type="text" class="form-control" id="snickname" name="snickname" placeholder="Enter Nickname" value="<?php echo set_value('snickname'); ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Date Married:</label>
                            <div class="form-inline">
                                <?php echo form_dropdown('dmmonth', $months, set_value('dmmonth'), 'id="dmmonth" class="form-control"'); ?>
                                <input type="text" class="form-control" id="dmday" name="dmday" maxlength="2" size="2" placeholder="Day" value="<?php echo set_value('dmday'); ?>"> <input type="text" class="form-control" id="dmyear" name="dmyear" maxlength="4" placeholder="Year" value="<?php echo set_value('dmyear'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Birthday of Spouse:</label>
                            <div class="form-inline">
                                <?php echo form_dropdown('sbdmonth', $months, set_value('sbdmonth'), 'id="sbdmonth" class="form-control"'); ?>
                                <input type="text" class="form-control" id="sbdday" name="sbdday" maxlength="2" size="2" placeholder="Day" value="<?php echo set_value('sbdday'); ?>"> <input type="text" class="form-control" id="sbdyear" name="sbdyear" maxlength="4" placeholder="Year" value="<?php echo set_value('sbdyear'); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <h5>Child/Children</h5>
                    </div>
                    <div class="col-xs-8 text-right">
                        <button type="button" class="btn btn-default addChild"><span class="glyphicon glyphicon-plus"></span> Add Child</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <label class="control-label">Name of Child:</label>
                    </div>
                    <div class="col-xs-8">
                        <label class="control-label">Birthdate:</label>
                    </div>
                </div>
                <div id="children">
<?php
$cnt_children = (!empty($cnt_children)) ? $cnt_children : 1;
for ($c = 0; $c < $cnt_children; $c++):
?>
                    <div class="row" id="new-child">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="cname0" name="cname[]" placeholder="Enter Name of Child" value="<?php echo set_value('cname[]'); ?>" />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control datepicker" id="cbirthday0" name="cbirthday[]" placeholder="Enter Birthdate" value="<?php echo set_value('cbirthday[]'); ?>" />
                            </div>
                        </div>
                        <!--<div class="col-sm-4">
                            <button type="button" class="btn btn-danger">Remove</button>
                        </div>-->
                    </div>
<?php endfor; ?>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="fathername" class="control-label">Father's Name:</label>
                            <input type="text" class="form-control" id="fathername" name="fathername" placeholder="Enter Father's Name" value="<?php echo set_value('fathername'); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="fatherage" class="control-label">Age:</label>
                            <input type="text" class="form-control" id="fatherage" name="fatherage" placeholder="Enter Age" value="<?php echo set_value('fatherage'); ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="mothername" class="control-label">Mother's Name:</label>
                            <input type="text" class="form-control" id="mothername" name="mothername" placeholder="Enter Mother's Name" value="<?php echo set_value('mothername'); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="motherage" class="control-label">Age:</label>
                            <input type="text" class="form-control" id="motherage" name="motherage" placeholder="Enter Age" value="<?php echo set_value('motherage'); ?>" />
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-12">
                        <h4>C. EDUCATIONAL BACKGROUND</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <label class="control-label">Name of School:</label>
                    </div>
                    <div class="col-xs-3">
                        <label class="control-label">Course:</label>
                    </div>
                    <div class="col-xs-6">
                        <label class="control-label">Inclusive Years:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-9">
                        <h5>High School</h5>
                    </div>
                    <div class="col-xs-3 text-right">
                        <button type="button" class="btn btn-default addEduc" id="addh"><span class="glyphicon glyphicon-plus"></span> Add High School</button>
                    </div>
                </div>
                <div id="hed">
<?php
$cnt_edh = (!empty($cnt_edh)) ? $cnt_edh : 1;
for ($c = 0; $c < $cnt_edh; $c++):
?>
                    <div class="row" id="new-hschool">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="hnameschool0" name="hnameschool[]" placeholder="Enter Name of School" value="<?php echo set_value('hnameschool[]'); ?>" />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="hcourse0" name="hcourse[]" placeholder="Enter Course" value="<?php echo set_value('hcourse[]'); ?>" />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="hincyears0" name="hincyears[]" placeholder="Enter Inclusive Years" value="<?php echo set_value('hincyears[]'); ?>" />
                            </div>
                        </div>
                    </div>
<?php endfor; ?>
                </div>
                <div class="row">
                    <div class="col-xs-9">
                        <h5>College</h5>
                    </div>
                    <div class="col-xs-3 text-right">
                        <button type="button" class="btn btn-default addEduc" id="addc"><span class="glyphicon glyphicon-plus"></span> Add College</button>
                    </div>
                </div>
                <div id="ced">
<?php
$cnt_edc = (!empty($cnt_edc)) ? $cnt_edc : 1;
for ($c = 0; $c < $cnt_edc; $c++):
?>
                    <div class="row" id="new-cschool">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="cnameschool0" name="cnameschool[]" placeholder="Enter Name of School" value="<?php echo set_value('cnameschool[]'); ?>" />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="ccourse0" name="ccourse[]" placeholder="Enter Course" value="<?php echo set_value('ccourse[]'); ?>" />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="cincyears0" name="cincyears[]" placeholder="Enter Inclusive Years" value="<?php echo set_value('cincyears[]'); ?>" />
                            </div>
                        </div>
                    </div>
<?php endfor; ?>
                </div>
                <div class="row">
                    <div class="col-xs-9">
                        <h5>Graduate School</h5>
                    </div>
                    <div class="col-xs-3 text-right">
                        <button type="button" class="btn btn-default addEduc" id="addg"><span class="glyphicon glyphicon-plus"></span> Add Graduate School</button>
                    </div>
                </div>
                <div id="ged">
<?php
$cnt_edg = (!empty($cnt_edg)) ? $cnt_edg : 1;
for ($c = 0; $c < $cnt_edg; $c++):
?>
                    <div class="row" id="new-gschool">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="gnameschool0" name="gnameschool[]" placeholder="Enter Name of School" value="<?php echo set_value('gnameschool[]'); ?>" />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="gcourse0" name="gcourse[]" placeholder="Enter Course" value="<?php echo set_value('gcourse[]'); ?>" />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="gincyears0" name="gincyears[]" placeholder="Enter Inclusive Years" value="<?php echo set_value('gincyears[]'); ?>" />
                            </div>
                        </div>
                    </div>
<?php endfor; ?>
                </div>
                <div class="row">
                    <div class="col-xs-9">
                        <h5>Post Graduate School</h5>
                    </div>
                    <div class="col-xs-3 text-right">
                        <button type="button" class="btn btn-default addEduc" id="addp"><span class="glyphicon glyphicon-plus"></span> Add Post Graduate School</button>
                    </div>
                </div>
                <div id="ped">
<?php
$cnt_edp = (!empty($cnt_edp)) ? $cnt_edp : 1;
for ($c = 0; $c < $cnt_edp; $c++):
?>
                    <div class="row" id="new-pschool">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="pnameschool0" name="pnameschool[]" placeholder="Enter Name of School" value="<?php echo set_value('pnameschool[]'); ?>" />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="pcourse0" name="pcourse[]" placeholder="Enter Course" value="<?php echo set_value('pcourse[]'); ?>" />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="pincyears0" name="pincyears[]" placeholder="Enter Inclusive Years" value="<?php echo set_value('pincyears[]'); ?>" />
                            </div>
                        </div>
                    </div>
<?php endfor; ?>
                </div>
                <hr />
                <div class="row">
                    <div class="col-xs-12">
                        <h4>D. Religious Background</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="rel1when" class="control-label">1. When did you receive Christ as your Savior?</label>
                            <input type="text" class="form-control datepicker" id="rel1when" name="rel1when" placeholder="" value="<?php echo set_value('rel1when'); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="rel1where" class="control-label">Where?</label>
                            <input type="text" class="form-control" id="rel1where" name="rel1where" placeholder="" value="<?php echo set_value('rel1where'); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="rel1whom" class="control-label">Through whom?</label>
                            <input type="text" class="form-control" id="rel1whom" name="rel1whom" placeholder="" value="<?php echo set_value('rel1whom'); ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label>2. Have you been baptized by immersion?</label>
                    </div>
                    <div class="col-sm-2">
                        <label><input type="radio" name="rel2yesno" value="Y" <?php echo set_radio('rel2yesno', 'Y'); ?>> Yes</label>
                    </div>
                    <div class="col-sm-2">
                        <label><input type="radio" name="rel2yesno" value="N" <?php echo set_radio('rel2yesno', 'N'); ?>> No</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="rel2when" class="control-label">When?</label>
                            <input type="text" class="form-control datepicker" id="rel2when" name="rel2when" placeholder="" value="<?php echo set_value('rel2when'); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="rel2where" class="control-label">Where?</label>
                            <input type="text" class="form-control" id="rel2where" name="rel2where" placeholder="" value="<?php echo set_value('rel2where'); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="rel2minister" class="control-label">Officiating Minister</label>
                            <input type="text" class="form-control" id="rel2minister" name="rel2minister" placeholder="Enter Officiating Minister" value="<?php echo set_value('rel2minister'); ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label>3. Previous Church Membership (If Applicable)</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="rel3church" class="control-label">Church's Name:</label>
                            <input type="text" class="form-control" id="rel3church" name="rel3church" placeholder="" value="<?php echo set_value('rel3church'); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="rel3years" class="control-label">Inclusive Years:</label>
                            <input type="text" class="form-control" id="rel3years" name="rel3years" placeholder="" value="<?php echo set_value('rel3years'); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="rel3pastor" class="control-label">Pastor:</label>
                            <input type="text" class="form-control" id="rel3pastor" name="rel3pastor" placeholder="Enter Pastor" value="<?php echo set_value('rel3pastor'); ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="rel3address" class="control-label">Address:</label>
                            <input type="text" class="form-control" id="rel3address" name="rel3address" placeholder="" value="<?php echo set_value('rel3address'); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="rel3telno" class="control-label">Tel. No.:</label>
                            <input type="text" class="form-control" id="rel3telno" name="rel3telno" placeholder="" value="<?php echo set_value('rel3telno'); ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="rel3positions" class="control-label">Positions Held (If Any):</label>
                            <input type="text" class="form-control" id="rel3positions" name="rel3positions" placeholder="" value="<?php echo set_value('rel3positions'); ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="rel4reasons" class="control-label">4. Reason(s) for leaving your previous church and joining GCF?</label>
                            <textarea class="form-control" id="rel4reasons" name="rel4reasons"><?php echo set_value('rel4reasons'); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label>5. Have you come to a point in your spiritual life that you know for sure that if you were to die today, you would get to heaven?</label>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <label><input type="radio" name="rel5yesno" value="Y" <?php echo set_radio('rel5yesno', 'Y'); ?>> Yes</label>
                    </div>
                    <div class="col-sm-1">
                        <label><input type="radio" name="rel5yesno" value="N" <?php echo set_radio('rel5yesno', 'N'); ?>> No</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="rel5question" class="control-label">If you were to die today and stand before God, what would you tell Him if He asks you, why should I let you in to My heaven?</label>
                            <textarea class="form-control" id="rel5question" name="rel5question"><?php echo set_value('rel5question'); ?></textarea>
                        </div>
                    </div>
                </div>
                <br />
                <div class="row info-rows">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-lg btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
