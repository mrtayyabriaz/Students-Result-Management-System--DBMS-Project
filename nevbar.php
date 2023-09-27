<nav class="navbar navbar-light navbar-expand-lg" id="nev-dark-mood">
  <div class="container-fluid">
    <div>
      <a class="navbar-brand" href="index.php">
        <img src="images/UNIVERSITY_OF_OKARA.JPG" alt="Bootstrap" width="30" height="24">
      </a>
      <a class="navbar-brand" href="index.php">Result MS</a>
    </div>
    <div class="dflex">
      <div type="button" class="px-3" onclick="ChangeTheme('toogle')">
        <!-- light icon  -->
      <svg xmlns="http://www.w3.org/2000/svg" id="sun" width="16" height="16" fill="currentColor"
        class=" d-none bi bi-brightness-high-fill" viewBox="0 0 16 16">
        <path
          d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
      </svg>
      <!-- light icon  -->
      <!-- dark icon  -->
      <svg xmlns="http://www.w3.org/2000/svg" id="moon" width="16" height="16" fill="currentColor"
        class="bi bi-moon-stars-fill" viewBox="0 0 16 16">
        <path
          d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
        <path
          d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
      </svg>
      <!-- dark icon  -->
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
    <div class="collapse navbar-collapse ms-2" id="navbarSupportedContent">
      <ul
        class="dark-theme-light navbar-nav d-flex align-items-center me-auto w-100 mt-2 mt-lg-0 mb-lg-0 nav-pills nav-fill gap-2 p-1 small rounded-5 shadow-sm"
        id="pillNav2" role="tablist"
        style="background:#7d11f3!important;--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white);">
        <li class="nav-item w-75" role="presentation">
          <a class="nav-link rounded-5" href="index.php" id="HomeTab" type="button" role="tab"
            aria-selected="true">Home</a>
        </li>
        <li class="nav-item  w-75" role="presentation">
          <a class="nav-link rounded-5" href="login.php?status=student" id="StudentTab" type="button" role="tab"
            aria-selected="false">Student</a>
        </li>
        <li class="nav-item  w-75" role="presentation">
          <a class="nav-link rounded-5" href="login.php?status=teacher" id="TeacherTab" type="button" role="tab"
            aria-selected="false">Teacher</a>
        </li>
        <li class="nav-item  w-75" role="presentation">
          <a class="nav-link rounded-5" href="logout.php" id="LogoutTab" type="button" role="tab"
            aria-selected="false">Logout</a>
        </li>
        <!-- <li class="nav-item  w-75 dropdown" role="presentation">
            <a class="nav-link dropdown-toggle rounded-5" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li> -->
      </ul>
    </div>
  </div>
</nav>

