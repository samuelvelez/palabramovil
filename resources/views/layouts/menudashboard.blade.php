<ul class="nav nav-pills card-header-pills">
    <!--<li class="nav-item">
      <a class="nav-link @if (Request::is('panelcontrol')) {{'active'}} @endif" href="{{ route('panelcontrol') }}">Panel<i style="padding-left: 5px;" class="fas fa-chalkboard"></i></a>
    </li>-->
    <li class="nav-item">
      <a class="nav-link @if (Request::is('notificacion')) {{'active'}} @endif" href="{{ route('notificacion') }}">Notificaciones<i style="padding-left: 5px;" class="fas fa-bell"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if (Request::is('pedidos')) {{'active'}} @endif" href="{{ route('pedidos') }}">Historial<i style="padding-left: 5px;" class="fas fa-user"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if (Request::is('biblioteca')) {{'active'}} @endif" href="{{ route('biblioteca') }}">Mi Biblioteca<i style="padding-left: 5px;" class="fas fa-book"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if (Request::is('subirlibros')) {{'active'}} @endif" href="{{ route('subirlibros') }}">Subir Libro<i style="padding-left: 5px;" class="fas fa-book-reader"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if (Request::is('messages')) {{'active'}} @endif" href="/messages">Mensajes @include('messenger.unread-count')<i style="padding-left: 5px;" class="fas fa-comments"></i></a>
    </li>
</ul>