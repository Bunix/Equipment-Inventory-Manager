<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">

        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>

        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        
        <link rel="stylesheet" href="{{ asset('/css/main.css') }}">

        @yield('header')
    </head>

    <body>


        <nav class="navbar navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
              </button>
              <a class="navbar-brand" href="/">Equipment Inventory</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">

              <ul class="nav navbar-nav navbar-right">
                <li><a href="/search">Search</a></li>
                @if (!Auth::guest() && !empty(Auth::user()->Labs->pluck('id')->toArray()))
                    <li><a href="/new">Add New Equipment</a></li> 
                @endif
                <li><a href="/">Manage Existing Equipment</a></li>  
                 
                  
                  @if (Auth::guest())
                  
                <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
               
                  @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                
                                @if (!Auth::guest())
                                    <li>
                                        <a href="/profile">Edit User Info</a>
                                    </li>
                                @endif

                                
                                @if(Auth::user()->role == 'admin')
                                    <li>
                                        <a href="/admin/app">Application Admin Panel</a>
                                    </li>
                                @endif
                                
                                @if(!empty(Auth::user()->Owned_Lab->pluck('id')->toArray()))
                                    <li>
                                        <a href="/admin/lab">Lab Owner Panel</a>
                                    </li>
                                @endif
                                
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
          </div>
        </nav>
        


        <div class='container'>
            @yield('content')
        </div>


        @yield('footer')
    
         <footer class = "container">
            <div class = "row">
            <hr>
            <div class="col-sm-6"><p>Beta Version 2.0</p></div>
            <div class="col-sm-6"><a href="/about" class="pull-right">About This Application</a></div>
            
            
          </div>
          </footer>

        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

        <script src="js/main.js"></script>

    </body>
</html> 
