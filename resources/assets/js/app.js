// $('.footer-scroll-top').on('click', function () {
//     $('body, html').animate({scrollTop: 0}, 900);
//
// });
//
// $(document).ready(function () {
//     if (navigator.userAgent.indexOf('Mac OS X') != -1) {
//         $('body').addClass('platform-ios');
//     }
//     // setTimeout(function(){
//     //     document.getElementById('video').pause();
//     //     document.getElementById('video').play();
//     // },1000);
// });
//
// $(document).ready(function () {
//     var videobackground = new $.backgroundVideo($('.video-cover'), {
//         "align": "centerXY",
//         "width": 1280,
//         "height": 720,
//         "path": "img/images/",
//         "filename": "main-video",
//         "types": ["mp4", "ogg", "webm"],
//         "preload": true,
//         "autoplay": true,
//         "loop": true
//     });
// });
//
//
//
// // if (window.scrollTop> 500){
// //     document.getElementById("video").style.display = "none"
// // }
// // console.log(window.scrollTop)
// //MODAL OPEN
// $(".main-button, .package-details_link").on("click", function (e) {
//     e.preventDefault()
//     // console.log("MODAL")
//     $('#myModal').modal('show');
// });
//
// //HAMBURGER
// $("#hamburger").click(function () {
//     $("#hamburger-block").toggleClass("hamburger__active");
//     $("#nav-icon2").toggleClass('open');
// });
//
// $(document).bind('touchstart click', function (e) {
//     var div = $("#hamburger-block");
//     if (!div.is(e.target)
//         && div.has(e.target).length === 0) {
//         div.removeClass("hamburger__active");
//         $("#nav-icon2").removeClass('open');
//     }
// });
//
//
// // NAVIGATION
//
// $('.navigation-item').on('click', function () {
//     var current = $(this).index(),
//         mark = "section-" + (2 + current),
//         anchor = $("#" + mark).offset();
//     $('body, html').animate({
//         scrollTop: (anchor).top
//     }, 900);
// });
//
// $(".package-item").hover(
//     function () {
//         $(this).removeClass('package-item__hover').siblings().removeClass('package-item__hover');
//     },
//     function () {
//         $("#optimal").addClass('package-item__hover');
//     }
// );
//
// //SLIDER-Works
// $('.slider-control').on('click', function () {
//     var direction = $(this).data('direction');
//     var target = $(this).data('target') || false;
//
//     if (target) {
//         changeSlide(target, direction);
//     } else {
//         changeSlide('.works-slider-block', direction);
//         changeSlide('.slider-content-block', direction);
//     }
// });
//
// function changeSlide(target, direction) {
//     var activeSlideNumber = $(target + ' .active-slide').index();
//     var slides = $(target + ' .slide');
//     var slidesQuantity = slides.length;
//
//     if (direction == "next") {
//         if (activeSlideNumber == slidesQuantity - 1) {
//             makeSlideActive(slides.eq(0));
//         } else {
//             makeSlideActive(slides.eq(activeSlideNumber + 1));
//         }
//     } else {
//         if (activeSlideNumber == 0) {
//             makeSlideActive(slides.eq(slidesQuantity - 1));
//         } else {
//             makeSlideActive(slides.eq(activeSlideNumber - 1));
//         }
//     }
// }
//
// function makeSlideActive(slide) {
//     slide.addClass('active-slide').siblings().removeClass('active-slide');
// }
//
// //TODO::refactor this shit
// function detectSwipe(el, target, func) {
//
//     swipe_det = new Object();
//     swipe_det.sX = 0;
//     swipe_det.eX = 0;
//     var min_x = 50;
//
//     var direction = "";
//     element = document.getElementById(el);
//     element.addEventListener('touchstart', function (e) {
//         var t = e.touches[0];
//         swipe_det.sX = t.screenX;
//     }, false);
//     element.addEventListener('touchmove', function (e) {
//         var t = e.touches[0];
//         swipe_det.eX = t.screenX;
//     }, false);
//     element.addEventListener('touchend', function () {
//         //horizontal detection
//         if ((((swipe_det.eX - min_x > swipe_det.sX) || (swipe_det.eX + min_x < swipe_det.sX)) && (swipe_det.eX > 0))) {
//             if (swipe_det.eX > swipe_det.sX) direction = "prev";
//             else direction = "next";
//         }
//         if (direction != "") {
//             if (typeof func == 'function') {
//                 //TODO::refactor this bloody crap
//                 if (target) {
//                     func(target, direction);
//                 } else {
//                     func('.works-slider-block', direction);
//                     func('.slider-content-block', direction);
//                 }
//             }
//         }
//         direction = "";
//         swipe_det.sX = 0;
//         swipe_det.sY = 0;
//         swipe_det.eX = 0;
//         swipe_det.eY = 0;
//     }, false);
// }
//
// detectSwipe('section-3', false, changeSlide);
// detectSwipe('section-quote', '#quotesSlider', changeSlide);
//
//
// window.onload = function () {
//     window.addEventListener("scroll", myFunction);
// };
//
//
// function myFunction() {
//     //Line+ circles - animation
//     var triangle = document.getElementById("triangle"),
//         little = document.getElementById("st2"),
//         length = triangle.getTotalLength(),
//         startS = $(window).height() / 2,
//         point1 = $("#circle-1").offset(),
//         point2 = $("#circle-2").offset(),
//         point3 = $("#circle-3").offset(),
//         point4 = $("#circle-4").offset(),
//         draw;
//
//
//     triangle.style.strokeDasharray = length;
//     triangle.style.strokeDashoffset = length;
//
//     if (window.innerWidth == 1024) {
//         if (window.pageYOffset + 1.1 * startS > point4.top) {
//             draw = window.pageYOffset - point1.top + 1.35 * startS;
//             triangle.style.strokeDashoffset = length - 1.35 * draw;
//             if (navigator.userAgent.indexOf('Mac OS X') != -1) {
//                 if (length - 1.35 * draw <= 0) {
//                     triangle.style.strokeDashoffset = 0;
//                     little.style.stroke = "#EE44A4";
//                     // console.log("arrow draw")
//                 }
//             }
//             if ($("#circle-4").hasClass("circle-4__active") == 1) {
//                 setTimeout(function () {
//                     $("#circle-5").addClass("circle-5__active")
//                 }, 600);
//             }
//         } else {
//             if (window.pageYOffset + 1.1 * startS >= point1.top) {
//                 draw = window.pageYOffset - point1.top + 1.3 * startS;
//                 triangle.style.strokeDashoffset = length - draw;
//             }
//         }
//     } else {
//         if (window.pageYOffset + 1.1 * startS > point4.top) {
//             draw = window.pageYOffset - point1.top + 1.1 * startS;
//             triangle.style.strokeDashoffset = length - 1.2 * draw;
//             if (navigator.userAgent.indexOf('Mac OS X') != -1) {
//                 if (length - 1.2 * draw <= 0) {
//                     triangle.style.strokeDashoffset = 0;
//                     little.style.stroke = "#EE44A4";
//                     // console.log("arrow draw")
//                 }
//             }
//             if ($("#circle-4").hasClass("circle-4__active") == 1) {
//                 setTimeout(function () {
//                     $("#circle-5").addClass("circle-5__active")
//                 }, 600);
//             }
//         } else {
//             if (window.pageYOffset + 1.1 * startS >= point1.top) {
//                 draw = window.pageYOffset - point1.top + 1.1 * startS;
//                 triangle.style.strokeDashoffset = length - draw;
//             }
//         }
//     }
//     if (window.pageYOffset == 0) {
//         triangle.style.strokeDashoffset = length;
//     }
//     if (triangle.style.strokeDashoffset <= 0 || triangle.style.strokeDashoffset == '0px' ) {
//         little.style.stroke = "#EE44A4";
//         triangle.style.transition = "0s";
//         triangle.style.strokeDasharray = 0;
//     } else {
//         // console.log(triangle.style.strokeDashoffset);
//         little.style.stroke = "none";
//     }
//     if (window.pageYOffset + 1.1 * startS > point1.top) {
//         $("#circle-1").addClass("circle__active");
//     }
//     if (window.pageYOffset + 1.1 * startS > point2.top) {
//         $("#circle-2").addClass("circle-2__active");
//     }
//     if (window.pageYOffset + 1.1 * startS > point3.top) {
//         $("#circle-3").addClass("circle-3__active");
//     }
//     if (window.pageYOffset + 1.1 * startS > point4.top) {
//         $("#circle-4").addClass("circle-4__active");
//     }
// }
//
//
// //MODAL
//
//
// $(".item-cover").on("click", function () {
//     $(this).addClass('item-cover__active').removeClass('item-cover__error').siblings().removeClass('item-cover__active')
// });
// //TODO::delete ater reviews
// $('.quote-item_link').on('click', function (e) {
//     e.preventDefault();
// });
// //
// //
// $(document).ready(function () {
//     if (navigator.userAgent.indexOf('Mac OS X') != -1) {
//         $('body').addClass('platform-ios');
//
//         setTimeout(function(){
//             document.getElementById('video').pause();
//             document.getElementById('video').play();
//         },1000);
//     }
//
// });
//
// (function (t) {
//     t.backgroundVideo = function (e, i) {
//         var n = {videoid: "video_background", autoplay: true, loop: true, preload: true};
//         var s = this;
//         s.settings = {};
//         var o = function () {
//             s.settings = t.extend({}, n, i);
//             s.el = e;
//             d()
//         };
//         var d = function () {
//             var e = "", i = "", n = "", o = "", d = s.settings.preload, g = s.settings.autoplay, a = s.settings.loop;
//             if (d) {
//                 i = 'preload="auto"'
//             } else {
//                 i = ""
//             }
//             if (g) {
//                 n = 'autoplay="autoplay"'
//             } else {
//                 n = ""
//             }
//             if (a) {
//                 o = 'loop="true"'
//             } else {
//                 o = ""
//             }
//             e += '<video id="' + s.settings.videoid + '"' + i + n + o;
//             if (s.settings.poster) {
//                 e += ' poster="' + s.settings.poster + '" '
//             }
//             e += 'style="display:none;position:relative;;top:0;left:0;bottom:0;right:0;z-index:-100;width:100%;height:100%;">';
//             for (var l = 0; l < s.settings.types.length; l++) {
//                 e += '<source src="' + s.settings.path + s.settings.filename + "." + s.settings.types[l] + '" type="video/' + s.settings.types[l] + '" />'
//             }
//             e += "bgvideo</video>";
//             s.el.prepend(e);
//             s.videoEl = document.getElementById(s.settings.videoid);
//             s.$videoEl = t(s.videoEl);
//             s.$videoEl.fadeIn(2e3);
//             r()
//         };
//         var r = function () {
//             var t = g();
//             s.$videoEl.width(t * s.settings.width);
//             s.$videoEl.height(t * s.settings.height);
//             if (typeof s.settings.align !== "undefined") {
//                 a()
//             }
//         };
//         var g = function () {
//             var e = t(window).width();
//             var i = t(window).height();
//             var n = e / i;
//             var o = s.settings.width / s.settings.height;
//             var d = i / s.settings.height;
//             if (n >= o) {
//                 d = e / s.settings.width
//             }
//             return d
//         };
//         var a = function () {
//             var e = (t(window).width() >> 1) - (s.$videoEl.width() >> 1) | 0;
//             var i = (t(window).height() >> 1) - (s.$videoEl.height() >> 1) | 0;
//             if (s.settings.align == "centerXY") {
//                 s.$videoEl.css({left: e, top: i});
//                 return
//             }
//             if (s.settings.align == "centerX") {
//                 s.$videoEl.css("left", e);
//                 return
//             }
//             if (s.settings.align == "centerY") {
//                 s.$videoEl.css("top", i);
//                 return
//             }
//         };
//         o();
//         t(window).resize(function () {
//             r()
//         });
//         s.$videoEl.bind("ended", function () {
//             this.play()
//         })
//     }
// })(jQuery);
// $(document).ready(function () {
//     var videobackground = new $.backgroundVideo($('.video-cover'), {
//         "align": "centerXY",
//         "width": 1280,
//         "height": 720,
//         "path": "img/images/",
//         "filename": "main-video",
//         "types": ["mp4", "ogg", "webm"],
//         "preload": true,
//         "autoplay": true,
//         "loop": true
//     });
// });
//
//
// /* ========================================================================
//  * Bootstrap: modal.js v3.3.2
//  * http://getbootstrap.com/javascript/#modals
//  * ========================================================================
//  * Copyright 2011-2015 Twitter, Inc.
//  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
//  * ======================================================================== */
//
//
// +function ($) {
//   'use strict';
//
//   // MODAL CLASS DEFINITION
//   // ======================
//
//   var Modal = function (element, options) {
//     this.options        = options
//     this.$body          = $(document.body)
//     this.$element       = $(element)
//     this.$backdrop      =
//     this.isShown        = null
//     this.scrollbarWidth = 0
//
//     if (this.options.remote) {
//       this.$element
//         .find('.modal-content')
//         .load(this.options.remote, $.proxy(function () {
//           this.$element.trigger('loaded.bs.modal')
//         }, this))
//     }
//   }
//
//   Modal.VERSION  = '3.3.2'
//
//   Modal.TRANSITION_DURATION = 300
//   Modal.BACKDROP_TRANSITION_DURATION = 150
//
//   Modal.DEFAULTS = {
//     backdrop: true,
//     keyboard: true,
//     show: true
//   }
//
//   Modal.prototype.toggle = function (_relatedTarget) {
//     return this.isShown ? this.hide() : this.show(_relatedTarget)
//   }
//
//   Modal.prototype.show = function (_relatedTarget) {
//     var that = this
//     var e    = $.Event('show.bs.modal', { relatedTarget: _relatedTarget })
//
//     this.$element.trigger(e)
//
//     if (this.isShown || e.isDefaultPrevented()) return
//
//     this.isShown = true
//
//     this.checkScrollbar()
//     this.setScrollbar()
//     this.$body.addClass('modal-open')
//
//     this.escape()
//     this.resize()
//
//     this.$element.on('click.dismiss.bs.modal', '[data-dismiss="modal"]', $.proxy(this.hide, this))
//
//     this.backdrop(function () {
//       var transition = $.support.transition && that.$element.hasClass('fade')
//
//       if (!that.$element.parent().length) {
//         that.$element.appendTo(that.$body) // don't move modals dom position
//       }
//
//       that.$element
//         .show()
//         .scrollTop(0)
//
//       if (that.options.backdrop) that.adjustBackdrop()
//       that.adjustDialog()
//
//       if (transition) {
//         that.$element[0].offsetWidth // force reflow
//       }
//
//       that.$element
//         .addClass('in')
//         .attr('aria-hidden', false)
//
//       that.enforceFocus()
//
//       var e = $.Event('shown.bs.modal', { relatedTarget: _relatedTarget })
//
//       transition ?
//         that.$element.find('.modal-dialog') // wait for modal to slide in
//           .one('bsTransitionEnd', function () {
//             that.$element.trigger('focus').trigger(e)
//           })
//           .emulateTransitionEnd(Modal.TRANSITION_DURATION) :
//         that.$element.trigger('focus').trigger(e)
//     })
//   }
//
//   Modal.prototype.hide = function (e) {
//     if (e) e.preventDefault()
//
//     e = $.Event('hide.bs.modal')
//
//     this.$element.trigger(e)
//
//     if (!this.isShown || e.isDefaultPrevented()) return
//
//     this.isShown = false
//
//     this.escape()
//     this.resize()
//
//     $(document).off('focusin.bs.modal')
//
//     this.$element
//       .removeClass('in')
//       .attr('aria-hidden', true)
//       .off('click.dismiss.bs.modal')
//
//     $.support.transition && this.$element.hasClass('fade') ?
//       this.$element
//         .one('bsTransitionEnd', $.proxy(this.hideModal, this))
//         .emulateTransitionEnd(Modal.TRANSITION_DURATION) :
//       this.hideModal()
//   }
//
//   Modal.prototype.enforceFocus = function () {
//     $(document)
//       .off('focusin.bs.modal') // guard against infinite focus loop
//       .on('focusin.bs.modal', $.proxy(function (e) {
//         if (this.$element[0] !== e.target && !this.$element.has(e.target).length) {
//           this.$element.trigger('focus')
//         }
//       }, this))
//   }
//
//   Modal.prototype.escape = function () {
//     if (this.isShown && this.options.keyboard) {
//       this.$element.on('keydown.dismiss.bs.modal', $.proxy(function (e) {
//         e.which == 27 && this.hide()
//       }, this))
//     } else if (!this.isShown) {
//       this.$element.off('keydown.dismiss.bs.modal')
//     }
//   }
//
//   Modal.prototype.resize = function () {
//     if (this.isShown) {
//       $(window).on('resize.bs.modal', $.proxy(this.handleUpdate, this))
//     } else {
//       $(window).off('resize.bs.modal')
//     }
//   }
//
//   Modal.prototype.hideModal = function () {
//     var that = this
//     this.$element.hide()
//     this.backdrop(function () {
//       that.$body.removeClass('modal-open')
//       that.resetAdjustments()
//       that.resetScrollbar()
//       that.$element.trigger('hidden.bs.modal')
//     })
//   }
//
//   Modal.prototype.removeBackdrop = function () {
//     this.$backdrop && this.$backdrop.remove()
//     this.$backdrop = null
//   }
//
//   Modal.prototype.backdrop = function (callback) {
//     var that = this
//     var animate = this.$element.hasClass('fade') ? 'fade' : ''
//
//     if (this.isShown && this.options.backdrop) {
//       var doAnimate = $.support.transition && animate
//
//       this.$backdrop = $('<div class="modal-backdrop ' + animate + '" />')
//         .prependTo(this.$element)
//         .on('click.dismiss.bs.modal', $.proxy(function (e) {
//           if (e.target !== e.currentTarget) return
//           this.options.backdrop == 'static'
//             ? this.$element[0].focus.call(this.$element[0])
//             : this.hide.call(this)
//         }, this))
//
//       if (doAnimate) this.$backdrop[0].offsetWidth // force reflow
//
//       this.$backdrop.addClass('in')
//
//       if (!callback) return
//
//       doAnimate ?
//         this.$backdrop
//           .one('bsTransitionEnd', callback)
//           .emulateTransitionEnd(Modal.BACKDROP_TRANSITION_DURATION) :
//         callback()
//
//     } else if (!this.isShown && this.$backdrop) {
//       this.$backdrop.removeClass('in')
//
//       var callbackRemove = function () {
//         that.removeBackdrop()
//         callback && callback()
//       }
//       $.support.transition && this.$element.hasClass('fade') ?
//         this.$backdrop
//           .one('bsTransitionEnd', callbackRemove)
//           .emulateTransitionEnd(Modal.BACKDROP_TRANSITION_DURATION) :
//         callbackRemove()
//
//     } else if (callback) {
//       callback()
//     }
//   }
//
//   // these following methods are used to handle overflowing modals
//
//   Modal.prototype.handleUpdate = function () {
//     if (this.options.backdrop) this.adjustBackdrop()
//     this.adjustDialog()
//   }
//
//   Modal.prototype.adjustBackdrop = function () {
//     this.$backdrop
//       .css('height', 0)
//       .css('height', this.$element[0].scrollHeight)
//   }
//
//   Modal.prototype.adjustDialog = function () {
//     var modalIsOverflowing = this.$element[0].scrollHeight > document.documentElement.clientHeight
//
//     this.$element.css({
//       paddingLeft:  !this.bodyIsOverflowing && modalIsOverflowing ? this.scrollbarWidth : '',
//       paddingRight: this.bodyIsOverflowing && !modalIsOverflowing ? this.scrollbarWidth : ''
//     })
//   }
//
//   Modal.prototype.resetAdjustments = function () {
//     this.$element.css({
//       paddingLeft: '',
//       paddingRight: ''
//     })
//   }
//
//   Modal.prototype.checkScrollbar = function () {
//     this.bodyIsOverflowing = document.body.scrollHeight > document.documentElement.clientHeight
//     this.scrollbarWidth = this.measureScrollbar()
//   }
//
//   Modal.prototype.setScrollbar = function () {
//     var bodyPad = parseInt((this.$body.css('padding-right') || 0), 10)
//     if (this.bodyIsOverflowing) this.$body.css('padding-right', bodyPad + this.scrollbarWidth)
//   }
//
//   Modal.prototype.resetScrollbar = function () {
//     this.$body.css('padding-right', '')
//   }
//
//   Modal.prototype.measureScrollbar = function () { // thx walsh
//     var scrollDiv = document.createElement('div')
//     scrollDiv.className = 'modal-scrollbar-measure'
//     this.$body.append(scrollDiv)
//     var scrollbarWidth = scrollDiv.offsetWidth - scrollDiv.clientWidth
//     this.$body[0].removeChild(scrollDiv)
//     return scrollbarWidth
//   }
//
//
//   // MODAL PLUGIN DEFINITION
//   // =======================
//
//   function Plugin(option, _relatedTarget) {
//     return this.each(function () {
//       var $this   = $(this)
//       var data    = $this.data('bs.modal')
//       var options = $.extend({}, Modal.DEFAULTS, $this.data(), typeof option == 'object' && option)
//
//       if (!data) $this.data('bs.modal', (data = new Modal(this, options)))
//       if (typeof option == 'string') data[option](_relatedTarget)
//       else if (options.show) data.show(_relatedTarget)
//     })
//   }
//
//   var old = $.fn.modal
//
//   $.fn.modal             = Plugin
//   $.fn.modal.Constructor = Modal
//
//
//   // MODAL NO CONFLICT
//   // =================
//
//   $.fn.modal.noConflict = function () {
//     $.fn.modal = old
//     return this
//   }
//
//
//   // MODAL DATA-API
//   // ==============
//
//   $(document).on('click.bs.modal.data-api', '[data-toggle="modal"]', function (e) {
//     var $this   = $(this)
//     var href    = $this.attr('href')
//     var $target = $($this.attr('data-target') || (href && href.replace(/.*(?=#[^\s]+$)/, ''))) // strip for ie7
//     var option  = $target.data('bs.modal') ? 'toggle' : $.extend({ remote: !/#/.test(href) && href }, $target.data(), $this.data())
//
//     if ($this.is('a')) e.preventDefault()
//
//     $target.one('show.bs.modal', function (showEvent) {
//       if (showEvent.isDefaultPrevented()) return // only register focus restorer if modal will actually get shown
//       $target.one('hidden.bs.modal', function () {
//         $this.is(':visible') && $this.trigger('focus')
//       })
//     })
//     Plugin.call($target, option, this)
//   })
//
// }(jQuery);
//
// (function (t) {
//     t.backgroundVideo = function (e, i) {
//         var n = {videoid: "video_background", autoplay: true, loop: true, preload: true};
//         var s = this;
//         s.settings = {};
//         var o = function () {
//             s.settings = t.extend({}, n, i);
//             s.el = e;
//             d()
//         };
//         var d = function () {
//             var e = "", i = "", n = "", o = "", d = s.settings.preload, g = s.settings.autoplay, a = s.settings.loop;
//             if (d) {
//                 i = 'preload="auto"'
//             } else {
//                 i = ""
//             }
//             if (g) {
//                 n = 'autoplay="autoplay"'
//             } else {
//                 n = ""
//             }
//             if (a) {
//                 o = 'loop="true"'
//             } else {
//                 o = ""
//             }
//             e += '<video id="' + s.settings.videoid + '"' + i + n + o;
//             if (s.settings.poster) {
//                 e += ' poster="' + s.settings.poster + '" '
//             }
//             e += 'style="display:none;position:absolute;top:0;left:0;bottom:0;right:0;z-index:0;width:100%;height:100%;">';
//             for (var l = 0; l < s.settings.types.length; l++) {
//                 e += '<source src="' + s.settings.path + s.settings.filename + "." + s.settings.types[l] + '" type="video/' + s.settings.types[l] + '" />'
//             }
//             e += "bgvideo</video>";
//             s.el.prepend(e);
//             s.videoEl = document.getElementById(s.settings.videoid);
//             s.$videoEl = t(s.videoEl);
//             s.$videoEl.fadeIn(2e3);
//             r()
//         };
//         var r = function () {
//             var t = g();
//             s.$videoEl.width(t * s.settings.width);
//             s.$videoEl.height(t * s.settings.height);
//             if (typeof s.settings.align !== "undefined") {
//                 a()
//             }
//         };
//         var g = function () {
//             var e = t(window).width();
//             var i = t(window).height();
//             var n = e / i;
//             var o = s.settings.width / s.settings.height;
//             var d = i / s.settings.height;
//             if (n >= o) {
//                 d = e / s.settings.width
//             }
//             return d
//         };
//         var a = function () {
//             var e = (t(window).width() >> 1) - (s.$videoEl.width() >> 1) | 0;
//             var i = (t(window).height() >> 1) - (s.$videoEl.height() >> 1) | 0;
//             if (s.settings.align == "centerXY") {
//                 s.$videoEl.css({left: e, top: i});
//                 return
//             }
//             if (s.settings.align == "centerX") {
//                 s.$videoEl.css("left", e);
//                 return
//             }
//             if (s.settings.align == "centerY") {
//                 s.$videoEl.css("top", i);
//                 return
//             }
//         };
//         o();
//         t(window).resize(function () {
//             r()
//         });
//         s.$videoEl.bind("ended", function () {
//             this.play()
//         })
//     }
// })(jQuery);
