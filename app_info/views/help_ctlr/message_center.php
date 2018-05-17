<div id="table-scroll" class="table-scroll">
  <div class="table-wrap">
    <table class="main-table">
      <thead>
        <tr>
          <th class="fixed-side" scope="col">&nbsp;</th>

          <?php foreach($d as $t){?>
                <th scope="col"><?php echo $t['']?> </th>
            <?php }  ?>
          
          
        </tr>
      </thead>
      <tbody>
        <tr>
          <th class="fixed-side"><?php echo $t['id']?></th>
          <td>Cell content<br>
            test</td>
          <td>Cell content</td>
          <td>Cell content</td>
          <td>Cell content</td>
          <td>Cell content</td>
          <td>Cell content</td>
          <td>Cell content</td>
        </tr>
        
      </tbody>
    </table>
  </div>
</div>