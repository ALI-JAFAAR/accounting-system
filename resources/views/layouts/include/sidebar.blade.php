        <div class="logo"><a href="/" class="simple-text logo-normal">
          <img src="assets/img/favicon.png" width="50px" height="50px" style="background-color: #fff;border-radius: 50%;">      Accounting System
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ $index ??'' }}">
            <a class="nav-link" href="/">
              <i class="material-icons fa-spin">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{ $admin_costs ??'' }}">
            <a class="nav-link" href="/admin_cost">
              <i class="material-icons">person</i>
              <p>Admin Costs</p>
            </a>
          </li>
          <li class="nav-item {{ $department ??'' }}">
            <a class="nav-link" href="/department">
              <i class="material-icons">home</i>
              <p>Department</p>
            </a>
          </li>
          <li class="nav-item {{ $players ??'' }}">
            <a class="nav-link" href="/players">
              <i class="material-icons">people_alt</i>
              <p>Players</p>
            </a>
          </li>
          <li class="nav-item {{ $custmers ??'' }}">
            <a class="nav-link" href="/custmers">
              <i class="material-icons ">account_circle</i>
              <p>Custmers</p>
            </a>
          </li>
          <li class="nav-item {{ $costs ??'' }}">
            <a class="nav-link" href="/costs">
              <i class="material-icons ">request_page</i>
              <p>Costs</p>
            </a>
          </li>
          <li class="nav-item {{ $projects ??'' }}">
            <a class="nav-link" href="/projects">
              <i class="material-icons">folder_shared</i>
              <p>Projects</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/revenue">
              <i class="material-icons">folder_shared</i>
              <p>Report</p>
            </a>
          </li>
          <li class="nav-item {{ $settings ??'' }}">
            <a class="nav-link" href="/settings">
              <i class="material-icons fa-spin">settings</i>
              <p>Settings</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="/logout">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->