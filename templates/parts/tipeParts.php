<div class="space">
   <br>
</div>
<form  method="post">
    <div class="row">

        <div class="col-4">
            <label for="parentID" class="col-form-label">Parent</label>
            <select class="form-control" id='parentID'>
                <option value="0">Root categories</option>
                <?php
                if (count($results)){
                    foreach ($results as $category) {
                ?>
                        <option value="<?=$category['id']?>"><?=$category['space'].$category['namePart']?></option>
                <?php
                    }
                }
                ?>

            </select>
        </div>
        <div class="col-4">
            <label for="namePart" class="col-form-label">Name of part:</label>
            <input type="text" class="form-control" id="namePart">
        </div>
        <div class="col-4">
            <button type="button" class="btn btn-success fixbutton" id="addTipeParts" >Add</button>
        </div>
    </div>
</form>
<div class="space">
   <br>
</div>
<h1 class="text-center">Tipes Parts</h1>
<br>
<table class="table table-striped table-bordered" style="width:100%" >
    <thead class="grey lighten-2">
        <tr>
            <th class="font-weight-bold text-center">Tipe of Parts</th>
            <th class="font-weight-bold text-center">Action</th>

        </tr>
    </thead>
    <tbody>
        <?php
        if (count($results)){
            foreach($results AS $row){
        ?>
        <tr>
            <td class=""><?php echo $row['space'].$row['namePart']?></td>
            <td class="text-center">
                <span><button type="button" class="btn btn-warning editParts" data-toggle="modal" data-target="#editPartsModal"  data-rowid="<?php echo $row['id'] ?>" data-geturl="/parts/getOne">Edit</button></span>
                <span ><button type="button" class="btn btn-danger removeParts" data-toggle="modal" data-target="#removePartsModal" data-rowid="<?php echo $row['id'] ?>">Remove</button></span>
            </td>
        </tr>
        <?php
            }
        }
        ?>
    </tbody>
    <tfoot class="grey lighten-2">
        <tr>
            <th class="font-weight-bold text-center">Tipe of Parts</th>
            <th class="font-weight-bold text-center">Action</th>
        </tr>
    </tfoot>
    <tbody>

</table>

<!--Edit Modal-->
<div  id="editPartsModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
             <h5 class="modal-title">Edit Category Part</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
         </div><!--.modal-header-->
         <div class="modal-body">
            <form method="post">
              <div class="form-group">
                <label for="name-part" class="col-form-label">Name Category Part:</label>
                <input type="text" class="form-control" id="editNamePart">
                <label for="parent-id" class="col-form-label">Parent:</label>
                <select class="form-control" id="editParentID">
                    <option  ></option>
                    <?php
                    if (count($results)){
                        foreach ($results as $category) {
                    ?>
                            <option value="<?=$category['id']?>"><?=$category['space'].$category['namePart']?></option>
                    <?php
                        }
                    }
                    ?>

                </select>
              </div>

            </form>
        </div><!--.modal-body-->
           <div class="modal-footer">
            <input type="hidden" id="tipePartID" />
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="button" class="btn btn-primary" id="sendEditTypePart">Send</button>
         </div><!--.modal-foother-->
    </div><!--.modal-content-->
  </div>
</div>
<!--End of Edit Modal-->

<!--Remove Button Modal-->
<div class="modal fade right" id="removePartsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <a type="button" class="btn btn-primary" id="sendRemoveTipePart">Yes, I want <i class="fa fa-diamond ml-1"></i></a>
                <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">No, thanks</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- End of Remove Button Modal-->
