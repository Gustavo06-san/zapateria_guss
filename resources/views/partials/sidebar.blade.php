<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="{{ route('home') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-home"></i></div>
                    Inicio
                </a>

                <div class="sb-sidenav-menu-heading">Contenido</div>
                <a class="nav-link" href="{{ route('clientes') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                    Clientes
                </a>
                <a class="nav-link" href="{{ route('productos') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-shopping-cart"></i></div>
                    Productos
                </a>
                <a class="nav-link" href="{{ route('ventas') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-money-bill"></i></div>
                    Ventas
                </a>
                <a class="nav-link" href="{{ route('detalles') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-info-circle"></i></div>
                    Detalles
                </a>

                {{-- <div class="sb-sidenav-menu-heading">Ajustes</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a> --}}
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Zapateria Guss
        </div>
    </nav>
</div>