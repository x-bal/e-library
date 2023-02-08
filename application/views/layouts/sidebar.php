<!-- BEGIN #sidebar -->
<div id="sidebar" class="app-sidebar">
    <!-- BEGIN scrollbar -->
    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
        <!-- BEGIN menu -->
        <div class="menu">
            <div class="menu-profile">
                <a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile" data-target="#appSidebarProfileMenu">
                    <div class="menu-profile-cover with-shadow"></div>
                    <div class="menu-profile-image">
                        <img src="<?= base_url('/') ?>assets/img/user/user-13.jpg" alt="" />
                    </div>
                    <div class="menu-profile-info">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <?= $this->session->userdata('nama') ?>
                            </div>
                            <div class="menu-caret ms-auto"></div>
                        </div>
                    </div>
                </a>
            </div>
            <div id="appSidebarProfileMenu" class="collapse">
                <div class="menu-item pt-5px">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon"><i class="fa fa-cog"></i></div>
                        <div class="menu-text">Settings</div>
                    </a>
                </div>
                <div class="menu-divider m-0"></div>
            </div>
            <div class="menu-header">Navigation</div>
            <div class="menu-item <?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
                <a href="<?= base_url('dashboard') ?>" class="menu-link">
                    <div class="menu-icon">
                        <i class="ion-ios-home bg-blue"></i>
                    </div>
                    <div class="menu-text">Dashboard</div>
                </a>
            </div>

            <div class="menu-item has-sub <?= $this->uri->segment(1) == 'users' || $this->uri->segment(1) == 'kategori' || $this->uri->segment(1) == 'buku' ? 'active' : '' ?>">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="ion-ios-folder-open bg-green"></i>
                    </div>
                    <div class="menu-text">Data Master</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item <?= $this->uri->segment(1) == 'users' ? 'active' : '' ?>">
                        <a href="<?= base_url('users') ?>" class="menu-link">
                            <div class="menu-text">Data User</div>
                        </a>
                    </div>

                    <div class="menu-item <?= $this->uri->segment(1) == 'kategori' ? 'active' : '' ?>">
                        <a href="<?= base_url('kategori') ?>" class="menu-link">
                            <div class="menu-text">Data Kategori</div>
                        </a>
                    </div>

                    <div class="menu-item <?= $this->uri->segment(1) == 'buku' ? 'active' : '' ?>">
                        <a href="<?= base_url('buku') ?>" class="menu-link">
                            <div class="menu-text">Data Buku</div>
                        </a>
                    </div>

                </div>
            </div>

            <div class="menu-item has-sub <?= $this->uri->segment(1) == 'device' || $this->uri->segment(1) == 'log' ? 'active' : '' ?>">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="ion-ios-settings bg-secondary"></i>
                    </div>
                    <div class="menu-text">Data Device</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item <?= $this->uri->segment(1) == 'device' ? 'active' : '' ?>">
                        <a href="<?= base_url('device') ?>" class="menu-link">
                            <div class="menu-text">Data Device</div>
                        </a>
                    </div>

                    <div class="menu-item <?= $this->uri->segment(1) == 'log' ? 'active' : '' ?>">
                        <a href="<?= base_url('log') ?>" class="menu-link">
                            <div class="menu-text">Log Device</div>
                        </a>
                    </div>

                </div>
            </div>

            <div class="menu-item <?= $this->uri->segment(1) == 'pinjaman' ? 'active' : '' ?>">
                <a href="<?= base_url('pinjaman') ?>" class="menu-link">
                    <div class="menu-icon">
                        <i class="ion-ios-paper bg-indigo"></i>
                    </div>
                    <div class="menu-text">Pinjaman</div>
                </a>
            </div>

            <div class="menu-item <?= $this->uri->segment(1) == 'kembali' ? 'active' : '' ?>">
                <a href="<?= base_url('kembali') ?>" class="menu-link">
                    <div class="menu-icon">
                        <i class="ion-ios-journal bg-red"></i>
                    </div>
                    <div class="menu-text">Pengembalian</div>
                </a>
            </div>

            <!-- BEGIN minify-button -->
            <div class="menu-item d-flex">
                <a href="javascript:;" class="app-sidebar-minify-btn ms-auto" data-toggle="app-sidebar-minify"><i class="ion-ios-arrow-back"></i>
                    <div class="menu-text">Collapse</div>
                </a>
            </div>
            <!-- END minify-button -->
        </div>
        <!-- END menu -->
    </div>
    <!-- END scrollbar -->
</div>
<div class="app-sidebar-bg"></div>
<div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>
<!-- END #sidebar -->