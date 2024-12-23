function cleanError(element) {
    if (element.classList.contains('border-red-500')) {
        element.classList.remove('border-red-500');
        element.classList.add('border-transparent');
    }
}

let showIconBtns = document.querySelectorAll('.show_btn');
console.log(showIconBtns);
if (showIconBtns) {
    showIconBtns.forEach((btn) => {
        btn.addEventListener('click', () => {
            let input = btn.previousElementSibling;

            let inputCurrentType = input.getAttribute('type');

            if (inputCurrentType === 'password') {
                btn.classList.remove('fa-eye');
                btn.classList.add('fa-eye-slash');
                input.setAttribute('type', 'text');
            } else {
                btn.classList.remove('fa-eye-slash');
                btn.classList.add('fa-eye');
                input.setAttribute('type', 'password');
            }
        });
    });
}

let menuBtn = document.getElementById('menu_btn');
let menu = document.getElementById('menu');
let closeMenuBtn = document.getElementById('close_menu_btn');
let backdrop = document.getElementById('menu_backdrop');

if (menuBtn && menu && closeMenuBtn && backdrop) {
    menuBtn.addEventListener('click', () => {
        menu.classList.remove('translate-x-full', 'opacity-0', 'hidden');
        menu.classList.add('translate-x-0', 'opacity-100', 'flex');
        backdrop.classList.remove('hidden');
        backdrop.classList.add('opacity-100');
    });

    closeMenuBtn.addEventListener('click', closeMenu);
    backdrop.addEventListener('click', closeMenu);

    function closeMenu() {
        menu.classList.remove('translate-x-0', 'opacity-100', 'flex');
        menu.classList.add('translate-x-full', 'opacity-0');
        backdrop.classList.remove('opacity-100');
        backdrop.classList.add('hidden');
    }
}
