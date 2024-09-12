// Navigation toggle
window.addEventListener('load', function () {
      let body = document.querySelector('body');
      document.querySelector('#primary-menu-toggle').addEventListener('click', function (e) {
            e.preventDefault();
            body.classList.toggle('menu-open');
      });
});
