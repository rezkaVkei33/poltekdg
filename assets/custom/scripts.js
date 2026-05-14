document.querySelectorAll('.navbar-nav a:not(.dropdown-toggle)').forEach(link => {
  link.addEventListener('click', () => {
    const nav = document.querySelector('.navbar-collapse');
    if (nav && nav.classList.contains('show')) {
      bootstrap.Collapse.getOrCreateInstance(nav).hide();
    }
  });
});

const desktopNavbar = window.matchMedia('(min-width: 992px)');
const navbarDropdowns = document.querySelectorAll('.navbar-poltekdg .nav-item.dropdown');

function closeNavbarDropdowns(exceptDropdown = null) {
  navbarDropdowns.forEach(dropdown => {
    if (dropdown === exceptDropdown) {
      return;
    }

    const toggle = dropdown.querySelector('.dropdown-toggle');
    const menu = dropdown.querySelector('.dropdown-menu');

    dropdown.classList.remove('show');
    toggle?.classList.remove('show');
    toggle?.setAttribute('aria-expanded', 'false');
    menu?.classList.remove('show');
  });
}

navbarDropdowns.forEach(dropdown => {
  const toggle = dropdown.querySelector('.dropdown-toggle');
  const menu = dropdown.querySelector('.dropdown-menu');

  dropdown.addEventListener('mouseenter', () => {
    if (!desktopNavbar.matches) {
      return;
    }

    closeNavbarDropdowns(dropdown);
    dropdown.classList.add('show');
    toggle?.classList.add('show');
    toggle?.setAttribute('aria-expanded', 'true');
    menu?.classList.add('show');
  });

  dropdown.addEventListener('mouseleave', () => {
    if (!desktopNavbar.matches) {
      return;
    }

    dropdown.classList.remove('show');
    toggle?.classList.remove('show');
    toggle?.setAttribute('aria-expanded', 'false');
    menu?.classList.remove('show');
  });
});

desktopNavbar.addEventListener('change', () => closeNavbarDropdowns());
