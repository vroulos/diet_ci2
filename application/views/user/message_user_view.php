<!-- <?php foreach ($messages as $row) { ?>
		<p class="lead"><?php echo $row->message; ?></p>
<?php } ?> -->

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
  echo "you have not messages yet";
} ?>

<!-- <script type="text/javascript">

  $(document).ready(function() {
  $('#reply').click(function() {
    alert($('#term').val());
  });
});

</script>
 -->
