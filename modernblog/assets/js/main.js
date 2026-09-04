(function() {
    'use strict';

    document.addEventListener('DOMContentLoaded', function() {
        
        // Dark Mode Toggle
        const darkModeToggle = document.querySelector('.dark-mode-toggle');
        const body = document.body;

        // Check for saved user preference, if any, on load of the website
        const darkMode = localStorage.getItem('darkMode');
        
        if (darkMode === 'enabled') {
            body.classList.add('dark-mode');
        }

        if (darkModeToggle) {
            darkModeToggle.addEventListener('click', () => {
                const isDarkMode = body.classList.contains('dark-mode');
                
                if (isDarkMode) {
                    body.classList.remove('dark-mode');
                    localStorage.setItem('darkMode', null);
                } else {
                    body.classList.add('dark-mode');
                    localStorage.setItem('darkMode', 'enabled');
                }
            });
        }
        
        // Search Toggle (Basic alert for now, will implement full search later)
        const searchToggle = document.querySelector('.search-toggle');
        if (searchToggle) {
            searchToggle.addEventListener('click', () => {
                alert('Search functionality will be added soon!');
            });
        }
    });

})();
