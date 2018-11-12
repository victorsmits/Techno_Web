let state = true;
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
$("#B1").click(function () {
    let rect = $(".rect");
	let Height = parseInt(rect.css("padding-top"));
	let add = parseInt($("#px").val());
	rect.css({
		"padding-top": Height += add
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