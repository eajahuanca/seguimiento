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

            @if(Auth::user()->us_tipo != "EJECUTOR")
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

            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-gear"></i> <span>Aprob. de Prog. & Proy.</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if(Auth::user()->us_tipo == "TECNICO PLANIFICACION")
                    <li>
                        <a href="{{ url('/listar') }}">
                            <i class="fa fa-gg-circle"></i> <span>Solicitud</span>
                        </a>
                    </li>
                    @endif
                    
                    @if(Auth::user()->us_tipo == "JEFE PLANIFICACION" || Auth::user()->us_tipo == "ADMINISTRACION FINANCIERA")
                    <li>
                        <a href="{{ url('/evaluacion') }}">
                            <i class="fa fa-gg-circle"></i> <span>Evaluación de Solicitud</span>
                        </a>
                    </li>
                    @if(Auth::user()->us_tipo == "JEFE PLANIFICACION")
                    <li>
                        <a href="{{ url('/pcomite') }}">
                            <i class="fa fa-gg-circle"></i> <span>Comite de Planificación</span>
                        </a>
                    </li>
                    @endif
                    @endif

                    @if(Auth::user()->us_tipo == "ASESOR LEGAL")
                    <li>
                        <a href="{{ url('/evaluacion') }}">
                            <i class="fa fa-gg-circle"></i> <span>Aprobación del Comite</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/convenio') }}">
                            <i class="fa fa-gg-circle"></i> <span>Firma de Convenio</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>

            @if(Auth::user()->us_tipo == "TECNICO PLANIFICACION")
            <li>
                <a href="{{ url('/seguimiento') }}">
                    <i class="fa fa-bars"></i> <span>Seguimiento de Proyectos</span>
                </a>
            </li>
            @endif

            <li>
                <a href="{{ url('/autorizacion') }}">
                    <i class="fa fa-bars"></i> <span>Autorización de Desembolso</span>
                </a>
            </li>

            <!--<li class="treeview">
                <a href="#">
                    <i class="fa fa-gear"></i> <span>Formulario de Seguimiento</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('/formulario') }}">
                            <i class="fa fa-bars"></i> <span>1er. Formulario</span>
                        </a>
                    </li>
                </ul>
            </li>-->
            @endif
            <li>
                <a href="{{ url('/ejecutor') }}">
                    <i class="fa fa-bars"></i> <span>Seguimiento Ejecutor</span>
                </a>
            </li>
            @if(Auth::user()->us_tipo != "EJECUTOR")
            <li>
                <a href="{{ url('/presupuesto') }}">
                    <i class="fa "><b>Bs</b></i> <span>Techo Presupuestario</span>
                </a>
            </li>

            <li>
                <a href=".">
                    <i class="fa fa-indent"></i> <span>Monitoreo de Proyectos</span>
                </a>
            </li>
            <li>
                <a href=".">
                    <i class="fa fa-object-ungroup"></i> <span>Cierre de Proyectos</span>
                </a>
            </li>
            <li>
                <a href=".">
                    <i class="fa fa-paper-plane-o"></i> <span>Auditoria de Proyectos</span>
                </a>
            </li>
            @if(Auth::user()->us_tipo == "ADMINISTRADOR DEL SISTEMA")
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gear"></i> <span>Parametrizaciones</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href=".">
                            <i class="fa fa-user"></i> <span>Usuarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/entidad') }}">
                            <i class="fa fa-bars"></i> <span>Entidades</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/provincia') }}">
                            <i class="fa fa-bars"></i> <span>Provincias</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/municipio') }}">
                            <i class="fa fa-bars"></i> <span>Municipios</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/reglamento') }}">
                            <i class="fa fa-bars"></i> <span>Reglamentos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/componente') }}">
                            <i class="fa fa-bars"></i> <span>Componentes</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>