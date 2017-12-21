@extends('layouts.master')

@section('menu')
@include('layouts.menu.administrator')
@stop

@section('style')
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/jquery-wizard/jquery-wizard.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/formvalidation/formValidation.css')}}">
        <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/blueimp-file-upload/jquery.fileupload.css')}}">
        <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/dropify/dropify.css')}}">

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
                              <a href="advanced/animation.html">Animation</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a href="uikit/buttons.html">Buttons</a>
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
          <div class="col-xxl-12 col-lg-12">
            <!-- Widget Linearea Color -->
            <div class="card card-shadow card-responsive" id="widgetLineareaColor">
              <div class="card-block p-0">
                    <div class="panel" id="exampleWizardFormContainer">
                  <div class="panel-heading">
                    <h3 class="panel-title">Editar Usuario</h3>
                  </div>
                  <div class="panel-body">
                    <!-- Steps -->
                    <div class="pearls row">
                      <div class="pearl current col-6">
                        <div class="pearl-icon"><i class="icon wb-home" aria-hidden="true"></i></div>
                        <span class="pearl-title">Datos del Usuario</span>
                      </div>
                      <div class="pearl col-6">
                        <div class="pearl-icon"><i class="icon wb-user" aria-hidden="true"></i></div>
                        <span class="pearl-title">Confirmacion</span>
                      </div>
                    </div>
                    <!-- End Steps -->

                    <!-- Wizard Content -->
                    <form id="exampleFormContainer" method="POST" enctype="multipart/form-data">
                      <div class="wizard-content">
                        <div class="wizard-pane active" id="exampleAccountOne" role="tabpanel">
                          <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                          <input type="hidden" name="userId" value="{{$user->id}}" />
                          <div class="row">
                            <div class="col-xxl-6 col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="inputUserNameOne">Nombres</label>
                                <input type="text" class="form-control" id="inputPasswordOne" name="name" value="{{$user->name}}" required="required">
                              </div>
                            </div>
                            <div class="col-xxl-6 col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="inputUserNameOne">Apellidos</label>
                                <input type="text" class="form-control" id="inputPasswordOne" name="lastname" value="{{$user->lastName}}" required="required">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xxl-6 col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="inputUserNameOne">Municipio / Ciudad</label>
                                <select class="form-control" data-plugin="select2" name="cityUser">
                                  <option value="{{$user->city}}">{{$user->city}}</option>
                                  <option value="Apartado">Apartadó</option>
                                  <option value="Armenia">Armenia</option>
                                  <option value="Barrancabermeja">Barrancabermeja</option>
                                  <option value="Barranquilla">Barranquilla</option>
                                  <option value="Bello">Bello</option>
                                  <option value="Bogota">Bogotá</option>
                                  <option value="Bucaramanga">Bucaramanga</option>
                                  <option value="Buenaventura">Buenaventura</option>
                                  <option value="Buga">Buga</option>
                                  <option value="Cali">Cali</option>
                                  <option value="Cartagena">Cartagena</option>
                                  <option value="Cartago">Cartago</option>
                                  <option value="Caucasia">Caucasia</option>
                                  <option value="Cucuta">Cúcuta</option>
                                  <option value="Facatativa">Facatativá</option>
                                  <option value="Florencia">Florencia</option>
                                  <option value="Floridablanca">Floridablanca</option>
                                  <option value="Girardot">Girardot</option>
                                  <option value="Ibague">Ibagué</option>
                                  <option value="Inrida">Inrida</option>
                                  <option value="Ipiales">Ipiales</option>
                                  <option value="Jamundi">Jamundí</option>
                                  <option value="Leticia">Leticia</option>
                                  <option value="Manizales">Manizales</option>
                                  <option value="Medellin">Medellin</option>
                                  <option value="Mitu">Mitú</option>
                                  <option value="Mocoa">Mocoa</option>
                                  <option value="Monteria">Montería</option>
                                  <option value="Neiva">Neiva</option>
                                  <option value="Ocaña">Ocaña</option>
                                  <option value="Palmira">Palmira</option>
                                  <option value="Pamplona">Pamplona</option>
                                  <option value="Pasto">Pasto</option>
                                  <option value="Pereira">Pereira</option>
                                  <option value="Popayan">Popayán</option>
                                  <option value="PuertoCarreño">Puerto Carreño</option>
                                  <option value="Quibdo">Quibdó</option>
                                  <option value="Rioacha">Rioacha</option>
                                  <option value="SanJosedelGuaviare">San Jose del Guaviare</option>
                                  <option value="SanJuanGiron">San Juan Girón</option>
                                  <option value="Santa Marta">Santa Marta</option>
                                  <option value="Sincelejo">Sincelejo</option>
                                  <option value="Soacha">Soacha</option>
                                  <option value="Sogamoso">Sogamoso</option>
                                  <option value="Soledad">Soledad</option>
                                  <option value="Tulua">Tuluá</option>
                                  <option value="Tumaco">Tumaco</option>
                                  <option value="Tunja">Tunja</option>
                                  <option value="Valledupar">Valledupar</option>
                                  <option value="Villavicencio">Villavicencio</option>
                                  <option value="Yopal">Yopal</option>
                                  </select>
                              </div>
                            </div>
                            <div class="col-xxl-6 col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="inputUserNameOne">Telefono</label>
                                <input type="text" class="form-control" id="inputPasswordOne" name="phone" value="{{$user->phone}}" required="required">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xxl-6 col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="inputUserNameOne">Correo Electronico</label>
                                <input type="text" class="form-control" id="inputPasswordOne" name="email" value="{{$user->email}}" required="required">
                              </div>
                            </div>
                            <div class="col-xxl-6 col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="inputUserNameOne">Usuario</label>
                                <input type="text" class="form-control" id="inputPasswordOne" name="username" value="{{$user->username}}" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xxl-6 col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="inputUserNameOne">Contraseña</label>
                                <input type="password" class="form-control" id="inputPasswordOne" name="password">
                              </div>
                            </div>
                            <div class="col-xxl-6 col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="inputUserNameOne">Confirmacion Contraseña</label>
                                <input type="password" class="form-control" id="inputPasswordOne" name="repassword">
                              </div>
                            </div>
                          </div>
                          <label class="form-control-label" for="inputUserNameOne">Imagen de perfil</label>
                          <div class="row">
                            <div class="col-xxl-6 col-lg-6">
                              <div class="form-group">
                                <input name="profileImage" type="file" accept=".jpg, .jpeg, .png"/>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="wizard-pane" id="exampleBillingOne" role="tabpanel">
                          <div class="text-center my-20">
                            <h4>Please confrim your order.</h4>
                            <input type="submit" name="sendForm" id="sendForm" value="Enviar" style="display:none;"/>
                          </div>
                        </div>
                      </div>
                    </form>
                    <!-- Wizard Content -->
                  </div>
                </div>
              </div>
            </div>
            <!-- End Widget Linearea Color -->
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
<script src="{{URL::asset('admin/assets/examples/js/dashboard/v1.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/jquery-wizard/jquery-wizard.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/formvalidation/formValidation.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/formvalidation/framework/bootstrap.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/matchheight/jquery.matchHeight-min.js')}}"></script>
        <script src="{{URL::asset('admin/global/js/Plugin/jquery-wizard.js')}}"></script>
        <script src="{{URL::asset('admin/global/js/Plugin/matchheight.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/jquery-ui/jquery-ui.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/blueimp-tmpl/tmpl.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/blueimp-canvas-to-blob/canvas-to-blob.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/blueimp-load-image/load-image.all.min.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/blueimp-file-upload/jquery.fileupload.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/blueimp-file-upload/jquery.fileupload-process.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/blueimp-file-upload/jquery.fileupload-image.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/blueimp-file-upload/jquery.fileupload-audio.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/blueimp-file-upload/jquery.fileupload-video.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/blueimp-file-upload/jquery.fileupload-validate.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/blueimp-file-upload/jquery.fileupload-ui.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/dropify/dropify.min.js')}}"></script>
        <script type="text/javascript">

        $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
           }
        });

        (function (global, factory) {
          if (typeof define === "function" && define.amd) {
            define('/forms/wizard', ['jquery', 'Site'], factory);
          } else if (typeof exports !== "undefined") {
            factory(require('jquery'), require('Site'));
          } else {
            var mod = {
              exports: {}
            };
            factory(global.jQuery, global.Site);
            global.formsWizard = mod.exports;
          }
        })(this, function (_jquery, _Site) {
          'use strict';

          var _jquery2 = babelHelpers.interopRequireDefault(_jquery);

          (0, _jquery2.default)(document).ready(function ($$$1) {
            (0, _Site.run)();
          });


          // Example Wizard Form Container
          // -----------------------------
          // http://formvalidation.io/api/#is-valid-container
          (function () {
            var defaults = Plugin.getDefaults("wizard");

            var options = _jquery2.default.extend(true, {}, defaults, {
              onInit: function onInit() {
                (0, _jquery2.default)('#exampleFormContainer').formValidation({
                  framework: 'bootstrap',
                  fields: {
                  password: {
                      validators: {
                          identical: {
                              field: 'repassword',
                              message: 'La contraseña no coincide'
                          }
                      }
                  },repassword: {
                      validators: {
                          identical: {
                              field: 'password',
                              message: 'La contraseña no coincide'
                          }
                      }
                    },
                    name: {
                      validators: {
                        notEmpty: {
                          message: 'Dijite sus nombres'
                        }
                      }
                    },lastname: {
                      validators: {
                        notEmpty: {
                          message: 'Dijite sus apellidos'
                        }
                      }
                    },phone: {
                      validators: {
                        notEmpty: {
                          message: 'Dijite su telefono'
                        }
                      }
                    },cityUser: {
                      validators: {
                        notEmpty: {
                          message: 'Dijite su Ciudad'
                        }
                      }
                    },email: {
                      validators: {
                        notEmpty: {
                          message: 'Dijite su Correo Electronico'
                        }
                      }
                    },username: {
                      validators: {
                        notEmpty: {
                          message: 'Dijite su Usuario'
                        }
                      }
                    }
                  },
                  err: {
                    clazz: 'invalid-feedback'
                  },
                  control: {
                    // The CSS class for valid control
                    valid: 'is-valid',

                    // The CSS class for invalid control
                    invalid: 'is-invalid'
                  },
                  row: {
                    invalid: 'has-danger'
                  }
                });
              },
              validator: function validator() {
                var fv = (0, _jquery2.default)('#exampleFormContainer').data('formValidation');

                var $this = (0, _jquery2.default)(this);

                // Validate the container
                fv.validateContainer($this);

                var isValidStep = fv.isValidContainer($this);
                if (isValidStep === false || isValidStep === null) {
                  return false;
                }

                return true;
              },
              onFinish: function onFinish() {
                // $('#exampleFormContainer').submit();
                $("#sendForm").trigger("click");
              },
              buttonsAppendTo: '.panel-body'
            });

            (0, _jquery2.default)("#exampleWizardFormContainer").wizard(options);
          })();
        });
        $(document).ready(function() {
        // Instrucciones a ejecutar al terminar la carga
        Dropzone.options.myAwesomeDropzone = {
            images: "file", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            accept: function(file, done) {
              if (file.name == "justinbieber.jpg") {
                done("Naha, you don't.");
              }
              else { done(); }
            }
          };
        });
        </script>
@stop
