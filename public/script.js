document.addEventListener('DOMContentLoaded', function() {
    // Sidebar active link highlighting
    const navLinks = document.querySelectorAll('.nav-menu a');
    const currentPage = window.location.pathname.split('/').pop() || 'index.html';
    navLinks.forEach(link => {
        if (link.getAttribute('href') === currentPage) {
            link.parentElement.classList.add('active');
        }
    });

    // Logout functionality
    document.querySelectorAll('.logout').forEach(item => {
        item.addEventListener('click', function() {
            window.location.href = 'login.html';
            // localStorage.clear(); // Uncomment if you use localStorage for auth
        });
    });


    // Profile dropdown
    const profile = document.querySelector('.profile');
    if (profile) {
        profile.addEventListener('click', function(e) {
            e.stopPropagation();
            const dropdown = this.querySelector('.profile-dropdown');
            if (dropdown) {
                dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
            }
        });
        document.addEventListener('click', function() {
            const dropdown = document.querySelector('.profile-dropdown');
            if (dropdown) dropdown.style.display = 'none';
        });
    }
});