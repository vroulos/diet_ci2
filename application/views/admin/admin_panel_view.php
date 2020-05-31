 <div id="choose_customer_view">

 <table class="table">
    <thead>
      <th>Διαιτολόγος</th>
    </thead>
    <tbody>
 <?php
      if(isset($dietitians)) {


       foreach ($dietitians as $row) { ?>
        <tr>
          <td> <?php echo $row->dietitian_name; ?> </td>
       
        </tr>
      <?php 
    } 
  }

  ?>
    </tbody>

  </table>

</div>
