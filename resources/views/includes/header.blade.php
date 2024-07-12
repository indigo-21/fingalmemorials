<div class="header-top-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="logo-area">
                    <a href="#">
                        <h1 class="text-logo">FINGAL MEMORIALS LTD</h1>
                    </a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="header-top-menu">
                    <ul class="nav navbar-nav notika-top-nav">
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button"
                                aria-expanded="false" class="nav-link dropdown-toggle"><span><img
                                        src="{{ asset('images/user.png') }}"
                                        style="width:40px;height:40px;margin-right: 5px;"></span>
                                {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</a>
                            <div role="menu" class="dropdown-menu message-dd chat-dd animated fadeIn">
                                <div class="hd-message-info">
                                    <a href="/edit-profile">
                                        <div class="hd-message-sn">
                                            <div class="hd-message-img chat-img">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </div>
                                            <div class="hd-mg-ctn">
                                                <p>Edit Profile</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ url('/logout') }}">
                                        <div class="hd-message-sn">
                                            <div class="hd-message-img chat-img">
                                                <i class="fa fa-sign-out"></i>
                                            </div>
                                            <div class="hd-mg-ctn">
                                                <p>Log out</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header Top Area -->
<!-- Mobile Menu start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <li><a  href="/dashboard" class="{{ Request::is('dashboard', 'dashboard/*') ? 'active' : '' }}">Dashboard</a></li>
                            <li><a data-toggle="collapse" data-target="#orders-mob" href="#">Orders</a>
                                <ul class="collapse dropdown-header-top">
                                    <li><a href="/order" class="{{ Request::is('order', 'order/*') ? 'active' : '' }}">Orders</a></li>
                                    <li><a href="/customer" class="{{ Request::is('customer', 'customer/*') ? 'active' : '' }}">Customer</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#reports-mob" href="#">Reports</a>
                                <ul id="reports-mob" class="collapse dropdown-header-top">
                                    <li><a href="/order-report" class="{{ Request::is('order-report', 'order-report/*') ? 'active' : '' }}">Order Report</a></li>
                                    <li><a href="/sage-report" class="{{ Request::is('sage-report', 'sage-report/*') ? 'active' : '' }}">Sage Report</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#admin-mob" href="#">Admin Utilities</a>
                                <ul id="admin-mob" class="collapse dropdown-header-top">
                                    <li><a href="/branches" class="{{ Request::is('branches', 'branches/*') ? 'active' : '' }}">Branches</a></li>
                                    <li><a href="/categories" class="{{ Request::is('categories', 'categories/*') ? 'active' : '' }}">Categories</a></li>
                                    <li><a href="/cemetery" class="{{ Request::is('cemetery', 'cemetery/*') ? 'active' : '' }}">Cemetery</a></li>
                                    <li><a href="/cemetery-area" class="{{ Request::is('cemetery-area', 'cemetery-area/*') ? 'active' : '' }}">Cemetery Area</a></li>
                                    <li><a href="/cemetery-group" class="{{ Request::is('cemetery-group', 'cemetery-group/*') ? 'active' : '' }}">Cemetery Group</a></li>
                                    <li><a href="/order-types" class="{{ Request::is('order-types', 'order-types/*') ? 'active' : '' }}">Order Types</a></li>
                                    <li><a href="/source" class="{{ Request::is('source', 'source/*') ? 'active' : '' }}">Source</a></li>
                                    <li><a href="/vat-codes" class="{{ Request::is('vat-codes', 'vat-codes/*') ? 'active' : '' }}">Vat Codes</a></li>
                                </ul>
                            </li>
                            <li><a href="/users" class="{{ Request::is('users', 'users/*') ? 'active' : '' }}">User</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu end -->
<!-- Main Menu area start-->
<div class="main-menu-area mg-tb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    <li
                        class="{{ Request::is('dashboard', 'dashboard/*',) ? 'active' : '' }}">
                        <a data-toggle="tab" href="#dashboard"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li
                        class="{{ Request::is('order', 'order/*', 'customer', 'customer/*', 'complete-unsettled', 'complete-unsettled/*') ? 'active' : '' }}">
                        <a data-toggle="tab" href="#orders"><i class="fa fa-list"></i> Orders</a>
                    </li>
                    <li
                        class="{{ Request::is('order-summary', 'order-summary/*', 'order-details', 'order-details/*', 'order-report', 'order-report/*') ? 'active' : '' }}">
                        <a data-toggle="tab" href="#reports"><i class="fa fa-folder-open-o"></i> Reports</a>
                    </li>
                    <li
                        class=" {{ Request::is('branches', 'branches/*', 'document-types', 'document-types/*', 'branches', 'branches/*', 'account-types', 'account-types/*', 'categories', 'categories/*', 'order-types', 'order-types/*', 'payment-types', 'payment-types/*', 'cemetery', 'cemetery/*', 'cemetery-group', 'cemetery-group/*', 'cemetery-area', 'cemetery-area/*', 'analysis', 'analysis/*', 'sources', 'sources/*', 'titles', 'titles/*', 'vat-codes', 'vat-codes/*') ? 'active' : '' }}">
                        <a data-toggle="tab" href="#admin"><i class="fa fa-cog"></i> Admin Utilities</a>
                    </li>
                    <li class=" {{ Request::is('users', 'users/*') ? 'active' : '' }}"><a data-toggle="tab"
                            href="#user"><i class="fa fa-user"></i> User</a></li>
                </ul>
                <div class="tab-content custom-menu-content">
                    <div id="dashboard"
                        class="tab-pane notika-tab-menu-bg animated fadeIn {{ Request::is('dashboard', 'dashboard/*',) ? 'active' : '' }}">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="/dashboard" class="{{ Request::is('dashboard', 'dashboard/*') ? 'active' : '' }}">Dashboard</a></li>
                        </ul>
                    </div>
                    <div id="orders"
                        class="tab-pane notika-tab-menu-bg animated fadeIn {{ Request::is('order', 'order/*', 'customer', 'customer/*', 'complete-unsettled', 'complete-unsettled/*') ? 'active' : '' }}">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="/order" class="{{ Request::is('order', 'order/*') ? 'active' : '' }}">Orders</a></li>
                            <li><a href="/customer" class="{{ Request::is('customer', 'customer/*') ? 'active' : '' }}">Customer</a></li>
                        </ul>
                    </div>
                    <div id="reports"
                        class="tab-pane notika-tab-menu-bg animated fadeIn {{ Request::is('order-summary', 'order-summary/*', 'order-details', 'order-details/*', 'order-report', 'order-report/*') ? 'active' : '' }}">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="/order-report" class="{{ Request::is('order-report', 'order-report/*') ? 'active' : '' }}">Order Report</a></li>
                            <li><a href="/sage-report" class="{{ Request::is('sage-report', 'sage-report/*') ? 'active' : '' }}">Sage Report</a></li>
                        </ul>
                    </div>
                    <div id="admin"
                        class="tab-pane notika-tab-menu-bg animated fadeIn {{ Request::is('branches', 'branches/*', 'document-types', 'document-types/*', 'branches', 'branches/*', 'account-types', 'account-types/*', 'categories', 'categories/*', 'order-types', 'order-types/*', 'payment-types', 'payment-types/*', 'cemetery', 'cemetery/*', 'cemetery-group', 'cemetery-group/*', 'cemetery-area', 'cemetery-area/*', 'title', 'title/*', 'source', 'source/*', 'analysis', 'analysis/*', 'vat-codes', 'vat-codes/*') ? 'active' : '' }}">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="/analysis" class="{{ Request::is('analysis', 'analysis/*') ? 'active' : '' }}">Analysis</a></li>
                            <li><a href="/branches" class="{{ Request::is('branches', 'branches/*') ? 'active' : '' }}">Branches</a></li>
                            <li><a href="/categories" class="{{ Request::is('categories', 'categories/*') ? 'active' : '' }}">Categories</a></li>
                            <li><a href="/cemetery" class="{{ Request::is('cemetery', 'cemetery/*') ? 'active' : '' }}">Cemetery</a></li>
                            <li><a href="/cemetery-area" class="{{ Request::is('cemetery-area', 'cemetery-area/*') ? 'active' : '' }}">Cemetery Area</a></li>
                            <li><a href="/cemetery-group" class="{{ Request::is('cemetery-group', 'cemetery-group/*') ? 'active' : '' }}">Cemetery Group</a></li>
                            <li><a href="/order-types" class="{{ Request::is('order-types', 'order-types/*') ? 'active' : '' }}">Order Types</a></li>
                            <li><a href="/source" class="{{ Request::is('source', 'source/*') ? 'active' : '' }}">Sources</a></li>
                            <li><a href="/vat-codes" class="{{ Request::is('vat-codes', 'vat-codes/*') ? 'active' : '' }}">Vat Codes</a></li>
                        </ul>
                    </div>
                    <div id="user"
                        class="tab-pane notika-tab-menu-bg animated fadeIn {{ Request::is('users', 'users/*') ? 'active' : '' }}">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="/users"  class="{{ Request::is('users', 'users/*') ? 'active' : '' }}">Users</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Menu area End-->
