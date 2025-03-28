


<nav class="navbar navbar-vertical navbar-expand-lg" style="display:none;">
	<script>
		var navbarStyle = window.config.config.phoenixNavbarStyle;
		if (navbarStyle && navbarStyle !== 'transparent') {
		document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
		}
	</script>

	<div class="collapse navbar-collapse" id="navbarVerticalCollapse">

		<div class="navbar-vertical-content">
			<ul class="navbar-nav flex-column" id="navbarVerticalNav">
     
				<li class="nav-item">
					
					<p class="navbar-vertical-label">Herramientas</p>
					<hr class="navbar-vertical-line" />
					
					
					
					<div class="nav-item-wrapper">
            <a class="nav-link label-1" href="pages/notifications.html" role="button" data-bs-toggle="" aria-expanded="false">
              <div class="d-flex align-items-center">
                <span class="nav-link-icon"><span data-feather="bell"></span></span>
                <span class="nav-link-text-wrapper"><span class="nav-link-text">Notifications</span></span>
              </div>
						</a>
					</div>
						


					
					<div class="nav-item-wrapper">
            <a class="nav-link dropdown-indicator label-1" href="#nv-layouts" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-layouts">
						  <div class="d-flex align-items-center">
							  <div class="dropdown-indicator-icon">
                  <span class="fas fa-caret-right"></span>
                </div>
                <span class="nav-link-icon"><span data-feather="layout"></span></span>
                <span class="nav-link-text">Layouts</span>
						  </div>
						</a>
						<div class="parent-wrapper label-1">
              <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-layouts">
                <li class="collapsed-nav-item-title d-none"><?php echo $_nmod["mod_nombre"]; ?></li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo $_hr_nscc; ?>" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center">
                      <span class="nav-link-text"><?php echo $_nscc["scc_nombre"]; ?></span>
                  </div>
                </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="demo/dark-mode.html" data-bs-toggle="" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-text">Dark mode</span></div>
                </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="demo/sidenav-collapse.html" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center">
                      <span class="nav-link-text">Sidenav collapse</span>
                    </div>
                  </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="demo/darknav.html" data-bs-toggle="" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-text">Darknav</span></div>
                </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="demo/topnav-slim.html" data-bs-toggle="" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-text">Topnav slim</span></div>
                </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="demo/navbar-top-slim.html" data-bs-toggle="" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-text">Navbar top slim</span></div>
                </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="demo/navbar-top.html" data-bs-toggle="" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-text">Navbar top</span></div>
                </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="demo/horizontal-slim.html" data-bs-toggle="" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-text">Horizontal slim</span></div>
                </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="demo/combo-nav.html" data-bs-toggle="" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-text">Combo nav</span></div>
                </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="demo/combo-nav-slim.html" data-bs-toggle="" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-text">Combo nav slim</span></div>
                </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="demo/dual-nav.html" data-bs-toggle="" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-text">Dual nav</span></div>
                </a>
                </li>
              </ul>
						</div>
					</div>


					
					<div class="nav-item-wrapper">
						<a class="nav-link dropdown-indicator label-1" href="#nv-home" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="nv-home">
							<div class="d-flex align-items-center">
								<div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div>
								<span class="nav-link-icon"><span data-feather="pie-chart"></span></span>
								<span class="nav-link-text">Últimos accesos</span>
							</div>
						</a>
						<div class="parent-wrapper label-1">
							<ul class="nav collapse parent show" data-bs-parent="#navbarVerticalCollapse" id="nv-home">

								<li class="nav-item">
									<a class="nav-link active" href="dashboard/project-management6ff6.html" data-bs-toggle="" aria-expanded="false">
										<div class="d-flex align-items-center"><span class="nav-link-text">E commerce2</span></div>
									</a>
								</li>

								<li class="nav-item">
									<a class="nav-link" href="dashboard/project-management.html" data-bs-toggle="" aria-expanded="false">
										<div class="d-flex align-items-center"><span class="nav-link-text">Project management2</span></div>
									</a>
								</li>

							</ul>
						</div>
					</div>

					
				</li>


