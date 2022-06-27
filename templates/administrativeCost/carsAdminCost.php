
<nav class="nav nav-pills nav-justified">
  <a class="nav-item nav-link border" href="/cars/<?php echo $carId?>/probeg">PROBEG</a>
  <a class="nav-item nav-link border" href="/cars/<?php echo $carId?>/adminCostCar">ADMINISTRATIVE COST</a>
  <a class="nav-item nav-link border" href="#">REPAIR</a>
</nav>
<div class="space">
   <br>
</div>
<form method="post">
    <div class="row">
        <div class="col-3">
            <label for="costId" class="col-form-label">Name of cost:</label>
            <select class="form-control" id="costID">
                <?php
                if ($resultsCost->num_rows > 0){
                    while($row = $resultsCost->fetch_assoc()){
                ?>
                <option value="<?php echo $row['costName']; ?>"><?php echo $row['costName']; ?></option>
                <?php
                    }
                }
                ?>
            </select>

        </div>
        <div class="col-3">
            <label for="nextPayment" class="col-form-label">Next Payment:</label>
            <input type="date" class="form-control" id="nextPayment">
        </div>
        <div class="col-3">
            <label for="price" class="col-form-label">Price:</label>
            <input type="text" class="form-control" id="price">
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-success fixbutton" id="successAddButon" data-geturl="/cars/<?php echo $carId ?>/adminCostCar/add">Add</button>
        </div>
    </div>
</form>
<!--DtabaseTable-->
<h1 class="text-center"> Admimistrative cost</h1>
<br>
<table id="defaltDataTable" class="table table-striped table-bordered" style="width:100%">
    <thead class="grey lighten-2">
        <tr>
            <th class="font-weight-bold text-center">Name of Cost</th>
            <th class="font-weight-bold text-center">Next payment</th>
            <th class="font-weight-bold text-center">Price</th>
            <th class="font-weight-bold text-center">Status</th>
            <th class="font-weight-bold text-center">Action</th>

        </tr>
    </thead>
    <tbody>
        <?php
            if ($results->num_rows > 0){
                while($row = $results->fetch_assoc()){
        ?>
        <?php
            if(!is_null($row['dateOfPayment'])){
                 $color='#23ea23';
            }else {
                 $color='yellow';
            }
        ?>
        <tr style="background-color:<?php echo $color;?>">

            <td class="text-center"><?php echo $row['costID']; ?></td>
            <td class="text-center"><?php echo $row['nextPayment']; ?></td>
            <td class="text-center"><?php echo $row['price']; ?></td>
            <td class="text-center"><?php echo $row['dateOfPayment']; ?></td>
            <td class="text-center">
                <span class="table-edit"><button type="button" class="btn btn-warning editCostOfCar" data-toggle="modal" data-target="#EditCostOfCars" data-rowid="<?php echo $row['id'] ?>" data-geturl="/cars/<?php echo $carId ?>/adminCostCar/getOneCostOfCar">Edit</button></span>
                <span class="table-edit"><button type="button" class="btn btn-success payCostOfCar" data-toggle="modal"  data-rowid="<?php echo $row['id'] ?>"  data-geturl="/cars/<?php echo $carId ?>/adminCostCar/payCost">Pay</button></span>
                <span class="table-remove"><button type="button" class="btn btn-danger removeCostOfCar" data-toggle="modal" data-target="#RemoveCarCostModal" data-rowid="<?php echo $row['id'] ?>" >Remove</button></span>
            </td>
                <?php
                echo '</div>';
                ?>
            </tr>
        <?php
            }
        }
        ?>
        </tbody>
    <tfoot class="grey lighten-2">
        <tr>
            <th class="font-weight-bold text-center">Name of Cost</th>
            <th class="font-weight-bold text-center">Next payment</th>
            <th class="font-weight-bold text-center">Price</th>
            <th class="font-weight-bold text-center">Status</th>
            <th class="font-weight-bold text-center">Action</th>
        </tr>
    </tfoot>
</table>
<!--DtabaseTable-->


<div class="modal fade right" id="RemoveCarCostModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger modal-side modal-top-right" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading">Warning delete!!!</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
                    <h3 class="text-center">Are you sure to delete?</h3>
            <!--Body-->
            <div class="modal-body">

            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <a type="button" class="btn btn-primary" id="removeCostOfCars" data-geturl="/cars/<?php echo $carId ?>/adminCostCar/removeCostOfCar">Yes, I want <i class="fa fa-diamond ml-1"></i></a>
                <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">No, thanks</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- End of Remove Button Modal-->

<!--Edit Modal-->
<div  id="EditCostOfCars" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit cost data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div><!--.modal-header-->
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="nextPayment" class="col-form-label">Next Payment:</label>
                                <input type="date" class="form-control" id="EditNextPayment">
                            </div>
                            <div class="col-6">
                                <label for="price" class="col-form-label">Price:</label>
                                <input type="text" class="form-control" id="editPrice">
                            </div>

                        </div>
                    </div>
                </div><!--.modal-body-->
                <div class="modal-footer">
                    <input type="hidden" id="costOfCarId" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="sendEditCostButton" data-geturl="/cars/<?php echo $carId ?>/adminCostCar/editCostCar">Send</button>
                </div><!--.modal-foother-->
            </form>
        </div><!--.modal-content-->
    </div>
</div>
<!--End of Edit Modal-->

<!--Pay Button Modal-->
<div class="modal fade" id="PayModalLabel" tabindex="-1" role="dialog" aria-labelledby="PayModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-success" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">Modal Success</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <div class="text-center">
          <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
          <p>Are you want to Pay this cost?</p>
        </div>
      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <a type="button" class="btn btn-success" id="yesPay">Yes I want! <i class="fa fa-diamond ml-1 text-white"></i></a>
        <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">No, thanks</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- End of Pay Button Modal-->
