<header class="header sticky-bar">
    <div class="container">
      <div class="main-header">
        <div class="header-left">
          <div class="header-logo"><a class="d-flex" href="/"><img alt="jobBox" src="{{asset('assets/imgs/template/jobhub-logo.svg')}}"></a></div>
        </div>
        <div class="header-nav">
          <nav class="nav-main-menu">
            <ul class="main-menu">
              <li><a class="active" href="/">Home</a></li>
              <li class="has-children"><a href="jobs">Find a Job</a>
                <ul class="sub-menu">
                  <li><a href="jobs">Jobs</a></li>
                  <li><a href="job-details">Jobs Details </a></li>
                </ul>
              </li>
              <li class="has-children"><a href="companies">Recruiters</a>
                <ul class="sub-menu">
                  <li><a href="companies">Recruiters</a></li>
                  <li><a href="company-details">Company Details</a></li>
                </ul>
              </li>
              <li class="has-children"><a href="candidates">Candidates</a>
                <ul class="sub-menu">
                  <li><a href="candidates">Candidates Grid</a></li>
                  <li><a href="candidate-details">Candidate Details</a></li>
                  <li><a href="candidate-profile">Candidate Profile</a></li>
                </ul>
              </li>
              <li class="has-children"><a href="about">Pages</a>
                <ul class="sub-menu">
                  <li><a href="about">About Us</a></li>
                  <li><a href="pricing">Pricing Plan</a></li>
                  <li><a href="contact">Contact Us</a></li>
                  <li><a href="register">Register</a></li>
                  <li><a href="signin">Signin</a></li>
                  <li><a href="reset-password">Reset Password</a></li>
                  <li><a href="content-protected">Content Protected</a></li>
                </ul>
              </li>
              <li class="has-children"><a href="blog">Blog</a>
                <ul class="sub-menu">
                  <li><a href="blog">Blog Grid</a></li>
                  <li><a href="blog-details">Blog Single</a></li>
                </ul>
              </li>
              <li class="dashboard"><a href="/admin" target="_blank">Dashboard</a></li>
            </ul>
          </nav>
          <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
        </div>
        <div class="header-right">
          <div class="block-signin"><a class="text-link-bd-btom hover-up" href="register">Register</a><a class="btn btn-default btn-shadow ml-40 hover-up" href="signin">Sign in</a></div>
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
              <input type="text" placeholder="Search…"><i class="fi-rr-search"></i>
            </form>
          </div>
          <div class="mobile-menu-wrap mobile-header-border">
            <!-- mobile menu start-->
            <nav>
              <ul class="mobile-menu font-heading">
                <li><a class="active" href="/">Home</a></li>
                <li class="has-children"><a href="jobs">Find a Job</a>
                  <ul class="sub-menu">
                    <li><a href="jobs">Jobs Grid</a></li>
                    <li><a href="job-details">Jobs Details 2 </a></li>
                  </ul>
                </li>
                <li class="has-children"><a href="companies">Recruiters</a>
                  <ul class="sub-menu">
                    <li><a href="companies">Recruiters</a></li>
                    <li><a href="company-details">Company Details</a></li>
                  </ul>
                </li>
                <li class="has-children"><a href="candidates">Candidates</a>
                  <ul class="sub-menu">
                    <li><a href="candidates">Candidates Grid</a></li>
                    <li><a href="candidate-details">Candidate Details</a></li>
                  </ul>
                </li>
                <li class="has-children"><a href="about">Pages</a>
                  <ul class="sub-menu">
                    <li><a href="about">About Us</a></li>
                    <li><a href="pricing">Pricing Plan</a></li>
                    <li><a href="contact">Contact Us</a></li>
                    <li><a href="register">Register</a></li>
                    <li><a href="signin">Signin</a></li>
                    <li><a href="reset-password">Reset Password</a></li>
                    <li><a href="content-protected">Content Protected</a></li>
                  </ul>
                </li>
                <li class="has-children"><a href="blog">Blog</a>
                  <ul class="sub-menu">
                    <li><a href="blog">Blog Grid</a></li>
                    <li><a href="blog-details">Blog Single</a></li>
                  </ul>
                </li>
                <li><a href="http://wp.alithemes.com/html/jobbox/demos/dashboard" target="_blank">Dashboard</a></li>
              </ul>
            </nav>
          </div>
          <div class="mobile-account">
            <h6 class="mb-10">Your Account</h6>
            <ul class="mobile-menu font-heading">
              <li><a href="#">Profile</a></li>
              <li><a href="#">Work Preferences</a></li>
              <li><a href="#">Account Settings</a></li>
              <li><a href="#">Go Pro</a></li>
              <li><a href="signin">Sign Out</a></li>
            </ul>
          </div>
          <div class="site-copyright">Copyright 2022 &copy; JobBox. <br>Designed by AliThemes.</div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="ModalApplyJobForm" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content apply-job-form">
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="modal-body pl-30 pr-30 pt-50">
          <div class="text-center">
            <p class="font-sm text-brand-2">Job Application </p>
            <h2 class="mt-10 mb-5 text-brand-1 text-capitalize">Start your career today</h2>
            <p class="font-sm text-muted mb-30">Please fill in your information and send it to the employer. </p>
          </div>
          <form class="login-register text-start mt-20 pb-30" action="#">
            <div class="form-group">
              <label class="form-label" for="input-1">Full Name *</label>
              <input class="form-control" id="input-1" type="text" required="" name="fullname" placeholder="Steven Job">
            </div>
            <div class="form-group">
              <label class="form-label" for="input-2">Email *</label>
              <input class="form-control" id="input-2" type="email" required="" name="emailaddress" placeholder="stevenjob@gmail.com">
            </div>
            <div class="form-group">
              <label class="form-label" for="number">Contact Number *</label>
              <input class="form-control" id="number" type="text" required="" name="phone" placeholder="(+01) 234 567 89">
            </div>
            <div class="form-group">
              <label class="form-label" for="des">Description</label>
              <input class="form-control" id="des" type="text" required="" name="Description" placeholder="Your description...">
            </div>
            <div class="form-group">
              <label class="form-label" for="file">Upload Resume</label>
              <input class="form-control" id="file" name="resume" type="file">
            </div>
            <div class="login_footer form-group d-flex justify-content-between">
              <label class="cb-container">
                <input type="checkbox"><span class="text-small">Agree our terms and policy</span><span class="checkmark"></span>
              </label><a class="text-muted" href="contact">Lean more</a>
            </div>
            <div class="form-group">
              <button class="btn btn-default hover-up w-100" type="submit" name="login">Apply Job</button>
            </div>
            <div class="text-muted text-center">Do you need support? <a href="contact">Contact Us</a></div>
          </form>
        </div>
      </div>
    </div>
  </div>