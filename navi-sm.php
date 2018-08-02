<nav id="site-navigation" class="main-navigation" role="navigation">
    <div class="banner">
        
        
    <?php
      // menu - Primary Left Side
      wp_nav_menu( array(
        'menu'              => 'primary-left',
        'theme_location'    => 'primary-left',
        'depth'             => '2',
        'container'         => false,
        //'container_class'   => 'collapse navbar-collapse',
        // 'container_id'      => 'L-navbar',
        'menu_class'        => 'ta-center',
        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
        'walker'            => new wp_bootstrap_navwalker())
      );
      // menu - Primary Left Side
      //    wp_nav_menu( array(
      //      'menu'              => 'primary-right',
      //      'theme_location'    => 'primary-right',
      //      'depth'             => 2,
      //      'container'         => false,
      //      'menu_class'        => 'nav navbar-nav navbar-right',
      //      'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
       //     'walker'            => new wp_bootstrap_navwalker())
      //    );
        ?>
        
        
    </div>
</nav>