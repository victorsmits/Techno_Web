$(document).ready(function(){
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

	$("#B2").click(function () {
		let color = $("#color").val();
		console.log(color);
		$(".rect").css({
			"background-color": color
		});
	});

	$("#B3").click(function () {
		$(".rect").hide();
	});

	$("#B4").click(function () {
		$(".rect").show();
	});

	$("#B5").click(function () {
		$(".rect").removeAttr("style");
	});
});

