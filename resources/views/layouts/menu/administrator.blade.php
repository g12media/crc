<?php
$userId = Auth::user()->id;
 ?>
<li class="site-menu-item">
  <a class="animsition-link" href="/administrator/users">
    <i class="site-menu-icon wb-users" aria-hidden="true"></i>
    <span class="site-menu-title">Usuarios</span>
  </a>
</li>
@if($userId == 1)
<li class="site-menu-item">
  <a class="animsition-link" href="/administrator/callcenter">
    <i class="site-menu-icon wb-users" aria-hidden="true"></i>
    <span class="site-menu-title">Call Center</span>
  </a>
</li>
@endif
