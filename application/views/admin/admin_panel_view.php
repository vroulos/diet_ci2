<div id="table-responsive" style="margin: 7vw; ">
   <table class="table" >
    <thead>
      <th>Διαιτολόγος</th>
      <th>Αριθμός πελατών</th>
    </thead>
    <tbody>
 <?php
      if(isset($dietitians)) {


       foreach ($dietitians as $row) { ?>
        <tr>
          <td><a id="dietitian_info" href="<?php echo base_url()?>adminPanel/dietitian_info?id=<?php echo $row->dietitian_id?>"><?php echo $row->dietitian_name; ?></a></td>
          <td><?php if($row->number_of_customers > 0){
            echo $row->number_of_customers;
          }else{echo '0';} 
          ?></td>
            
        </tr>
      <?php 
    } 
  }

  ?>
    </tbody>

  </table>

</div>



