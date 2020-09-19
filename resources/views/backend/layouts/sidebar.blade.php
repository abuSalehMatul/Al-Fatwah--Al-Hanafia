<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span
                    class="hide-menu">Navigation</span></h3>
        </div>
        .hover-red:hover{
        <ul class="nav " id="side-menu">
            @role('admin|sub_admin')
            <li class="hover-red" style="padding: 70px 0 0;">
                <a href="{{route('admin')}}" class="waves-effect"><i class="fa fa-clock-o fa-fw"
                        aria-hidden="true"></i>Dashboard</a>
            </li>
            <li class="hover-red">
                <a href="{{route('admin.questions')}}" class="waves-effect"><i class="fa fa-user fa-fw"
                        aria-hidden="true"></i>Unanswered Questions</a>
            </li>
            <li class="hover-red">
                <a href="{{route('admin.answered.questions')}}" class="waves-effect"><i class="fa fa-table fa-fw"
                        aria-hidden="true"></i>Answered Questions</a>
            </li>
            <li class="hover-red">
                <a href="{{route('admin.all.questions')}}" class="waves-effect"><i class="fa fa-font fa-fw"
                        aria-hidden="true"></i>All Questions</a>
            </li>
            <li class="hover-red">
                <a href="{{route('admin.articles')}}" class="waves-effect"><i class="fa fa-globe fa-fw"
                        aria-hidden="true"></i>Article</a>
            </li>
            <li class="hover-red">
                <a href="{{route('admin.books')}}" class="waves-effect"><i class="fa fa-columns fa-fw"
                        aria-hidden="true"></i>Books</a>
            </li>
            <li class="hover-red">
                <a href="{{route('admin.category')}}" class="waves-effect"><i class="fa fa-columns fa-fw"
                        aria-hidden="true"></i>Category</a>
            </li>
            @endrole
            @role('root')
            <li> <a>Admins </a></li>
            @endrole
        </ul>
    </div>
</div>