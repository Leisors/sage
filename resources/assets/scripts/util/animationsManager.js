import $ from 'jquery'
// import * as ScrollMagic from 'scrollmagic'
// import 'animation.gsap'
// import 'debug.addIndicators'

export default class AnimationsManager {

    constructor( props = {} ) {
        const acceptableProps = [ 'debug', 'reverse' ];
        
        acceptableProps.forEach( propName => {
            const prop = props[propName];
            this[propName] = prop === undefined ? false : prop;
        });

        this.controller = new ScrollMagic.Controller();
    }

    playAnimation( animation ) {
        animation().restart();
    }

    createScene( triggerElement, timeline ) {
        const scene = new ScrollMagic.Scene({
            triggerElement,
            triggerHook: 0.9,
            reverse: this.reverse,
        }).setTween( timeline(triggerElement) );

        if( this.debug ) scene.addIndicators();
        scene.addTo(this.controller);
    }

    animateOnScroll( { selector, timeline } ) {
        const elements = document.querySelectorAll(selector);
        elements.forEach( element => { this.createScene(element, timeline) });
    }

    animateOnHover( { selector, timeline } ) {
        const objects = document.querySelectorAll( selector );
        
        objects.forEach( object => {
            const animation = timeline( object );
            object.addEventListener('mouseover', () => animation.restart() );
            object.addEventListener('mouseleave', () => animation.reverse() );
        });
    }

    animateOnLoad( { selector, timeline } ) {
        const objects = document.querySelectorAll( selector );
        objects.forEach( object => {
            const t = timeline( object );
            if( this.debug ) $(window).click( () => t.restart() );
        });
    }

    animateOnClick( { trigger, selector, timeline } ) {
        if( trigger === undefined ) trigger = selector;
        const triggerObjects = document.querySelectorAll( trigger );
        const objects = document.querySelectorAll( selector );

        triggerObjects.forEach( triggerObject => {
            triggerObject.addEventListener( 'click', () => {
                objects.forEach( object => timeline(object).restart() );
            });
        });
        
    }

    setAnimations( { onLoad, onClick, onScroll, onHover } ) {

        if( onLoad ) onLoad.forEach( animationObject => this.animateOnLoad( animationObject ) );
        if( onClick ) onClick.forEach( animationObject => this.animateOnClick( animationObject ) );
        if( onHover ) onHover.forEach( animationObject => this.animateOnHover( animationObject ) );
        if( onScroll ) onScroll.forEach( animationObject => this.animateOnScroll( animationObject ) );
    }

}