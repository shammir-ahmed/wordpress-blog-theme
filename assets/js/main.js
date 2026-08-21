/**
 * Main JavaScript File
 *
 * Handles toggle behavior for the mobile menu
 */

document.addEventListener('DOMContentLoaded', function() {
	
	// Mobile Menu Toggle
	const menuToggle = document.querySelector('.menu-toggle');
	const menuContainer = document.querySelector('.primary-menu-container');

	if (menuToggle && menuContainer) {
		menuToggle.addEventListener('click', function() {
			menuContainer.classList.toggle('toggled');
			
			const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
			menuToggle.setAttribute('aria-expanded', !isExpanded);
		});
	}
	
	// Add support for dropdown toggles in mobile menu
	const menuItemsWithChildren = document.querySelectorAll('.menu-item-has-children > a');
	
	menuItemsWithChildren.forEach(function(item) {
		const toggleButton = document.createElement('button');
		toggleButton.classList.add('dropdown-toggle');
		toggleButton.setAttribute('aria-expanded', 'false');
		toggleButton.innerHTML = '<span class="screen-reader-text">Expand child menu</span><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>';
		
		item.parentNode.insertBefore(toggleButton, item.nextSibling);
		
		toggleButton.addEventListener('click', function(e) {
			e.preventDefault();
			const parentMenu = this.parentNode;
			const subMenu = parentMenu.querySelector('.sub-menu');
			
			parentMenu.classList.toggle('focus');
			subMenu.classList.toggle('toggled-on');
			
			const isExpanded = this.getAttribute('aria-expanded') === 'true';
			this.setAttribute('aria-expanded', !isExpanded);
		});
	});

});
