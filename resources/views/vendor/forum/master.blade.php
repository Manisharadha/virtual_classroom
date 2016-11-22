<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @if (isset($thread))
            {{ $thread->title }} -
        @endif
        @if (isset($category))
            {{ $category->title }} -
        @endif
        {{ trans('forum::general.home_title') }}
    </title>


    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing-page.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootaide.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <style>
    body {
        padding: 30px 0;
    }

    textarea {
        min-height: 200px;
    }

    .deleted {
        opacity: 0.65;
    }
    </style>
</head>
<body id="app-layout">
    <header class="bg-white navbar-fixed-top box-shadow">
        <div class="container">
            <div class="navbar-header">
                <button class="btn btn-link visible-xs pull-right m-r m-t-sm" type="button" data-toggle="collapse" data-target=".navbar-demo-4">
                    <i class="fa fa-bars"></i>
                </button>
                <a href="{{ url('/') }}" class="navbar-brand m-r-sm"><img src="img/logo.png" class="m-r-sm hide"><span class="h4 font-bold"><img src="{{ asset('images/VirtualClassroom.png') }}" alt="" width="100" height="100"></span></a>
            </div>
            <div class="collapse navbar-collapse navbar-demo-4">
                
                <!-- search form -->
                <form class="navbar-form navbar-left m-v-sm" action="{{ url('search') }}" role="search" style="width: 40%;" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control input-sm bg-light" placeholder="Search" name="search">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-sm bg-light">
                                    <i class="fa fa-search"></i>
                                </button> 
                            </span>
                        </div>
                    </div>
                </form>
                <!-- / search form -->
                <ul class="nav navbar-nav navbar-right">
                    
                    <li><a href="{{ url('courses') }}">All Courses</a></li>

                     <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        @if(Auth::user()->role_id == 2)
                            <li><a href="{{ url('/register/course') }}">Register a Course</a></li>
                            <li><a href="{{ url('/teacher/courses') }}">My Courses</a></li>
                        @endif
                        @if(Auth::user()->role_id == 1)
                            <li><a href="{{ url('/student/courses') }}">My Courses</a></li>
                        @endif
                        <!--
                        <li class="dropdown">
                            <a href class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-bell fa fa-bell fa-fw"></i>
                                <span class="visible-xs-inline">Notifications</span>
                                <span class="badge badge-sm up bg-danger">2</span>
                            </a>
                            

                            <div class="dropdown-menu w-xl">
                                <div class="panel bg-white">
                                    <div class="panel-heading b-light bg-light">
                                        <strong>You have <span>2</span> notifications</strong>
                                    </div>
                                    <div class="list-group">
                                        <a class="list-group-item" href>
                                            <span class="pull-left thumb-sm m-r-sm">
                                                <img src="imgs/a0.jpg" alt="..." class="img-circle">
                                            </span>
                                            <span class="block m-b-none">
                                                Panic message<br>
                                                <small class="text-muted">13 minutes ago</small>
                                            </span>
                                        </a>
                                        <a class="list-group-item" href>
                                            <span class="block m-b-none">
                                                First commit<br>
                                                <small class="text-muted">1 hour ago</small>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="panel-footer text-sm">
                                        <a class="pull-right" href><i class="fa fa-cog"></i></a>
                                        <a href>See all the notifications</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        -->
                       
                        <li class="dropdown">
                            <a href class="dropdown-toggle clear" data-toggle="dropdown"> 
                                <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm"> 
                                    <img src="imgs/a0.jpg" alt="..."> 
                                    <i class="on md b-white bottom"></i> 
                                </span> <span class="hidden-sm hidden-md">{{ Auth::user()->name }}</span>
                            </a>
                            <!--dropdown -->
                            <ul class="dropdown-menu w">
                                <li>
                                    <a href="{{ url('student/profile') }}">Profile</a>
                                </li>
                                
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ url('logout') }}">Logout</a>
                                </li>
                          
                            </ul>
                        <!--/ dropdown -->
                        </li>
                    @endif
                     <li class="dropdown">
                            <a href class="dropdown-toggle clear" data-toggle="dropdown">
                                  
                                <span class="hidden-sm hidden-md">Others</span>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu w">
                                <li><a href="{{ url('forum') }}">Forum</a></li>
                                <li><a href="{{ url('vc/library') }}">Library</a></li>
                            </ul>
                        </li>

                </ul>
            </div>
        </div>
    </header>

    <section class="bg-dark">
    <div class="container">
        <div class="row p-t-xxl">
            <div class="col-sm-8 col-sm-offset-2 p-v-xxl text-center">
                <h1 class="h1 m-t-l p-v-l">Forum</h1>
            </div>
        </div>
    </div>
</section>

    
<section class="p-v-xxl bg-light">
    <div class="container">
        <div class="row p-t-xxl">
            <div class="col-md-10 col-md-offset-1">

        @include ('forum::partials.breadcrumbs')
        @include ('forum::partials.alerts')

        @yield('content')
    </div>
    </div>
    </div>
    </section>



     <footer class="bg-dark">
            <div class="container">
                <div class="row p-v m-t-md text-center">
                    
                    <p class="m-b-none">
                        Build with <i class="fa fa-heart-o m-h-2x"></i> by <a href="https://www.facebook.com/narmivoshu" target="_blank"> Shuvo&Fahima</a>
                    </p>
                    
                    <p>
                       &copy; 2016 
                    </p>
                </div>
            </div>
    </footer>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/bootaide.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
    <script src="https://cdn.pubnub.com/pubnub-3.7.14.min.js"></script>
    <script src="https://cdn.pubnub.com/webrtc/webrtc.js"></script>
    <script src="https://cdn.pubnub.com/webrtc/rtc-controller.js"></script>
    <script src="{{ asset('js/app.js') }}"></script> 
    <script>
    var toggle = $('input[type=checkbox][data-toggle-all]');
    var checkboxes = $('table tbody input[type=checkbox]');
    var actions = $('[data-actions]');
    var forms = $('[data-actions-form]');
    var confirmString = "{{ trans('forum::general.generic_confirm') }}";

    function setToggleStates() {
        checkboxes.prop('checked', toggle.is(':checked')).change();
    }

    function setSelectionStates() {
        checkboxes.each(function() {
            var tr = $(this).parents('tr');

            $(this).is(':checked') ? tr.addClass('active') : tr.removeClass('active');

            checkboxes.filter(':checked').length ? $('[data-bulk-actions]').removeClass('hidden') : $('[data-bulk-actions]').addClass('hidden');
        });
    }

    function setActionStates() {
        forms.each(function() {
            var form = $(this);
            var method = form.find('input[name=_method]');
            var selected = form.find('select[name=action] option:selected');
            var depends = form.find('[data-depends]');

            selected.each(function() {
                if ($(this).attr('data-method')) {
                    method.val($(this).data('method'));
                } else {
                    method.val('patch');
                }
            });

            depends.each(function() {
                (selected.val() == $(this).data('depends')) ? $(this).removeClass('hidden') : $(this).addClass('hidden');
            });
        });
    }

    setToggleStates();
    setSelectionStates();
    setActionStates();

    toggle.click(setToggleStates);
    checkboxes.change(setSelectionStates);
    actions.change(setActionStates);

    forms.submit(function() {
        var action = $(this).find('[data-actions]').find(':selected');

        if (action.is('[data-confirm]')) {
            return confirm(confirmString);
        }

        return true;
    });

    $('form[data-confirm]').submit(function() {
        return confirm(confirmString);
    });
    </script>
</body>
</html>
