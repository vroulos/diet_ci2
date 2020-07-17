 <div id="choose_customer_view">

 <table class="table">
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
          <td><?php echo $row->number_of_customers ?></td>
            
        </tr>
      <?php 
    } 
  }

  ?>
    </tbody>

  </table>

</div>
