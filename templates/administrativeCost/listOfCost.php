<!--DtabaseTable-->
<h1 class="text-center"> List of Аdministrative cost</h1>
<div class="row">
    <span class="table-add float-right mb-3 mr-2" >
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddAdministrativeCostModal">
            <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
        </button>
    </span>
</div>

<br>
<table id="defaltDataTable" class="table table-striped table-bordered" style="width:100%">
<thead class="grey lighten-2">
<tr>
    <th class="font-weight-bold text-center">Name</th>
    <th class="font-weight-bold text-center">Action</th>

</tr>
</thead>
<tbody id="costAction">
<?php
if ($results->num_rows > 0){
    while($row = $results->fetch_assoc()){
?>
        <tr>
            <td class="text-center"><?php echo $row['costName']; ?></td>
            <td class="text-center">
                <span class="table-edit" ><button type="button" class="btn btn-warning editCost"   data-toggle="modal" data-target="#EditAdministrativeCost" data-rowid="<?php echo $row['id'] ?>" data-geturl="/administrativeCost/getOne">Edit</button></span>
                <span class="table-remove" ><button type="button" class="btn btn-danger removeCost" data-toggle="modal" data-target="#RemoveCostModal" data-rowid="<?php echo $row['id'] ?>" data-geturl="/administrativeCost/remove" >Remove</button></span>
            </td>
        </tr>
<?php
    }
}
?>
</tbody>
<tfoot class="grey lighten-2">
<tr>
    <th class="font-weight-bold text-center">Name</th>
    <th class="font-weight-bold text-center">Action</th>
</tr>
</tfoot>
</table>
<!--DtabaseTable-->


<!--Add Modal-->
<div  id="AddAdministrativeCostModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
             <h5 class="modal-title" id="">Add new cost</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
         </div><!--.modal-header-->
           <div class="modal-body">
             <form method="post">
               <div class="form-group">
                 <label for="cost-name" class="col-form-label">Name:</label>
                 <input type="text" class="form-control" id="cost-name">
               </div>

             </form>
         </div><!--.modal-body-->
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <input type="submit" class="btn btn-primary" id="submitAddCost">
         </div><!--.modal-foother-->
    </div><!--.modal-content-->
  </div>
</div>
<!--End of Add Modal-->

<!--Edit Modal-->
<div  id="EditAdministrativeCost" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
             <h5 class="modal-title">Edit cost data</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
         </div><!--.modal-header-->
         <div class="modal-body">
            <form method="post">
              <div class="form-group">
                <label for="cost-name" class="col-form-label">Name:</label>
                <input type="text" class="form-control" id="editCostName">
              </div>

            </form>
        </div><!--.modal-body-->
           <div class="modal-footer">
            <input type="hidden" id="costId" />
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="button" class="btn btn-primary" id="sendButton">Send</button>
         </div><!--.modal-foother-->
    </div><!--.modal-content-->
  </div>
</div>
<!--End of Edit Modal-->

<!--Remove Button Modal-->
<div class="modal fade right" id="RemoveCostModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <a type="button" class="btn btn-primary" id="removeCostRow">Yes, I want <i class="fa fa-diamond ml-1"></i></a>
                <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">No, thanks</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- End of Remove Button Modal-->
