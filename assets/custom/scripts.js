document.querySelectorAll('.navbar-nav a:not(.dropdown-toggle)').forEach(link => {
  link.addEventListener('click', () => {
    const nav = document.querySelector('.navbar-collapse');
    if (nav.classList.contains('show')) {
      bootstrap.Collapse.getOrCreateInstance(nav).hide();
    }
  });
});
