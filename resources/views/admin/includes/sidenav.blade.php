  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{ URL::asset('assets/images/ui/logo.png') }}" class="navbar-brand-img" alt="...">
          &nbsp;Admin

        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link {{ ($page == 'dashboard') ? "active" : "" }}" href="{{ route('site-owner/dashboard') }}">
                <i class="ni ni-tv-2 text-primary"></i>
              <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($page == 'cmspages') ? "active" : "" }}" href="{{ route('site-owner/cmspages') }}">
                  <i class="ni ni-single-copy-04 text-primary"></i>
                  <span class="nav-link-text">CMS Pages</span>
                </a>
            </li>
  
          </ul>
        </div>
      </div>
    </div>
  </nav>
