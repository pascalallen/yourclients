$(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 500);
});

$(window).scroll(function () {
	//if you hard code, then use console
	//.log to determine when you want the 
	//nav bar to stick.  
	if ($(window).scrollTop() > 280) {
		$('.navbar').addClass('fixed-top');
	}
	if ($(window).scrollTop() < 280) {
		$('.navbar').removeClass('fixed-top');
	}
});

window.sr = ScrollReveal({ reset: true, duration: 1000 });
sr.reveal('#serene', { origin: 'left', rotate: { z: 180 }, distance: '20vw', scale: 0.1 });
sr.reveal('#peace', { origin: 'bottom', rotate: { z: -180 }, distance: '20vw', scale: 0.1 });
sr.reveal('#luxury', { origin: 'right', rotate: { z: 180 }, distance: '20vw', scale: 0.1 });