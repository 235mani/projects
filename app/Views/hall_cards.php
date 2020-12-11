<?php 
use App\Models\hall_db;
    $auth = new hall_db();
    $session = session();
    if ($search!='') {
      $search=$search;
    }
    elseif (!$session->getTempdata('search')) {
      $search='';
    }else{
      $search = $session->getTempdata('search');  
    }
    
if (isset($search)) {
  if ($search!=NULL) {
        $result = $auth->orWhere(['location'=>$search])
                     ->orWhere(['title'=>$search])
                     ->orWhere(['hall_type'=>$search])
                     ->findAll();
        if (!$result) 
        {
          echo "<div align='center' style='margin-top:20px;margin-bottom:20px;'><span  class='alert alert-danger alert-dismissible fade show' role='alert'>"."No Results Found".
            "<a href='#' class='close' data-dismiss='alert'>&times</a></span></div>";
          // echo "<div align='center' style='margin-top:20px;margin-bottom:25px;'>";
          // echo "<span class='alert alert-danger'>No Results Found</span>";
          // echo "</div>";
        }
  }else{
    $result = $auth->findAll();
  }
        foreach($result as $x => $x_value) 
        {
?>

<div class="container-fluid" id="card-body"> <!-- card container start -->
      
    <div class="card_body_footer"> <!-- card start -->
      <div class="row" id="card_row">
          <div class="col-12 mt-3" id="">
              <div class="card_column" id="card_shadow"  >
                  <?php $val= $x_value['id'];?>
                <a href="<?=base_url('home/hall_details')?><?php echo "/".$val?>"><img class="hall_card_col1" src="<?php echo base_url()."/public/images/".$x_value['image'] ?>" alt="Card image cap"></a>
              </div>

              <div class="card_column" id="card_shadow" >
                  <div class="hall_card_col2" >
                        <div class="col2_txt"  >
                            <h2 class="col2_title"><b>
                              <?= ucwords($x_value['title'])?>
                            </b></h2>
                          <table  align="center">
                            <tbody>
                                    <tr>
                                        <td><i class="fas fa-map-marker-alt"></i> &nbsp 
                                            <?= ucwords($x_value['location'])?>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-utensils"></i> &nbsp <span id="foodtype">
                                          <?= ucwords($x_value['food_type'])?>
                                        </span></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-car"></i> &nbsp <span id="parking">
                                          <?= ucwords($x_value['parking'])?>
                                        </span></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-person-booth"></i> &nbsp <span id="rooms">
                                          <?= ucwords($x_value['coolant'])?>
                                        </span></td>
                                    </tr>                                                                                               
                            </tbody>
                          </table>
                        </div>                                                  
                  </div>
              </div>

                  <div class="card_column" id="card_shadow" >
                            <div class="hall_card_col3" >
                                <div class=" col3_txt" id="" style="border-bottom:1px solid silver;" >
                                        <h5 class="col3_title"><b>Pricing </b></h5>
                                        <table align="center">
                                          <tbody>
                                              <tr>
                                                  <td><b>Rental Price</b></td>
                                                  <td><i class="fas fa-rupee-sign" id="price_icon"></i>  <span id="price"><?= $x_value['rent']?></span></td>
                                              </tr>
                                              <tr>
                                                  <td><b>Veg Price</b></td>
                                                  <td><i class="fas fa-rupee-sign" id="price_icon"></i>  <span id="price"><?= $x_value['veg_price']?></span></td>
                                              </tr>
                                              <tr>
                                                  <td><b>Non-Veg Price</b></td>
                                                  <td><i class="fas fa-rupee-sign" id="price_icon"></i>  <span id="price"><?= $x_value['non_veg_price']?></span></td>
                                              </tr>
                                          </tbody>
                                        </table>

                                    </div>
                                    
                                    <div class="col3_txt">
                                        <h5 class="col3_title"><b>Capacity </b></h5>
                                          <table align="center">
                                          <tbody>
                                              <tr>
                                                  <td><b>Hall</b></td>
                                                  <td><span id="capacity">
                                                    <?= $x_value['hall_capacity']?>
                                                  </span></td>
                                              </tr>
                                              <tr>
                                                  <td><b>Lawn</b></td>
                                                  <td><span id="capacity2">
                                                    <?= $x_value['hall_capacity']?>
                                                  </span></td>
                                              </tr>
                                                                                                  
                                          </tbody>
                                        </table>
                                  </div>
                            </div>
                  </div>
            
                
            </div>       
        </div>
        <div class="card-footer" id="card_shadow" style="background-color:#008080;border:1px solid black;">
              <div class="card_visit">
                <?php $val= $x_value['id'];?>
                <a href="<?=base_url('home/hall_details')?><?php echo "/".$val?>"><button class="btn btn-sm btn-warning"><b>Visit for more</b></button></a>
              </div>
               <div class="card_ratting">
                <b>
                  <?php 
                    $rate_val = round($x_value['rating']);
                    echo $rate_val;
                    for ($i=1; $i <= 5; $i++) { 
                      if ($i<=$rate_val) {
                        ?>
                          <span class="fa fa-star card_ratting_checked"></span>
                        <?php
                      }else{
                        ?>
                          <span class="fa fa-star"></span>
                        <?php
                      }
                    }
                  ?>
                  
                </b>

<!--                   <span class="fa fa-star card_ratting_checked"></span>
                  <span class="fa fa-star card_ratting_checked"></span>
                  <span class="fa fa-star card_ratting_checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span> -->

                  
               </div> 
        </div>

    </div> <!-- card end -->
</div>


<?php

    }
}
 ?>