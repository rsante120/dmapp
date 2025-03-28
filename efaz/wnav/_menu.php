<?php
$_navegacion = array();
include("../../xmods/app/_xconfig/_nav_oficial_ini.php");
include("../../zmods/".$app_crpt_zet."/_zconfig/_nav_propia.php");
include("../../xmods/app/_xconfig/_nav_oficial_fin.php");



$_nav_modulo = $_navegacion["wnav"]["modulos"][$_REQUEST["mdl"]];

?>
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

          <p class="navbar-vertical-label">Módulos</p>
          <hr class="navbar-vertical-line" />
          <?php
          foreach ($_navegacion["wnav"]["modulos"] as $mkey => $_nmod) {
            if(count($_nmod["secciones"]) == 0){
              $_hr_nmod = "javascript:jscarga('".$_nmod["mod_link"]."','');";
              ?>
              <div class="nav-item-wrapper">
                <a class="nav-link label-1" href="<?php echo $_hr_nmod; ?>" role="button" data-bs-toggle="" aria-expanded="false">
                  <div class="d-flex align-items-center">
                    <span class="nav-link-icon"><span class="fas fa-<?php echo $_nmod["mod_icono"]; ?>"></span></span>
                    <span class="nav-link-text-wrapper"><span class="nav-link-text"><?php echo $_nmod["mod_nombre"]; ?></span></span>
                  </div>
                </a>
              </div>
              <?php
            }else{
              $_id_nmod = "nv_mdlo-".$_nmod["mod_codigo"];
              $_hr_nmod = "#".$_id_nmod;
              ?>
              <div class="nav-item-wrapper">
                <a class="nav-link dropdown-indicator label-1" href="<?php echo $_hr_nmod; ?>" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="<?php echo $_id_nmod; ?>">
                  <div class="d-flex align-items-center">
                    <div class="dropdown-indicator-icon">
                      <span class="fas fa-caret-right"></span>
                    </div>
                    <span class="nav-link-icon"><span class="fas fa-<?php echo $_nmod["mod_icono"]; ?>"></span></span>
                    <span class="nav-link-text"><?php echo $_nmod["mod_nombre"]; ?></span>
                  </div>
                </a>
                <div class="parent-wrapper label-1">
                  <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="<?php echo $_id_nmod; ?>">
                    <li class="collapsed-nav-item-title d-none"><?php echo $_nmod["mod_nombre"]; ?></li>
                    <?php
                    foreach ($_nmod["secciones"] as $skey => $_nscc) {
                      if(count($_nscc["enlaces"]) == 0){
                        $_hr_nscc = "javascript:jscarga('".$_nscc["scc_link"]."','');";
                        ?>
                        <li class="nav-item">
                          <a class="nav-link" href="<?php echo $_hr_nscc; ?>" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center">
                              <span class="nav-link-text"><?php echo $_nscc["scc_nombre"]; ?></span>
                            </div>
                          </a>
                        </li>
                        <?php
                      }else{
                        $_id_nscc = "nv_scco-".$skey;
                        $_hr_nscc = "#".$_id_nscc;
                        ?>
                        <li class="nav-item">
                          <a class="nav-link dropdown-indicator" href="<?php echo $_hr_nscc; ?>" data-bs-toggle="collapse" aria-expanded="true" aria-controls="<?php echo $_id_nscc; ?>">
                            <div class="d-flex align-items-center">
                              <div class="dropdown-indicator-icon">
                                <span class="fas fa-caret-right"></span>
                              </div>
                              <span class="nav-link-text"><?php echo $_nscc["scc_nombre"]; ?></span>
                            </div>
                          </a>
                          <div class="parent-wrapper">
                            <ul class="nav collapse parent show" data-bs-parent="#e-commerce" id="<?php echo $_id_nscc; ?>">
                              <?php
                              foreach ($_nscc["enlaces"] as $ekey => $_nenl) {
                                $_hr_nenl = "javascript:jscarga('".$_nenl["enl_link"]."','');";
                                ?>
                                <li class="nav-item">
                                  <a class="nav-link" href="<?php echo $_hr_nenl; ?>" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                      <span class="nav-link-text"><?php echo $_nenl["enl_nombre"]; ?></span>
                                    </div>
                                  </a>
                                </li>
                                <?php
                              }
                              ?>
                            </ul>
                          </div>
                        </li>
                        <?php
                      }
                    }
                    ?>
                  </ul>
                </div>

              </div>

              <?php
            }
          }
          ?>
        </li>
				      
      </ul>
		</div>
	</div>

	<div class="navbar-vertical-footer">
		<button class="btn navbar-vertical-toggle border-0 fw-semi-bold w-100 white-space-nowrap d-flex align-items-center">
			<span class="uil uil-left-arrow-to-left fs-0"></span>
			<span class="uil uil-arrow-from-right fs-0"></span>
			<span class="navbar-vertical-footer-text ms-2">Collapsed View</span>
		</button>
	</div>

</nav>





































































<nav class="navbar navbar-top fixed-top navbar-expand-lg" id="navbarCombo" data-navbar-top="combo" data-move-target="#navbarVerticalNav" >
	

	<!--LOGO ============================================-->
	<div class="navbar-logo">

		<button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation">
			<span class="navbar-toggle-icon"><span class="toggle-line"></span></span>
		</button>

		<a class="navbar-brand me-1 me-sm-3" href="">
			<div class="d-flex align-items-center">
				<div class="d-flex align-items-center"><img src="..\..\assets/img/icons/logo.png" alt="phoenix" width="27" />
					<p class="logo-text ms-2 d-none d-sm-block">GeaFemme</p>
				</div>
			</div>
		</a>
		
	</div>
	<!--LOGO ============================================-->



	<div class="collapse navbar-collapse navbar-top-collapse order-1 order-lg-0 justify-content-center" id="navbarTopCollapse">
		<ul class="navbar-nav navbar-nav-top" data-dropdown-on-hover="data-dropdown-on-hover">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
					<span class="uil fs-0 me-2 uil-chart-pie"></span>Inicio
				</a> 
			</li>


			<li class="nav-item dropdown">
				
				<a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
					<span class="uil fs-0 me-2 uil-cube"></span>Fichas
				</a>
			
				<ul class="dropdown-menu navbar-dropdown-caret">
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="CRM" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="phone"></span>CRM</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../crm/analytics.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Analytics</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../crm/deals.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deals</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../crm/deal-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deal details</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../crm/leads.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Leads</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../crm/lead-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lead details</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../crm/reports.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../crm/reports-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports details</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../crm/add-contact.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add contact</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="project-management" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="clipboard"></span>Project management</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="create-new.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create new</div>
                      </a></li>
                    <li><a class="dropdown-item active" href="project-list-view.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project list view</div>
                      </a></li>
                    <li><a class="dropdown-item" href="project-card-view.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project card view</div>
                      </a></li>
                    <li><a class="dropdown-item" href="project-board-view.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project board view</div>
                      </a></li>
                    <li><a class="dropdown-item" href="todo-list.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Todo list</div>
                      </a></li>
                    <li><a class="dropdown-item" href="project-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project details</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="../chat.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="message-square"></span>Chat</div>
                  </a>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="email" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="mail"></span>Email</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../email/inbox.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Inbox</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../email/email-detail.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Email detail</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../email/compose.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Compose</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="events" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="bookmark"></span>Events</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../events/create-an-event.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create an event</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../events/event-detail.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Event detail</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="kanban" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="trello"></span>Kanban</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../kanban/kanban.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Kanban</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../kanban/boards.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Boards</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../kanban/create-kanban-board.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create board</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="social" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="share-2"></span>Social</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../social/profile.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../social/settings.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Settings</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="../calendar.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="calendar"></span>Calendar</div>
                  </a>
								</li>
              </ul>
            </li>
            <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
								<span class="uil fs-0 me-2 uil-files-landscapes-alt"></span>Insumos</a>
              <ul class="dropdown-menu navbar-dropdown-caret">
                <li><a class="dropdown-item" href="../../pages/starter.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="compass"></span>Starter</div>
                  </a></li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="faq" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="help-circle"></span>Faq</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../pages/faq/faq-accordion.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq accordion</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../pages/faq/faq-tab.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq tab</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="landing" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="globe"></span>Landing</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../pages/landing/default.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Default</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../pages/landing/alternate.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Alternate</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="pricing" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="tag"></span>Pricing</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../pages/pricing/pricing-column.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing column</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../pages/pricing/pricing-grid.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing grid</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="../../pages/notifications.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="bell"></span>Notifications</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../pages/members.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="users"></span>Members</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../pages/timeline.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="clock"></span>Timeline</div>
                  </a></li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="errors" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="alert-triangle"></span>Errors</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../pages/errors/404.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>404</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../pages/errors/403.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>403</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../pages/errors/500.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>500</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="authentication" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="lock"></span>Authentication</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="simple" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Simple</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../pages/authentication/simple/sign-in.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../pages/authentication/simple/sign-up.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../pages/authentication/simple/sign-out.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../pages/authentication/simple/forgot-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../pages/authentication/simple/reset-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../pages/authentication/simple/lock-screen.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../pages/authentication/simple/2FA.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                          </a></li>
                      </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="split" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Split</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../pages/authentication/split/sign-in.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../pages/authentication/split/sign-up.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../pages/authentication/split/sign-out.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../pages/authentication/split/forgot-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../pages/authentication/split/reset-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../pages/authentication/split/lock-screen.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../pages/authentication/split/2FA.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                          </a></li>
                      </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="Card" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Card</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../pages/authentication/card/sign-in.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../pages/authentication/card/sign-up.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../pages/authentication/card/sign-out.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../pages/authentication/card/forgot-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../pages/authentication/card/reset-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../pages/authentication/card/lock-screen.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../pages/authentication/card/2FA.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                          </a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="layouts" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="layout"></span>Layouts</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../demo/vertical-sidenav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical sidenav</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/dark-mode.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/sidenav-collapse.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sidenav collapse</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/darknav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Darknav</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/topnav-slim.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Topnav slim</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/navbar-top-slim.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar top slim</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/navbar-top.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar top</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/horizontal-slim.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal slim</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/combo-nav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/combo-nav-slim.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav slim</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/dual-nav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav</div>
                      </a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
								<span class="uil fs-0 me-2 uil-puzzle-piece"></span>Configuraciones</a>
              <ul class="dropdown-menu navbar-dropdown-caret dropdown-menu-card py-0">
                <div class="border-0 scrollbar" style="max-height: 60vh;">
                  <div class="px-3 pt-4 pb-3 img-dropdown">
                    <div class="row gx-4 gy-5">
                      <div class="col-12 col-sm-6 col-md-4">
                        <div class="dropdown-item-group"><span class="me-2" data-feather="file-text" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Forms</h6>
                        </div><a class="dropdown-link" href="../../modules/forms/basic/form-control.html">Form control</a><a class="dropdown-link" href="../../modules/forms/basic/input-group.html">Input group</a><a class="dropdown-link" href="../../modules/forms/basic/select.html">Select</a><a class="dropdown-link" href="../../modules/forms/basic/checks.html">Checks</a><a class="dropdown-link" href="../../modules/forms/basic/range.html">Range</a><a class="dropdown-link" href="../../modules/forms/basic/floating-labels.html">Floating labels</a><a class="dropdown-link" href="../../modules/forms/basic/layout.html">Layout</a><a class="dropdown-link" href="../../modules/forms/advance/advance-select.html">Advance select</a><a class="dropdown-link" href="../../modules/forms/advance/date-picker.html">Date picker</a><a class="dropdown-link" href="../../modules/forms/advance/editor.html">Editor</a><a class="dropdown-link" href="../../modules/forms/advance/file-uploader.html">File uploader</a><a class="dropdown-link" href="../../modules/forms/advance/rating.html">Rating</a><a class="dropdown-link" href="../../modules/forms/advance/emoji-button.html">Emoji button</a><a class="dropdown-link" href="../../modules/forms/validation.html">Validation</a><a class="dropdown-link" href="../../modules/forms/wizard.html">Wizard</a>
                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="grid" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Icons</h6>
                        </div><a class="dropdown-link" href="../../modules/icons/feather.html">Feather</a><a class="dropdown-link" href="../../modules/icons/font-awesome.html">Font awesome</a><a class="dropdown-link" href="../../modules/icons/unicons.html">Unicons</a>
                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="bar-chart-2" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">ECharts</h6>
                        </div><a class="dropdown-link" href="../../modules/echarts/line-charts.html">Line charts</a><a class="dropdown-link" href="../../modules/echarts/bar-charts.html">Bar charts</a><a class="dropdown-link" href="../../modules/echarts/candlestick-charts.html">Candlestick charts</a><a class="dropdown-link" href="../../modules/echarts/geo-map.html">Geo map</a><a class="dropdown-link" href="../../modules/echarts/scatter-charts.html">Scatter charts</a><a class="dropdown-link" href="../../modules/echarts/pie-charts.html">Pie charts</a><a class="dropdown-link" href="../../modules/echarts/gauge-chart.html">Gauge chart</a><a class="dropdown-link" href="../../modules/echarts/radar-charts.html">Radar charts</a><a class="dropdown-link" href="../../modules/echarts/heatmap-charts.html">Heatmap charts</a><a class="dropdown-link" href="../../modules/echarts/how-to-use.html">How to use</a>
                      </div>
                      <div class="col-12 col-sm-6 col-md-4">
                        <div class="dropdown-item-group"><span class="me-2" data-feather="package" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Components</h6>
                        </div><a class="dropdown-link" href="../../modules/components/accordion.html">Accordion</a><a class="dropdown-link" href="../../modules/components/avatar.html">Avatar</a><a class="dropdown-link" href="../../modules/components/alerts.html">Alerts</a><a class="dropdown-link" href="../../modules/components/badge.html">Badge</a><a class="dropdown-link" href="../../modules/components/breadcrumb.html">Breadcrumb</a><a class="dropdown-link" href="../../modules/components/button.html">Buttons</a><a class="dropdown-link" href="../../modules/components/calendar.html">Calendar</a><a class="dropdown-link" href="../../modules/components/card.html">Card</a><a class="dropdown-link" href="../../modules/components/carousel/bootstrap.html">Bootstrap</a><a class="dropdown-link" href="../../modules/components/carousel/swiper.html">Swiper</a><a class="dropdown-link" href="../../modules/components/collapse.html">Collapse</a><a class="dropdown-link" href="../../modules/components/dropdown.html">Dropdown</a><a class="dropdown-link" href="../../modules/components/list-group.html">List group</a><a class="dropdown-link" href="../../modules/components/modal.html">Modals</a><a class="dropdown-link" href="../../modules/components/navs-and-tabs/navs.html">Navs</a><a class="dropdown-link" href="../../modules/components/navs-and-tabs/navbar.html">Navbar</a><a class="dropdown-link" href="../../modules/components/navs-and-tabs/tabs.html">Tabs</a><a class="dropdown-link" href="../../modules/components/offcanvas.html">Offcanvas</a><a class="dropdown-link" href="../../modules/components/progress-bar.html">Progress bar</a><a class="dropdown-link" href="../../modules/components/placeholder.html">Placeholder</a><a class="dropdown-link" href="../../modules/components/pagination.html">Pagination</a><a class="dropdown-link" href="../../modules/components/popovers.html">Popovers</a><a class="dropdown-link" href="../../modules/components/scrollspy.html">Scrollspy</a><a class="dropdown-link" href="../../modules/components/sortable.html">Sortable</a><a class="dropdown-link" href="../../modules/components/spinners.html">Spinners</a><a class="dropdown-link" href="../../modules/components/toast.html">Toast</a><a class="dropdown-link" href="../../modules/components/tooltips.html">Tooltips</a><a class="dropdown-link" href="../../modules/components/chat-widget.html">Chat widget</a>
                      </div>
                      <div class="col-12 col-sm-6 col-md-4">
                        <div class="dropdown-item-group"><span class="me-2" data-feather="columns" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Tables</h6>
                        </div><a class="dropdown-link" href="../../modules/tables/basic-tables.html">Basic tables</a><a class="dropdown-link" href="../../modules/tables/advance-tables.html">Advance tables</a><a class="dropdown-link" href="../../modules/tables/bulk-select.html">Bulk Select</a>
                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="tool" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Utilities</h6>
                        </div><a class="dropdown-link" href="../../modules/utilities/background.html">Background</a><a class="dropdown-link" href="../../modules/utilities/borders.html">Borders</a><a class="dropdown-link" href="../../modules/utilities/colors.html">Colors</a><a class="dropdown-link" href="../../modules/utilities/display.html">Display</a><a class="dropdown-link" href="../../modules/utilities/flex.html">Flex</a><a class="dropdown-link" href="../../modules/utilities/stacks.html">Stacks</a><a class="dropdown-link" href="../../modules/utilities/float.html">Float</a><a class="dropdown-link" href="../../modules/utilities/grid.html">Grid</a><a class="dropdown-link" href="../../modules/utilities/interactions.html">Interactions</a><a class="dropdown-link" href="../../modules/utilities/opacity.html">Opacity</a><a class="dropdown-link" href="../../modules/utilities/overflow.html">Overflow</a><a class="dropdown-link" href="../../modules/utilities/position.html">Position</a><a class="dropdown-link" href="../../modules/utilities/shadows.html">Shadows</a><a class="dropdown-link" href="../../modules/utilities/sizing.html">Sizing</a><a class="dropdown-link" href="../../modules/utilities/spacing.html">Spacing</a><a class="dropdown-link" href="../../modules/utilities/typography.html">Typography</a><a class="dropdown-link" href="../../modules/utilities/vertical-align.html">Vertical align</a><a class="dropdown-link" href="../../modules/utilities/visibility.html">Visibility</a>
                      </div>
                    </div>
                  </div>
                </div>
              </ul>
            </li>
            <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
								<span class="uil fs-0 me-2 uil-document-layout-right"></span>Tablas
							</a>
							<ul class="dropdown-menu navbar-dropdown-caret">
								<li>
									<a class="dropdown-item" href="../../documentation/getting-started.html">
										<div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="life-buoy"></span>Getting started</div>
									</a>
								</li>
								<li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="customization" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
										<div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="settings"></span>Customization</span></div>
									</a>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item" href="../../documentation/customization/configuration.html">
												<div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Configuration</div>
											</a></li>
										<li><a class="dropdown-item" href="../../documentation/customization/styling.html">
												<div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Styling</div>
											</a></li>
										<li><a class="dropdown-item" href="../../documentation/customization/dark-mode.html">
												<div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode</div>
											</a></li>
										<li><a class="dropdown-item" href="../../documentation/customization/plugin.html">
												<div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Plugin</div>
											</a></li>
									</ul>
								</li>
                <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="layouts-doc" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="table"></span>Layouts doc</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../documentation/layouts/vertical-navbar.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical navbar</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/layouts/horizontal-navbar.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal navbar</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/layouts/combo-navbar.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo navbar</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/layouts/dual-nav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="../../documentation/gulp.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 fa-brands fa-gulp ms-1 me-1 fa-lg"></span>Gulp</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../documentation/design-file.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="figma"></span>Design file</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../changelog.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="git-merge"></span>Changelog</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../showcase.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="monitor"></span>Showcase</div>
                  </a></li>
              </ul>
            </li>
          </ul>
        </div>













        <ul class="navbar-nav navbar-nav-icons flex-row">

          <?php
          /**********************************************************************************************/
          //NOTIFICACIONES
          /**********************************************************************************************/
          ?>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" style="min-width: 2.5rem" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside">
              <span data-feather="bell" style="height:20px;width:20px;"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret" id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
              <div class="card position-relative border-0">

                <div class="card-header p-2">
                  <div class="d-flex justify-content-between">
                    <h5 class="text-black mb-0">Notificatons</h5><button class="btn btn-link p-0 fs--1 fw-normal" type="button">Mark all as read</button>
                  </div>
                </div>


                <div class="card-body p-0">
                  <div class="scrollbar-overlay" style="height: 27rem;">
                    <div class="border-300">
                      <?php
                      for ($i=0; $i < 10; $i++) { 
                        ?>
                        <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read border-bottom">
                          <div class="d-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex">
                              <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/30.webp" alt="" /></div>
                              <div class="flex-1 me-sm-3">
                                <h4 class="fs--1 text-black">Jessie Samson</h4>
                                <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>💬</span>Mentioned you in a comment.<span class="ms-2 text-400 fw-bold fs--2">10m</span></p>
                                <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:41 AM </span>August 7,2021</p>
                              </div>
                            </div>
                            <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                              <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                            </div>
                          </div>
                        </div>
                        <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                          <div class="d-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex">
                              <div class="avatar avatar-m status-online me-3">
                                <div class="avatar-name rounded-circle"><span>J</span></div>
                              </div>
                              <div class="flex-1 me-sm-3">
                                <h4 class="fs--1 text-black">Jane Foster</h4>
                                <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>📅</span>Created an event.<span class="ms-2 text-400 fw-bold fs--2">20m</span></p>
                                <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:20 AM </span>August 7,2021</p>
                              </div>
                            </div>
                            <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                              <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                            </div>
                          </div>
                        </div>
                        <?php
                      }
                      ?>
                    </div>
                  </div>
                </div>


                <div class="card-footer p-0 border-top border-0">
                  <div class="my-2 text-center fw-bold fs--2 text-600"><a class="fw-bolder" href="../../pages/notifications.html">Notification history</a></div>
                </div>


              </div>
            </div>

          </li>
          <?php
          /**********************************************************************************************/
          //NOTIFICACIONES
          /**********************************************************************************************/
          ?>














          <?php
          /**********************************************************************************************/
          //Vista Modulos
          /**********************************************************************************************/
          ?>

          <?php
          $_heigth = "6";
          if(count($_navegacion["wnav"]["modulos"]) <= 3){
            $_heigth = "6";
          }elseif(count($_navegacion["wnav"]["modulos"]) <= 6){
            $_heigth = "12";
          }elseif(count($_navegacion["wnav"]["modulos"]) <= 9){
            $_heigth = "17";
          }
          ?>
          <li class="nav-item dropdown">
            <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false">
              <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
                <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
                <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
                <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
                <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
                <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
                <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
                <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
              </svg>
            </a>
            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nide-dots shadow border border-300" aria-labelledby="navbarDropdownNindeDots">
              <div class="card bg-white position-relative border-0">
                <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: <?php echo $_heigth; ?>rem;">
                  <div class="row text-center align-items-center gx-0 gy-0">
                    <?php
                    foreach ($_navegacion["wnav"]["modulos"] as $mkey => $_nmod) {
                      $_hr_nmod = "javascript:jscarga('".$_nmod["mod_link"]."','&mdl=$mkey');";
                      ?>
                      <div class="col-4">
                        <a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="<?php echo $_hr_nmod; ?>">
                          <span class="fas fa-<?php echo $_nmod["mod_icono"]; ?> fs-3" style="color: #3a3f4d;"></span>
                          <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1"><?php echo $_nmod["mod_nombre"]; ?></p>
                        </a>
                      </div>
                      <?php
                    }
                    ?>
                                        
                  </div>
                </div>
              </div>
            </div>
          </li>
          <?php
          /**********************************************************************************************/
          //Vista Modulos
          /**********************************************************************************************/
          ?>













          <?php
          /**********************************************************************************************/
          //Vista Sesion
          /**********************************************************************************************/
          ?>
					<li class="nav-item dropdown"><a class="nav-link lh-1 pe-0 white-space-nowrap" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false">Edith B. <span class="fa-solid fa-chevron-down fs--2"></span></a>
						<div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
						<div class="card position-relative border-0">
							<div class="card-body p-0">
							<div class="text-center pt-4 pb-3">
								<div class="avatar avatar-xl ">
								<img class="rounded-circle " src="../../assets/img/team/72x72/57.webp" alt="" />
								</div>
								<h6 class="mt-2 text-black">Edith Bustamante</h6>
							</div>
							</div>
							<div class="overflow-auto scrollbar" style="height: 9rem;">
							<ul class="nav d-flex flex-column mb-2 pb-1">
								<li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user"></span><span>Profile</span></a></li>
								<li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900" data-feather="pie-chart"></span>Dashboard</a></li>
								<li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="lock"></span>Posts &amp; Activity</a></li>
								<li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="globe"></span>Language</a></li>
							</ul>
							</div>
							<div class="card-footer p-0 border-top">
							<ul class="nav d-flex flex-column my-3">
								<li class="nav-item"> </li>
								<div class="px-3"><a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!"> <span class="me-2" data-feather="log-out"> </span>Sign out</a></div>

							</ul>
							</div>
						</div>
						</div>
					</li>
          <?php
          /**********************************************************************************************/
          //Vista Sesion
          /**********************************************************************************************/
          ?>
					
  </ul>
</nav>




<script>
var body = document.querySelector('body');
var navbarCombo = document.querySelector('#navbarCombo');
var navbarVertical = document.querySelector('.navbar-vertical');

var documentElement = document.documentElement;
        

navbarVertical.style.display = 'inline-block';
documentElement.classList.add('navbar-combo')
</script>