$.fn.extend({
    animateCss: function (animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        this.addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
        });
        return this;
    }
});
$(document).ready(function() {
	var titles = Array(
		"Have A Nice Day!",
		"Throwback To Wonderful History!",
		"Searching A New World..."
		);
		
	setInterval(function() {
		$("div.text_hir").html(titles[Math.floor(Math.random()*titles.length)]);
		
	},10000);
	
	
	var imgs = Array("history_1.jpg",
					"history.jpg",
					"history_2.jpg");
					
	var img_c = 0;
	var fade = true;
	setInterval(function() {
		if(fade){
			fade = false;
			$(".op_layer").animate({
				  'background-color': 'rgba(120, 115, 115, 1)'
				},2000,function() {
					console.log(img_c + ""+ imgs.length);
					if(img_c < imgs.length) {
						$('html').css('background-image', 'url(' +'assets/img/'+ imgs[img_c] + ')');
						$(".op_layer").animate({
							'background-color': 'rgba(120, 115, 115, 0.54)'
							},1000 , function() {fade = true;});
						img_c += 1;
					}else {
						fade = true;
						img_c = 0;
					}
				});
			console.log("y");
		}
	},20000);
		
	
});