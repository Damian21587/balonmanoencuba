<li class="nav-item has-treeview {{request()->routeIs('admin.manager.*') ? 'menu-open' :  ''}}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-briefcase"></i>
        <p>
            Administración
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        @can('users.index')
            <li class="nav-item">
                <a href="{!! route('admin.manager.usuarios.index') !!}"
                   class="nav-link {{request()->routeIs('admin.manager.usuarios*') ? 'active' :  ''}}"><i
                            class="fa fa-user"></i>
                    <span>Usuarios</span>
                </a>
            </li>
        @endcan
        @can('roles.index')
            <li class="nav-item">
                <a href="{!! route('admin.manager.roles.index') !!}"
                   class="nav-link {{request()->routeIs('admin.manager.roles*') ? 'active' :  ''}}"><i
                            class="fa fa-cog"></i>
                    <span>Roles</span>
                </a>
            </li>
        @endcan
    </ul>
</li>
<li class="nav-item has-treeview {{request()->routeIs('admin.content.*') ? 'menu-open' :  ''}}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        {{--<i class="fa fa- fa-slideshare "></i>--}}
        <p>
            Contenido
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @can('jugadores.index')
            <li class="nav-item">
                <a href="{{ route('admin.content.jugadores.index') }}"
                   class="nav-link {{request()->routeIs('admin.content.jugadores*') ? 'active' :  ''}}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Jugadores</p>
                </a>
            </li>
        @endcan
        @can('contactos.index')
            <li class="nav-item">
                <a href="{{ route('admin.content.contactos.index') }}"
                   class="nav-link {{request()->routeIs('admin.content.contactos*') ? 'active' :  ''}}">
                    <i class="nav-icon fas fa-journal-whills"></i>
                    <span>Contacto</span>
                </a>
            </li>
        @endcan
        @can('quienes-somos.index')
            <li class="nav-item">
                <a href="{{ route('admin.content.quienes-somos.index') }}"
                   class="nav-link {{request()->routeIs('admin.content.quienes-somos*') ? 'active' :  ''}}">
                    <i class="nav-icon fas fa-file"></i>
                    <span>Quíenes Somos</span>
                </a>
            </li>
        @endcan
        @can('noticias.index')
            <li class="nav-item">
                <a href="{{ route('admin.content.noticias.index') }}"
                   class="nav-link {{request()->routeIs('admin.content.noticias*') ? 'active' :  ''}}">
                    <i class="nav-icon fas fa-newspaper"></i>
                    <span>Noticias</span>
                </a>
            </li>
        @endcan
        @can('redes-sociales.index')
            <li class="nav-item">
                <a href="{{ route('admin.content.redes-sociales.index') }}"
                   class="nav-link {{ request()->routeIs('admin.content.redes-sociales*') ? 'active' :  ''}}">
                    <i class="nav-icon fas fa-network-wired"></i>
                    <span>Redes Sociales</span>
                </a>
            </li>
        @endcan
    </ul>
</li>
<li class="nav-item has-treeview {{request()->routeIs('admin.nomenclator.*') ? 'menu-open' :  ''}}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-wrench"></i>
        <p>
            Nomencladores
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @can('posiciones.index')
            <li class="nav-item">
                <a href="{!! route('admin.nomenclator.posiciones.index') !!}"
                   class="nav-link {{request()->routeIs('admin.nomenclator.posiciones*') ? 'active' :  ''}}">
                    <i class="nav-icon fas fa-server"></i>
                    <span>Posición</span>
                </a>
            </li>
        @endcan
        @can('titulos.index')
            <li class="nav-item">
                <a href="{{ route('admin.nomenclator.titulos.index') }}"
                   class="nav-link {{request()->routeIs('admin.nomenclator.titulos*') ? 'active' :  ''}}">
                    <i class="nav-icon fas fa-server"></i>
                    <span>Títulos</span>
                </a>
            </li>
        @endcan
        @can('provincias.index')
            <li class="nav-item">
                <a href="{{ route('admin.nomenclator.provincias.index') }}"
                   class="nav-link {{request()->routeIs('admin.nomenclator.provincias*') ? 'active' :  ''}}">
                    <i class="nav-icon fas fa-server"></i>
                    <span>Provincias</span>
                </a>
            </li>
        @endcan
    </ul>
</li>





