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
		console.log("y");
	},10000);
	
});