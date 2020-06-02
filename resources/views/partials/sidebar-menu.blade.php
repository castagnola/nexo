<div class="page-sidebar sidebar">
    <div class="page-sidebar-inner slimscroll">
        <!--
        <div class="sidebar-header">
            <div class="sidebar-profile">
                <a href="javascript:void(0);" id="profile-menu-link">
                    <div class="sidebar-profile-image">
                        <img src="{{ url('images/original/avatar1.png')  }}" class="img-circle img-responsive" alt="">
                    </div>
                    <div class="sidebar-profile-details">
                        <span>David Green<br><small>Art Director</small></span>
                    </div>
                </a>
            </div>
        </div>
        -->
        @include('partials.sidebar-menu-items', ['items' => $sidebarNav->roots()])
    </div>
    <!-- Page Sidebar Inner -->
</div><!-- Page Sidebar -->