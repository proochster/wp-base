const Orderby = {
    form : document.querySelector('.orderby-form'),
    select : document.querySelector('.orderby-select'),

    update : function(){
        this.form.addEventListener("change", function(){
            this.submit();
        });
    },

    init : function(){
        if( Orderby.form ){
            this.update();
        }
    }
};

Orderby.init();