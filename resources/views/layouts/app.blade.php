<?php 
  $setting = App\Models\GeneralSetting::first();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $setting->company_meta_description }}">
    <meta name="author" content="">
    <link rel="icon" href="{{ $setting->company_favicon ?? 'favicon.ico'}}">
    <title>@yield('title', $setting->company_meta_title ?? config('app.name'))</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/css/simplebar.css')}}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/css/feather.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/uppy.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/jquery.steps.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/quill.snow.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/css/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/css/app-light.css')}}" id="lightTheme">
    <link rel="stylesheet" href="{{asset('dashboard/css/app-dark.css')}}" id="darkTheme" disabled>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
  </head>
  <body class="vertical  light  ">
    <div class="wrapper">
      <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        
        <ul class="nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="avatar avatar-sm mt-2">
                <img src="./assets/avatars/face-1.jpg" alt="..." class="avatar-img rounded-circle">
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" href="{{ route('logout') }}">Logout</a>        
                
              <form id="logout-form" onsubmit="return confirm('Are you really sure?');" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{-- {{ method_field('DELETE') }} --}}
                @csrf
              </form>
            </div>
          </li>
        </ul>
      </nav>
      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="/">
              @if($setting->company_logo)
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
          </div>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-users fe-16"></i>
                <span class="ml-3 item-text">Admin Management</span><span class="sr-only">(current)</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="dashboard">
                <li class="nav-item active">
                  <a class="nav-link pl-3" href="{{ route('users.create') }}"><span class="ml-1 item-text">Add Admin </span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{route('users.index')}}"><span class="ml-1 item-text">All Admins</span></a>
                </li>
              </ul>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{ route('menu.index') }}">
                <i class="fe fe-list fe-16"></i>
                <span class="ml-3 item-text">Menu Management</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-menu fe-16"></i>
                <span class="ml-3 item-text">Pages Management</span><span class="sr-only"></span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="pages">
                <li class="nav-item active">
                  <a class="nav-link pl-3" href="{{route('homepage.sections')}}"><span class="ml-1 item-text">Home Page</span></a>
                </li>
              </ul>
              <ul class="collapse list-unstyled pl-4 w-100" id="pages">
                <li class="nav-item active">
                  <a class="nav-link pl-3" href="{{route('why.braghtech.sections')}}"><span class="ml-1 item-text">Why Braghtech</span></a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#clients" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-book fe-16"></i>
                <span class="ml-3 item-text">Clients Management</span><span class="sr-only"></span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="clients">
                <li class="nav-item active">
                  <a class="nav-link pl-3" href="{{ route('category.index') }}"><span class="ml-1 item-text">Client Category</span></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link pl-3" href="{{ route('client.index') }}"><span class="ml-1 item-text">Clients</span></a>
                </li>
                
              </ul>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{ route('solutions.index') }}">
                <i class="fe fe-grid fe-16"></i>
                <span class="ml-3 item-text">Solutions</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{ route('service.index') }}">
                <i class="fe fe-server fe-16"></i>
                <span class="ml-3 item-text">Services</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{ route('partner.index') }}">
                <i class="fe fe-user fe-16"></i>
                <span class="ml-3 item-text">Partners</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{route('submitted.forms.contacts')}}">
                <i class="fe fe-folder fe-16"></i>
                <span class="ml-3 item-text">Contact Forms</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{route('general-settings')}}">
                <i class="fe fe-settings fe-16"></i>
                <span class="ml-3 item-text">General Settings</span>
              </a>
            </li>
          </ul>
        </nav>
      </aside>
      <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                @yield('content')
            </div>
        </div> <!-- .container-fluid -->
        <div style="text-align: center;">
            <p class="mt-5 mb-3 text-muted">© {{config('app.name')}} {{date('Y')}}</p>
        </div>

      </main> <!-- main -->

    </div> <!-- .wrapper -->
    <script src="{{asset('dashboard/js/jquery.min.js')}}"></script>
    <script src="{{asset('dashboard/js/popper.min.js')}}"></script>
    <script src="{{asset('dashboard/js/moment.min.js')}}"></script>
    <script src="{{asset('dashboard/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dashboard/js/simplebar.min.js')}}"></script>
    <script src='{{asset('dashboard/js/daterangepicker.js')}}'></script>
    <script src='{{asset('dashboard/js/jquery.stickOnScroll.js')}}'></script>
    <script src="{{asset('dashboard/js/tinycolor-min.js')}}"></script>
    <script src="{{asset('dashboard/js/config.js')}}"></script>
    <script src="{{asset('dashboard/js/d3.min.js')}}"></script>
    <script src="{{asset('dashboard/js/topojson.min.js')}}"></script>
    <script src="{{asset('dashboard/js/datamaps.all.min.js')}}"></script>
    <script src="{{asset('dashboard/js/datamaps-zoomto.js')}}"></script>
    <script src="{{asset('dashboard/js/datamaps.custom.js')}}"></script>
    <script src="{{asset('dashboard/js/Chart.min.js')}}"></script>
    <script>
      /* defind global options */
      Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
      Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="{{asset('dashboard/js/gauge.min.js')}}"></script>
    <script src="{{asset('dashboard/js/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('dashboard/js/apexcharts.min.js')}}"></script>
    <script src="{{asset('dashboard/js/apexcharts.custom.js')}}"></script>
    <script src='{{asset('dashboard/js/jquery.mask.min.js')}}'></script>
    <script src='{{asset('dashboard/js/select2.min.js')}}'></script>
    <script src='{{asset('dashboard/js/jquery.steps.min.js')}}'></script>
    <script src='{{asset('dashboard/js/jquery.validate.min.js')}}'></script>
    <script src='{{asset('dashboard/js/jquery.timepicker.js')}}'></script>
    <script src='{{asset('dashboard/js/dropzone.min.js')}}'></script>
    <script src='{{asset('dashboard/js/uppy.min.js')}}'></script>
    <script src='{{asset('dashboard/js/quill.min.js')}}'></script>
    <script>
      $('.select2').select2(
      {
        theme: 'bootstrap4',
      });
      $('.select2-multi').select2(
      {
        multiple: true,
        theme: 'bootstrap4',
      });
      $('.drgpicker').daterangepicker(
      {
        singleDatePicker: true,
        timePicker: false,
        showDropdowns: true,
        locale:
        {
          format: 'MM/DD/YYYY'
        }
      });
      $('.time-input').timepicker(
      {
        'scrollDefault': 'now',
        'zindex': '9999' /* fix modal open */
      });
      /** date range picker */
      if ($('.datetimes').length)
      {
        $('.datetimes').daterangepicker(
        {
          timePicker: true,
          startDate: moment().startOf('hour'),
          endDate: moment().startOf('hour').add(32, 'hour'),
          locale:
          {
            format: 'M/DD hh:mm A'
          }
        });
      }
      var start = moment().subtract(29, 'days');
      var end = moment();

      function cb(start, end)
      {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      }
      $('#reportrange').daterangepicker(
      {
        startDate: start,
        endDate: end,
        ranges:
        {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);
      cb(start, end);
      $('.input-placeholder').mask("00/00/0000",
      {
        placeholder: "__/__/____"
      });
      $('.input-zip').mask('00000-000',
      {
        placeholder: "____-___"
      });
      $('.input-money').mask("#.##0,00",
      {
        reverse: true
      });
      $('.input-phoneus').mask('(000) 000-0000');
      $('.input-mixed').mask('AAA 000-S0S');
      $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
      {
        translation:
        {
          'Z':
          {
            pattern: /[0-9]/,
            optional: true
          }
        },
        placeholder: "___.___.___.___"
      });
      // editor
      var editor = document.getElementById('editor');
      if (editor)
      {
        var toolbarOptions = [
          [
          {
            'font': []
          }],
          [
          {
            'header': [1, 2, 3, 4, 5, 6, false]
          }],
          ['bold', 'italic', 'underline', 'strike'],
          ['blockquote', 'code-block'],
          [
          {
            'header': 1
          },
          {
            'header': 2
          }],
          [
          {
            'list': 'ordered'
          },
          {
            'list': 'bullet'
          }],
          [
          {
            'script': 'sub'
          },
          {
            'script': 'super'
          }],
          [
          {
            'indent': '-1'
          },
          {
            'indent': '+1'
          }], // outdent/indent
          [
          {
            'direction': 'rtl'
          }], // text direction
          [
          {
            'color': []
          },
          {
            'background': []
          }], // dropdown with defaults from theme
          [
          {
            'align': []
          }],
          ['clean'] // remove formatting button
        ];
        var quill = new Quill(editor,
        {
          modules:
          {
            toolbar: toolbarOptions
          },
          theme: 'snow'
        });
      }
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function()
      {
        'use strict';
        window.addEventListener('load', function()
        {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form)
          {
            form.addEventListener('submit', function(event)
            {
              if (form.checkValidity() === false)
              {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
    <script src="{{asset('dashboard/js/apps.js')}}"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script>
        new DataTable('.datatable');
    </script>
    @yield('script')
  </body>
</html>