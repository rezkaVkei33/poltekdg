  <script>
                // Brosur Slider
                const broswurSlider = document.querySelector('.broswur-slider');
                const broswurSlides = document.querySelectorAll('.broswur-slide');
                const broswurDots = document.querySelectorAll('.broswur-dot');
                const broswurPrevBtn = document.querySelector('.broswur-prev');
                const broswurNextBtn = document.querySelector('.broswur-next');

                let currentBroswurSlide = 0;
                const totalBroswurSlides = broswurSlides.length;

                function updateBroswurSlider() {
                    broswurSlider.style.transform = `translateX(-${currentBroswurSlide * 100}%)`;
                    broswurDots.forEach((dot, index) => {
                        if (index === currentBroswurSlide) {
                            dot.classList.add('opacity-100');
                            dot.classList.remove('opacity-75');
                        } else {
                            dot.classList.remove('opacity-100');
                            dot.classList.add('opacity-75');
                        }
                    });
                }

                broswurPrevBtn.addEventListener('click', () => {
                    currentBroswurSlide = (currentBroswurSlide - 1 + totalBroswurSlides) % totalBroswurSlides;
                    updateBroswurSlider();
                });

                broswurNextBtn.addEventListener('click', () => {
                    currentBroswurSlide = (currentBroswurSlide + 1) % totalBroswurSlides;
                    updateBroswurSlider();
                });

                broswurDots.forEach(dot => {
                    dot.addEventListener('click', () => {
                        currentBroswurSlide = parseInt(dot.getAttribute('data-slide'));
                        updateBroswurSlider();
                    });
                });

                // Auto slide every 5 seconds
                setInterval(() => {
                    currentBroswurSlide = (currentBroswurSlide + 1) % totalBroswurSlides;
                    updateBroswurSlider();
                }, 5000);
            </script>
 <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('active');
        }

        function toggleMobileDropdown(id) {
            const dropdown = document.getElementById(id);
            dropdown.classList.toggle('active');
            
            // Close other dropdowns
            const allDropdowns = document.querySelectorAll('.mobile-dropdown');
            allDropdowns.forEach(dd => {
                if (dd.id !== id) {
                    dd.classList.remove('active');
                }
            });
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobileMenu');
            const button = event.target.closest('button');
            
            if (!menu.contains(event.target) && !button) {
                menu.classList.remove('active');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
<script>
(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9840d11a903a3de2',t:'MTc1ODcwMTU0Ny4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();
</script>