
<!--category-->
<div class="container category_section" style="padding:20px 15px">
    <div class="row">
        <div class="col-md-12">
            <br>
            <h3>Project</h3>
            <hr>
            <!-- home page thum -->
            <style>
                tr,th,td{
                    padding: 15px !important;
                }
            </style>
            
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>SL</th>
                            <th>Project Name</th>
                            <th>Project ID</th>
                            <th>Author</th>
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
                                    <td><a href="<?php echo base_url().'student/profile/'.$project->username; ?>" class=""><?php echo $project->name; ?></a></td>
                                    <td><?php echo $project->category_name; ?></td>
                                    <td><?php echo date('d-m-Y',strtotime( $project->created_at)); ?></td>

                                    <td><?php echo $project->page_count; ?></td>
                                    <td><a href="#" class="btn btn-sm btn-success text-center"><i class="fa fa-download "></i></a>&nbsp;&nbsp; <a href="<?php echo base_url().'project/view/'.$project->project_id; ?>" class="btn btn-sm btn-primary text-center"><i class="fa fa-eye "></i></a></td>
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
                <br> </div>
                <!--#category-->
                <!--ad-->

                <!--#ad-->
