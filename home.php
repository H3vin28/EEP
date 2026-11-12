<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE 4 | Top Nav Layout</title>

    <script>
      (() => {
        'use strict';
        const root = document.documentElement;

        // Applications with their own theming opt out of AdminLTE's color mode
        // entirely, here as well as in the bundle.
        if (root.getAttribute('data-lte-color-mode') === 'off') {
          return;
        }

        const STORAGE_KEY = 'lte-theme';
        let stored = null;
        try {
          stored = localStorage.getItem(STORAGE_KEY);
        } catch {
          // localStorage may be unavailable (private mode, sandboxed iframe).
        }
        // Mirror the precedence in color-mode.ts: the visitor's stored choice
        // wins, then a theme this page declared itself, then the OS preference.
        const authored = root.getAttribute('data-bs-theme');
        let resolved = 'light';
        if (stored === 'dark' || stored === 'light') {
          resolved = stored;
        } else if (authored === 'dark' || authored === 'light') {
          resolved = authored;
        } else if (globalThis.matchMedia('(prefers-color-scheme: dark)').matches) {
          resolved = 'dark';
        }
        root.setAttribute('data-bs-theme', resolved);
        root.style.colorScheme = resolved;
        // Flag values computed here, so the bundle does not mistake them for a
        // theme the page declared and stop following the OS preference.
        if (resolved !== authored) {
          root.setAttribute('data-lte-theme-resolved', '');
        }
      })();
    </script>
    <!--end::Theme Init-->

    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="css/adminlte.css" as="style" />
    <!--end::Accessibility Features-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="overlayscrollbars.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="font/bootstrap-icons.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand-lg bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Brand-->
          <a href="../index.html" class="navbar-brand d-flex align-items-center">
            <img
              src=""
              alt="AdminLTE Logo"
              width="30"
              height="30"
              class="opacity-75 shadow me-2"
            />
            <span class="fw-light">AdminLTE 4</span>
          </a>
          <!--end::Brand-->
          <!--begin::Toggler (plain Bootstrap collapse, not PushMenu)-->
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#topNavMenu"
            aria-controls="topNavMenu"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <!--end::Toggler-->
          <!--begin::Collapsible Menu-->
          <div class="collapse navbar-collapse" id="topNavMenu">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../starter.html">Starter</a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                  >Pages</a
                >
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="../pages/profile.html">Profile</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="../pages/invoice.html">Invoice</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="../pages/calendar.html">Calendar</a>
                  </li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="../pages/faq.html">FAQ</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                  >Forms</a
                >
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="../forms/elements.html">Elements</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="../forms/advanced.html">Advanced Elements</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="../forms/editors.html">Editors</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="../forms/validation.html">Validation</a>
                  </li>
                </ul>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link btn btn-primary mb-2" href="#" data-bs-toggle="modal" data-bs-target="#registration_modal">
                  <i class="bi bi-box-arrow-in-right me-1" aria-hidden="true"></i>
                  Login
                </a>
              </li>
            </ul>
          </div>
          <!--end::Collapsible Menu-->
        </div>
        <!--end::Container-->
      </nav>
      <div class="modal fade" id="registration_modal" tabindex="-1" aria-labelledby="registration_modalLabel" aria-hidden="true">
          <div class="modal-dialog .modal-fullscreen-lg-down">
              <div class="modal-content">

                  <div class="modal-header">
                      <h5 class="modal-title" id="registration_modalLabel">
                          Registration Form
                      </h5>
                      <button type="button"
                              class="btn-close"
                              data-bs-dismiss="modal"
                              aria-label="Close">
                      </button>
                  </div>
                  <form id="regForm">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Firstname" name="fname" required>
                          <div class="input-group-text">
                            <span class="bi bi-person"></span>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Lastname" name="lname" required>
                          <div class="input-group-text">
                            <span class="bi bi-person"></span>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Middle Name" name="mname" required>
                          <div class="input-group-text">
                            <span class="bi bi-person"></span>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <input type="email" class="form-control" placeholder="Email" name="email" required>
                          <div class="input-group-text">
                            <span class="bi bi-envelope"></span>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <input type="password" class="form-control" placeholder="Password" name="password" required>
                          <div class="input-group-text">
                            <span class="bi bi-eye-fill"></span>
                          </div>
                        </div>
                    </div>
                  <div class="modal-footer">
                      <button type="button"
                              class="btn btn-danger"
                              data-bs-dismiss="modal">
                          Close
                      </button>

                      <button type="button"
                              class="btn btn-secondary"
                              id="clearBTN" 
                              >
                          Clear
                      </button>

                      <button type="submit" class="btn btn-primary" id="saveBtn" data-id="save">
                          Save
                      </button>
                  </div>
                  </form>

              </div>
          </div>
      </div>
      <!--end::Header-->
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Top Nav Layout</h1>
              </div>
              <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Layout</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Top Nav</li>
                  </ol>
                </nav>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <div class="row g-4">
              <div class="col-12">
                <div class="callout callout-info">
                  A horizontal layout for apps with a handful of top-level sections: the sidebar is
                  gone and the main navigation moves into the header. Resize the window below the
                  <code>lg</code> breakpoint to see the menu collapse behind the toggler.
                </div>
              </div>

              <div class="col-md-6">
                <div class="card card-primary card-outline mb-4">
                  <div class="card-header">
                    <div class="card-title">How this layout works</div>
                  </div>
                  <div class="card-body">
                    <p>
                      Three small differences from the default demo pages &mdash; no extra CSS or
                      layout class required:
                    </p>
                    <ul class="mb-0">
                      <li class="mb-2">
                        The <code>&lt;aside class="app-sidebar"&gt;</code> element is omitted. The
                        <code>app-wrapper</code> grid sizes its sidebar column with
                        <code>auto</code>, so an empty column collapses to zero width and the
                        content spans the full viewport.
                      </li>
                      <li class="mb-2">
                        The header keeps the <code>app-header</code> class but becomes a regular
                        Bootstrap <code>navbar-expand-lg</code> with a toggler and a
                        <code>.navbar-collapse</code> menu &mdash; AdminLTE's PushMenu isn't used at
                        all.
                      </li>
                      <li>
                        The <code>sidebar-expand-*</code> class is dropped from
                        <code>&lt;body&gt;</code>, since there is no sidebar to expand.
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="card card-success card-outline mb-4">
                  <div class="card-header">
                    <div class="card-title">Everything else stays the same</div>
                  </div>
                  <div class="card-body">
                    <p>
                      Cards, the content header, breadcrumbs, the footer, and the light/dark color
                      modes all behave exactly as they do on the sidebar pages &mdash; this card is
                      unmodified AdminLTE markup.
                    </p>
                    <p class="mb-2">Monthly report generation</p>
                    <div
                      class="progress mb-3"
                      role="progressbar"
                      aria-label="Monthly report generation"
                      aria-valuenow="72"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      <div class="progress-bar" style="width: 72%">72%</div>
                    </div>
                    <p class="mb-2">Storage used</p>
                    <div
                      class="progress mb-3"
                      role="progressbar"
                      aria-label="Storage used"
                      aria-valuenow="45"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      <div class="progress-bar text-bg-success" style="width: 45%">45%</div>
                    </div>
                    <a href="../index.html" class="btn btn-primary"> Back to the sidebar layout </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
      <!--begin::Footer-->
      <footer class="app-footer">
        <!--begin::To the end-->
        <div class="float-end d-none d-sm-inline">Anything you want</div>
        <!--end::To the end-->
        <!--begin::Copyright-->
        <strong>
          Copyright &copy; 2014-2026&nbsp;
          <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
        </strong>
        All rights reserved.
        <!--end::Copyright-->
      </footer>
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.16.0/browser/overlayscrollbars.browser.es6.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="js/adminlte.js"></script>
    <script src="js/jquery.min.js"></script>
    <!--end::Required Plugin(AdminLTE)-->
    <!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);

        // Disable OverlayScrollbars on mobile devices to prevent touch interference
        const isMobile = window.innerWidth <= 992;

        if (
          sidebarWrapper &&
          globalThis.OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
          !isMobile
        ) {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->

    <script>
      $(function() {
        $('#clearBTN').on("click", function(){
          $("#regForm")[0].reset();
        })

        $('#regForm').submit( function(e){
          e.preventDefault();
          let action = $('#saveBtn').data('id');
          // console.log(action);
          let formData = $(this).serialize() + "&action=" + action;
          $.ajax({
            url: "CRUD_Code.php",
            type: "POST",
            data: formData,
            success: function(response) {
              console.log(response)
              if(response.trim() == "success") {
                  $("#registration_modal").modal("hide");
                  $("#regForm")[0].reset();
                  // loadStudents();
                  alert("Data successfully saved!");
              } else {
                  alert("Unable to save student.");
              }
            }
          });
        })
      });
    </script>
  </body>
  <!--end::Body-->
</html>
