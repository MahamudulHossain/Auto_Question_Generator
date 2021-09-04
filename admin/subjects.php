<?php include('top.php'); ?>
                
                 <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row band">
                                    <div class="col-6 fw">
                                        SUBJECTS LIST
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
                                        <th scope="col">Subject</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Data Structure</td>
                                        <td>Computer Science and Engineering</td>
                                        <td>First Semester</td>
                                        <td>
                                            <button type="button" class="btn btn-info">Edit</button>
                                            <button type="button" class="btn btn-danger text-white">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Discrete Mathematics</td>
                                        <td>Computer Science and Engineering</td>
                                        <td>Second Semester</td>
                                        <td>
                                            <button type="button" class="btn btn-info">Edit</button>
                                            <button type="button" class="btn btn-danger text-white">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Abstract Algebra</td>
                                        <td>Mathematics</td>
                                        <td>First Semester</td>
                                        <td>
                                            <button type="button" class="btn btn-info">Edit</button>
                                            <button type="button" class="btn btn-danger text-white">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Probability Distributions</td>
                                        <td>Statistics</td>
                                        <td>Third Semester</td>
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
                                <h5 class="modal-title" id="exampleModalLabel">Subjects Name</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <input type="text" class="form-control fwb" id="sem_name" placeholder="Enter Subject Name" required="required">
                                <div class="form-group row mt-3">
                                    <div class="col-12">
                                        <select class="select2 form-select shadow-none fwb"
                                            style="width: 100%; height:36px;" required="required">
                                            <option>Select Department</option>
                                            <option value="AK">Computer Science and Engineering</option>
                                            <option value="HI">Mathematics</option>
                                            <option value="ES">Environmental Sciences</option>
                                            <option value="SS">Statistics</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-12">
                                        <select class="select2 form-select shadow-none fwb"
                                            style="width: 100%; height:36px;" required="required">
                                            <option>Select Semester</option>
                                            <option value="AK">First Semester</option>
                                            <option value="HI">Second Semester</option>
                                            <option value="ES">Third Semester</option>
                                            <option value="SS">Fourth Semester</option>
                                        </select>
                                    </div>
                                </div>
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