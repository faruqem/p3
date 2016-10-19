<!DOCTYPE html>
<html>
    <head>
        <title>
            {{-- Yield the title if it exists, otherwise default to 'Foobooks' --}}
            @yield('title','Developers Best Friend')
        </title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonts -->
        <link href="css/app.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/journal/bootstrap.min.css" rel="stylesheet">
        <link href="css/p3.css" rel="stylesheet">
        {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
        @yield('head')
    </head>
    <body>
        <!-- Fixed navbar -->
        <header>
            <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
              <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="/">Developer's Best Friend</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Home</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Developer's Tool <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="/lorem-ipsum">Lorem Ipsum Generator</a></li>
                        <li><a href="/random-user">Random Users Generator</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Extra</li>
                        <li><a href="/random-password">Random Password Generator</a></li>
                        <li><a href="/permission-calculator">Permissions Calculator</a></li>
                      </ul>
                    </li>
                    <li><a href="/contact">Contact</a></li>
                  </ul>
                </div><!--/.nav-collapse -->
              </div>
            </nav>
        </header>

        <!-- Begin page content -->
        <section>
            {{-- Main page content will be yielded here --}}
            @yield('content')
        </section>

        <footer class="footer">
          <div class="container">
            <p class="footer-text">&copy;Mo Faruqe 2016</p>
          </div>
        </footer>

        <!-- jQuery CDN -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="js/app.js"></script>
        <script src="js/utility.js"></script>
        <script src="js/dev_tools.js"></script>
        {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
        @yield('body')
    </body>
</html>
