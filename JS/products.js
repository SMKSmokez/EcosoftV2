document.querySelector('.filter-btn').addEventListener('click', function(e) {
    e.preventDefault();
    const dropdown = document.querySelector('.filter-dropdown');
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
});

// Close dropdown if clicking outside
document.addEventListener('click', function(e) {
    const dropdown = document.querySelector('.filter-dropdown');
    const filterBtn = document.querySelector('.filter-btn');
    if (!filterBtn.contains(e.target) && !dropdown.contains(e.target)) {
        dropdown.style.display = 'none';
    }
});