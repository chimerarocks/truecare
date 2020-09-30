<header class="container-header">
    <div class="generic-call">
        <input id="generic-call-phone" type="text" value="">
        <button class="btn call-button" onclick="genericCall()">call</button>
    </div>
    <nav class="container-header-navbar">
        <ul class="dropdown-menu">
            <li aria-haspopup="true">
                <a href="#" class="dropdown-menu-title" >
                    leo@truecare24.com
                </a>
                <img alt="Signout Icon" src="{{ asset('icons/Dropdown.svg') }}">
                <ul class="dropdown">
                    <li><a href="#">Signout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
