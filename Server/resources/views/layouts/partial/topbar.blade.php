<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="">Admin</a>
    </div>
    <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <?php echo "Today is : " . date("l");?> &nbsp;<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-danger square-btn-adjust"class="btn btn-danger square-btn-adjust">
            Logout
        </a>
        <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none">
            @csrf
        </form></div>


</nav>