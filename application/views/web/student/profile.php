
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
  min-height: 460px;
}
</style>
<div class="row">

 <div class="row profile">
  <div class="col-md-3">
    <div class="profile-sidebar">
      <!-- SIDEBAR USERPIC -->
      <div class="profile-userpic">
        <img src="https://icon-library.net/images/profile-png-icon/profile-png-icon-15.jpg" class="img-responsive" alt="">
      </div>
      <!-- END SIDEBAR USERPIC -->
      <!-- SIDEBAR USER TITLE -->
      <div class="profile-usertitle">
        <div class="profile-usertitle-name">
         <?php echo $profile->name; ?>
       </div>
       <div class="profile-usertitle-job">
        <?php echo $profile->designation; ?>
      </div>
    </div>
    <!-- END SIDEBAR USER TITLE -->
    <!-- SIDEBAR BUTTONS -->
    <div class="profile-userbuttons">
      <button type="button" class="btn btn-success btn-sm">Follow</button>
      <button type="button" class="btn btn-danger btn-sm">Message</button>
    </div>
    <!-- END SIDEBAR BUTTONS -->
    <!-- SIDEBAR MENU -->
    <div class="profile-usermenu">
      <ul class="nav">
        <li class="active">
          <a href="#">
            <i class="fa fa-home"></i>
          Overview </a>
        </li>
        <?php if($this->session->student) : ?>
          <li>
            <a href="#">
              <i class="fa fa-cog"></i>
            Account Settings </a>
          </li>

          <li>
            <a href="<?php echo base_url();?>upload">
              <i class="fa fa-upload"></i>
            Upload Project </a>
          </li>

          
          <li>
            <a href="#" target="_blank">
              <i class="fa fa-list"></i>
            Tasks </a>
          </li>
        <?php endif; ?>
        <li>
          <a href="#">
            <i class="fa fa-phone"></i>
          Help </a>
        </li>
      </ul>
    </div>
    <!-- END MENU -->
  </div>
</div>
<div class="col-md-9">
  <?php if($this->session->success): ?>

    <p class="alert alert-success"><?php echo $this->session->success;  ?></p>
  <?php  endif; ?>
  <div class="profile-content">
    <div class="col-md-12">
      <table class="table table-bordered table-striped">
        <thead>
          <th>SL</th>
          <th>Project Name</th>
          <th>Project ID</th>
          <th>Category</th>
          <th>Uploaded On</th>
          <th>Views</th>
          <th>-</th>
        </thead>

        <tbody>


          <?php $i=1; foreach ($projects as $project) { ?>

            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $project->project_title; ?></td>
              <td><?php echo $project->project_id; ?></td>
              <td><?php echo $project->category_name; ?></td>
              <td><?php echo date('d-m-Y',strtotime( $project->created_at)); ?></td>

              <td><?php echo $project->page_count; ?></td>
              <td><a href="#" class="btn btn-sm btn-success text-center"><i class="fa fa-download "></i></a> &nbsp;&nbsp; <a href="<?php echo base_url().'project/view/'.$project->project_id; ?>" class="btn btn-sm btn-primary text-center"><i class="fa fa-eye "></i></a></td>
            </tr>
            <?php  $i++; } ?>

          </tbody>


        </table>


        <nav aria-label="Page navigation example">
          <span>You are viewing page <strong><?php echo $page; ?></strong> of total <?php echo $pages; ?> pages;</span>
          <ul class="pagination">
            <?php
            if($page !=1 ): ?>
              <li class="page-item"><a class="page-link" href="<?php echo base_url(); ?>project/<?php echo $previous_page; ?>">Previous</a></li>
            <?php endif; ?>

            <?php for($j = 1; $j<=$pages; $j++){ ?>

              <li class="page-item <?php if($j  == $page): ?> active <?php endif; ?>"><a class="page-link" href="<?php echo base_url(); ?>project/<?php echo $j; ?>"><?php echo $j; ?></a></li>
            <?php } ?>
            <?php
            if($page !=$pages ): ?>
              <li class="page-item"><a class="page-link" href="<?php echo base_url(); ?>project/<?php echo $next_page; ?>">Next</a></li>
            <?php endif; ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>

<!--#category-->
<!--ad-->

<!--#ad-->
