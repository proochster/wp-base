const TopNav = {
    $button: document.querySelector('.navbar-burger'),
    $nav: document.querySelector('.navbar-menu'),

    init: function() {
        const self = this;

        this.$button.onclick = function(){
            self.$nav.classList.toggle('is-active');
            // Update aria attribute
            this.getAttribute('aria-expanded') === 'false' ? this.setAttribute('aria-expanded', 'true') : this.setAttribute('aria-expanded', 'false');
        };
    },
};

if (TopNav.$button && TopNav.$nav) {
    TopNav.init();
}