//---------------------------------------------

//sidebar anim
const sideLinks = document.querySelectorAll('.sidebar .side-menu li a:not(.logout)');

sideLinks.forEach(item => {
    const li = item.parentElement;
    item.addEventListener('click', () => {
        sideLinks.forEach(i => {
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })
});

const menuBar = document.querySelector('.content nav .bx.bx-menu');
const sideBar = document.querySelector('.sidebar');

menuBar.addEventListener('click', () => {
    sideBar.classList.toggle('close');
});

//---------------------------------------------

//bar de recherche (display none)
const searchBtn = document.querySelector('.content nav form .form-input button');
const searchBtnIcon = document.querySelector('.content nav form .form-input button .bx');
const searchForm = document.querySelector('.content nav form');

searchBtn.addEventListener('click', function (e) {
    if (window.innerWidth < 576) {
        e.preventDefault;
        searchForm.classList.toggle('show');
        if (searchForm.classList.contains('show')) {
            searchBtnIcon.classList.replace('bx-search', 'bx-x');
        } else {
            searchBtnIcon.classList.replace('bx-x', 'bx-search');
        }
    }
});

//---------------------------------------------

//sidebar resize
window.addEventListener('resize', () => {
    if (window.innerWidth < 768) {
        sideBar.classList.add('close');
    } else {
        sideBar.classList.remove('close');
    }
    if (window.innerWidth > 576) {
        searchBtnIcon.classList.replace('bx-x', 'bx-search');
        searchForm.classList.remove('show');
    }
});

//---------------------------------------------

//thème dark-light
const toggler = document.getElementById('theme-toggle');
const body = document.body;

// Vérifier l'état enregistré et appliquer le thème au chargement de la page
window.addEventListener('DOMContentLoaded', () => {
    const isDarkMode = localStorage.getItem('darkMode') === 'true';
    toggler.checked = isDarkMode;
    if (isDarkMode) {
        body.classList.add('dark');
    }
});

// Gérer le changement d'état de la case à cocher
toggler.addEventListener('change', function () {
    if (this.checked) {
        body.classList.add('dark');
        localStorage.setItem('darkMode', 'true');
    } else {
        body.classList.remove('dark');
        localStorage.setItem('darkMode', 'false');
    }
});

//---------------------------------------------

//LOGOUT
// Ouvrir le modal de confirmation de déconnexion
document.getElementById("logoutBtn").addEventListener("click", function () {
    document.getElementById("logoutModal").style.display = "block";
});

// Confirmer la déconnexion
document.getElementById("confirmLogout").addEventListener("click", function () {
    window.location.href = "../post/logout.php";
});

// Annuler la déconnexion
document.getElementById("cancelLogout").addEventListener("click", function () {
    document.getElementById("logoutModal").style.display = "none";
});
