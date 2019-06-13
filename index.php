    <!-- Header -->
    <?php    
        include('templates/header.php');    
    ?>
    <!-- #Header -->

    <!-- Page Loader -->
    <?php 
        include("templates/pageloader.php");
    ?>
    <!-- #END# Page Loader -->

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Top Bar -->
    <?php 
        include("templates/navbar.php");
    ?>
    <!-- #Top Bar -->

    <section>

        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <?php    
                include('templates/leftsidebar.php');    
            ?>
             
            <!-- Left Sidebar Footer -->
            <?php    
                include('templates/leftsidebarfooter.php');    
            ?>
            <!-- #Left Sidebar Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
       
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW TASKS</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
        </div>
    </section>

    <!-- Footer -->
    <?php    
        include('templates/footer.php');    
    ?>
    <!-- #Footer -->