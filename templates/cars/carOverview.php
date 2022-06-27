<div class="reviewCar">
    Review car:
    <?php
    echo $carDetails['name']." ".$carDetails['model']." ". $carDetails['year']." - ".$carId;
     ?>
</div>


<!--Nav-justified-->

<nav class="nav nav-pills nav-justified">
  <a class="nav-item nav-link border" href="/cars/<?php echo $carId?>/probeg">PROBEG</a>
  <a class="nav-item nav-link border" href="/cars/<?php echo $carId?>/adminCostCar">ADMINISTRATIVE COST</a>
  <a class="nav-item nav-link border" href="#">REPAIR</a>

</nav>

<!--End Nav-justified-->

<!-- AddModal
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
         <input type="hidden" id="carId" />
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" id="submitAddProbeg">
      </div>
    </div>
  </div>
</div>
<!--End  AddModal -->
