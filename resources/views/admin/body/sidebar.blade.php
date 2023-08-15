<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Noble<span>UI</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav ">
            <li class="nav-item  nav-category">Main</li>
            <li class="nav-item  {{ Request::is('admin/dashboard')? 'active':''}}">
                <a href="{{url('admin/dashboard')}}" class="nav-link {{ Request::is('admin/dashboard')? 'active':''}}">
                    <i class="link-icon" data-feather="box"></i>


                    <span class="link-title">Dashboard</span>
                </a>
            </li>

{{--            ========================================--}}
            <li class="nav-item nav-category">web apps</li>


{{--            -------------- Supplier -----------------------}}
            <li class="nav-item {{ (Request::is('supplier/*')) ? 'active' : '' }}  " >
{{--            <li class="nav-item " id="sidebar1" >--}}
                <a class="nav-link {{ (Request::is('supplier/*')) ? 'active' : '' }}"  data-bs-toggle="collapse" href="#supplier" role="button"
{{--                <a class="nav-link " id="sidebar1" data-bs-toggle="collapse" href="#/supplier/all" role="button"--}}
                   aria-expanded="{{ (Request::is('supplier/*')) ? 'true' : 'false' }}" aria-controls="emails">
                    <i class="link-icon" data-feather="shopping-cart"></i>
                    <span class="link-title">Manage Supplier</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="{{ Request::is('supplier/*')?'collapse show ':'collapse' }} " id="supplier">
{{--                    <div class="collapse " id="supplier">--}}
                    <ul class="nav sub-menu ">
                        <li class="nav-item {{ (Request::is('supplier/all'))  ? 'active' : '' }}">
{{--                            <a href="{{route('supplier.all')}}" class="nav-link {{ (strpos(Route::currentRouteName(), 'supplier.all') == 0) ? 'active' : '' }} " >All Supplier</a>--}}
                            <a href="{{url('supplier/all')}}" class="nav-link {{ (Request::is('supplier/all')) || (Request::is('supplier/edit/*'))   ? 'active' : '' }} " >All Supplier</a>
                        </li>
                        <li class="nav-item {{ (Request::is('supplier/add'))  ? 'active' : '' }}">
                            {{--                            <a href="{{route('supplier.all')}}" class="nav-link {{ (strpos(Route::currentRouteName(), 'supplier.all') == 0) ? 'active' : '' }} " >All Supplier</a>--}}
                            <a href="{{url('supplier/add')}}" class="nav-link {{ (Request::is('supplier/add'))  ||  (Request::is('supplier/add'))  ? 'active' : '' }} " >Add Supplier</a>
                        </li>

                    </ul>
                </div>
            </li>
            {{--            -------------- End Supplier -----------------------}}

            {{--            -------------- Supplier -----------------------}}
            <li class="nav-item {{ (Request::is('customer/*')) ? 'active' : '' }}  " >
                {{--            <li class="nav-item " id="sidebar1" >--}}
                <a class="nav-link {{ (Request::is('customer/*')) ? 'active' : '' }}"  data-bs-toggle="collapse" href="#customer" role="button"
                   {{--                <a class="nav-link " id="sidebar1" data-bs-toggle="collapse" href="#/supplier/all" role="button"--}}
                   aria-expanded="{{ (Request::is('customer/*')) ? 'true' : 'false' }}" aria-controls="emails">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Manage Customer</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="{{ Request::is('customer/*')?'collapse show ':'collapse' }} " id="customer">
                    {{--                    <div class="collapse " id="supplier">--}}
                    <ul class="nav sub-menu ">
                        <li class="nav-item {{ (Request::is('customer/*'))  ? 'active' : '' }}">
                            {{--                            <a href="{{route('supplier.all')}}" class="nav-link {{ (strpos(Route::currentRouteName(), 'supplier.all') == 0) ? 'active' : '' }} " >All Supplier</a>--}}
                            <a href="{{url('customer/all')}}" class="nav-link {{ (Request::is('customer/all')) || (Request::is('customer/edit/*')) || (Request::is('customer/add')) ? 'active' : '' }} " >All Customer</a>
                        </li>

                    </ul>
                </div>
            </li>
            {{--            -------------- End Supplier -----------------------}}




{{--            <li class="nav-item {{ (Request::is('customer/*')) ? 'active' : '' }} " >--}}
{{--            <li class="nav-item {{ (Request::is('customer/*')) ? 'active' : '' }}"  >--}}
{{--                <a class="nav-link {{ (Request::is('customer/all')) ? 'active' : '' }}"   data-bs-toggle="collapse" href="#customer" role="button"--}}
{{--                   aria-expanded="false" aria-controls="emails">--}}
{{--                    <i class="link-icon" data-feather="user"></i>--}}
{{--                    <span class="link-title">Manage Customer</span>--}}
{{--                    <i class="link-arrow" data-feather="chevron-down"></i>--}}
{{--                </a>--}}
{{--                <div class="collapse " id="customer">--}}
{{--                    <ul class="nav sub-menu ">--}}
{{--                        <li class="nav-item {{ (Request::is('/customer/all')) ? 'active' : '' }} ">--}}
{{--                            <a href="{{ url('/customer/all') }}" class="nav-link {{ (Request::is('/customer/all')) ? 'active' : '' }}" >All Customer</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}






            <li class="nav-item nav-category">Components</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">UI Kit</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="uiComponents">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="" class="nav-link">Tabs</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Tooltips</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
                    <i class="link-icon" data-feather="anchor"></i>
                    <span class="link-title">Advanced UI</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="advancedUI">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="" class="nav-link">Cropper</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Owl carousel</a>
                        </li>


                    </ul>
                </div>
            </li>


            <li class="nav-item nav-category">Docs</li>
            <li class="nav-item">
                <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Documentation</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
