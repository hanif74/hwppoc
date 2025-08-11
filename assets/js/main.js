jQuery(document).ready(function($) {

    // Check if our primary menu container exists
    if ($('#primary-menu-container').length) {
        let menu = $('#primary-menu-container ul').first();
        menu.find('li').addClass('nav-item');
        menu.find('a').addClass('nav-link');
        menu.find('li.menu-item-has-children').addClass('dropdown');
        menu.find('li.dropdown > a')
            .addClass('dropdown-toggle')
            .attr('role', 'button')
            .attr('data-bs-toggle', 'dropdown')
            .attr('aria-expanded', 'false');

        menu.find('ul.sub-menu')
            .addClass('dropdown-menu')
            .attr('aria-labelledby', function() {
                let parentLink = $(this).closest('.dropdown').find('a.dropdown-toggle');
                let parentId = 'navbarDropdown-' + parentLink.text().trim().replace(/\s+/g, '-').toLowerCase();
                parentLink.attr('id', parentId);
                return parentId;
            });
    }
});