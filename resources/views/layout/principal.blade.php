
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />

    <title>Gestion salas</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sistema Integral de Juicio en Linea" name="Sistema Integral de Juicio en Linea" />

    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="icon" sizes="200x200" href="{{ asset('img/logo.png') }}">

    <!-- Table datatable css -->


    <link rel="stylesheet" href="{{asset('styles/libs/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/libs/datatables/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/libs/datatables/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/libs/datatables/select.bootstrap4.min.css')}}">





    <!-- App css -->
    <link rel="stylesheet" href="{{asset('styles/libs/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('styles/libs/dropify/dropify.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/libs/custombox/custombox.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/libs/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/libs/multiselect/multi-select.css')}}">
    <link rel="stylesheet" href="{{asset('styles/css/icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/css/app.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">

    <link rel="stylesheet" href="{{asset('styles/libs/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/libs/datatables/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/libs/datatables/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/libs/datatables/select.bootstrap4.min.css')}}">

    <script src="{{asset("js/app.js")}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/vendor/jquery.min.js')}}"></script>
    <script src="{{asset('js/vendor/bootstrap.js')}}"></script>
    <script src="{{asset('js/vendor/bootstrap.bundle.js')}}"></script>

    <!-- SWEET ALERT -->
    <script src="{{asset('styles/libs/sweetalert2/sweetalert2.min.css')}}"></script>


    <!-- Plugins css -->
    <link rel="stylesheet" href="{{asset('styles/libs/switchery/switchery.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/libs/jstree/style.css')}}">
    <link rel="stylesheet" href="{{asset('styles/libs/fullcalendar/fullcalendar.min.css')}}">






</head>

<body onload="Home();">

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="d-none d-sm-inline-block ml-1 font-weight-medium" id="etiq_name">Inicia
                            Sesión</span>
                        <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow text-white m-0">Bienvenido !</h6>
                        </div>

                        <!-- item-->


                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="/auth/logout" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout-variant"></i>
                            <span>Iniciar sesión</span>
                        </a>

                        <!-- item-->
                        <a href="/auth/register" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout-variant"></i>
                            <span>Registrarse</span>
                        </a>

                    </div>
                </li>
            </ul>


            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect waves-light">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>




            </ul>

            <h3 style="color: white;padding-top: 10px;">Sistema Integral de Manejo de Expedientes</h3>


        </div>
        <!-- end Topbar -->


        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="slimscroll-menu">

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul class="metismenu" id="side-menu">

                        <li class="menu-title">Navegación</li>

                        <li>
                            <a href="javascript: void(0);">
                                <i class="ion ion-md-business"></i>
                                <span>Gestión de salas </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="/salas">Salas</a></li>

                            </ul>

                        </li>




                    </ul>

                </div>

                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">










            <div class="content" id="contenido">


                @yield('contenido')


                <!-- Start Content-->



            </div> <!-- end content -->



            <!-- Footer Start -->

            <!-- end Footer -->

        </div>
        <div class="modal fade" id="modal_temp">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">

                    </div>

                    <!-- Modal body -->
                    <div class="modal-body" id="modal_content">

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <script src="{{asset('styles/libs/sweetalert2/sweetalert2.min.css')}}"></script>


    <!-- Plugins css -->
    <link rel="stylesheet" href="{{asset('styles/libs/switchery/switchery.min.css')}}">
    <!-- END wrapper -->

    <!-- Right Sidebar -->

    <!-- Plugin js-->
    <script src="{{asset('styles/libs/parsleyjs/parsley.min.js')}}"></script>
    <!-- Vendor js -->
    <script src="{{asset('styles/js/vendor.min.js')}}"></script>
    <script src="{{asset('styles/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('styles/libs/multiselect/jquery.multi-select.js')}}"></script>
    <script src="{{asset('styles/libs/select2/select2.min.js')}}"></script>
    <script src="{{asset('styles/libs/jquery-mockjax/jquery.mockjax.min.js')}}"></script>
    <script src="{{asset('styles/libs/custombox/custombox.min.js')}}"></script>

    <script src="{{asset('styles/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('styles/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <script src="{{asset('styles/libs/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('styles/libs/datatables/responsive.bootstrap4.min.js')}}"></script>

    <script src="{{asset('styles/libs/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('styles/libs/datatables/buttons.bootstrap4.min.js')}}"></script>

    <script src="{{asset('styles/libs/jszip/jszip.min.js')}}"></script>

    <script src="{{asset('styles/libs/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('styles/libs/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('styles/libs/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('styles/libs/datatables/buttons.print.min.js')}}"></script>
    <script src="{{asset('styles/libs/datatables/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('styles/libs/datatables/dataTables.select.min.js')}}"></script>
    <script src="{{asset('styles/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <!-- Datatables init -->
    <script src="{{asset('styles/js/pages/datatables.init.js')}}"></script>
  <!-- App js -->
  <script src="{{asset('styles/js/pages/form-advanced.init.js')}}"></script>
  <script src="{{asset('styles/libs/dropify/dropify.min.js')}}"></script>
  <script src="{{asset('styles/js/pages/form-fileuploads.init.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('styles/js/app.min.js')}}"></script>
    <!-- Validation init js-->
    <script src="{{asset('styles/js/pages/form-validation.init.js')}}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{asset('styles/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <!-- Sweet alert init js-->
    <script src="{{asset('styles/js/pages/sweet-alerts.init.js')}}"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/sweetalert2@10')}}"></script>

    <script src="{{asset('styles/libs/switchery/switchery.min.js')}}"></script>
    <script src="{{asset('styles/libs/jquery-quicksearch/jquery.quicksearch.min.js')}}"></script>
    <script src="{{asset('styles/libs/autocomplete/jquery.autocomplete.min.js')}}"></script>
    <script src="{{asset('styles/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>

    <!-- jstree js -->
    <script src="{{asset('assets/libs/jstree/jstree.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/treeview.init.js')}}"></script>


    <!--Form Wizard-->
    <script src="{{asset('assets/libs/jquery-steps/jquery.steps.min.js')}}"></script>
    <script src="{{asset('assets/libs/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/form-wizard.init.js')}}"></script>

    <!--CK EDITOR-->
    <script src="{{asset('assets/vendor/ckeditor/ckeditor.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{asset('assets/libs/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
    <script src="{{asset('assets/libs/autonumeric/autoNumeric.min.js')}}"></script>

    <!-- plugin js -->
    <script src="{{asset('assets/libs/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/libs/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/libs/fullcalendar/fullcalendar.min.js')}}"></script>

    <!-- Calendar init -->
    <script src="{{asset('assets/js/pages/calendar.init.js')}}"></script>


    <!--Morris Chart-->
    <script src="{{asset('assets/libs/morris-js/morris.min.js')}}"></script>
    <script src="{{asset('assets/libs/raphael/raphael.min.js')}}"></script>



    <!-- Dashboard init js-->
    <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>










    @yield('javascript')






</body>

</html>
