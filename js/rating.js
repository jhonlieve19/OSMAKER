$(document).ready(function(){

			$("#n1").click(function(){
				$("#append").html();
				$("#append").html("You click 1");
			});
			$("#n2").click(function(){
				$("#append").html();
				$("#append").html("You click 2");
			});
			$("#n3").click(function(){
				$("#append").html();
				$("#append").html("You click 3");
			});
			$("#n4").click(function(){
				$("#append").html();
				$("#append").html("You click 4");
			});
			$("#n5").click(function(){
				$("#append").html();
				$("#append").html("You click 5");
			});


			//hovering style functions
			$("#n1").hover(
				function(){
					$(this).attr("src","img/ystar.png");
				},
				function(){
					$(this).attr("src","img/gstar.png");
				});

			$("#n2").hover(
				function(){
					$("#n1").attr("src","img/ystar.png");
					$(this).attr("src","img/ystar.png");
				},
				function(){
					$("#n1").attr("src","img/gstar.png");
					$(this).attr("src","img/gstar.png");
				});

			$("#n3").hover(
				function(){
					$("#n2").attr("src","img/ystar.png");
					$("#n1").attr("src","img/ystar.png");
					$(this).attr("src","img/ystar.png");
				},
				function(){
					$("#n2").attr("src","img/gstar.png");
					$("#n1").attr("src","img/gstar.png");
					$(this).attr("src","img/gstar.png");
				});

			$("#n4").hover(
				function(){
					$("#n3").attr("src","img/ystar.png");
					$("#n2").attr("src","img/ystar.png");
					$("#n1").attr("src","img/ystar.png");
					$(this).attr("src","img/ystar.png");
				},
				function(){
					$("#n3").attr("src","img/gstar.png");
					$("#n2").attr("src","img/gstar.png");
					$("#n1").attr("src","img/gstar.png");
					$(this).attr("src","img/gstar.png");
				});

			$("#n5").hover(
				function(){
					$("#n4").attr("src","img/ystar.png");
					$("#n3").attr("src","img/ystar.png");
					$("#n2").attr("src","img/ystar.png");
					$("#n1").attr("src","img/ystar.png");
					$(this).attr("src","img/ystar.png");
				},
				function(){
					$("#n4").attr("src","img/gstar.png");
					$("#n3").attr("src","img/gstar.png");
					$("#n2").attr("src","img/gstar.png");
					$("#n1").attr("src","img/gstar.png");
					$(this).attr("src","img/gstar.png");
				});


		});