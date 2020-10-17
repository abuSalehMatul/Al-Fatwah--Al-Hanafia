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
                <a href="{{route('admin')}}" class="waves-effect"><i class="fa fa-clock-o p-r-20"
                        aria-hidden="true"></i>Dashboard</a>
            </li>
            <li class="hover-red">
                <a href="{{route('admin.questions')}}" class="waves-effect"><i class="fa fa-question p-r-20"
                        aria-hidden="true"></i>Unanswered Questions</a>
            </li>
            <li class="hover-red">
                <a href="{{route('admin.answered.questions')}}" class="waves-effect"><i class="fa fa-table p-r-20"
                        aria-hidden="true"></i>Answered Questions</a>
            </li>
            <li class="hover-red">
                <a href="{{route('admin.all.questions')}}" class="waves-effect"><i class="fa fa-font p-r-20"
                        aria-hidden="true"></i>All Questions</a>
            </li>
            <li class="hover-red">
                <a href="{{route('admin.articles')}}" class="waves-effect"><i class="fa fa-map p-r-20"
                        aria-hidden="true"></i>Article</a>
            </li>
            <li class="hover-red">
                <a href="{{route('admin.books')}}" class="waves-effect"><i class="fa fa-book p-r-20"
                        aria-hidden="true"></i>Books</a>
            </li>
            <li class="hover-red">
                <a href="{{route('admin.category')}}" class="waves-effect"><i class="fa fa-sitemap p-r-20"
                        aria-hidden="true"></i>Category</a>
            </li>
            <li class="hover-red">
                <a href="{{route('admin.media')}}" class="waves-effect"><i class="fa fa-film p-r-20"
                        aria-hidden="true"></i>Media</a>
            </li>
            <li class="hover-red">
                <a href="{{route('admin.email')}}" class="waves-effect"><i class="fa fa-at p-r-20"
                        aria-hidden="true"></i>Email</a>
            </li>
            @endrole
            @role('root')
            <li class="hover-red">
                <a href="{{route('root.admin')}}" class="waves-effect"><i class="fa fa-at p-r-20"
                        aria-hidden="true"></i>Admins</a>
            </li>
            <li class="hover-red">
                <a href="{{route('root.admin')}}" class="waves-effect"><i class="fa fa-user p-r-20"
                        aria-hidden="true"></i>Admins</a>
            </li>
            <li class="hover-red">
                <a href="{{route('root.email')}}" class="waves-effect"><i class="fa fa-at p-r-20"
                        aria-hidden="true"></i>Emails</a>
            </li>
            @endrole
        </ul>
    </div>
</div>