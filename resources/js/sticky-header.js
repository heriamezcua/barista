document.addEventListener('DOMContentLoaded', function (){
    window.addEventListener('scroll', function () {
        const headerEl = document.querySelector('header');
        headerEl.classList.toggle('sticky', window.scrollY > 0);
    });
});
