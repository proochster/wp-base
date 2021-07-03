<?php 
    if( is_home() ){ // Blog homepage
        echo "Blog homepage ";
    } 
    
    if ( is_front_page() ) {
        echo "Front page ";
    }
    
    if ( is_single() ) {
        echo "Single post ";
    }

    if ( is_page() ) {
        echo "This is a page ";
    }
        
    if ( is_search() ) {
        echo "Search ";
    }

    if( is_admin() ){ // In dashboard
        echo "Admin active ";
    }

    if( is_admin_bar_showing() ) { // Admin bar active
        echo "Admin bar";
    }
   
    if( is_404() ) { // 404 page
        echo "Ups, page not found";
    }

