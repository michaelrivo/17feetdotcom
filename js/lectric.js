/*!
 * Lectric v0.4.5
 * http://github.com/mckinney/lectric
 *
 * Copyright 2011, McKinney
 * Licensed under the MIT license.
 * http://github.com/mckinney/lectric/blob/master/LICENSE
 *
 * Author: Brett C. Buddin (http://github.com/brettbuddin)
 */

(function(window, $) {
  var ua = navigator.userAgent.toLowerCase();
  isWebkit = !!ua.match(/applewebkit/i);
  var supportsTouch = false;
  try {
    document.createEvent("TouchEvent");
    supportsTouch = true;
  } catch (e) {}

// TESTING PURPOSES
// supportsTouch = true;
// isWebkit = true;

  var cssWithoutUnit = function(element, attribute) {
    var measure = element.css(attribute);
    return (measure !== undefined) ? parseInt(measure.replace('px', ''), 10) : 0;
  };

  var Position = function(x, y) {
	//console.log(x);
	
    if (x && x.hasOwnProperty('x') && x.hasOwnProperty('y')) {
      x = x.x;
      y = x.y;
    }
	//this.page = 0;
    this.x = x;
    this.y = y;
  };
  // Position.prototype = {
  //   difference: function(p) {
  //     return new Position(p.x - this.x, p.y - this.y);
  //   }
  // };

  var Lectric = function() {
    if (supportsTouch && isWebkit) {
      return new TouchSlider();
    } else {
      return new BaseSlider();
    }
  };

  var BaseSlider = function() {};

  // Initialize the BaseSlider.
  //
  // text - The String CSS selector of the slider container.
  // opts - The Map of extra parameters.
  // 
  // Returns nothing.
  BaseSlider.prototype.init = function(target, opts) {
    this.opts = $.extend({
      reverse: false,
      next: undefined, 
      previous: undefined,
      itemWrapperClassName: 'items',
      itemClassName: 'item',
      limitLeft: false,
      limitRight: false, 
      animateEasing: 'swing',
      animateDuration: 1000,//$.fx.speeds._default,
      hooks: {},
      slideThreshold: 45
    }, opts);

    this.position = new Position(0, 0);
    this.startPosition = new Position(this.position);
    this.lastPosition = new Position(this.position);
	this.pageNum = 0;
  
    // Set up the styling of the slider
    var element = $('<div/>', {
      'class': this.opts.itemWrapperClassName
    });
    element.css('width', '1000000px');

    var itemSelector = '.' + this.opts.itemClassName;
    var itemWrapperSelector = '.' + this.opts.itemWrapperClassName;

    $(target).css('overflow', 'hidden');
    $(target).find(itemSelector).css('float', 'left').wrapAll(element);
    $(target).addClass('lectric-slider');
    this.element = $(target).find(itemWrapperSelector);
    this.element.itemSelector = itemSelector;
    this.element.itemWrapperSelector = itemWrapperSelector;

    var self = this;
    
    var type = supportsTouch ? 'touchstart' : 'click';
    $(this.opts.next).bind(type, function(e) {
      e.preventDefault();
      var page = self.page();
      self.to(page + 1);
      self.element.trigger('nextButton.lectric');
    });

    $(this.opts.previous).bind(type, function(e) {
      e.preventDefault();
      var page = self.page();
      self.to(page - 1);
      self.element.trigger('previousButton.lectric');
    });
    
    // Keep clicks from doing what they do if
    // we support touch on this device
    if (supportsTouch) {
      $(this.opts.next).click(function(e) {
        e.preventDefault();
      });

      $(this.opts.previous).click(function(e) {
        e.preventDefault();
      });
    } else {
		var self = this;
		// $(window).resize( function(){
		// 	//console.log(self);	
		// 	self.holdPage();
		// });
		//console.log('ran it');
	}
    
    // Bind callbacks passed in at initialization
    $.each(this.opts.hooks, function(name, fn) {
      if ($.isArray(fn)) {
        $.each(fn, function(fn2) {
          self.subscribe(name, fn2);
        });
      } else {
        self.subscribe(name, fn);
      }
    });

    this.element.trigger('init.lectric');
  };

  // Update the current position of the slider.
  //
  // opts - The Map of extra parameters:
  //        animate - Boolean of whether or not to animate between two states.
  //        triggerSlide - Boolean of whether or not to trigger the move hook.
  // 
  // Returns nothing.
  BaseSlider.prototype.update = function(opts) {
    var options = $.extend({animate: true, triggerSlide: true}, opts);

	//console.log('update');
    var self = this;
    var after = function() {
      self.element.trigger('animationEnd.lectric');
      $(this).dequeue();
    };

	//console.log(this.pageNum+ ' "update" func')
	
    if (options.animate) {
      this.element.animate({left: "-"+this.pageNum + '00%'}, 
			this.opts.animateDuration, 
			this.opts.animateEasing
      ).queue(after);
	 //this.pageNum = this.page();
    } else {
      this.element.css({left: "-"+this.pageNum + '00%'}).queue(after);
    }

    if (options.triggerSlide) { this.element.trigger('slide.lectric'); }
  };


  // Subscribe a callback function to a hook.
  //
  // name - The String name of the hook.
  // fn - The Function callback to execute when the hook is triggered.
  // 
  // Returns the Function callback that was bound to the hook.
  BaseSlider.prototype.subscribe = function(name, fn) {
    var self = this;
    var callback = function(e) {
      if (e.target == self.element[0]) { 
        fn(self, e);
      }
    };

    this.element.bind(name + '.lectric', callback);
    return callback;
  };
  BaseSlider.prototype.bind = function(name, fn) {
    this.subscribe(name, fn);
  };

  // Unsubscribe a callback function from a hook or unsubscribe all callbacks from a hook.
  //
  // name - The String name of the hook.
  // fn - The Function handler to unbind from the element.
  // 
  // Returns nothing.
  BaseSlider.prototype.unsubscribe = function(name, fn) {
    if (typeof fn !== undefined && $.isFunction(fn)) {
      this.element.unbind(name + '.lectric', fn);
    } else {
      this.element.unbind(name + '.lectric');
    }
  };
  BaseSlider.prototype.unbind = function(name, fn) {
    this.unsubscribe(name, fn);
  };

  // Retrieve the current page of the slider.
  // 
  // Returns the Integer page number of the slider.
  BaseSlider.prototype.page = function() {
    return Math.abs(Math.round(this.position.x / this.itemWidth()));
  };

  // Move to a specific page number.
  //
  // page - The Integer page number to move to.
  // 
  // Returns nothing.
  BaseSlider.prototype.to = function(page) {
	//console.log(this.pageNum+ ' "to" func, page: "value",  '+ page);
    var previous = this.position.x;
    this.position.x = this.limitXBounds(this.xForPage(page));

    if (this.pageNum !== page) {
		this.pageNum = page;
      this.update();
    }
  };

  // Move to a specific item in the slider, regardless of its position.
  //
  // item - The DOM Reference of the item you'd like to move to.
  // 
  // Returns nothing.
  BaseSlider.prototype.toItem = function(item) {
    var all = this.element.find(this.element.itemSelector);

    var i;
    var length = all.length;
    for (i = 0; i < length; i++) {
      if ($(all[i])[0] == item[0]) { this.to(i); }
    }
  };

  // Retrieve the current X position.
  //
  // page - The Integer page number.
  // 
  // Returns the Integer X position of the slider.
  BaseSlider.prototype.xForPage = function(page) {
    var flip = (this.opts.reverse) ? 1 : -1;
    return flip * page * this.itemWidth();
  };


  // Retrieve the width of a single item (including margin-right and padding).
  // 
  // Returns the Integer width of a single item.
  BaseSlider.prototype.itemWidth = function() {
    var first = this.element.find(this.element.itemSelector).eq(0);
    var padding = cssWithoutUnit(first, 'paddingRight') + cssWithoutUnit(first, 'paddingLeft');
    return cssWithoutUnit(first, 'marginRight') + padding + first.width();
  };

  // Retrieve number of items in the slider.
  // 
  // Returns the Integer number of items.
  BaseSlider.prototype.itemCount = function() {
    return this.element.find(this.element.itemSelector).size();
  };


  // Constrain the X position to within the slider beginning and end.
  //
  // x - The Integer X position
  //
  // Returns the Integer X position after being constrained.
  BaseSlider.prototype.limitXBounds = function(x) {
    var itemWidth = this.itemWidth();
    var itemCount = this.itemCount();
    var totalWidth = itemWidth * itemCount;

    if (this.opts.reverse) {
      x = (x > totalWidth - itemWidth) ?  totalWidth - itemWidth : x;
      x = (x < 0) ? 0 : x;
    } else {
      x = (x < -totalWidth + itemWidth) ?  -totalWidth + itemWidth : x;
      x = (x > 0) ? 0 : x;
    }

    if ((this.position.x - x > 0 && this.opts.limitRight) || 
        (this.position.x - x < 0 && this.opts.limitLeft)) {	
      	x = this.position.x ;
    }

    return x;
  };

  var TouchSlider = function() {};
  TouchSlider.prototype = new BaseSlider();
  TouchSlider.superobject = BaseSlider.prototype;

  // Initialize the TouchSlider.
  //
  // text - The String CSS selector of the slider container.
  // opts - The Map of extra parameters.
  // 
  // Returns nothing.
  TouchSlider.prototype.init = function(target, opts) {
    TouchSlider.superobject.init.call(this, target, opts);
    this.opts = $.extend({
      tossFunction: function(x, dx, dt) {
        return x + dx * 100 / dt;
      },
      tossing: false
    }, this.opts);
    $(target).addClass('lectric-slider-touch');

    this.gesturing = false;
    $(target)[0].addEventListener('touchstart', this, false);
    $(target)[0].addEventListener('webkitTransitionEnd', this, false);
  };

  // Proxy the events triggered on the element to another function.
  //
  // event - The Event triggered on the element
  // 
  // Returns nothing.
  TouchSlider.prototype.handleEvent = function(event) { 
    TouchEvents[event.type].call(this, event); 
  };

  // Update the current position of the slider.
  //
  // opts - The Map of extra parameters:
  //        animate - Boolean of whether or not to animate between two states.
  //        triggerSlide - Boolean of whether or not to trigger the move hook.
  // 
  // Returns nothing.
  TouchSlider.prototype.update = function(opts) {
    var options = $.extend({animate: true, triggerSlide: true}, opts);
    if (options.animate) { this.decayOn(); }
	
	//alert(this.element.attr('style'));
	this.element.css('left', '-'+this.pageNum + '00%'); 
	
	//alert('update via %'+this.pageNum);
    if (options.triggerSlide) { this.element.trigger('slide.lectric'); }
  };


  // Update the current position of the slider for Touch events
  //
  // opts - The Map of extra parameters:
  //        animate - Boolean of whether or not to animate between two states.
  //        triggerSlide - Boolean of whether or not to trigger the move hook.
  // 
  // Returns nothing.
  TouchSlider.prototype.updateTouch = function(opts) {
    var options = $.extend({animate: true, triggerSlide: true}, opts);
    if (options.animate) { this.decayOn(); }
	
	//alert( (this.position.x / this.itemWidth()) +'px');
	//$('.footer h3').text(this.position.x / this.itemWidth() * 100 +'%');
	this.element.css('left', this.position.x / this.itemWidth() * 100 +'%');
	//this.element.css('left', (this.position.x / this.itemWidth()) + 'px');
	

    if (options.triggerSlide) { this.element.trigger('slide.lectric'); }
  };


  // Turn off CSS3 animation decay.
  // 
  // Returns nothing.
  TouchSlider.prototype.decayOff = function() {
	//alert('decay off');
    this.element.css({'-webkit-transition-duration': '0s'});
    this.element.css({'-webkit-transition-property': 'none'});
  };

  // Turn on CSS3 animation decay.
  // 
  // Returns nothing.
  TouchSlider.prototype.decayOn = function() {
	//alert('decay on');
    var duration = this.opts.animateDuration;
    if (typeof duration === "number") {
      duration = duration / 1000;
    } else {
      if (duration in $.fx.speeds) {
        duration = $.fx.speeds[duration];
      } else {
        duration = $.fx.speeds._default;
      }
    }
    this.element.css({'-webkit-transition-duration': duration + 's'});
    //this.element.css({'-webkit-transition-property': '-webkit-transform'});
	this.element.css('-webkit-transition-property', 'left');
  };

  var TouchEvents = {
    click: function(e) {
      if (this.moved) { e.preventDefault(); }
      this.element[0].removeEventListener('click', this, false);
      return false;
    },

    touchstart: function(e) {
      this.currentTarget = e.currentTarget;
      this.startPosition.x = e.touches[0].pageX - this.position.x;
      this.startPosition.y = e.touches[0].pageY - this.position.y;
      this.moved = false;

      window.addEventListener('gesturestart', this, false);
      window.addEventListener('gestureend', this, false);
      window.addEventListener('touchmove', this, false);
      window.addEventListener('touchend', this, false);
      this.element[0].addEventListener('click', this, false);

      this.decayOff();

      this.element.trigger('start.lectric');
    },

    touchmove: function(e) {
      if (this.gesturing) { return false; }

      if (!this.moved) {
        var deltaY = e.touches[0].pageY - this.startPosition.y;
        var deltaX = e.touches[0].pageX - this.startPosition.x;

		// touch of less than 15 vertical... don't scroll page
        if (Math.abs(deltaY) < 8) {
	//$('#debug').text('prevent '+ deltaY);
          e.preventDefault();
        }

        this.element.trigger('firstSlide.lectric');
      }

      this.moved = true;
      this.lastPosition.x = this.position.x;
      this.lastPosition.y = this.position.y;
      this.lastMoveTime = new Date();
	
      // limits ends
	  this.position.x = e.touches[0].pageX- this.startPosition.x;
	
      this.updateTouch({animate: false});
    },

    touchend: function(e) {
      window.removeEventListener('gesturestart', this, false);
      window.removeEventListener('gestureend', this, false);
      window.removeEventListener('touchmove', this, false);
      window.removeEventListener('touchend', this, false);

      if (this.moved) {
        var dx = this.position.x - this.lastPosition.x;
        var dt = (new Date()) - this.lastMoveTime + 1; 
        
        var width = this.itemWidth();
		
        if (this.opts.tossing) {
          var tossedX = this.limitXBounds(this.opts.tossFunction(this.position.x, dx, dt));
          this.position.x = Math.round(tossedX / width) * width;
		  this.updateTouch();
		  //$('#debug').text('this.opts.tossing');
        } else {
          var page = this.page();
		  var itemCt = this.itemCount(); 
		//$('#debug').text('dx: '+dx +'slideThreshold: '+ this.opts.slideThreshold+ ' page: '+page);
        
			//$('#debug').text(dx < -this.opts.slideThreshold && page < (itemCt-1));

  		  if (dx > this.opts.slideThreshold && page > 0){
	
			this.pageNum = page-1;
			//$('#debug').text('moving left');
          }
          else if (dx < -this.opts.slideThreshold && page < (itemCt-1)) {
			// if 
			this.pageNum = page +1;
			//$('#debug').text('moving right');
          }
          else{
	//$('#debug').text('not tossed hard enough '+ dx);
			if (page < (itemCt-1)){
				this.pageNum = page;
			} else{
				//keeps from swiping to non-existant slide at end 
				this.pageNum = itemCt-1;
			}
          }
			//$('#debug').text(this.pageNum);
			
			this.position.x = -this.pageNum*this.itemWidth();
			this.update();
        }

        
        this.element.trigger('end.lectric');
      } else {
	
        this.element.trigger('endNoSlide.lectric');
      }

      this.currentTarget = undefined;
    },

    gesturestart: function(e) { 
      this.gesturing = true; 
    },

    gestureend: function(e) { 
      this.gesturing = false; 
    },

    webkitTransitionEnd: function(e) {
	//console.log('webkitTransitionEnd');
      this.element.trigger('animationEnd.lectric');
    }
  };
  
  Lectric.BaseSlider = BaseSlider;
  Lectric.TouchSlider = TouchSlider;
  window.Lectric = Lectric;
})(window, jQuery);
