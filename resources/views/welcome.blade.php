@extends('layouts.master')

@section('menu')
@include('layouts.menu.dashboard')
@stop

@section('style')

@stop

@section('nav_bar')
<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">

      <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
          data-toggle="menubar">
          <span class="sr-only">Toggle navigation</span>
          <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
          data-toggle="collapse">
          <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
          <img class="navbar-brand-logo" src="../assets/images/logo.png" title="Remark">
          <span class="navbar-brand-text hidden-xs-down"> Remark</span>
        </div>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
          data-toggle="collapse">
          <span class="sr-only">Toggle Search</span>
          <i class="icon wb-search" aria-hidden="true"></i>
        </button>
      </div>

      <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
          <!-- Navbar Toolbar -->
          <ul class="nav navbar-toolbar">
            <li class="nav-item hidden-float" id="toggleMenubar">
              <a class="nav-link" data-toggle="menubar" href="#" role="button">
                <i class="icon hamburger hamburger-arrow-left">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
              </a>
            </li>
            <li class="nav-item hidden-sm-down" id="toggleFullscreen">
              <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                <span class="sr-only">Toggle fullscreen</span>
              </a>
            </li>
            <li class="nav-item hidden-float">
              <a class="nav-link icon wb-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
                role="button">
                <span class="sr-only">Toggle Search</span>
              </a>
            </li>
            <li class="nav-item dropdown dropdown-fw dropdown-mega">
              <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="fade"
                role="button">Mega <i class="icon wb-chevron-down-mini" aria-hidden="true"></i></a>
              <div class="dropdown-menu" role="menu">
                <div class="mega-content">
                  <div class="row">
                    <div class="col-md-4">
                      <h5>UI Kit</h5>
                      <ul class="blocks-2">
                        <li class="mega-menu m-0">
                          <ul class="list-icons">
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="advanced/animation.html">Animation</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="uikit/buttons.html">Buttons</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="uikit/colors.html">Colors</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="uikit/dropdowns.html">Dropdowns</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="uikit/icons.html">Icons</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="advanced/lightbox.html">Lightbox</a>
                            </li>
                          </ul>
                        </li>
                        <li class="mega-menu m-0">
                          <ul class="list-icons">
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="uikit/modals.html">Modals</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="uikit/panel-structure.html">Panels</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="structure/overlay.html">Overlay</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="uikit/tooltip-popover.html ">Tooltips</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="advanced/scrollable.html">Scrollable</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="uikit/typography.html">Typography</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-4">
                      <h5>Media
                        <span class="badge badge-pill badge-success">4</span>
                      </h5>
                      <ul class="blocks-3">
                        <li>
                          <a class="thumbnail m-0" href="javascript:void(0)">
                            <img class="w-full" src="../../global/photos/placeholder.png" alt="..." />
                          </a>
                        </li>
                        <li>
                          <a class="thumbnail m-0" href="javascript:void(0)">
                            <img class="w-full" src="../../global/photos/placeholder.png" alt="..." />
                          </a>
                        </li>
                        <li>
                          <a class="thumbnail m-0" href="javascript:void(0)">
                            <img class="w-full" src="../../global/photos/placeholder.png" alt="..." />
                          </a>
                        </li>
                        <li>
                          <a class="thumbnail m-0" href="javascript:void(0)">
                            <img class="w-full" src="../../global/photos/placeholder.png" alt="..." />
                          </a>
                        </li>
                        <li>
                          <a class="thumbnail m-0" href="javascript:void(0)">
                            <img class="w-full" src="../../global/photos/placeholder.png" alt="..." />
                          </a>
                        </li>
                        <li>
                          <a class="thumbnail m-0" href="javascript:void(0)">
                            <img class="w-full" src="../../global/photos/placeholder.png" alt="..." />
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-4">
                      <h5 class="mb-0">Accordion</h5>
                      <!-- Accordion -->
                      <div class="panel-group panel-group-simple" id="siteMegaAccordion" aria-multiselectable="true"
                        role="tablist">
                        <div class="panel">
                          <div class="panel-heading" id="siteMegaAccordionHeadingOne" role="tab">
                            <a class="panel-title" data-toggle="collapse" href="#siteMegaCollapseOne" data-parent="#siteMegaAccordion"
                              aria-expanded="false" aria-controls="siteMegaCollapseOne">
                              Collapsible Group Item #1
                            </a>
                          </div>
                          <div class="panel-collapse collapse" id="siteMegaCollapseOne" aria-labelledby="siteMegaAccordionHeadingOne"
                            role="tabpanel">
                            <div class="panel-body">
                              De moveat laudatur vestra parum doloribus labitur sentire partes, eripuit praesenti
                              congressus ostendit alienae, voluptati ornateque accusamus
                              clamat reperietur convicia albucius.
                            </div>
                          </div>
                        </div>
                        <div class="panel">
                          <div class="panel-heading" id="siteMegaAccordionHeadingTwo" role="tab">
                            <a class="panel-title collapsed" data-toggle="collapse" href="#siteMegaCollapseTwo"
                              data-parent="#siteMegaAccordion" aria-expanded="false"
                              aria-controls="siteMegaCollapseTwo">
                              Collapsible Group Item #2
                            </a>
                          </div>
                          <div class="panel-collapse collapse" id="siteMegaCollapseTwo" aria-labelledby="siteMegaAccordionHeadingTwo"
                            role="tabpanel">
                            <div class="panel-body">
                              Praestabiliorem. Pellat excruciant legantur ullum leniter vacare foris voluptate
                              loco ignavi, credo videretur multoque choro fatemur mortis
                              animus adoptionem, bello statuat expediunt naturales.
                            </div>
                          </div>
                        </div>

                        <div class="panel">
                          <div class="panel-heading" id="siteMegaAccordionHeadingThree" role="tab">
                            <a class="panel-title collapsed" data-toggle="collapse" href="#siteMegaCollapseThree"
                              data-parent="#siteMegaAccordion" aria-expanded="false"
                              aria-controls="siteMegaCollapseThree">
                              Collapsible Group Item #3
                            </a>
                          </div>
                          <div class="panel-collapse collapse" id="siteMegaCollapseThree" aria-labelledby="siteMegaAccordionHeadingThree"
                            role="tabpanel">
                            <div class="panel-body">
                              Horum, antiquitate perciperet d conspectum locus obruamus animumque perspici probabis
                              suscipere. Desiderat magnum, contenta poena desiderant
                              concederetur menandri damna disputandum corporum.
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End Accordion -->
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
          <!-- End Navbar Toolbar -->

          <!-- Navbar Toolbar Right -->
          <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" data-animation="scale-up"
                aria-expanded="false" role="button">
                <span class="flag-icon flag-icon-us"></span>
              </a>
              <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                  <span class="flag-icon flag-icon-gb"></span> English</a>
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                  <span class="flag-icon flag-icon-fr"></span> French</a>
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                  <span class="flag-icon flag-icon-cn"></span> Chinese</a>
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                  <span class="flag-icon flag-icon-de"></span> German</a>
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                  <span class="flag-icon flag-icon-nl"></span> Dutch</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
                data-animation="scale-up" role="button">
                <span class="avatar avatar-online">
                  <img src="../../global/portraits/5.jpg" alt="...">
                  <i></i>
                </span>
              </a>
              <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Profile</a>
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-payment" aria-hidden="true"></i> Billing</a>
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Settings</a>
                <div class="dropdown-divider" role="presentation"></div>
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Notifications"
                aria-expanded="false" data-animation="scale-up" role="button">
                <i class="icon wb-bell" aria-hidden="true"></i>
                <span class="badge badge-pill badge-danger up">5</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                <div class="dropdown-menu-header">
                  <h5>NOTIFICATIONS</h5>
                  <span class="badge badge-round badge-danger">New 5</span>
                </div>

                <div class="list-group">
                  <div data-role="container">
                    <div data-role="content">
                      <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <i class="icon wb-order bg-red-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">A new order has been placed</h6>
                            <time class="media-meta" datetime="2018-06-12T20:50:48+08:00">5 hours ago</time>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <i class="icon wb-user bg-green-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Completed the task</h6>
                            <time class="media-meta" datetime="2018-06-11T18:29:20+08:00">2 days ago</time>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <i class="icon wb-settings bg-red-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Settings updated</h6>
                            <time class="media-meta" datetime="2018-06-11T14:05:00+08:00">2 days ago</time>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <i class="icon wb-calendar bg-blue-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Event started</h6>
                            <time class="media-meta" datetime="2018-06-10T13:50:18+08:00">3 days ago</time>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <i class="icon wb-chat bg-orange-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Message received</h6>
                            <time class="media-meta" datetime="2018-06-10T12:34:48+08:00">3 days ago</time>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="dropdown-menu-footer">
                  <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                    <i class="icon wb-settings" aria-hidden="true"></i>
                  </a>
                  <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                    All notifications
                  </a>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Messages"
                aria-expanded="false" data-animation="scale-up" role="button">
                <i class="icon wb-envelope" aria-hidden="true"></i>
                <span class="badge badge-pill badge-info up">3</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                <div class="dropdown-menu-header" role="presentation">
                  <h5>MESSAGES</h5>
                  <span class="badge badge-round badge-info">New 3</span>
                </div>

                <div class="list-group" role="presentation">
                  <div data-role="container">
                    <div data-role="content">
                      <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <span class="avatar avatar-sm avatar-online">
                              <img src="../../global/portraits/2.jpg" alt="..." />
                              <i></i>
                            </span>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Mary Adams</h6>
                            <div class="media-meta">
                              <time datetime="2018-06-17T20:22:05+08:00">30 minutes ago</time>
                            </div>
                            <div class="media-detail">Anyways, i would like just do it</div>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <span class="avatar avatar-sm avatar-off">
                              <img src="../../global/portraits/3.jpg" alt="..." />
                              <i></i>
                            </span>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Caleb Richards</h6>
                            <div class="media-meta">
                              <time datetime="2018-06-17T12:30:30+08:00">12 hours ago</time>
                            </div>
                            <div class="media-detail">I checheck the document. But there seems</div>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <span class="avatar avatar-sm avatar-busy">
                              <img src="../../global/portraits/4.jpg" alt="..." />
                              <i></i>
                            </span>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">June Lane</h6>
                            <div class="media-meta">
                              <time datetime="2018-06-16T18:38:40+08:00">2 days ago</time>
                            </div>
                            <div class="media-detail">Lorem ipsum Id consectetur et minim</div>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <span class="avatar avatar-sm avatar-away">
                              <img src="../../global/portraits/5.jpg" alt="..." />
                              <i></i>
                            </span>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Edward Fletcher</h6>
                            <div class="media-meta">
                              <time datetime="2018-06-15T20:34:48+08:00">3 days ago</time>
                            </div>
                            <div class="media-detail">Dolor et irure cupidatat commodo nostrud nostrud.</div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="dropdown-menu-footer" role="presentation">
                  <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                    <i class="icon wb-settings" aria-hidden="true"></i>
                  </a>
                  <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                    See all messages
                  </a>
                </div>
              </div>
            </li>
            <li class="nav-item" id="toggleChat">
              <a class="nav-link" data-toggle="site-sidebar" href="javascript:void(0)" title="Chat"
                data-url="site-sidebar.tpl">
                <i class="icon wb-chat" aria-hidden="true"></i>
              </a>
            </li>
          </ul>
          <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->

        <!-- Site Navbar Seach -->
        <div class="collapse navbar-search-overlap" id="site-navbar-search">
          <form role="search">
            <div class="form-group">
              <div class="input-search">
                <i class="input-search-icon wb-search" aria-hidden="true"></i>
                <input type="text" class="form-control" name="site-search" placeholder="Search...">
                <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
                  data-toggle="collapse" aria-label="Close"></button>
              </div>
            </div>
          </form>
        </div>
        <!-- End Site Navbar Seach -->
      </div>
    </nav>
@stop

@section('page_content')
<!-- Page -->
    <div class="page">
      <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
          <div class="col-xxl-7 col-lg-7">
            <!-- Widget Linearea Color -->
            <div class="card card-shadow card-responsive" id="widgetLineareaColor">
              <div class="card-block p-0">
                <div class="pt-30 p-30" style="height:calc(100% - 250px);">
                  <div class="row">
                    <div class="col-7">
                      <p class="font-size-20 blue-grey-700">Eneergy Predictions</p>
                      <p>Quisque volutpat condimentum velit. Class aptent taciti</p>
                      <div class="counter counter-md text-left">
                        <div class="counter-number-group">
                          <span class="counter-icon red-600"><i class="icon wb-triangle-up" aria-hidden="true"></i></span>
                          <span class="counter-number red-600">2,250</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-5">
                      <div class="float-right clearfix">
                        <ul class="list-unstyled">
                          <li class="mb-5 text-truncate">
                            <i class="icon wb-medium-point red-600 mr-5" aria-hidden="true"></i>                            Diretary intake
                          </li>
                          <li class="mb-5 text-truncate">
                            <i class="icon wb-medium-point orange-600 mr-5" aria-hidden="true"></i>                            Motion
                          </li>
                          <li class="mb-5 text-truncate">
                            <i class="icon wb-medium-point green-600 mr-5" aria-hidden="true"></i>                            Other
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="ct-chart h-250"></div>
              </div>
            </div>
            <!-- End Widget Linearea Color -->
          </div>

          <div class="col-xxl-5 col-lg-5">
            <!-- Widget Stacked Bar -->
            <div class="card card-shadow" id="widgetStackedBar">
              <div class="card-block p-0">
                <div class="p-30 h-150">
                  <p>MARKET DOW</p>
                  <div class="red-600">
                    <i class="wb-triangle-up font-size-20 mr-5"></i>
                    <span class="font-size-30">26,580.62</span>
                  </div>
                </div>
                <div class="counters pb-20 px-30" style="height:calc(100% - 350px);">
                  <div class="row no-space">
                    <div class="col-4">
                      <div class="counter counter-sm">
                        <div class="counter-label text-uppercase">APPL</div>
                        <div class="counter-number-group text-truncate">
                          <span class="counter-number-related green-600">+</span>
                          <span class="counter-number green-600">82.24</span>
                          <span class="counter-number-related green-600">%</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="counter counter-sm">
                        <div class="counter-label text-uppercase">FB</div>
                        <div class="counter-number-group text-truncate">
                          <span class="counter-number-related red-600">-</span>
                          <span class="counter-number red-600">12.06</span>
                          <span class="counter-number-related red-600">%</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="counter counter-sm">
                        <div class="counter-label text-uppercase">GOOG</div>
                        <div class="counter-number-group text-truncate">
                          <span class="counter-number-related green-600">+</span>
                          <span class="counter-number green-600">24.86</span>
                          <span class="counter-number-related green-600">%</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="ct-chart h-200"></div>
              </div>
            </div>
            <!-- End Widget Stacked Bar -->
          </div>

          <div class="col-xxl-8 col-lg-12">
            <!-- Widget Statistic -->
            <div class="card card-shadow" id="widgetStatistic">
              <div class="card-block p-0">
                <div class="row no-space h-full" data-plugin="matchHeight">
                  <div class="col-md-8 col-sm-12">
                    <div id="widgetJvmap" class="h-full"></div>
                  </div>
                  <div class="col-md-4 col-sm-12 p-30">
                    <div class="form-group">
                      <div class="input-search input-search-dark">
                        <i class="input-search-icon wb-search" aria-hidden="true"></i>
                        <input type="text" class="form-control" name="" placeholder="Search...">
                      </div>
                    </div>
                    <p class="font-size-20 blue-grey-700">Statistic</p>
                    <p class="blue-grey-400">Status: live</p>
                    <p>
                      <i class="icon wb-map blue-grey-400 mr-10" aria-hidden="true"></i>
                      <span>258 Countries, 4835 Cities</span>
                    </p>
                    <ul class="list-unstyled mt-20">
                      <li>
                        <p>VISITS</p>
                        <div class="progress progress-xs mb-25">
                          <div class="progress-bar progress-bar-info bg-blue-600" style="width: 70.3%" aria-valuemax="100"
                            aria-valuemin="0" aria-valuenow="70.3" role="progressbar">
                            <span class="sr-only">70.3%</span>
                          </div>
                        </div>
                      </li>
                      <li>
                        <p>TODAY</p>
                        <div class="progress progress-xs mb-25">
                          <div class="progress-bar progress-bar-info bg-green-600" style="width: 70.3%" aria-valuemax="100"
                            aria-valuemin="0" aria-valuenow="70.3" role="progressbar">
                            <span class="sr-only">70.3%</span>
                          </div>
                        </div>
                      </li>
                      <li>
                        <p>WEEK</p>
                        <div class="progress progress-xs mb-0">
                          <div class="progress-bar progress-bar-info bg-purple-600" style="width: 70.3%"
                            aria-valuemax="100" aria-valuemin="0" aria-valuenow="70.3"
                            role="progressbar">
                            <span class="sr-only">70.3%</span>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Widget Statistic -->
          </div>

          <div class="col-xxl-4 col-lg-12">
            <div class="row h-full">
              <div class="col-xxl-12 col-lg-6 h-p50 h-only-lg-p100 h-only-xl-p100">
                <!-- Widget Linepoint -->
                <div class="card card-inverse card-shadow bg-blue-600 white" id="widgetLinepoint">
                  <div class="card-block p-0">
                    <div class="pt-25 px-30">
                      <div class="row no-space">
                        <div class="col-6">
                          <p>Today Sale's</p>
                          <p class="blue-200">Last Sale 23.45 USD</p>
                        </div>
                        <div class="col-6 text-right">
                          <p class="font-size-30 text-nowrap">450 USD</p>
                        </div>
                      </div>
                    </div>
                    <div class="ct-chart h-120"></div>
                  </div>
                </div>
                <!-- End Widget Linepoint -->
              </div>
              <div class="col-xxl-12 col-lg-6 h-p50 h-only-lg-p100 h-only-xl-p100">
                <!-- Widget Sale Bar -->
                <div class="card card-inverse card-shadow bg-purple-600 white" id="widgetSaleBar">
                  <div class="card-block p-0">
                    <div class="pt-25 px-30">
                      <div class="row no-space">
                        <div class="col-6">
                          <p>Month Sale's</p>
                          <p class="purple-200">2% higher than last month</p>
                        </div>
                        <div class="col-6 text-right">
                          <p class="font-size-30 text-nowrap">$ 14,500</p>
                        </div>
                      </div>
                    </div>
                    <div class="ct-chart h-120"></div>
                  </div>
                </div>
                <!-- End Widget Sale Bar -->
              </div>
            </div>
          </div>

          <div class="col-xxl-6 col-lg-12">
            <!-- Widget OVERALL VIEWS -->
            <div class="card card-shadow card-responsive" id="widgetOverallViews">
              <div class="card-block p-30">
                <div class="row pb-30" style="height:calc(100% - 250px);">
                  <div class="col-sm-4">
                    <div class="counter counter-md text-left">
                      <div class="counter-label">OVERALL VIEWS</div>
                      <div class="counter-number-group text-truncate">
                        <span class="counter-number-related red-600">$</span>
                        <span class="counter-number red-600">432,852</span>
                      </div>
                      <div class="counter-label">2% higher than last month</div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="counter counter-sm text-left inline-block">
                      <div class="counter-label">MY BALANCE</div>
                      <div class="counter-number-group">
                        <span class="counter-number-related">$</span>
                        <span class="counter-number">12,346</span>
                      </div>
                    </div>
                    <div class="ct-chart inline-block small-bar-one"></div>
                  </div>
                  <div class="col-sm-4">
                    <div class="counter counter-sm text-left inline-block">
                      <div class="counter-label">NEW ORDERS</div>
                      <div class="counter-number-group">
                        <span class="counter-number-related">$</span>
                        <span class="counter-number">17,555</span>
                      </div>
                    </div>
                    <div class="ct-chart inline-block small-bar-two"></div>
                  </div>
                </div>
                <div class="ct-chart line-chart h-250"></div>
              </div>
            </div>
            <!-- End Widget OVERALL VIEWS -->
          </div>

          <div class="col-xxl-6 col-lg-12">
            <!-- Widget Timeline -->
            <div class="card card-shadow card-responsive" id="widgetTimeline">
              <div class="card-block p-0">
                <div class="p-30" style="height:120px;">
                  <div class="row">
                    <div class="col-4">
                      <div class="counter text-left">
                        <div class="counter-label blue-grey-700">Total usage</div>
                        <div class="counter-number-group">
                          <span class="counter-number red-600">21,451</span>
                          <span class="counter-number-related red-600">MB</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="counter text-left">
                        <div class="counter-label">Currently</div>
                        <div class="counter-number-group">
                          <span class="counter-number">227.34</span>
                          <span class="counter-number-related">KB</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="counter text-left">
                        <div class="counter-label">Average</div>
                        <div class="counter-number-group">
                          <span class="counter-number">117.65</span>
                          <span class="counter-number-related">MB</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <ul class="list-unstyled pb-50 mb-0" style="height:calc(100% - 270px);">
                  <li class="px-30 py-15 container-fluid">
                    <div class="row">
                      <div class="col-3">Mail App</div>
                      <div class="col-6">210,685 users are using</div>
                      <div class="col-3 green-600">227.34KB</div>
                    </div>
                  </li>
                  <li class="px-30 py-15 container-fluid">
                    <div class="row">
                      <div class="col-3">Calendar</div>
                      <div class="col-6">10,685 users are using</div>
                      <div class="col-3 green-600">128.62KB</div>
                    </div>
                  </li>
                </ul>
                <div class="ct-chart h-150"></div>
              </div>
            </div>
            <!-- End Widget Timeline -->
          </div>

          <div class="col-xxl-6 col-lg-12">
            <!-- Panel California -->
            <div class="card card-shadow" id="widgetWeather">
              <div class="row no-space">
                <div class="col-md-7">
                  <div class="p-35 text-center">
                    <h4>California, Usa</h4>
                    <p class="blue-grey-400 mb-35">MONDAY MAY 11, 2017</p>
                    <canvas id="widgetSunny" height="60" width="60"></canvas>
                    <div class="font-size-40 red-600">
                      26°
                      <span class="font-size-30">C</span>
                    </div>
                    <div>Sunday</div>
                  </div>
                  <div class="weather-times p-30">
                    <div class="row no-space text-center">
                      <div class="col-3">
                        <div class="weather-day vertical-align">
                          <div class="vertical-align-middle">
                            <div class="mb-5">12:00</div>
                            <i class="wi-day-cloudy font-size-24 mb-5"></i>
                            <div class="red-600">24°
                              <span class="font-size-12">C</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="weather-day vertical-align">
                          <div class="vertical-align-middle">
                            <div class="mb-5">12:30</div>
                            <i class="wi-day-sunny font-size-24 mb-5"></i>
                            <div class="red-600">26°
                              <span class="font-size-12">C</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="weather-day vertical-align">
                          <div class="vertical-align-middle">
                            <div class="mb-5">13:00</div>
                            <i class="wi-day-sunny font-size-24 mb-5"></i>
                            <div class="red-600">28°
                              <span class="font-size-12">C</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="weather-day vertical-align">
                          <div class="vertical-align-middle">
                            <div class="mb-5">13:30</div>
                            <i class="wi-day-sunny font-size-24 mb-5"></i>
                            <div class="red-600">30°
                              <span class="font-size-12">C</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-5 bg-blue-grey-100">
                  <div class="weather-list">
                    <ul class="list-unstyled m-0">
                      <li class="container-fluid">
                        <div class="row no-space">
                          <div class="col-4">
                            SUN
                          </div>
                          <div class="col-4">
                            <i class="wi-day-cloudy font-size-24"></i>
                          </div>
                          <div class="col-4">
                            24 - 26
                          </div>
                        </div>
                      </li>
                      <li class="container-fluid">
                        <div class="row no-space">
                          <div class="col-4">
                            SUN
                          </div>
                          <div class="col-4">
                            <i class="wi-day-cloudy font-size-24"></i>
                          </div>
                          <div class="col-4">
                            24 - 26
                          </div>
                        </div>
                      </li>
                      <li class="container-fluid">
                        <div class="row no-space">
                          <div class="col-4">
                            SUN
                          </div>
                          <div class="col-4">
                            <i class="wi-day-cloudy font-size-24"></i>
                          </div>
                          <div class="col-4">
                            24 - 26
                          </div>
                        </div>
                      </li>
                      <li class="container-fluid">
                        <div class="row no-space">
                          <div class="col-4">
                            SUN
                          </div>
                          <div class="col-4">
                            <i class="wi-day-cloudy font-size-24"></i>
                          </div>
                          <div class="col-4">
                            24 - 26
                          </div>
                        </div>
                      </li>
                      <li class="container-fluid">
                        <div class="row no-space">
                          <div class="col-4">
                            SUN
                          </div>
                          <div class="col-4">
                            <i class="wi-day-cloudy font-size-24"></i>
                          </div>
                          <div class="col-4">
                            24 - 26
                          </div>
                        </div>
                      </li>
                      <li class="container-fluid">
                        <div class="row no-space">
                          <div class="col-4">
                            SUN
                          </div>
                          <div class="col-4">
                            <i class="wi-day-cloudy font-size-24"></i>
                          </div>
                          <div class="col-4">
                            24 - 26
                          </div>
                        </div>
                      </li>
                      <li class="container-fluid">
                        <div class="row no-space">
                          <div class="col-4">
                            SUN
                          </div>
                          <div class="col-4">
                            <i class="wi-day-cloudy font-size-24"></i>
                          </div>
                          <div class="col-4">
                            24 - 26
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Panel California -->
          </div>

          <div class="col-xxl-3 col-lg-6">
            <!-- Panel Watchlist -->
            <div class="card card-shadow" id="widgetTable">
              <div class="card-block p-30">
                <h3 class="card-title">
                  <span class="text-truncate">Watch List</span>
                  <div class="card-header-actions">
                    <span class="red-600 font-size-24">$ 102,967</span>
                  </div>
                </h3>
                <form class="mt-25" action="#" role="search">
                  <div class="input-search input-search-dark">
                    <i class="input-search-icon wb-search" aria-hidden="true"></i>
                    <input type="text" class="form-control" placeholder="Search.." />
                  </div>
                </form>
              </div>
              <div class="h-350" data-plugin="scrollable">
                <div data-role="container">
                  <div data-role="content">
                    <table class="table mb-0">
                      <tbody>
                        <tr>
                          <td>GMY</td>
                          <td>$ 9,500</td>
                          <td class="green-600">+ 458</td>
                        </tr>
                        <tr>
                          <td>KPM</td>
                          <td>$ 15,425</td>
                          <td class="red-600">- 1,632</td>
                        </tr>
                        <tr>
                          <td>PTR</td>
                          <td>$ 11,540</td>
                          <td class="green-600">+ 8,326</td>
                        </tr>
                        <tr>
                          <td>HGM</td>
                          <td>$ 15,855</td>
                          <td class="green-600">+ 11,326</td>
                        </tr>
                        <tr>
                          <td>MKR</td>
                          <td>$ 18,500</td>
                          <td class="red-600">- 6,586</td>
                        </tr>
                        <tr>
                          <td>GMY</td>
                          <td>$ 9,500</td>
                          <td class="green-600">+ 458</td>
                        </tr>
                        <tr>
                          <td>KPM</td>
                          <td>$ 15,425</td>
                          <td class="red-600">- 1,632</td>
                        </tr>
                        <tr>
                          <td>PTR</td>
                          <td>$ 11,540</td>
                          <td class="green-600">+ 8,326</td>
                        </tr>
                        <tr>
                          <td>HGM</td>
                          <td>$ 15,855</td>
                          <td class="green-600">+ 11,326</td>
                        </tr>
                        <tr>
                          <td>MKR</td>
                          <td>$ 18,500</td>
                          <td class="red-600">- 6,586</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Panel Watchlist -->
          </div>

          <div class="col-xxl-3 col-lg-6">
            <!-- Widget Linepoint -->
            <div class="card card-shadow" id="widgetLinepointDate">
              <div class="card-block p-30">
                <h3 class="card-title">Sales Analysis
                  <div class="card-header-actions">
                    <span class="badge badge-dark badge-round">View</span>
                  </div>
                </h3>
                <div class="row text-center my-25">
                  <div class="col-4">
                    <div class="counter">
                      <div class="counter-label">TOTAL</div>
                      <div class="counter-number red-600">20,186</div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="counter">
                      <div class="counter-label">TODAY</div>
                      <div class="counter-number red-600">36</div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="counter">
                      <div class="counter-label">WEEK</div>
                      <div class="counter-number red-600">261</div>
                    </div>
                  </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
                  nec odio. Praesent libero.</p>
              </div>
              <div class="ct-chart h-150"></div>
            </div>
            <!-- End Widget Linepoint -->
          </div>
        </div>
      </div>
    </div>
    <!-- End Page -->
@stop


@section('pages_script')
<script src="{{URL::asset('admin/assets/js/Site.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/asscrollable.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/slidepanel.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/switchery.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/matchheight.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/jvectormap.js')}}"></script>
<script src="{{URL::asset('admin/assets/examples/js/dashboard/v1.jss')}}"></script>

@stop
