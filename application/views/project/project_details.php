
<!--category-->
<div class="container category_section" style="padding:20px 15px">

  <style>
        /***
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
***/

body {
  background: #F1F3FA;
}

/* Profile container */
.profile {
  margin: 20px 0;
}

/* Profile sidebar */
.profile-sidebar {
  padding: 20px 0 10px 0;
  background: #fff;
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 50%;
  height: 50%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}

.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* Profile Content */
.profile-content {
  padding: 20px;
  background: #fff;
  min-height: 2000px;
}
</style>
<div class="row">

 <div class="row profile">

  <div class="col-md-12">
    <?php if($this->session->success): ?>

      <p class="alert alert-success"><?php echo $this->session->success;  ?></p>
    <?php  endif; ?>
    <div class="profile-content">

      <h1 class="text-center"><?php echo $project->project_title; ?>
      <hr>
      <span style="font-size: 18px; ">Author: <a href="<?php echo base_url(); ?>student/profile/<?php echo $project->username; ?>"> <?php echo $project->name; ?></a></span>
      <hr>

      <span style="font-size: 16px;">Views: <?php echo $project->page_count; ?></span>
      
      l <span style="font-size: 16px;">Donwload: <?php echo $project->download_count; ?></span>
      l <span style="font-size: 16px;">Uploaded on: <?php echo date('d-m-Y',strtotime( $project->created_at)); ?></span>


    </h1>

    <div class="col-md-12">

      <h2>Documentation</h2>
      <hr>
      <?php echo $project->documentation; ?>


      <br><br><br>

      <h2>Requirement Analysis</h2><hr>
      <?php echo $project->requirement_analysis; ?>

      <br><br><br>

      <h2>Summary</h2><hr>
      <?php echo $project->summary; ?>

      <br><br><br>


    </div>
    <div class="col-md-6">

      <h2 class="text-left">Thumbnail</h2>
      <img src="<?php echo base_url();?>uploads/project/<?php echo $project->project_id; ?>/<?php echo $project->thumbnail; ?>" class="img img-thumbnail" alt="">

    </div>

    <div class="col-md-6">

      <h2 class="text-left">Flowchart</h2>
      <img src="<?php echo base_url();?>uploads/project/<?php echo $project->project_id; ?>/<?php echo $project->flowchart; ?>" class="img img-thumbnail" alt="">

    </div>

    <?php if($this->session->student): ?>
      <div class="col-md-6">
        <h2 class="text-left">Donwload</h2>

        <a href="<?php echo base_url();?>uploads/project/<?php echo $project->project_id; ?>/<?php echo $project->report; ?>" class="btn btn-primary">Download Report</a>
        <br>
        <br>
        <a href="<?php echo base_url();?>uploads/project/<?php echo $project->project_id; ?>/<?php echo $project->zip_file; ?>" class="btn btn-success">Download Project File</a>
      </div>

      <?php else: ?>

        <div class="col-md-6" id="download-file">
          <h2 class="text-left">Donwload</h2>

          <a href="#" class="btn btn-primary" onclick="alert('You must have to login for downloading file.')">Download Report</a>
          <br>
          <br>
          <a href="#download-file"  onclick="alert('You must have to login for downloading file.')" class="btn btn-success">Download Project File</a>
        </div>

      <?php endif; ?>
    </div>
  </div>
</div>

<!--#category-->
<!--ad-->

<!--#ad-->
