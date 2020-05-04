<!--  <input id = "search" placeholder="Search for..."></input>
 <button value = 'send' id = "submit" onclick="setRoomName()">Search</button>  -->

<div class="container">
	<div class="row" style="margin-top: 20px">
		<input class="form-control" id = "startCall" style="width: 200px" placeholder="Όνομα χώρου"></input>
	<button class="btn btn-dark" style="margin-left: 20px" value = 'send' id = "submitCall" onclick="startVideoCall()">Εκκίνηση κλήσης</button> 
	<button class="btn btn-dark" style="margin-left: 20px" value = 'stop' id = "stopCall" onclick="stopVideoCall()">Τερματισμός κλήσης</button> 

	<button type="button" class="btn btn-warning" style="margin-left: 20px" data-toggle="modal" data-target="#exampleModalCenter">
  Βοήθεια
</button>
	</div>
	
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Πως πραγματοποιείται βίντεο κλήση</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Προσθέτεις τον νέο διαδικτυακό χώρο και στην συνέχεια πατάς εκκίνηση κλήσης.
        Θα ξεκινήσει η νέα κλήση όπου θα μπεις στο room . Θα πρέπει διαιτολόγος και πελάτης
        να είναι στο ίδιο room.

        Αν θες να τερματίσεις ή να φύγεις από την κλήση πατάς είναι το κουμπί τερματισμός κλήσης από το μενού, είτε το κόκκινο κουμπάκι μέσα στο παράθυρο κλήσης.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Κλείσιμο</button>
        
      </div>
    </div>
  </div>
</div>


<script src="https://meet.jit.si/external_api.js"></script>
        <script>
        	//var roomName = "ikaria"
        	function stopVideoCall(){
        		//api.executeCommand('toggleShareScreen');
				location.reload();
        	}

        	function setRoomName() {
  			roomName = document.getElementById("submitCall").value;
 			 console.log(roomName);
			}

        	function startVideoCall(){
        		roomName = document.getElementById("startCall").value;
 			 	console.log(roomName);
        		var domain = "meet.jit.si";
	            var options = {
	                roomName: roomName,
	                width: window.screen.width ,
	                height: window.screen.height ,
	                parentNode: undefined,
	                configOverwrite: {},
	                interfaceConfigOverwrite: {
	                    filmStripOnly: false
	                }
	                //interfaceConfigOverwrit
	            }
	            var api = new JitsiMeetExternalAPI(domain, options);
        	}
            
            //api.executeCommand('toggleTileView');

           
        </script>