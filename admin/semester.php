<?php include('top.php'); ?>
                
                 <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row band">
                                    <div class="col-6 fw">
                                        ALL SEMESTERS
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="btn btn-primary fr" data-toggle="modal" data-target="#exampleModal">
                                                  ADD NEW
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                            <table class="table">
                                <thead class="thead-dark text-white">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>First Semester</td>
                                        <td>
                                            <button type="button" class="btn btn-info">Edit</button>
                                            <button type="button" class="btn btn-danger text-white">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Second Semester</td>
                                        <td>
                                            <button type="button" class="btn btn-info">Edit</button>
                                            <button type="button" class="btn btn-danger text-white">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Third Semester</td>
                                        <td>
                                            <button type="button" class="btn btn-info">Edit</button>
                                            <button type="button" class="btn btn-danger text-white">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Fourth Semester</td>
                                        <td>
                                            <button type="button" class="btn btn-info">Edit</button>
                                            <button type="button" class="btn btn-danger text-white">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Fifth Semester</td>
                                        <td>
                                            <button type="button" class="btn btn-info">Edit</button>
                                            <button type="button" class="btn btn-danger text-white">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Sixth Semester</td>
                                        <td>
                                            <button type="button" class="btn btn-info">Edit</button>
                                            <button type="button" class="btn btn-danger text-white">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                           </div> 
                        </div> 

                    <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Semester Name</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <input type="text" class="form-control fwb" id="sem_name" placeholder="Enter Semester Name" required="required">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                     <!-- Modal -->
<?php include('footer.php'); ?>