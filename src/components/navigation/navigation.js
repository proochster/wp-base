const TopNav = {
    $button: document.querySelector('.navbar-burger'),
    $nav: document.querySelector('.navbar-menu'),
    $body: document.querySelector('body'),

    init: function() {
        const self = this;

        this.$button.onclick = function(){
            this.classList.toggle('is-active');
            self.$nav.classList.toggle('is-active');
            self.$body.classList.toggle('no-scroll');
            // Update aria attribute
            this.getAttribute('aria-expanded') === 'false' ? this.setAttribute('aria-expanded', 'true') : this.setAttribute('aria-expanded', 'false');
        };
    },
};

if (TopNav.$button && TopNav.$nav) {
    TopNav.init();
}