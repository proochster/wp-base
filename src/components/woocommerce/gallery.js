const Gallery = {
    wrapper: document.querySelector('.gallery-wrapper'),
    mainImage: document.querySelector('.gallery-wrapper img'),
    thumbnails: document.querySelectorAll('.gallery-thumbnails img'),

    activeThumbnail: function(thumbnail){
        if(!thumbnail){
            this.thumbnails[0].classList.add('active');
        } else {
            this.thumbnails.forEach(function(t){
                t.classList.remove('active');
            });
            thumbnail.target.classList.add('active');
        }
    },

    selectImage: function(){
        self = this;
        this.thumbnails.forEach(function(item){
            item.addEventListener('click', function(e){
                e.preventDefault();
                self.updateMainImage(e);
                self.activeThumbnail(e);
            });
            item.addEventListener('mouseover', function(e){
                e.preventDefault();
                self.updateMainImage(e);
                self.activeThumbnail(e);
            });
        });
    },

    updateMainImage: function(e){
        // Get values
        let imageAnchor = e.target.parentElement;
        let newImageSource = imageAnchor.getAttribute('href');
        let newImageSrcSet = imageAnchor.getAttribute('data-srcset');
        let newAlt = e.target.getAttribute('alt');
        let newLargeSrc = imageAnchor.getAttribute('data-large');

        let newTitle = imageAnchor.getAttribute('title');
        
        // Set values on the hero image
        this.mainImage.setAttribute('src', newImageSource);
        this.mainImage.setAttribute('srcset', newImageSrcSet);
        this.mainImage.setAttribute('alt', newAlt);
        this.mainImage.setAttribute('title', '');
        
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