<div id="table-scroll" class="table-scroll">
  <div class="table-wrap">
    <table class="main-table">
      <thead>
        <tr>
        
                    <?php //print_r($d);?>
                   <?php
                   if($d==null) {
                       ?> <th class="fixed-side"><?php echo "Pas de requêtes." ;?> </th><?php 
                   }
                   else {
                       foreach($d[0] as $key=>$value){?>
                       <?php if($key=='id'){?>
                         
                          <th class="fixed-side" id="top" scope="col">Numéro <br>Message </th>
    
                        <?php }else{?>
                    <th id="top" scope="col"><?php 
                    
                    if($key=="contenu_msg"){echo "Contenu du Message";}
                    if($key=="Date_Heure"){echo "Date/Heure";}
                    if($key=="id_type_msg"){ echo "Type Requête";}?> </th>
            <?php }  } }?>
          
          
        </tr>
      </thead>
      <tbody>
        


        <?php foreach($d as $key=>$value){?>
          <tr>
        
          <th class="fixed-side"><?php echo $value['id'];?></th>
          <td><?php echo $value['id_type_msg'];?></td>
          <td><?php echo $value['Date_Heure'];?></td>
          
          <td><?php echo $value['contenu_msg'];?></td>
          </tr>
        <?php }?>
        
        
      </tbody>
    </table>
  </div>
</div>