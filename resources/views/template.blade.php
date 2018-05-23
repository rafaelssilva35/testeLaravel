<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>
        <link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/vendors/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/vendors/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/build/css/custom.min.css">
        <link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/vendors/nprogress/nprogress.css">
        <link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/vendors/iCheck/skins/flat/green.css">
        <link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/vendors/iCheck/skins/flat/green.css">
        <link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/vendors/iCheck/skins/flat/green.css">
        <link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/vendors/bootstrap-daterangepicker/daterangepicker.css">
        <link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/vendors/pnotify/dist/pnotify.css">
        <link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/vendors/pnotify/dist/pnotify.buttons.css">
        <link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/vendors/pnotify/dist/pnotify.nonblock.css">
        <!-- Fonts -->

    </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="{{url('')}}"><i class="fa fa-home"></i> Home
                  </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green" id="menu-conunter"></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li class="hide">
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <!-- <li> -->
                     <!--  <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div> -->
                    <!-- </li> -->
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
        	<div class="container">
	            @yield('content')
	        </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <script src="https://colorlib.com/polygon/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="https://colorlib.com/polygon/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://colorlib.com/polygon/vendors/fastclick/lib/fastclick.js" type="text/javascript"></script>
    <script src="https://colorlib.com/polygon/vendors/bootstrap-daterangepicker/daterangepicker.css" type="text/javascript"></script>
    <script src="https://colorlib.com/polygon/vendors/Chart.js/dist/Chart.min.js" type="text/javascript"></script>
    <script src="https://colorlib.com/polygon/vendors/gauge.js/dist/gauge.min.js" type="text/javascript"></script>
    <script src="https://colorlib.com/polygon/vendors/iCheck/icheck.min.js" type="text/javascript"></script>
    <script src="https://colorlib.com/polygon/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js" type="text/javascript"></script>
    <script src="https://colorlib.com/polygon/vendors/skycons/skycons.js" type="text/javascript"></script>
    <script src="" type="text/javascript"></script>
    <script src="https://colorlib.com/polygon/build/js/custom.min.js" type="text/javascript"></script>
    <script src="https://colorlib.com/polygon/vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js" type="text/javascript"></script>
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>

    <script type="text/javascript"> 
      var menuCounter = 0;       
      Pusher.logToConsole = true;

      var pusher = new Pusher('9f1e40c95536e0d29c27', {
        cluster: 'us2',
        encrypted: true
      });

      var channel = pusher.subscribe( 'vps_ligada' ).bind("App\\Events\\VpsLigada", function( data ) {
        var html = "<li><span class='message'>"+data.message+"</span></a></li>";
        $('#menu1').append(html);
        menuCounter++;
        $('#menu-conunter').text(menuCounter);
      });

      var channel = pusher.subscribe( 'muda_nome_vps' ).bind("App\\Events\\MudouOsVps", function( data ) {        
        var html = "<li><span class='message'>"+data.message+"</span></a></li>";
        $('#menu1').append(html);
        menuCounter++;
        $('#menu-conunter').text(menuCounter);
      });
      
      var channel = pusher.subscribe( 'vps-criada' ).bind("App\\Events\\VpsCriada", function( data ) {        
        var html = "<li><span class='message'>"+data.message+"</span></a></li>";
        $('#menu1').append(html);
        menuCounter++;
        $('#menu-conunter').text(menuCounter);
      });

      var channel = pusher.subscribe( 'snapshot_criado' ).bind("App\\Events\\SnapshotCriado", function( data ) {
        var html = "<li><span class='message'>"+data.message+"</span></a></li>";
        $('#menu1').append(html);
        menuCounter++;
        $('#menu-conunter').text(menuCounter);
      });
    </script>

    @yield('script')

  <!--   <script src="https://colorlib.com/polygon/vendors/pnotify/dist/pnotify.js" type="text/javascript"></script>
    <script src="https://colorlib.com/polygon/vendors/pnotify/dist/pnotify.buttons.js" type="text/javascript"></script>
    <script src="https://colorlib.com/polygon/vendors/pnotify/dist/pnotify.buttons.js" type="text/javascript"></script> -->
    </body>
</html>
