<!-- <?php foreach ($messages as $row) { ?>
		<p class="lead"><?php echo $row->message; ?></p>
<?php } ?> -->

<?php 
  // $chatNodejs = "index.js";
  // exec('/c/development/nodejs/'.$chatNodejs);
  // echo $chatNodejs;
  //exec("\"C:/development/nodejs/index.js\"");
 ?>

<?php if(isset($messages)){ ?>
<div class="container-fluid">
	<?php foreach ($messages as $row) { ?>

 
    <div class="card-group" id="card_group_messages">
      <div class="card " style="margin-bottom:  50px">
      <div class="card-body">
        <h5 class="card-title">Μήνυμα</h5>
        <p class="card-text"><?php echo $row->message; //echo $row->id ?></p>
        <?php 
        //display all the answers
        if (isset($answers)) {
          
        
        foreach ($answers as $row2 ) {
          if ($row->id == $row2->message_id) {
             if ($row2->who_send_it  == 'dietitian') {
            echo "<div class='card' id = 'dietitian_answer'>"; 
            echo "<p class='card-text'>". $row2->answer; "</p>";
            echo '</div><br>';
          }elseif ($row2->who_send_it  == 'user') {
            echo "<div class='card' id = 'user_answer'>"; 
            echo "<p class='card-text'>". $row2->answer; "</p>";
            echo '</div><br>';
          }    
     }
      }
        } ?>
          <?php echo form_open('user/messages'); ?>
          <input type="hidden" name="message_id" value="<?php echo $row->id ?>">
          
         

          <div class="card-body" id="search">
            <input class="form-control" name="answer" id="term" type="text" placeholder="Πληκτρολόγησε εδώ.." />
            <input style="margin-top: 10px; max-width: 100%;" type="submit"  id="reply" name="reply" class="btn btn-dark" value="Απάντηση" >
          </div>
          <input type="submit" style=" max-width: 100%;" name="delete_message" class="btn btn-primary" value="διαγραφή μηνύματος" >
          <?php echo form_close(); ?>
      </div>
    </div>
  </div>

<!--     <script>
    Push.create("Hello world!", {
    body: "How's it hangin'?",
    icon: '/icon.png',
    timeout: 4000,
    onClick: function () {
        window.focus();
        this.close();
    }
});

  </script> -->
 
    
  <?php } ?>


</div>
<?php }else{
  echo '<div class="jumbotron jumbotron-fluid">';
  echo '<div class="container">';
    echo "<h3 class='display-4'>Δεν έχεις μηνύματα</h3>";
    echo "<p class='lead'>Θα επικοινωνήσει ο διαιτολογος μαζί σας και μετά θα μπορείτε να στείλετε</p>";
  echo "</div>";
echo "</div>";
} ?>

<script type="text/javascript">
    var conn = new WebSocket('ws://localhost:8080', 'echo-protocol');
    console.log(conn);
    conn.onopen = function(e) {
    console.log("Connection established!");
    alert("connection established");
  };

    conn.onmessage = function(e) {
    console.log(e.data);
 };


</script>
<script type="text/javascript">
  conn.send("my first message");
</script>


<!-- <script type="text/javascript">

  $(document).ready(function() {
  $('#reply').click(function() {
    alert($('#term').val());
  });
});

</script>
 -->
