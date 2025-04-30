document.querySelector('.filter-btn').addEventListener('click', function(e) {
    e.preventDefault();
    const dropdown = document.querySelector('.filter-dropdown');

    // Toggle dropdown visibility
    const isVisible = window.getComputedStyle(dropdown).display !== 'none';
    dropdown.style.display = isVisible ? 'none' : 'block';
});

// Close dropdown if clicking outside
document.addEventListener('click', function(e) {
    const dropdown = document.querySelector('.filter-dropdown');
    const filterBtn = document.querySelector('.filter-btn');
    if (!filterBtn.contains(e.target) && !dropdown.contains(e.target)) {
        dropdown.style.display = 'none';
    }
});

// Handle selecting filter keywords
const filterLinks = document.querySelectorAll('.filter-option');
filterLinks.forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const selectedFilter = link.textContent.trim();
        link.classList.toggle('selected');  // Toggle selected class on click
        updateFilter(selectedFilter);  // Update the filter logic (not yet implemented in the snippet)
    });
});

// Clear filter functionality
document.querySelector('.clear-filter').addEventListener('click', function(e) {
    e.preventDefault();
    // Clear selected filters and reset display (handle reset in updateFilter or similar)
    filterLinks.forEach(link => link.classList.remove('selected'));
    window.location.href = '?lang=<?php echo $currentLang; ?>';  // Redirect to the page without any filter
});

