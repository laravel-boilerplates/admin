<div class="navbar-expand-md">
  <div class="collapse navbar-collapse" id="navbar-menu">
    <div class="navbar navbar-light">
      <div class="container-xl">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link{{ Request::is('admin/dashboard*') ? ' active' : '' }}" href="./#">
              <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><polyline points="5 12 3 12 12 3 21 12 19 12"></polyline><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path></svg>
              </span>
              <span class="nav-link-title">
                Dashboard
              </span>
            </a>
          </li>
          <li class="nav-item{{ Admin::requestIs('auth*') ? ' active' : '' }} dropdown">
            <a class="nav-link dropdown-toggle" href="#navbar-extra" data-toggle="dropdown" role="button" aria-expanded="false">
              <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M9 12l2 2l4 -4"></path><path d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3"></path></svg>
              </span>
              <span class="nav-link-title">
                Authorization
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item{{ Admin::requestIs('auth/users*') ? ' active' : '' }}" href="{{ Admin::route('auth.users.index') }}">
                  Users
                </a>
              </li>
              <li>
                <a class="dropdown-item{{ Admin::requestIs('auth/roles*') ? ' active' : '' }}" href="{{ Admin::route('auth.roles.index') }}">
                  Roles
                </a>
              </li>
              <li>
                <a class="dropdown-item{{ Admin::requestIs('auth/permissions*') ? ' active' : '' }}" href="{{ Admin::route('auth.permissions.index') }}">
                  Permissions
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
          <form action="." method="get">
            <div class="input-icon">
              <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="10" cy="10" r="7"></circle><line x1="21" y1="21" x2="15" y2="15"></line></svg>
              </span>
              <input type="text" class="form-control" placeholder="Search…">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
