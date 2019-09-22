<header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="header-content h-100 d-flex align-items-center justify-content-between">
                            <div class="academy-logo">
                                <a href="index.html"><img src="{{asset('asset/web/img/core-img/logo.png')}}" alt="" height="27px" width="250px"></a>
                            </div>
                            <div class="login-content">

                                <?php if(isset($_SESSION['login'])): ?>

                                <a href="login.php">(<?php echo $_SESSION['name']; ?>) Logout</a>
                                <?php else: ?>
                                <a href="login.php">Register / Login</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="academy-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="academyNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="#">Deparmental Projects</a>
                                        <ul class="dropdown">
                                            <li><a href="table.php">CSE</a></li>
                                            <li><a href="#">SWE</a></li>
                                            <li><a href="#">EEE</a></li>
                                            <li><a href="#">ETE</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Upload</a>
                                    </li>
                                    <li><a href="#">Thesis Ideas</a></li>
                                    <li><a href="about-us.php">About Us</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Calling Info -->
                        <div class="view-ideas">
                            <div class="call-center">
                                <a href=""><span>Blog</span></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>