<!-- navbar.blade.php -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="/" class="navbar-brand">myCloset</a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="/upload">Add Item</a>
                </li>
                <li>
                    <a href="/items">Gallery</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Outfits<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/create">Create</a></li>
                        <li><a href="#">View Saved</a></li>
                    </ul>
                </li>
            </ul>

            @if(Auth::check())

            <ul class="nav navbar-nav navbar-right">
                <p class="navbar-text">Signed in as {{Auth::user()->name}}</p>
                <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>

            @else

            <ul class="nav navbar-nav navbar-right">
                <li><a href="/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>

            @endif
        </div>
    </div>
</nav>
<!-- end navbar.blade.php -->
