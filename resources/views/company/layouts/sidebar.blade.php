<div class="nav"><a class="btn btn-expanded"></a>
  <nav class="nav-main-menu">
    <ul class="main-menu">
      <li> <a class="dashboard2 active" href="/admin"><img src="{{asset('backend/assets/imgs/page/dashboard/dashboard.svg')}}" alt="jobBox"><span class="name">Dashboard</span></a>
      </li>
      
      <li> <a class="dashboard2" href="{{URL('all-job')}}"><img src="{{asset('backend/assets/imgs/page/dashboard/jobs.svg')}}" alt="jobBox"><span class="name">All Jobs</span></a>
      </li>
      <li> <a class="dashboard2" href="/all-candidates"><img src="{{asset('backend/assets/imgs/page/dashboard/candidates.svg')}}" alt="jobBox"><span class="name">Candidates</span></a>
      </li>
      <li> <a class="dashboard2" href="/payments"><img src="{{asset('backend/assets/imgs/page/dashboard/credit-card.svg')}}" alt="jobBox"><span class="name">Payments</span></a>
      </li>
      <li> <a class="dashboard2" href="/profile"><img src="{{asset('backend/assets/imgs/page/dashboard/profiles.svg')}}" alt="jobBox"><span class="name">My Profiles</span></a>
      </li>
      <!-- <li> <a class="dashboard2" href="resume"><img src="backend/assets/imgs/page/dashboard/cv-manage.svg" alt="jobBox"><span class="name">CV Manage</span></a>
      </li>
      <li> <a class="dashboard2" href="settings"><img src="backend/assets/imgs/page/dashboard/settings.svg" alt="jobBox"><span class="name">Setting</span></a>
      </li>
      <li> <a class="dashboard2" href="authentication"><img src="backend/assets/imgs/page/dashboard/authentication.svg" alt="jobBox"><span class="name">Authentication</span></a>
      </li> -->
      <li> <a class="dashboard2" href="{{ route('logout') }}"><img src="{{asset('backend/assets/imgs/page/dashboard/logout.svg')}}" alt="jobBox"><span class="name">Logout</span></a>
      </li>
    </ul>
  </nav>
</div>