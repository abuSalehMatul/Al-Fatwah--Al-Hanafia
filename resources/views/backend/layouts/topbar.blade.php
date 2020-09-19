<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <div class="top-left-part">
            <!-- Logo -->
            
            <a class="logo" href="{{route('admin')}}">
               <b style="color: black"> Al Fatwa</b>
            </a>
        </div>
        <!-- /Logo -->
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li> </li>
            <li> </li>
            <admin-search></admin-search>
            <li>
                <a class="profile-pic" href="#"> <b class="hidden-xs">{{auth()->user()->name}}</b></a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
</nav>