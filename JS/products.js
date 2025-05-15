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

const searchInput = document.querySelector('.search-bar');
const productGrid = document.querySelector('.product-grid');
const filterLinks = document.querySelectorAll('.filter-option');

let currentFilter = new URLSearchParams(window.location.search).get('filter') || '';

function fetchProductsHTML(search = '', filter = '') {
    const params = new URLSearchParams();
    if (search) params.set('search', search);
    if (filter) params.set('filter', filter);

    fetch(`?${params.toString()}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'  // Mark as AJAX request
        }
    })
    .then(res => res.text())
    .then(html => {
        productGrid.innerHTML = html;
        updateURL(search, filter);
    })
    .catch(err => console.error('Error fetching products:', err));
}

function updateURL(search, filter) {
    const params = new URLSearchParams();
    if (search) params.set('search', search);
    if (filter) params.set('filter', filter);
    const newUrl = `${window.location.pathname}?${params.toString()}`;
    history.pushState(null, '', newUrl);
}

// Debounced search input listener
let debounceTimer = null;
if (searchInput) {
    searchInput.addEventListener('input', () => {
        const query = searchInput.value.trim();
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => {
            fetchProductsHTML(query, currentFilter);
        }, 300);
    });
}

// Filter link click handler
filterLinks.forEach(link => {
    link.addEventListener('click', (e) => {
        e.preventDefault();
        const url = new URL(link.href);
        currentFilter = url.searchParams.get('filter') || '';

        // Update selected UI
        filterLinks.forEach(l => l.classList.remove('selected'));
        link.classList.add('selected');

        const query = searchInput?.value.trim() || '';
        fetchProductsHTML(query, currentFilter);
    });
});

// Handle browser back/forward buttons
window.addEventListener('popstate', () => {
    const params = new URLSearchParams(window.location.search);
    const search = params.get('search') || '';
    const filter = params.get('filter') || '';
    if (searchInput) searchInput.value = search;
    currentFilter = filter;
    fetchProductsHTML(search, filter);
});


