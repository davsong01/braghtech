<?php 
  $setting = App\Models\GeneralSetting::first();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="{{$setting->company_meta_description ?? 'Description' }}" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ $setting->company_favicon ?? 'favicon.ico'}}">
    <title>{{ $setting->company_meta_title ?? config('app.name') }}</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{asset('dasboard/css/simplebar.css')}}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('dasboard/css/feather.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/css/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/css/app-light.css')}}" id="lightTheme" >
    <link rel="stylesheet" href="{{asset('dashboard/css/app-dark.css')}}" id="darkTheme" disabled>
  </head>
  <body class="light">
    <div class="wrapper vh-100">
      <div class="row align-items-center h-100">
        <form method="POST" action="{{ route('login') }}" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
        @csrf
          <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="/">
              @if(isset($setting->company_logo))
              <img src="{{ $setting->company_logo }}" alt="logo" style="width:65px">
              @else
              <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                <g>
                  <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                  <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                  <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                </g>
              </svg>
              @endif
            
          </a>
          <h1 class="h6 mb-3">Sign in</h1>
          @include('includes.alerts')
          <div class="form-group">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" name="email" class="form-control form-control-lg" placeholder="Email address" required="" autofocus="" value="{{ old('email') }}">
          </div>
          <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control form-control-lg" placeholder="Password" required="">
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Let me in</button>
          <p class="mt-5 mb-3 text-muted">© {{config('app.name')}} {{date('Y')}}</p>
        </form>
      </div>
    </div>
    <script src="{{asset('dashboard/js/jquery.min.js') }}"></script>
    <script src="{{asset('dashboard/js/popper.min.js') }}"></script>
    <script src="{{asset('dashboard/js/moment.min.js') }}"></script>
    <script src="{{asset('dashboard/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('dashboard/js/simplebar.min.js') }}"></script>
    <script src='{{asset('dashboard/js/daterangepicker.js') }}'></script>
    <script src='{{asset('dashboard/js/jquery.stickOnScroll.js') }}'></script>
    <script src="{{asset('dashboard/js/tinycolor-min.js') }}"></script>
    <script src="{{asset('dashboard/js/config.js') }}"></script>
    <script src="{{asset('dashboard/js/apps.js') }}"></script>    
  </body>
</html>
</body>
</html>