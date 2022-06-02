
            <a href="{{route('dashboard')}}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-question"></i>
                <p>Dashboard</p>
            </a>
<li class="nav-item has-treeview {{ Request::is('user','role') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-folder-open"></i>
            <p>User Management
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('user')}}" class="nav-link {{ Request::is('user') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-question"></i>
                    <p>User</p>
                </a>
            </li>
            @if(Auth::user()->user_roleID  == 1)
                <li class="nav-item">
                    <a href="{{route('role')}}" class="nav-link {{ Request::is('role') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-question"></i>
                        <p>Role</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>

    <li class="nav-item has-treeview {{ Request::is('expensecategory','Expenses') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-folder-open"></i>
            <p>Expense Management
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if(Auth::user()->user_roleID  == 1)
                <li class="nav-item">
                    <a href="{{route('expensecategory')}}" class="nav-link {{ Request::is('expensecategory') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-question"></i>
                        <p>Expense Categories</p>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a href="{{route('Expenses')}}" class="nav-link {{ Request::is('Expenses') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>Expenses</p>
                </a>
            </li>
        </ul>
    </li>










