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

    // Notification modal
    const notificationBtn = document.querySelector('.notification-btn');
    const notificationModal = document.getElementById('notificationModal');
    const closeModal = document.querySelector('.close-modal');
    if (notificationBtn && notificationModal && closeModal) {
        notificationBtn.addEventListener('click', function() {
            notificationModal.classList.add('active');
            const badge = document.querySelector('.notification-badge');
            if (badge) {
                badge.textContent = '0';
                badge.style.display = 'none';
            }
        });

        closeModal.addEventListener('click', function() {
            notificationModal.classList.remove('active');
        });

        window.addEventListener('click', function(e) {
            if (e.target === notificationModal) {
                notificationModal.classList.remove('active');
            }
        });
    }

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

    // Search bar (add your own filtering logic as needed)
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            // Implement your search/filter logic here
            // Example: filter table rows or cards based on input
        });
    }
});