const isn = {
    "burger": null,
    "input": null,
    "close": null,
    "body": null,
    "focusable": null,
    "navigation": null,
    "main": null,
    "exhibitionOpen": null,
    "exhibitionInput": null,
    "exhibitionClose": null,
    "bookOpen": null,
    "bookInput": null,
    "bookClose": null,
    "bookLink": null,
    "exhibitionLink": null,
    init() {
        this.burger = document.querySelectorAll('.header__label--open');
        this.body = document.querySelector('body');
        this.main = document.querySelector('.main');
        this.focusable = this.main.querySelectorAll('a[href]:not([disabled]), button:not([disabled]), textarea:not([disabled]), input[type="text"]:not([disabled]), input[type="radio"]:not([disabled]), input[type="checkbox"]:not([disabled]), select:not([disabled])');
        this.navigation = document.querySelector('.global');
        // console.log(this.focusable);

        this.burger.forEach((item) => {
            let parent = item.parentNode;
            const newNode = document.createElement('button');
            newNode.classList.add('header__label--open');
            parent.replaceChild(newNode, item);
        })

        this.burger = document.querySelector('.header__label--open');
        this.burger.addEventListener('click', (e) => {
            e.preventDefault();
            const input = document.querySelector('.header__input');
            this.body.classList.toggle('.menu-is-open');
            input.checked = true;
            this.navigation.setAttribute('aria-expanded', 'true');
        })

        this.close = document.querySelectorAll('.header__label--close');
        this.close.forEach((item) => {
            let parent = item.parentNode;
            const newNode = document.createElement('button');
            newNode.classList.add('header__label--close');
            newNode.innerText = "Fermer le menu";
            parent.replaceChild(newNode, item);
        })

        this.close = document.querySelector('.header__label--close');
        this.close.addEventListener('click', (e) => {
            e.preventDefault();
            const input = document.querySelector('.header__input');
            input.checked = false;
            this.navigation.setAttribute('aria-expanded', 'false');
        })
        this.exhibitionClose = document.querySelector('.last-exhibition__label--close')
        this.exhibitionInput = document.querySelector('.last-exhibition__input');
        this.exhibitionClose.addEventListener('keydown', (e) => {
            if (e.keyCode === 13) {
                this.exhibitionInput.checked = false;
            }
        })
        this.exhibitionOpen = document.querySelector('.last-exhibition__label--open')
        this.exhibitionOpen.addEventListener('keydown', (e) => {
            if (e.keyCode === 13) {
                this.exhibitionInput.checked = true;
            }
        })
        this.bookClose = document.querySelector('.last-book__label--close');
        this.bookClose.addEventListener('keydown', (e) => {
            if (e.keyCode === 13) {
                this.bookInput = document.querySelector('.last-book__input');
                this.bookInput.checked = false;
            }
        })
        this.bookOpen = document.querySelector('.last-book__label--open');
        this.bookInput = document.querySelector('.last-book__input');
        this.bookOpen.addEventListener('keydown', (e) => {
            if (e.keyCode === 13) {
                this.bookInput.checked = true;
            }
        })
        this.bookLink = document.querySelectorAll('.last-book a, .last-book label');
        this.bookLink.forEach((element) => {
            element.addEventListener('focus', (e) => {
                this.bookInput.checked = true;
            })
            element.addEventListener('focusout', (e) => {
                this.bookInput.checked = false;
            })
        })
        this.exhibitionLink = document.querySelectorAll('.last-exhibition a, .last-exhibition label');
        this.exhibitionLink.forEach((element) => {
            element.addEventListener('focus', (e) => {
                this.exhibitionInput.checked = true;
            })
            element.addEventListener('focusout', (e) => {
                this.exhibitionInput.checked = false;
            })
        })
    }
}
isn.init();