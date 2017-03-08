<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Home') }}</title>

    <!-- Bootstrap -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="vendor/bootstrap/css/app.css" rel="stylesheet">
    <link href="vendor/chosen_v1.6.2/chosen.min.css" rel="stylesheet" />
    <link href="vendor/summernote-master/dist/summernote.css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
  </head>
  <body>
    <div class="container-fluid display-table">
    <div class="row display-table-row">
      <!-- side menu -->
      <div id="side-menu" class="col-md-2 col-sm-1 hidden-xs display-table-cell vliagn-top">
        <ul>
          <li  class="link active">
            <a href="index.html">
              <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
              <span class="hidden-sm hidden-xs">Dashboard</span>
            </a>
          </li>
          <li class="link">
            <a href="#collapse-post" data-toggle="collapse" aria-controls="collapse-post">
              <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
              <span class="hidden-sm hidden-xs">Article</span>
              <span class="label label-success pull-right hidden-sm hidden-xs"> 20</span>
            </a>
            <ul class="collapse collapseable" id="collapse-post">
              <li><a href="new-article">Create Article</a></li>
              <li><a href="view-article">View Article</a></li>
            </ul>
          </li>
          <li class="link">
            <a href="#collapse-comments" data-toggle="collapse" aria-controls="collapse-comments">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
              <span class="hidden-sm hidden-xs">Comments</span>
              <span class="label label-success pull-right hidden-sm hidden-xs"> 20</span>
            </a>
            <ul class="collapse collapseable" id="collapse-comments">
              <li><a href="new-article">Approved</a><span class="label label-success pull-right hidden-sm hidden-xs"> 20</span></li>
              <li><a href="view-article">Unproved</a><span class="label label-warning pull-right hidden-sm hidden-xs"> 20</span></li>
            </ul>
          </li>
          <li  class="link">
            <a href="comentars.html">
              <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
              <span class="hidden-sm hidden-xs">Comments</span>
            </a>
          </li>
          <li  class="link">
            <a href="tags.html">
              <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
              <span class="hidden-sm hidden-xs">Tags</span>
            </a>
          </li>
          <li  class="link settings-btn">
            <a href="settings.html">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              <span class="hidden-sm hidden-xs">Settings</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- main content -->
      <div id="main-content" class="col-md-10 col-sm-11 display-table-cell vliagn-top">
          <!-- header -->

            <div class="row">
              <header id="nav-header" class="clearfix">
              <div class="col-md-5">
                <nav class="navbar-default pull-left">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </nav>
                <input type="text" id="header-search-field" class="hidden-sm hidden-xs" placeholder="Search ...." name="" value="">
              </div>
              <div class="col-md-7">
                <ul class=" pull-right">
                  <li id="welcome" class="hidden-xs">Welcome to DASHBOARD</li>
                  <li class="fixed-width">
                    <a href="#">
                      <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
                      <span class="label label-warning">3</span>
                      </a>
                  </li>
                  <li class="fixed-width">
                    <a href="#">
                      <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                      <span class="label label-success">3</span>
                        </a>
                  </li>
                  <!-- Authentication Links -->
                  @if (Auth::guest())
                      <li><a href="{{ url('/login') }}">Login</a></li>
                      <li><a href="{{ url('/register') }}">Register</a></li>
                  @else
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <ul class="dropdown-menu" role="menu">
                              <li>
                                  <a href="{{ url('/logout') }}"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                      Logout
                                  </a>

                                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                              </li>
                          </ul>
                      </li>
                  @endif
                </ul>


              </div>
                </header>
            </div>

          <!-- header -->
          <!-- main content -->


                    <div id="content">
                        <header>
                          <h2 class="page_title">Create new Article</h2>
                        </header>
                        <div class="content-inner">
                          <div class="form-wrapper">
                              <div class="form-group">
                                  <label class="sr-only">Title</label>
                                  <input type="text" class="form-control" id="title" placeholder="Ttile">
                              </div>
                              <div class="form-group">
                                  <label class="sr-only">Tags</label>
                                  <select class="form-control chosen-select" data-placeholder="Select tags" multiple name="tags">
                                      <option></option>
                                      <option>html</option>
                                      <option>css</option>
                                      <option>coding</option>
                                      <option>programming</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label class="sr-only">Article</label>
                                  <textarea class="form-control summernote" placeholder="Article" name="article">
                                  </textarea>
                              </div>
                              <div class="checkbox">
                                  <label>
                                     <input type="checkbox"> purblich article when i click save
                                  </label>
                              </div>
                              <div class="clearfix">
                                  <button type="submit" class="btn btn-primary pull-right">Save / Publish</button>
                              </div>
                          </div>
                        </div>

                    </div>

          <!-- end main content -->
          <!--footer -->

            <div class="row">
                        <footer id="admin-footer" class="clearfix">
              <div class="pull-left">
                <b>Copyright</b>&copy; 2018
              </div>
              <div class="pull-right">
                Admin
              </div>
                        </footer>
            </div>


      </div>
    </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/bootstrap/js/app.js"></script>
    <script src="vendor/chosen_v1.6.2/chosen.jquery.min.js"></script>
    <script src="vendor/summernote-master/dist/summernote.min.js"></script>
    <script type="text/javascript">
      var config = {
          '.chosen-select' : {},
          '.chosen-select-deselect' : {allow_single_deselect:true},
          '.chosen-select-no-single':{disable_search_threshold:10},
          '.chosen-select-no-result':{no_results_text:'Eina!, nothing found'},
          '.chosen-select-width':{width:"95%"}
      }
      for(var selector in config){
          $(selector).chosen(config[selector]);
      }
    </script>
    <script type="text/javascript">
      $('.summernote').summernote({
          height:200;
      });
    </script>
  </body>
</html>
