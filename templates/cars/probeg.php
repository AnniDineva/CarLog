
<nav class="nav nav-pills nav-justified">
  <a class="nav-item nav-link border" href="/cars/<?php echo $carId?>/probeg">PROBEG</a>
  <a class="nav-item nav-link border" href="/cars/<?php echo $carId?>/adminCostCar">ADMINISTRATIVE COST</a>
  <a class="nav-item nav-link border" href="#">REPAIR</a>

</nav>
<div class="space">
 <br>
</div>

<div class="row">
    <div class="col-6">
        <!--DtabaseTable-->
        <h1 class="text-center"> Пробег</h1>
        <h2 class="text-center"></h2>
        <div class="row">
            <span class="table-add float-right mb-3 mr-2" >
                <button type="button" class="btn btn-success" id="addProbegButton" data-toggle="modal" data-target="#AddModalLabel" data-rowid="<?php echo $carId ?>" >
                    <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
                </button>
            </span>
        </div>

        <br>
        <table id="defaltDataTable" class="table table-striped table-bordered" style="width:100%">
    <thead class="grey lighten-2">
        <tr>
            <th class="font-weight-bold text-center">Data</th>
            <th class="font-weight-bold text-center">Mileage</th>
            <th class="font-weight-bold text-center">Action</th>

        </tr>
    </thead>
    <tbody>
        <?php
        if ($probegView->num_rows > 0){
            while($row = $probegView->fetch_assoc()){
        ?>
                <tr>
                    <td class="text-center"><?php echo $row['date']; ?></td>
                    <td class="text-center"><?php echo $row['probeg']; ?></td>
                    <td class="text-center">
                        <span ><button type="button" class="btn btn-sm btn-warning buttonEditProbeg" data-toggle="modal" data-target="#editProbegModal" data-rowid="<?php echo $row['id'] ?>" data-geturl="/cars/<?php echo $carId ?>/probeg/getOneProbeg">Edit</button></span>
                        <span ><button type="button" class="btn btn-sm btn-danger buttonRemoveProbeg" data-toggle="modal" data-target="#removeProbeg" data-rowid="<?php echo $row['id']?>">Remove</button></span>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
    <tfoot class="grey lighten-2">
        <tr>
            <th class="font-weight-bold text-center">Date</th>
            <th class="font-weight-bold text-center">Mileage</th>
            <th class="font-weight-bold text-center">Action</th>
        </tr>
    </tfoot>
</table>
<!--DtabaseTable-->
    </div>
    <div class="col-6">
        <img src="/images/audi_a6_avant_009.jpg" alt="">
    </div>

</div>
</div>

<!-- AddModal -->
<div class="modal fade" id="AddModalLabel" tabindex="-1" role="dialog" aria-labelledby="addProbegModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProbegModalLabel">Актуален Пробег</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post">
            <div class="form-group">
              <label for="date" class="col-form-label">Дата:</label>
              <input type="date" class="form-control" id="newDate">

            </div>
            <div class="form-group">
              <label for="probeg" class="col-form-label">Пробег:</label>
              <input type="text" class="form-control" id="actualProbeg">
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" id="submitAddProbeg" data-geturl="/cars/<?php echo $carId ?>/probeg/add">
      </div>
    </div>
  </div>
</div>
<!--End  AddModal -->

<!--Edit Modal-->
<div  id="editProbegModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
             <h5 class="modal-title">Edit Probeg</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
         </div><!--.modal-header-->
         <div class="modal-body">
            <form method="post">
              <div class="form-group">
                <label for="editDate" class="col-form-label">Date:</label>
                <input type="date" class="form-control" id="editDate">

              </div>
              <div class="form-group">
                <label for="editProbeg" class="col-form-label">Probeg:</label>
                <input type="text" class="form-control" id="editProbeg">

              </div>

            </form>
        </div><!--.modal-body-->
           <div class="modal-footer">
            <input type="hidden" id="ProbegID" />
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="button" class="btn btn-primary" id="sendEditProbeg">Send</button>
         </div><!--.modal-foother-->
    </div><!--.modal-content-->
  </div>
</div>
<!--End of Edit Modal-->

<!--Remove Button Modal-->
<div class="modal fade right" id="removeProbeg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <a type="button" class="btn btn-primary" id="submitRemoveProbeg">Yes, I want <i class="fa fa-diamond ml-1"></i></a>
                <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">No, thanks</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- End of Remove Button Modal-->
