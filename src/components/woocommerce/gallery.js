const Gallery = {
    wrapper: document.querySelector('.gallery-hero'),
    mainImage: document.querySelector('.gallery-hero img'),
    items: document.querySelectorAll('.gallery-link'),
    selectors: document.querySelectorAll('.gallery-large-selector'),

    activeThumbnail: function(s){
        if(!s){
            this.selectors[0].classList.add('active');
        } else {
            this.selectors.forEach(function(selector){
                selector.classList.remove('active');
            });
            s.target.classList.add('active');
        }
    },

    selectImage: function(){
        self = this;
        this.items.forEach(function(item){
            item.addEventListener('click', function(e){
                if(e.target.classList.contains('gallery-large-selector')){
                    e.preventDefault();
                    // self.updateMainImage(e);
                    // self.activeThumbnail(e);
                }
            });
            item.addEventListener('mouseover', function(e){
                if(e.target.classList.contains('gallery-large-selector')){
                    e.preventDefault();
                    self.updateMainImage(e);
                    self.activeThumbnail(e);
                }
            });
        });
    },

    updateMainImage: function(e){
       
        // Get values
        let imageAnchor = e.target.parentElement;
        let imageElement = e.target.previousSibling;

        let newImageSrcSet = imageAnchor.getAttribute('data-srcset');
        let newAlt = imageElement.getAttribute('alt');
        let newLargeSrc = imageAnchor.getAttribute('data-large');

        let newTitle = imageAnchor.getAttribute('title');

        // Set values on the hero image
        this.mainImage.setAttribute('srcset', newImageSrcSet);
        this.mainImage.setAttribute('alt', newAlt);
        
        // Set values on the anchor
        anchor = this.mainImage.parentElement;
        anchor.setAttribute('title', newTitle);
        anchor.setAttribute('href', newLargeSrc);        
    },

    start: function(){
        this.activeThumbnail();
        this.selectImage();
    },

    init: function(){
        if( Gallery.wrapper ){
            this.start();
        }
    }
};

Gallery.init();