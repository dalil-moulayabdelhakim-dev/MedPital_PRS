const list = document.querySelectorAll('.menuItem');
const page = window.location.pathname;
function activeLink() {

    list.forEach((item) =>{
        if (page === '/contact/us') {
            item.classList.remove('active')
        }
    }
    );
    this.classList.add('active');
}

list.forEach((item) =>
    item.addEventListener('click', activeLink));
