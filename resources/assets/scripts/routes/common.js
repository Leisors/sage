import AnimationsManager from '../util/animationsManager'
import { onLoad, onClick, onScroll, onHover } from '../imports/animations';

export default {
  init() {
    
    const animationsManager = new AnimationsManager({ reverse: true });
    animationsManager.setAnimations({ onLoad, onClick, onScroll, onHover });

  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
