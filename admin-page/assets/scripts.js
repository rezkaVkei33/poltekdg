    // Set tanggal
    function setCurrentDate() {
        const now = new Date();
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        const formatted = now.toLocaleDateString('id-ID', options);
        const dateSpan = document.getElementById('currentDate');
        if(dateSpan) dateSpan.innerText = formatted;
    }
    setCurrentDate();

    // Simulasi alert untuk menu
    window.showAlert = function(menuName) {
        alert(`Navigasi ke: ${menuName}\nFungsi siap diintegrasikan dengan backend.`);
    };
    
    window.dashboardActive = function() {
        alert("Dashboard Admin: ringkasan statistik dan aktivitas terbaru.");
    };
    
    window.logoutAlert = function() {
        if(confirm("Yakin ingin keluar dari sesi admin?")) {
            alert("Anda telah logout. (Simulasi)");
        }
    };
    
    // Untuk perangkat sentuh, pastikan dropdown tetap berfungsi dengan klik
    if ('ontouchstart' in window) {
        const style = document.createElement('style');
        style.textContent = `
            .dropdown:hover .dropdown-menu {
                display: none;
            }
            .dropdown-menu.show {
                display: block !important;
                opacity: 1 !important;
                visibility: visible !important;
                transform: translateY(0) !important;
            }
        `;
        document.head.appendChild(style);
    }
    
    // FOOTER AUTO-HIDE
    let footerTimeout;
    const footer = document.getElementById('autoHideFooter');
    
    function showFooter() {
        if(footer.classList.contains('footer-hidden')) {
            footer.classList.remove('footer-hidden');
        }
        clearTimeout(footerTimeout);
        footerTimeout = setTimeout(() => {
            if(!footer.classList.contains('footer-hidden')) {
                footer.classList.add('footer-hidden');
            }
        }, 2500);
    }
    
    const events = ['mousemove', 'scroll', 'click', 'touchstart', 'keydown'];
    events.forEach(ev => {
        window.addEventListener(ev, showFooter);
        document.addEventListener(ev, showFooter);
    });
    
    window.addEventListener('load', () => {
        showFooter();
        clearTimeout(footerTimeout);
        footerTimeout = setTimeout(() => {
            if(footer && !footer.classList.contains('footer-hidden')) {
                footer.classList.add('footer-hidden');
            }
        }, 3000);
    });
    
    document.body.addEventListener('mouseenter', showFooter);
    
    const dropdownItems = document.querySelectorAll('.dropdown');
    dropdownItems.forEach(item => {
        item.addEventListener('mouseenter', showFooter);
        item.addEventListener('click', showFooter);
    });
    
    const toggler = document.querySelector('.navbar-toggler');
    if(toggler) {
        toggler.addEventListener('click', showFooter);
    }