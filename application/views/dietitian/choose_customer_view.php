<style type="text/css">
  #deactivated{
    color: red;
  }

  #users{
    color: black;
  }
</style>

<div id="choose_customer_view">
  <table class="table">
    <thead>
      <th>πελάτης</th>
    </thead>
    <tbody>
      <?php // emfanizontai oloi oi pelates se morfi pinaka ?>
      <?php foreach ($users as $row) { ?>
        <tr>
          <td><a id="users" href="http://localhost/diet_ci2/dietitians/customer?id=<?php echo $row->id  ?>"><?php echo $row->username; ?></a></td>
       <?php if ($row->is_deactivated == 0) { ?>
                  <td><a href="http://localhost/diet_ci2/dietitians/deactivate_customer?id=<?php echo $row->id ?>" >Ενεργός</a></td>   
       <?php }else{ ?>
                  <td><a id="deactivated" href="http://localhost/diet_ci2/dietitians/activate_customer?id= <?php echo $row->id ?>" >Ανενεργός</a></td> 
        </tr>
      <?php 
    } 
  }
  ?>
    </tbody>

  </table>
</div>

