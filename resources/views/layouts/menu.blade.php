<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset(Auth::user()->us_foto) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->us_cuenta }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Menú de Navegación</li>

            <li>
                <a href="{{ url('/home') }}">
                    <i class="fa fa-home"></i> <span>Dashbord</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/home') }}">
                    <i class="fa fa-legal"></i> <span>Base Legal</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gear"></i> <span>Aprob. de Prog. & Proy.</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('/listar') }}">
                            <i class="fa fa-gg-circle"></i> <span>Solicitud</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/home') }}">
                            <i class="fa fa-gg-circle"></i> <span>Evaluación de Solicitud</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/home') }}">
                            <i class="fa fa-gg-circle"></i> <span>Aprobación del Comite</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/home') }}">
                            <i class="fa fa-gg-circle"></i> <span>Firma de Convenio</span>
                        </a>
                    </li>        
                </ul>
            </li>

            <li>
                <a href="{{ url('/entidad') }}">
                    <i class="fa fa-bars"></i> <span>Seguimiento de Proyectos</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/unidad') }}">
                    <i class="fa fa-indent"></i> <span>Monitoreo de Proyectos</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/provincia') }}">
                    <i class="fa fa-object-ungroup"></i> <span>Cierre de Proyectos</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/municipio') }}">
                    <i class="fa fa-paper-plane-o"></i> <span>Auditoria de Proyectos</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gear"></i> <span>Parametrizaciones</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('/entidad') }}">
                            <i class="fa fa-bullseye"></i> <span>Usuarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/entidad') }}">
                            <i class="fa fa-indent"></i> <span>Entidades</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/provincia') }}">
                            <i class="fa fa-object-ungroup"></i> <span>Provincias</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/municipio') }}">
                            <i class="fa fa-paper-plane-o"></i> <span>Municipios</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>