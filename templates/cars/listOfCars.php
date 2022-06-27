<!--Add Modal-->
<div  id="AddCarsModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
             <h5 class="modal-title" >Add new car</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
         </div><!--.modal-header-->
           <div class="modal-body">
             <form method="post">
               <div class="form-group">
                 <label for="car-name" class="col-form-label">Name:</label>
                 <input type="text" class="form-control" id="car-name">
               </div>
               <div class="form-group">
                 <label for="car-mark" class="col-form-label">Mark:</label>
                 <input type="text" class="form-control" id="car-mark">
               </div>
               <div class="form-group">
                 <label for="car-model" class="col-form-label">Model:</label>
                 <input type="text" class="form-control" id="car-model">
               </div>
               <div class="form-group">
                   <label for="reg-number" class="col-form-label">Number:</label>
                   <input type="text" class="form-control" id="reg-number">
                </div>
                <div class="form-group">
                  <label for="car-year" class="col-form-label">Year:</label>
                  <input type="number" class="form-control" id="car-year">
                </div>
                <div class="form-group">
                    <label for="images" class="col-form-label" accept="image/*" name="image" >Images...</label>
                    <input type="file" class="form-control" id="car-img">
                </div>

             </form>
         </div><!--.modal-body-->
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <input type="submit" class="btn btn-primary" id="submitAddCars">
         </div><!--.modal-foother-->
    </div><!--.modal-content-->
  </div>
</div>
<!--End of Add Modal-->
<div class="space">
   <br>
</div>
<div class="row">
    <h1  class="center">My cars</h1>
</div>
<div class="row">
    <span class="table-add float-right mb-3 mr-2" >
        <button type="button" class="btn btn-indigo" data-toggle="modal" data-target="#AddCarsModal">
            <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
        </button>
    </span>
</div>

<div class="row">
    <?php
    if ($results->num_rows > 0){
        while($row = $results->fetch_assoc()){
    ?>
    <div class="col-6">
        <a href="/cars/<?php echo $row['id']?>" >
            <img src="/images/03.jpg" alt="car image" width="500px">
            <p><?php echo $row['name'] ." " .$row['mark']." ".$row['model']." ".$row['year'] ; ?></p>
            <!--<p><?php print_r ($row);?></p>-->
        </a>
    </div>

    <?php
        }
    }
    ?>
</div>
