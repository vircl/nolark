/**
 * Fichier app.js
 * Scripts de l'application web nolark
 *
 * @package Nolark
 * @author  vircl
 */
$(document).ready(function(){
    console.log("Jquery ok");
    $( "#burger" ).click(function(event) {
        event.stopImmediatePropagation();
        console.log("clic sur burger");
        $('.navbar-container').toggleClass('visible');
    });
    /**
     * Gestion des menus déroulants
     */
    $( ".menu-item" ).click(function(event) {
        event.stopImmediatePropagation();
        $(this).find( '.submenu' ).toggleClass('visible');
    });
    $( ".menu-item").mouseover(function(event) {
        event.stopImmediatePropagation();
        $(this).find( '.submenu' ).addClass('visible');
    });
    $( ".submenu").mouseout(function(event) {
        event.stopImmediatePropagation();
        $(this).removeClass('visible');
    });

    /**
     * Ajout des classes au survol
     */
    class_hover( $('.categorie'), 'categorie-hover' );
    function class_hover( block, hovered_class ) {
        block.mouseover( function(event) {
            event.stopImmediatePropagation();
            $(this).addClass(hovered_class);
        });
        block.mouseout( function(event) {
            event.stopImmediatePropagation();
            $(this).removeClass(hovered_class);
        });
        block.click(function(event) {
            event.stopImmediatePropagation();
            event.preventDefault();
            let url     = $( this ).attr( 'data-link' );
            let current = window.location.href;
            if ( url !== current ) {
                window.location = url;
            }
        })
    }
});
