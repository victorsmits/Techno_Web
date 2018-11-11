var state = true;
$(".test").on({
	mouseenter: function () {
		$(this).css({
			"font-style": "italic",
			"font-weight": "normal"
		});
	},
	mouseleave: function () {
		$(this).css({
			"font-style": "normal",
			"font-weight": "bold"
		});
	},
	click: function () {
		if (state) {
			$(this).css("font-size", "50pt");
			state = false;
		} else {
			$(this).css("font-size", "16pt");
			state = true;
		}
	}
});
$("button#B1").click(function () {
	var Hight = parseInt($("div.rect").css("padding-top"));
	$("div.rect").css({
		"padding-top": Hight += 10
	});
});

$("button#B2").click(function () {
	var color = $("input#color").val();
	console.log(color);
	$("div.rect").css({
		"background-color": color
	});
});

$("button#B3").click(function () {
	$("div.rect").hide();
});

$("button#B4").click(function () {
	$("div.rect").show();
});

$("button#B5").click(function () {
	$("div.rect").removeAttr("style");
});
