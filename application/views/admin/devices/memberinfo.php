    <div class="adminbody">
        <div class="col-sm-12 memberinfo">
            <div class="row">
                <div class="col-sm-7">
                    <h1><?php echo $title; ?></h1>
                </div>
                <div class="col-sm-5 text-right main-btn">
                    <div class="pull-right">
                        <a class="btn btn-default" href="<?php echo base_url('admin/members'); ?>">&laquo; Back to List</a> <a class="btn btn-info" href="#"><span class="glyphicon glyphicon-file"></span> View Form</a> <a class="btn btn-warning" href="<?php echo base_url('admin/members/edit/'.$membership_id); ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a> <a class="btn btn-danger delrec" href="<?php echo base_url('admin/members/delete/'.$membership_id); ?>"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-inline">
                        <div><label>Date received by Edifying Ministry:</label></div><div><?php echo $memberinfo['personal']['date_received']; ?></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <span class="glyphicon <?php echo ($memberinfo['personal']['application_type'] == 'B') ? 'glyphicon-check' : 'glyphicon-unchecked'; ?>"></span> <label>for baptism</label>
                </div>
                <div class="col-sm-3">
                    <span class="glyphicon <?php echo ($memberinfo['personal']['application_type'] == 'T') ? 'glyphicon-check' : 'glyphicon-unchecked'; ?>"></span> <label>transferee</label>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-sm-12">
                    <h4>A. PERSONAL INFORMATION</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <h5>Full Name</h5>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-3">
                    <div><label>Last Name:</label></div>
                    <div><?php echo $memberinfo['personal']['last_name']; ?></div>
                </div>
                <div class="col-sm-3">
                    <div><label>First Name:</label></div>
                    <div><?php echo $memberinfo['personal']['first_name']; ?></div>
                </div>
                <div class="col-sm-3">
                    <div><label for="middlename">Middle Name:</label></div>
                    <div><?php echo $memberinfo['personal']['middle_name']; ?></div>
                </div>
                <div class="col-sm-3">
                    <div><label>Nick Name:</label></div>
                    <div><?php echo $memberinfo['personal']['nick_name']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <label>Home Address:</label>
                    <div><?php echo $memberinfo['personal']['home_address']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-6">
                    <div><label>Date of Birth:</label></div>
                    <div><?php echo $memberinfo['personal']['date_of_birth']; ?></div>
                </div>
                <div class="col-sm-6">
                    <div><label>Place of Birth:</label></div>
                    <div><?php echo $memberinfo['personal']['place_of_birth']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-4">
                    <div><label>Home Number:</label></div>
                    <div><?php echo $memberinfo['personal']['home_number']; ?></div>
                </div>
                <div class="col-sm-4">
                    <div><label>Cellphone:</label></div>
                    <div><?php echo $memberinfo['personal']['cellphone']; ?></div>
                </div>
                <div class="col-sm-4">
                    <div><label>Personal E-Mail Address:</label></div>
                    <div><?php echo $memberinfo['personal']['email_address']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-6">
                    <div><label>Company/Office:</label></div>
                    <div><?php echo $memberinfo['personal']['company_office']; ?></div>
                </div>
                <div class="col-sm-6">
                    <div><label>Occupation:</label></div>
                    <div><?php echo $memberinfo['personal']['occupation']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-3">
                    <div><label>Office Number:</label></div>
                    <div><?php echo $memberinfo['personal']['office_number']; ?></div>
                </div>
                <div class="col-sm-3">
                    <div><label>Fax:</label></div>
                    <div><?php echo $memberinfo['personal']['fax']; ?></div>
                </div>
                <div class="col-sm-6">
                    <div><label>Office E-Mail Address:</label></div>
                    <div><?php echo $memberinfo['personal']['office_email']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-4">
                    <div><label>Civil Status:</label></div>
                    <div><?php echo $memberinfo['personal']['civil_status']; ?></div>
                </div>
                <div class="col-sm-4">
                    <div><label>Date First Visited GCF:</label></div>
                    <div><?php echo $memberinfo['personal']['date_first_visit']; ?></div>
                </div>
                <div class="col-sm-4">
                    <div><label>Invited By:</label></div>
                    <div><?php echo $memberinfo['personal']['invited_by']; ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h4>B. FAMILY BACKGROUND</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <h5>Name of Spouse</h5>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-3">
                    <div><label>Last Name:</label></div>
                    <div><?php echo $memberinfo['personal']['s_last_name']; ?></div>
                </div>
                <div class="col-sm-3">
                    <div><label>First Name:</label></div>
                    <div><?php echo $memberinfo['personal']['s_first_name']; ?></div>
                </div>
                <div class="col-sm-3">
                    <div><label>Middle Name:</label></div>
                    <div><?php echo $memberinfo['personal']['s_middle_name']; ?></div>
                </div>
                <div class="col-sm-3">
                    <div><label>Nick Name:</label></div>
                    <div><?php echo $memberinfo['personal']['s_nick_name']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-6">
                    <div><label>Date Married:</label></div>
                    <div><?php echo $memberinfo['personal']['date_married']; ?></div>
                </div>
                <div class="col-sm-6">
                    <div><label>Birthday of Spouse:</label></div>
                    <div><?php echo $memberinfo['personal']['s_birthdate']; ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label>Name of Child/Children</label>
                </div>
                <div class="col-sm-6">
                    <label>Birthdate</label>
                </div>
            </div>
<?php foreach ($memberinfo['children'] as $member_child): ?>
            <div class="row">
                <div class="col-sm-6">
                    <div><?php echo $member_child['name']; ?></div>
                </div>
                <div class="col-sm-6">
                    <div><?php echo $member_child['birthdate']; ?></div>
                </div>
            </div>
<?php endforeach; ?>
            <br />
            <div class="row info-rows">
                <div class="col-sm-6">
                    <div><label>Father's Name:</label></div>
                    <div><?php echo $memberinfo['personal']['father_name']; ?></div>
                </div>
                <div class="col-sm-6">
                    <div><label>Age:</label></div>
                    <div><?php echo $memberinfo['personal']['father_age']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-6">
                    <div><label>Mother's Name:</label></div>
                    <div><?php echo $memberinfo['personal']['mother_name']; ?></div>
                </div>
                <div class="col-sm-6">
                    <div><label>Age:</label></div>
                    <div><?php echo $memberinfo['personal']['mother_age']; ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h4>C. EDUCATIONAL BACKGROUND</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <label>Name of School</label>
                </div>
                <div class="col-sm-4">
                    <label>Course</label>
                </div>
                <div class="col-sm-4">
                    <label>Inclusive Years</label>
                </div>
            </div>
<?php foreach ($memberinfo['education'] as $education_level => $member_education_level): ?>
            <div class="row">
                <div class="col-xs-12">
                    <h5><?php echo $education_level; ?></h5>
                </div>
            </div>
<?php foreach ($member_education_level as $member_education): ?>
            <div class="row">
                <div class="col-sm-4">
                    <div><?php echo $member_education['school_name']; ?></div>
                </div>
                <div class="col-sm-4">
                    <div><?php echo $member_education['course']; ?></div>
                </div>
                <div class="col-sm-4">
                    <div><?php echo $member_education['inclusive_years']; ?></div>
                </div>
            </div>
<?php endforeach; endforeach; ?>
            <br />
            <div class="row">
                <div class="col-sm-12">
                    <h4>D. RELIGIOUS BACKGROUND</h4>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-6">
                    <div><label>1. When did you receive Christ as your savior?</label></div>
                    <div><?php echo $memberinfo['religious']['bg1_when']; ?></div>
                </div>
                <div class="col-sm-3">
                    <div><label>Where?</label></div>
                    <div><?php echo $memberinfo['religious']['bg1_where']; ?></div>
                </div>
                <div class="col-sm-3">
                    <div><label>Through whom?</label></div>
                    <div><?php echo $memberinfo['religious']['bg1_whom']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-4">
                    <div><label>2. Have you been baptized by immersion?</label></div>
                    <div><?php echo ($memberinfo['religious']['bg2_yesno'] == 'Y') ? 'Yes' : 'No'; ?></div>
                </div>
                <div class="col-sm-2">
                    <div><label>When?</label></div>
                    <div><?php echo $memberinfo['religious']['bg2_when']; ?></div>
                </div>
                <div class="col-sm-3">
                    <div><label>Where?</label></div>
                    <div><?php echo $memberinfo['religious']['bg2_where']; ?></div>
                </div>
                <div class="col-sm-3">
                    <div><label>Officiating Minister</label></div>
                    <div><?php echo $memberinfo['religious']['bg2_minister']; ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div><label>3. Previous Church Membership (If Applicable)</label></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-4">
                    <div><label>Church's Name:</label></div>
                    <div><?php echo $memberinfo['religious']['bg3_church']; ?></div>
                </div>
                <div class="col-sm-4">
                    <div><label>Inclusive Years:</label></div>
                    <div><?php echo $memberinfo['religious']['bg3_years']; ?></div>
                </div>
                <div class="col-sm-4">
                    <div><label>Pastor:</label></div>
                    <div><?php echo $memberinfo['religious']['bg3_pastor']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-8">
                    <div><label>Address:</label></div>
                    <div><?php echo $memberinfo['religious']['bg3_address']; ?></div>
                </div>
                <div class="col-sm-4">
                    <div><label>Tel. No.:</label></div>
                    <div><?php echo $memberinfo['religious']['bg3_telno']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <div><label>Positions Held (If any):</label></div>
                    <div><?php echo $memberinfo['religious']['bg3_positions']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <div><label>4. Reason(s) for leaving your previous church and joining GCF?</label></div>
                    <div><?php echo $memberinfo['religious']['bg4_reasons']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <div><label>5. Have you come to a point in your spiritual life that you know for sure that if you were to die today, you would get to heaven?</label></div>
                    <div><?php echo ($memberinfo['religious']['bg5_yesno'] == 'Y') ? 'Yes' : 'No'; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <div><label>If you were to die today and stand before God, what would you tell Him if He asks you, why should I let you in to My heaven?</label></div>
                    <div><?php echo $memberinfo['religious']['bg5_question']; ?></div>
                </div>
            </div>
        </div>
    </div>
