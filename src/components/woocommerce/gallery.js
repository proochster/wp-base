const Gallery = {
    wrapper: document.querySelector('.gallery-hero'),
    mainImage: document.querySelector('.gallery-hero img'),
    links: document.querySelectorAll('.gallery-link'),
    selectors: document.querySelectorAll('.gallery-large-selector'),
    dots: document.querySelectorAll('.gallery-nav-dot'),

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

    selectLargeImage: function(){
        self = this;
        this.links.forEach(function(link){
            link.addEventListener('click', function(e){
                if(e.target.classList.contains('gallery-large-selector')){
                    e.preventDefault();
                    // self.updateMainImage(e);
                    // self.activeThumbnail(e);
                }
            });
            link.addEventListener('mouseover', function(e){
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

    setThresholds: function(){
        let thresholds = [];
        let numSteps = 20;
        
        for (let i=1.0; i<=numSteps; i++) {
            let ratio = i/numSteps;
            thresholds.push(ratio);
        }
        
        thresholds.push(0);
        return thresholds;
    },

    observeNav: function(){

        self = this;

        let options = {
            rootMargin: '0px',
            threshold: this.setThresholds()
        }        

        let observer = new IntersectionObserver(this.updateNav, options);
        let items = document.querySelectorAll('.gallery-item');

        items.forEach(function (item) {
            observer.observe(item);

            // Call function setting up click events and scrolling to gallery items
            self.addScrolling(item.getAttribute("data-item-index"));
        });
    },

    updateNav: function(items){ 
        
        items.forEach(function (item){
            // Make a connection between gallery item and the navigation dot
            let dataIndex = item.target.getAttribute("data-item-index");
            let dot = document.querySelectorAll('.gallery-nav-dot')[dataIndex];

            if(item.isIntersecting){
                
                let shadowSize =  Math.round((10 - (item.intersectionRatio * 10)) * 10 ) / 10 ;
                dot.setAttribute('style', `border-width: ${shadowSize}px`);
            } else {
                dot.setAttribute('style', `border-width: 10px`);
            }
        });       
    },

    addScrolling: function(index){

        let dot = self.dots[index];
        let scrollTarget = self.links[index];

        dot.addEventListener('click', function(){
            console.log('clicked');
            scrollTarget.scrollIntoView( {behavior: "smooth", block: "center", inline: "center"});
        });
    },

    start: function(){
        this.activeThumbnail();
        this.observeNav();
        this.selectLargeImage();
    },

    init: function(){
        if( Gallery.wrapper ){
            this.start();
        }
    }
};

Gallery.init();