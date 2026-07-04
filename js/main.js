/**
 * EduSphere by Ayush - main front-end script
 * Handles mobile navigation, search panel toggle, and submenu accessibility.
 *
 * @package EduSphere_By_Ayush
 */
( function () {
	'use strict';

	document.addEventListener( 'DOMContentLoaded', function () {
		var menuToggle = document.querySelector( '.s-menu-toggle' );
		var nav = document.getElementById( 'site-navigation' );
		var searchToggle = document.querySelector( '.s-search-toggle' );
		var searchPanel = document.querySelector( '.s-search-panel' );

		if ( menuToggle && nav ) {
			menuToggle.addEventListener( 'click', function () {
				var isOpen = nav.classList.toggle( 'is-open' );
				menuToggle.setAttribute( 'aria-expanded', isOpen ? 'true' : 'false' );
				menuToggle.innerHTML = isOpen ? '&times;' : '&#9776;';
			} );
		}

		if ( searchToggle && searchPanel ) {
			searchToggle.addEventListener( 'click', function () {
				var isOpen = searchPanel.classList.toggle( 'is-open' );
				searchToggle.setAttribute( 'aria-expanded', isOpen ? 'true' : 'false' );
				if ( isOpen ) {
					var input = searchPanel.querySelector( 'input[type="search"]' );
					if ( input ) { input.focus(); }
				}
			} );
		}

		// Toggle submenus with keyboard/tap on touch devices.
		var parentItems = document.querySelectorAll( '.s-primary-nav .menu-item-has-children > a' );
		parentItems.forEach( function ( link ) {
			link.addEventListener( 'click', function ( e ) {
				if ( window.innerWidth <= 720 ) {
					e.preventDefault();
					var submenu = link.nextElementSibling;
					if ( submenu ) {
						submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
					}
				}
			} );
		} );

		// Close mobile menu when a link is clicked (except parent toggles).
		if ( nav ) {
			nav.querySelectorAll( 'a' ).forEach( function ( link ) {
				link.addEventListener( 'click', function () {
					if ( window.innerWidth <= 720 && !link.parentElement.classList.contains( 'menu-item-has-children' ) ) {
						nav.classList.remove( 'is-open' );
						if ( menuToggle ) { menuToggle.setAttribute( 'aria-expanded', 'false' ); menuToggle.innerHTML = '&#9776;'; }
					}
				} );
			} );
		}
	} );
} )();
