<script>
$(document).ready(function() {
	//for (var i = 0; i < 28; i++) {
		// $("[id*='mealInProgram']").mouseenter(function(){
  // 		$("[id*='feedback']").show(); 
		// });
		// $('#meal,#mealInProgram').mouseleave(function(){
  // 		$('#feedback').hide();
		// });
	//}
	// for (var i = 0; i < 28; i++) {
	// 	$('#meal,#mealInProgram' +i).mouseenter(function(){
 //   		$('#feedback10').show();
	// 	});
	// 	$('#meal,#mealInProgram').mouseleave(function(){
 //   		$('#feedback10').hide();
	// 	});
	// }
	
		$('#meal0,#feedback0', '#mealInProgram0').mouseenter(function(){
   		$('#feedback0').show();
		});
		$('#meal0,#feedback0', '#mealInProgram0').click(function(event) {
			$('#text0').show();
		});
		$('#feedback0').mouseleave(function(){
   		$('#feedback0').delay(10000).fadeOut(3000);
		});

		$('#meal1,#mealInProgram1').mouseenter(function(){
   		$('#feedback1').show();
		});
		$('#feedback1').mouseleave(function(){
   		$('#feedback1').fadeOut('slow');
		});

		$('#meal2,#mealInProgram2').mouseenter(function(){
   		$('#feedback2').show();
		});
		$('#feedback2').mouseleave(function(){
   		$('#feedback2').fadeOut('slow');
		});

		$('#meal3,#mealInProgram3').mouseenter(function(){
   		$('#feedback3').show();
		});
		$('#feedback3').mouseleave(function(){
   		$('#feedback3').fadeOut('slow');
		});

		$('#meal5,#mealInProgram5').mouseenter(function(){
   		$('#feedback5').show();
		});
		$('#feedback5').mouseleave(function(){
   		$('#feedback5').fadeOut('slow');
		});

		// ------------------------------------------------

		$("#heart").click(function(event) {
			alert("aalalla");
		});
		
	
	});
	

</script>