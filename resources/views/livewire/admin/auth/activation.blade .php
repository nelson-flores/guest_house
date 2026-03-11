<div>





  <!-- Reminder Block -->
  <div class="block block-rounded mb-0">
    <div class="block-header block-header-default">
      <h3 class="block-title">Recuperar Senha</h3>
      <div class="block-options">
        <a class="btn-block-option" href="op_auth_signin.html" data-bs-toggle="tooltip" data-bs-placement="left"
          title="Sign In">
          <i class="fa fa-sign-in-alt"></i>
        </a>
      </div>
    </div>
    <div class="block-content">
      <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
        <h1 class="h2 mb-1"><img src="{{ url('logo.png') }}" alt=""></h1>
        <p class="fw-medium text-muted">
          Please provide your account’s email or username and we will send you your password.
        </p>


        @if (session()->has('message'))
        <div class="alert alert-success">
          {{ session('message') }}
        </div>

        @else
        @if (session()->has('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
        @endif
        @endif

        <!-- Reminder Form -->
        <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/op_auth_reminder.min.js which was auto compiled from _js/pages/op_auth_reminder.js) -->
        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
        <form class="js-validation-reminder mt-4" action="be_pages_auth_all.html" method="POST">
          <div class="mb-4">
            <input type="text" class="form-control form-control-lg form-control-alt" id="reminder-credential"
              name="reminder-credential" placeholder="Username or Email">
          </div>
          <div class="row mb-4">
            <div class="col-md-6 col-xl-5">
              <button type="submit" class="btn w-100 btn-alt-primary">
                <i class="fa fa-fw fa-envelope me-1 opacity-50"></i> Send Mail
              </button>
            </div>
          </div>
        </form>
        <!-- END Reminder Form -->
      </div>
    </div>
  </div>
  <!-- END Reminder Block -->


</div>