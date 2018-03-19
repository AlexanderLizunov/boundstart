

// $('.share-links-block').on('click', function () {
//     event.preventDefault();
//     console.log( $(this).parent().siblings('a'))
//     console.log( $(this).parent().siblings('a').children('main-item_title'))
//     var ogText = $(this).parent().siblings('a').children('main-item_title').html();
//     console.log(ogText)
//     jQuery("meta[property='og:title']").attr('content', ogText);
//
//
// })

// jQuery(function($){
//     $("#mauticform_boundstartform_site").mask("*");
// });

// $('').mask('zzzzzzzzzzz')
//
// $('#mauticform_boundstartform_site').mask("00r00r0000", {
//     translation: {
//         'r': {
//             pattern: /[\/]/,
//             fallback: '/'
//         },
//         placeholder: "__/__/____"
//     }
// });

$('.footer-scroll-top').on('click', function () {
    $('body, html').animate({scrollTop: 0}, 900);

});

$('.scroll-down-button').on('click', function () {
    $('body, html').animate({scrollTop:$( window ).height() }, 500, 'linear');


});

$(document).ready(function () {
    if (navigator.userAgent.indexOf('Mac OS X') != -1 || navigator.userAgent.indexOf ('Linux')!= -1) {
        $('body').addClass('platform-ios');
    }

    if($('body').height() < 1700 ){
        console.log("min")
        $('.scroll-down-button').css("display","none");
        $('.footer-button_cover').css("display","none");
    }
    $('.fake-upload-button').on('click', function () {
        document.getElementById("upload-button").click()
    })

});


// if (window.scrollTop> 500){
//     document.getElementById("video").style.display = "none"
// }
// console.log(window.scrollTop)
//MODAL OPEN
$(".main-button, .package-details_link").on("click", function (e) {
    e.preventDefault()
    // console.log("MODAL")
    $('#myModal').modal('show');
});




//HAMBURGER
$("#hamburger").click(function () {
    $("#hamburger-block").toggleClass("hamburger__active");
    $("#nav-icon2").toggleClass('open');
});

$(document).bind('touchstart click', function (e) {
    var div = $("#hamburger-block");
    if (!div.is(e.target)
        && div.has(e.target).length === 0) {
        div.removeClass("hamburger__active");
        $("#nav-icon2").removeClass('open');
    }
});


// NAVIGATION
//
// $('.navigation-item').on('click', function () {
//
//     var current = $(this).index(),
//         mark = "section-" + (2 + current),
//         anchor = $("#" + mark).offset();
//     if (current ==0 || current == 4 ){
//         return
//     } else {
//         $('body, html').animate({
//             scrollTop: (anchor).top
//         }, 900);
//     }
//
// });

$(".package-item").hover(
    function () {
        $(this).removeClass('package-item__hover').siblings().removeClass('package-item__hover');
    },
    function () {
        $("#optimal").addClass('package-item__hover');
    }
);

//SLIDER-Works
$('.slider-control').on('click', function () {
    var direction = $(this).data('direction');
    var target = $(this).data('target') || false;

    if (target) {
        changeSlide(target, direction);
    } else {
        changeSlide('.works-slider-block', direction);
        changeSlide('.slider-content-block', direction);
    }
});

function changeSlide(target, direction) {
    var activeSlideNumber = $(target + ' .active-slide').index();
    var slides = $(target + ' .slide');
    var slidesQuantity = slides.length;

    if (direction == "next") {
        if (activeSlideNumber == slidesQuantity - 1) {
            makeSlideActive(slides.eq(0));
        } else {
            makeSlideActive(slides.eq(activeSlideNumber + 1));
        }
    } else {
        if (activeSlideNumber == 0) {
            makeSlideActive(slides.eq(slidesQuantity - 1));
        } else {
            makeSlideActive(slides.eq(activeSlideNumber - 1));
        }
    }
}

function makeSlideActive(slide) {
    slide.addClass('active-slide').siblings().removeClass('active-slide');
}

//TODO::refactor this shit
function detectSwipe(el, target, func) {

    swipe_det = new Object();
    swipe_det.sX = 0;
    swipe_det.eX = 0;
    var min_x = 50;

    var direction = "";
    element = document.getElementById(el);
    element.addEventListener('touchstart', function (e) {
        var t = e.touches[0];
        swipe_det.sX = t.screenX;
    }, false);
    element.addEventListener('touchmove', function (e) {
        var t = e.touches[0];
        swipe_det.eX = t.screenX;
    }, false);
    element.addEventListener('touchend', function () {
        //horizontal detection
        if ((((swipe_det.eX - min_x > swipe_det.sX) || (swipe_det.eX + min_x < swipe_det.sX)) && (swipe_det.eX > 0))) {
            if (swipe_det.eX > swipe_det.sX) direction = "prev";
            else direction = "next";
        }
        if (direction != "") {
            if (typeof func == 'function') {
                //TODO::refactor this bloody crap
                if (target) {
                    func(target, direction);
                } else {
                    func('.works-slider-block', direction);
                    func('.slider-content-block', direction);
                }
            }
        }
        direction = "";
        swipe_det.sX = 0;
        swipe_det.sY = 0;
        swipe_det.eX = 0;
        swipe_det.eY = 0;
    }, false);
}


if ($("#section-3").length > 0) {
    detectSwipe('section-3', false, changeSlide);
}

if ($('#section-quote').length > 0) {
    detectSwipe('section-quote', '#quotesSlider', changeSlide);
}

window.onload = function () {
    if ($('#triangle').length > 0){
        window.addEventListener("scroll", myFunction);
    }
};


function myFunction() {
    //Line+ circles - animation
    var triangle = document.getElementById("triangle"),
        little = document.getElementById("st2"),
        length = triangle.getTotalLength(),
        startS = $(window).height() / 2,
        point1 = $("#circle-1").offset(),
        point2 = $("#circle-2").offset(),
        point3 = $("#circle-3").offset(),
        point4 = $("#circle-4").offset(),
        point5 = $("#circle-5").offset(),
        point6 = $("#circle-6").offset(),
        draw;


    triangle.style.strokeDasharray = length;
    triangle.style.strokeDashoffset = length;

    if (window.innerWidth == 1024) {
        if (window.pageYOffset + 1.1 * startS > point4.top) {
            draw = window.pageYOffset - point1.top + 1.35 * startS;
            triangle.style.strokeDashoffset = length - 1.35 * draw;
            if (navigator.userAgent.indexOf('Mac OS X') != -1) {
                if (length - 1.35 * draw <= 0) {
                    triangle.style.strokeDashoffset = 0;
                    if($("line").is(".st2")){
                        little.style.stroke = "#EE44A4";
                    }
                    // console.log("arrow draw")
                }
            }
            if ($("#circle-4").hasClass("circle-4__active") == 1) {
                setTimeout(function () {
                    $("#circle-5").addClass("circle-5__active")
                }, 600);
            }
        } else {
            if (window.pageYOffset + 1.1 * startS >= point1.top) {
                draw = window.pageYOffset - point1.top + 1.3 * startS;
                triangle.style.strokeDashoffset = length - draw;
            }
        }
    } else {
        if (window.pageYOffset + 1.1 * startS > point4.top) {
            draw = window.pageYOffset - point1.top + 1.1 * startS;
            triangle.style.strokeDashoffset = length - 1.2 * draw;
            if (navigator.userAgent.indexOf('Mac OS X') != -1) {
                if (length - 1.2 * draw <= 0) {
                    triangle.style.strokeDashoffset = 0;
                    if($("line").is(".st2")){
                        little.style.stroke = "#EE44A4";
                    }
                    // console.log("arrow draw")
                }
            }
            if ($("#circle-4").hasClass("circle-4__active") == 1) {
                setTimeout(function () {
                    $("#circle-5").addClass("circle-5__active")
                }, 600);
            }
        } else {
            if (window.pageYOffset + 1.1 * startS >= point1.top) {
                draw = window.pageYOffset - point1.top + 1.1 * startS;
                triangle.style.strokeDashoffset = length - draw;
            }
        }
    }
    if (window.pageYOffset == 0) {
        triangle.style.strokeDashoffset = length;
    }
    if (triangle.style.strokeDashoffset <= 0 || triangle.style.strokeDashoffset == '0px' ) {
        if($("line").is(".st2")){
            little.style.stroke = "#EE44A4";
        }
        triangle.style.transition = "0s";
        triangle.style.strokeDasharray = 0;
    } else {
        if($("line").is(".st2")){
            little.style.stroke = "none";
        }

    }
    if (window.pageYOffset + 1.1 * startS > point1.top) {
        $("#circle-1").addClass("circle__active");
    }
    if (window.pageYOffset + 1.1 * startS > point2.top) {
        $("#circle-2").addClass("circle-2__active");
    }
    if (window.pageYOffset + 1.1 * startS > point3.top) {
        $("#circle-3").addClass("circle-3__active");
    }
    if (window.pageYOffset + 1.1 * startS > point4.top) {
        $("#circle-4").addClass("circle-4__active");
    }
    if (window.pageYOffset + 1.1 * startS > point5.top) {
        $("#circle-5").addClass("circle-5__active");
    }
    if (window.pageYOffset + 1.1 * startS > point5.top) {
        $("#circle-6").addClass("circle-5__active");
    }
}




//MODAL


$(".item-cover").on("click", function () {
    $(this).addClass('item-cover__active').removeClass('item-cover__error').siblings().removeClass('item-cover__active')
});
//TODO::delete ater reviews
$('.quote-item_link').on('click', function (e) {
    e.preventDefault();
});
//
//
(function (t) {
    t.backgroundVideo = function (e, i) {
        var n = {videoid: "video_background", autoplay: true, loop: true, preload: true};
        var s = this;
        s.settings = {};
        var o = function () {
            s.settings = t.extend({}, n, i);
            s.el = e;
            d()
        };
        var d = function () {
            var e = "", i = "", n = "", o = "", d = s.settings.preload, g = s.settings.autoplay, a = s.settings.loop;
            if (d) {
                i = 'preload="auto"'
            } else {
                i = ""
            }
            if (g) {
                n = 'autoplay="autoplay"'
            } else {
                n = ""
            }
            if (a) {
                o = 'loop="true"'
            } else {
                o = ""
            }
            e += '<video id="' + s.settings.videoid + '"' + i + n + o;
            if (s.settings.poster) {
                e += ' poster="' + s.settings.poster + '" '
            }
            e += 'style="display:none;position:relative;;top:0;left:0;bottom:0;right:0;z-index:-100;width:100%;height:100%;">';
            for (var l = 0; l < s.settings.types.length; l++) {
                e += '<source src="' + s.settings.path + s.settings.filename + "." + s.settings.types[l] + '" type="video/' + s.settings.types[l] + '" />'
            }
            e += "bgvideo</video>";
            s.el.prepend(e);
            s.videoEl = document.getElementById(s.settings.videoid);
            s.$videoEl = t(s.videoEl);
            s.$videoEl.fadeIn(2e3);
            r()
        };
        var r = function () {
            var t = g();
            s.$videoEl.width(t * s.settings.width);
            s.$videoEl.height(t * s.settings.height);
            if (typeof s.settings.align !== "undefined") {
                a()
            }
        };
        var g = function () {
            var e = t(window).width();
            var i = t(window).height();
            var n = e / i;
            var o = s.settings.width / s.settings.height;
            var d = i / s.settings.height;
            if (n >= o) {
                d = e / s.settings.width
            }
            return d
        };
        var a = function () {
            var e = (t(window).width() >> 1) - (s.$videoEl.width() >> 1) | 0;
            var i = (t(window).height() >> 1) - (s.$videoEl.height() >> 1) | 0;
            if (s.settings.align == "centerXY") {
                s.$videoEl.css({left: e, top: i});
                return
            }
            if (s.settings.align == "centerX") {
                s.$videoEl.css("left", e);
                return
            }
            if (s.settings.align == "centerY") {
                s.$videoEl.css("top", i);
                return
            }
        };
        o();
        t(window).resize(function () {
            r()
        });
        s.$videoEl.bind("ended", function () {
            this.play()
        })
    }
})(jQuery);

$(document).ready(function () {
    var videobackground = new $.backgroundVideo($('.video-cover'), {
        "align": "centerXY",
        "width": 1280,
        "height": 720,
        "path": "img/images/",
        "filename": "main-video",
        "types": ["mp4", "ogg", "webm"],
        "preload": true,
        "autoplay": true,
        "loop": true
    });
});


$('.sales-item-button').on('click', function () {
    var quontity = $(this).parent().index()-1;
    console.log(quontity)
    $('#salesModal').modal('show');
    $('#mauticform_input_boundstartsalespopup_f_select').children().eq(quontity+2).attr("selected", "selected")
})


if($("div").is(".customers-block")){

    $(document).ready(function(){
        $('.customers-block').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000,
	        responsive: [
		        {
			        breakpoint: 1025,
			        settings: {
				        slidesToShow: 2,
				        slidesToScroll: 2,
				        infinite: true,
				        // dots: true
			        }
		        },
		        {
			        breakpoint: 600,
			        settings: {
				        slidesToShow: 1,
				        slidesToScroll: 1
			        }
		        },
		        {
			        breakpoint: 480,
			        settings: {
				        slidesToShow: 1,
				        slidesToScroll: 1,
				        autoplay: true
			        }
		        }
	        ]
        });
    });

}

$('.button-join-now').on('click', function () {
    $('body, html').animate({scrollTop: $('input').offset().top - 350}, 900);
});

