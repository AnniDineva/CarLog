
                        <!--Add Modal-->
                        <div  id="AddModalLabel" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLabel">Add new mechanic</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div><!--.modal-header-->
                                   <div class="modal-body">
                                     <form method="post">
                                       <div class="form-group">
                                         <label for="mechanic-name" class="col-form-label">Name:</label>
                                         <input type="text" class="form-control" id="mechanic-name">
                                       </div>
                                       <div class="form-group">
                                         <label for="mechanic-phone" class="col-form-label">Phone number:</label>
                                         <input type="text" class="form-control" id="mechanic-phone">
                                       </div>
                                       <div class="form-group">
                                           <label for="mechanic-description" class="col-form-label">Description:</label>
                                           <textarea class="form-control" id="mechanic-description"></textarea>
                                        </div>

                                     </form>
                                 </div><!--.modal-body-->
                                   <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                     <input type="submit" class="btn btn-primary" id="submitAddMechanics">
                                 </div><!--.modal-foother-->
                            </div><!--.modal-content-->
                          </div>
                        </div>
                        <!--End of Add Modal-->

                                    <!--Remove Button Modal-->
                                    <div class="modal fade right" id="RemoveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                    <a type="button" class="btn btn-primary" id="removeRow">Yes, I want <i class="fa fa-diamond ml-1"></i></a>
                                                    <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">No, thanks</a>
                                                </div>
                                            </div>
                                            <!--/.Content-->
                                        </div>
                                    </div>
                                    <!-- End of Remove Button Modal-->
                                    <!--Edit Modal-->
                                    <div  id="EditModalLabel" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                 <h5 class="modal-title">Edit mechanic data</h5>
                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                                 </button>
                                             </div><!--.modal-header-->
                                               <div class="modal-body">
                                                 <form>
                                                   <div class="form-group">
                                                     <label  for="mechanic-name" class="col-form-label">Name:</label>
                                                     <input type="text" class="form-control" id="mechanic-name">
                                                   </div>
                                                   <div class="form-group">
                                                     <label for="mechanic-phone" class="col-form-label">Phone number:</label>
                                                     <input type="text" class="form-control" id="mechanic-phone">
                                                   </div>
                                                   <div class="form-group">
                                                       <label for="mechanic-description" class="col-form-label">Description:</label>
                                                       <textarea class="form-control" id="mechanic-description"></textarea>
                                                    </div>

                                                 </form>
                                             </div><!--.modal-body-->
                                               <div class="modal-footer">
                                                <input type="hidden" id="mechanic-id" />
                                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                 <button type="button" class="btn btn-primary" id="sendButton">Send</button>
                                             </div><!--.modal-foother-->
                                        </div><!--.modal-content-->
                                      </div>
                                    </div>
                                    <!--End of Edit Modal-->

            <!--DtabaseTable-->
            <h1 class="text-center"> List of mechanics</h1>
            <div class="row">
                <span class="table-add float-right mb-3 mr-2" >
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddModalLabel">
                        <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
                    </button>
                </span>
            </div>

            <br>
            <table id="defaltDataTable" class="table table-striped table-bordered" style="width:100%">
        <thead class="grey lighten-2">
            <tr>
                <th class="font-weight-bold text-center">Name</th>
                <th class="font-weight-bold text-center">Phone Number</th>
                <th class="font-weight-bold text-center">Description</th>
                <th class="font-weight-bold text-center">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
            if ($results->num_rows > 0){
                while($row = $results->fetch_assoc()){
            ?>
                    <tr>
                        <td class="text-center"><?php echo $row['name']; ?></td>
                        <td class="text-center"><?php echo $row['phone']; ?></td>
                        <td class="text-center"><?php echo $row['description']; ?></td>
                        <td class="text-center">
                            <span class="table-edit"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#EditModalLabel" data-rowid="<?php echo $row['id'] ?>" data-geturl="/mechanics/getOne">Edit</button></span>
                            <span class="table-remove"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#RemoveModal" data-rowid="<?php echo $row['id'] ?>" data-geturl="/mechanics/remove" >Remove</button></span>
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
                <th class="font-weight-bold text-center">Phone Number</th>
                <th class="font-weight-bold text-center"> Description</th>
                <th class="font-weight-bold text-center">Action </th>
            </tr>
        </tfoot>
    </table>
    <!--DtabaseTable-->
