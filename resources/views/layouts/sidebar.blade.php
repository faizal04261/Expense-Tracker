<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('Expenses') }}" class="brand-link">
        <img src=""
             alt=""
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Expense Management</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
