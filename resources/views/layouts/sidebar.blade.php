<ul class="nav">
    <li class="nav-item nav-profile">

        <a href="{{route('users.show',Auth::user()->id)}}" class="nav-link">
            <div class="profile-image">
                <img class="img-xs rounded-circle" src="{{ asset('storage/'.Auth::user()->gambar) }}"
                    alt="profile image">
                <div class="dot-indicator bg-success"></div>
            </div>
            <div class="text-wrapper">
                <p class="profile-name">{{Auth::user()->name}}</p>
                <p class="designation">{{Auth::user()->level}}</p>
            </div>
        </a>
    </li>
    <li class="nav-item nav-category">Main Menu</li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('/')}}">
            <i class="menu-icon typcn typcn-document-text"></i>
            <span class="menu-title">Dashboard</span>
        </a>
    </li>
    @if(Auth::user()->level == 'admin')
    <li class="nav-item {{ setActive(['users*', 'members*', 'books*']) }}">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="menu-icon typcn typcn-coffee"></i>
            <span class="menu-title">Manage Data</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ setShow(['users*', 'members*', 'books*']) }}" id="ui-basic">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link {{ setActive(['users*']) }}" href="{{route('users.index')}}">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive(['members*']) }}" href="{{route('members.index')}}">Member</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive(['books*']) }}" href="{{route('books.index')}}">Buku</a>
                </li>
            </ul>
        </div>
    </li>
    @else
    <li class="nav-item">
        <a class="nav-link" href="{{route('books.index')}}">
            <i class="menu-icon typcn typcn-shopping-bag"></i>
            <span class="menu-title">Buku</span>
        </a>
    </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="{{route('transactions.index')}}">
            <i class="menu-icon typcn typcn-shopping-bag"></i>
            <span class="menu-title">Transaksi</span>
        </a>
    </li>
    {{-- 
    <li class="nav-item">
        <a class="nav-link" href="pages/charts/chartjs.html">
            <i class="menu-icon typcn typcn-th-large-outline"></i>
            <span class="menu-title">Charts</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="pages/tables/basic-table.html">
            <i class="menu-icon typcn typcn-bell"></i>
            <span class="menu-title">Tables</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="pages/icons/font-awesome.html">
            <i class="menu-icon typcn typcn-user-outline"></i>
            <span class="menu-title">Icons</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <i class="menu-icon typcn typcn-document-add"></i>
            <span class="menu-title">User Pages</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/samples/login.html"> Login </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/samples/register.html"> Register </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
                </li>
            </ul>
        </div>
    </li> --}}
</ul>