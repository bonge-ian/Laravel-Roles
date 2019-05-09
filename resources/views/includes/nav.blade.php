<div class="top-bar">

          <div class="top-bar-left">
            <ul class="dropdown menu" data-dropdown-menu>
              <li class="menu-text"><a href="/">{{ config('app.name', 'Laravel') }}</a></li>
              @isAdmin(['hr', 'admin'])
                <li><a href="{{ route('admin.users.index') }}">Manage Users</a></li>
              @endisAdmin
            </ul>
          </div>

          <div class="top-bar-right">
            <ul class="menu">
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <ul class="dropdown menu" data-dropdown-menu>
                        <li>
                            <a href="#">{{ Auth::user()->name }}</a>
                            <ul class="menu">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @endif
            </ul>
          </div>

        </div>
