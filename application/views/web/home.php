
<!--category-->
<div class="container category_section" style="padding:40px 15px">
    <div class="row">
        <div class="col-md-12">
            <br>
            <h3>Different Sections</h3>
            <hr>
            <!-- home page thum -->
            <style>
                .thum-post-list {
                    clear: both;
                    padding-left: 10px;
                    padding-top: 10px;
                }

                .thum-post-list li {
                    margin-left: 10px;
                    padding-top: 10px;
                    white-space: nowrap;
                    list-style: none;
                }

                .thum-post-list li a {
                    color: #333;
                    text-decoration: none;
                }

                .thum-post-list li:before {
                    content: "\f0c1";
                    /* FontAwesome Unicode */
                    font-family: FontAwesome;
                    display: inline-block;
                    margin-left: -1.3em;
                    /* same as padding-left set on li */
                    width: 1.3em;
                    /* same as padding-left set on li */
                }

                .thum-post-list li a:hover {
                    color: #3498DB;
                }

                .homepage-box {
                    width: 100%
                }
            </style>
            <div class="row">
                <div class="col-md-3">
                    <!--widget-->
                    <div class="dash_widget_1 dwc3">
                        <div class="icon"> <i class="fa fa-list fa-4x"></i> </div>
                        <div class="divider"></div>
                        <div class="content"> <a href="<?php echo base_url(); ?>project"><h2>Total Projects</h2></a>
                            <p>2</p> <a href="#"><i class="fa fa-globe"></i> See all...</a> </div>
                        </div>
                        <!--#widget-->
                    </div>
                    <div class="col-md-3">
                        <!--widget-->
                        <div class="dash_widget_1 dwc1">
                            <div class="icon"> <i class="fa fa-users fa-4x"></i> </div>
                            <div class="divider"></div>
                            <div class="content"> <a href="<?php echo base_url(); ?>author"><h2>Total Authors</h2></a>
                                <p>32</p> <a href="#"><i class="fa fa-globe"></i> See all</a> </div>
                            </div>
                            <!--#widget-->
                        </div>
                        <div class="col-md-3">
                            <!--widget-->
                            <div class="dash_widget_1 dwc3">
                                <div class="icon"> <i class="fa fa-download fa-4x"></i> </div>
                                <div class="divider"></div>
                                <div class="content"> <a href="#"><h2>Total Download</h2></a>
                                    <p>4</p> <a href="#"><i class="fa fa-globe"></i> see all</a> </div>
                                </div>
                                <!--#widget-->
                            </div>
                            <div class="col-md-3">
                                <!--widget-->
                                <div class="dash_widget_1 dwc4">
                                    <div class="icon"> <i class="fa fa-eye fa-4x"></i> </div>
                                    <div class="divider"></div>
                                    <div class="content"> <a href="#"><h2>Page views</h2> </a>
                                        <p>6 পোস্ট</p> <a href="#"><i class="fa fa-globe"></i> আরো
                                        দেখুন</a> </div>
                                    </div>
                                    <!--#widget-->
                                </div>
                            </div>
                            <!-- end homepage thum -->
                        </div>
                    </div>
                    <br> </div>
                    <!--#category-->
                    <!--ad-->
                    
                    <!--#ad-->
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Recent Uploaded Projects</h3>
                                <hr>
                                <!-- home page thum -->
                                <div class="row">
                                    <?php foreach($projects as $project){ ?>
                                        <div class="col-md-3">
                                            <!-- single-->
                                            <div class="post_item">
                                                <a href="<?php echo base_url(); ?>project/view/<?php echo $project->project_id; ?>">

                                                    <?php if(!empty($project->thumbnail)): ?>
                                                        <div class="features_image" style="background-image:url(<?php echo base_url(); ?>uploads/project/<?php echo $project->project_id; ?>/<?php echo $project->thumbnail; ?>)"></div>

                                                        <?php else: ?>


                                                            <div class="features_image" style="background-image:url(<?php echo base_url(); ?>uploads/project/default.png)"></div>
                                                        <?php endif; ?>

                                                        <h3 style="max-height: 36px;overflow: hidden;text-overflow: ellipsis;"><?php echo $project->project_title; ?></h3>
                                                        <p class="post_info"><i class="fa fa-newspaper-o"></i> <?php echo $project->category_name; ?> &nbsp;&nbsp;&nbsp;  <i class="fa fa-clock-o"></i> <?php echo date('m d, Y',strtotime($project->created_at)); ?> </p>
                                                    </a>
                                                </div>
                                                <!-- single-->
                                            </div>
                                        <?php } ?>



                                    </div>
                                    <!-- end homepage thum -->
                                </div>
                            </div>
                            <br> </div>
                            <hr>
