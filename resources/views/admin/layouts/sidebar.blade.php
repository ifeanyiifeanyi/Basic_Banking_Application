<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center bg-logo">
            <a href="{{ route('admin.dashboard') }}" class="logo"><img src="/assets/images/logo.png" height="24" alt="logo"></a>
        </div>
    </div>
    <div class="sidebar-user">
        <img src="{{ auth()->user()->photo }}" alt="user" class="mb-1 rounded-circle img-thumbnail">
        <h6 class="">{{ auth()->user()->full_name }}</h6>
        <p class=" online-icon text-dark"><i class="mdi mdi-record text-success"></i>{{ auth()->user()->last_login ?? '' }}</p>
        <ul class="mt-2 mb-0 list-unstyled list-inline">
            <li class="list-inline-item">
                <a href="{{ route('admin.profile') }}" class="" data-toggle="tooltip" data-placement="top" title="Profile"><i class="dripicons-user text-purple"></i></a>
            </li>
            <li class="list-inline-item">
                <a href="{{ route('admin.update.password') }}" class="" data-toggle="tooltip" data-placement="top" title="Settings"><i class="dripicons-gear text-dark"></i></a>
            </li>
            <li class="list-inline-item">
                <a href="{{ route('profile.2fa') }}" class="" data-toggle="tooltip" data-placement="top" title="2fa"><i class="dripicons-wrong text-dark"></i></a>
            </li>
        </ul>
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="dripicons-device-desktop"></i>
                        <span> Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="calendar.html" class="waves-effect"><i class="dripicons-to-do"></i><span> All Transactions </span></a>
                </li>


                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-jewel"></i> <span> Bank Settings </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.currency.index') }}">Currency</a></li>
                        <li><a href="{{ route('admin.account-types') }}">Create Accounts</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-blog"></i><span> Forms </span> <span class="float-right badge badge-pill badge-info">8</span></a>
                    <ul class="list-unstyled">
                        <li><a href="form-advanced.html">Form Advanced</a></li>
                        <li><a href="form-elements.html">Form Elements</a></li>
                        <li><a href="form-editors.html">Form Editors</a></li>
                        <li><a href="form-uploads.html">Form File Upload</a></li>
                        <li><a href="form-mask.html">Form Mask</a></li>
                        <li><a href="form-summernote.html">Summernote</a></li>
                        <li><a href="form-validation.html">Form Validation</a></li>
                        <li><a href="form-xeditable.html">Form Xeditable</a></li>
                    </ul>
                </li>


            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
