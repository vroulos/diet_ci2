
  <table class="table">
    <thead>
      <th>πελάτης</th>
    </thead>
    <tbody>
      <?php // emfanizontai oloi oi pelates se morfi pinaka ?>
      <?php foreach ($users as $row) { ?>
        <tr>
      <td><a href="http://localhost/diet_ci2/dietitians/customer?id=<?php echo $row->id  ?>"><?php echo $row->username; ?></a></td>
      </tr>
     <?php } ?>
    </tbody>

  </table>