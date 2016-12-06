(function( $ ) {

    wp.customize( 'minimal_logo', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' #logo ').hide();
            } else {
                $(' #logo ').show();
                $(' #logo ').attr( 'src', to );
            }
        } );
    });    

    wp.customize( 'minimal_h_color', function( value ) {
        value.bind( function( to ) {
            $( 'h1' ).css( 'color', to );
            $( 'h2' ).css( 'color', to );
            $( 'h3' ).css( 'color', to );
            $( 'h4' ).css( 'color', to );
            $( 'h5' ).css( 'color', to );
            $( 'h6' ).css( 'color', to );
            $( '#logotext a' ).css( 'color', to );
        } );
    });

    wp.customize( 'minimal_h_font_type', function( value ) {
        value.bind( function( to ) {            
            $( 'h1' ).css( 'font-family', to );  
            $( 'h2' ).css( 'font-family', to ); 
            $( 'h3' ).css( 'font-family', to ); 
            $( 'h4' ).css( 'font-family', to ); 
            $( 'h5' ).css( 'font-family', to ); 
            $( 'h6' ).css( 'font-family', to );
            $( 'h1 a' ).css( 'font-family', to );  
            $( 'h2 a' ).css( 'font-family', to ); 
            $( 'h3 a' ).css( 'font-family', to ); 
            $( 'h4 a' ).css( 'font-family', to ); 
            $( 'h5 a' ).css( 'font-family', to ); 
            $( 'h6 a' ).css( 'font-family', to );
            $( '#logotext a' ).css( 'font-family', to );
        } );
    }); 

    wp.customize( 'minimal_p_color', function( value ) {
        value.bind( function( to ) {
            $( 'p' ).css( 'color', to );
            $( '.main-navigation' ).css( 'color', to );
            $( '.main-navigation ul' ).css( 'color', to );
            $( '.main-navigation li' ).css( 'color', to );
            $( '.main-navigation ul ul li' ).css( 'color', to );
            $( '.main-navigation ul ul a' ).css( 'color', to );
            $( '.main-navigation a' ).css( 'color', to );
            $( '.main-navigation a:visited' ).css( 'color', to );
            $( 'li' ).css( 'color', to );
        } );
    });

    wp.customize( 'minimal_p_font_size', function( value ) {
        value.bind( function( to ) {            
            $( 'p' ).css( 'font-size', to + 'px' ); 
            $( 'li' ).css( 'font-size', to + 'px' ); 
            $( '#copyright' ).css( 'font-size', to + 'px' );         
        } );
    }); 

    wp.customize( 'minimal_p_font_type', function( value ) {
        value.bind( function( to ) {            
            $( 'p' ).css( 'font-family', to ); 
            $( 'li' ).css( 'font-family', to );  
            $( '#copyright' ).css( 'font-family', to );          
        } );
    });

    wp.customize( 'minimal_accent_color', function( value ) {
        value.bind( function( to ) {
            $( 'button' ).css( 'background-color', to );
            $( 'input[type=submit]' ).css( 'background-color', to );
            $( 'html input[type="button"]' ).css( 'background-color', to );
            $( 'input[type="reset"]' ).css( 'background-color', to );
            $( '.pagination ul li span.current' ).css( 'background', to );
            $( '.pagination ul li a:hover' ).css( 'background', to );
            $( 'p a' ).css( 'color', to );
            $( 'p a:visited' ).css( 'color', to );
            $( 'h2 a' ).css( 'color', to );
            $( 'h2 a:visited' ).css( 'color', to );
            $( '.main-navigation li:hover > a' ).css( 'color', to );
            $( '.main-navigation li.current_page_item a' ).css( 'color', to );
            $( '.main-navigation li.current-menu-item a' ).css( 'color', to );
            $( '.main-navigation ul ul a:hover' ).css( 'color', to );
            $( '.main-navigation ul ul :hover > a' ).css( 'color', to );
            $( '.social-icons .fa' ).css( 'color', to );
        } );
    });

})( jQuery );