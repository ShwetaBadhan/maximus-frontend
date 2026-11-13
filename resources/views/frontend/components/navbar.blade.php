<header class="header sticky-bar">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo">
                    <a class="d-flex" href="{{ route('home') }}"><img alt="jobBox"
                            src="assets/imgs/template/jobhub-logo.svg" /></a>
                </div>
            </div>
            <div class="header-nav">
                <nav class="nav-main-menu">
                    <ul class="main-menu">
                        <li>
                            <a class="active" href="{{ route('home') }}">Home</a>

                        </li>
                        <li>
                            <a href="{{ route('jobs-list') }}">Jobs</a>
                            {{-- <ul class="sub-menu">
                                <li><a href="{{ route('jobs-list') }}.html">Jobs Grid</a></li>
                                <li><a href="{{ route('jobs-list') }}.html">Jobs List</a></li>
                                <li><a href="job-details.html">Jobs Details</a></li>
                                <li><a href="job-details-2.html">Jobs Details 2</a></li>
                            </ul> --}}
                        </li>
                        <li>
                            <a href="{{ route('companies-list') }}">Companies</a>
                            {{-- <ul class="sub-menu">
                                <li><a href="companies-grid.html">Recruiters</a></li>
                                <li><a href="javascript:void(0).html">Company Details</a></li>
                            </ul> --}}
                        </li>



                    </ul>
                </nav>
                <div class="burger-icon burger-icon-white">
                    <span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span
                        class="burger-icon-bottom"></span>
                </div>
            </div>
            <div class="header-right">
                <div class="block-signin">
                    <a class="text-link-bd-btom hover-up" href="{{ route('register') }}">Register</a><a
                        class="btn btn-default btn-shadow ml-40 hover-up" href="{{ route('login') }}">Sign in</a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
            <div class="perfect-scroll">
                <div class="mobile-search mobile-header-border mb-30">
                    <form action="#">
                        <input type="text" placeholder="Search…" /><i class="fi-rr-search"></i>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start-->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li>
                                <a class="active" href="{{ route('home') }}">Home</a>
                                
                            </li>
                            <li>
                                <a href="{{ route('jobs-list') }}">Jobs</a>
                                {{-- <ul class="sub-menu">
                                    <li><a href="{{ route('jobs-list') }}.html">Jobs Grid</a></li>
                                    <li><a href="{{ route('jobs-list') }}.html">Jobs List</a></li>
                                    <li><a href="job-details.html">Jobs Details</a></li>
                                    <li><a href="job-details-2.html">Jobs Details 2</a></li>
                                </ul> --}}
                            </li>
                            <li>
                                <a href="{{ route('companies-list') }}">Companies</a>
                              
                            </li>
                            <li>
                                <a href="{{ route('register') }}">Register</a>
                              
                            </li>
                            <li>
                                <a href="{{ route('login') }}">Login</a>
                              
                            </li>
                          
                           
                        </ul>
                    </nav>
                </div>
               
            </div>
        </div>
    </div>
</div>