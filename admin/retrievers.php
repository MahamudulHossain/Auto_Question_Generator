<?php 
include('top.php');
?>
                 <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row band">
                                    <div class="col-12 fw">
                                        <center>QUESTION RETRIEVER LIST</center>
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
                                        <td>Abdul Kalam</td>
                                        <td>
                                            <button type="button" class="btn btn-info"data-toggle="modal" data-target="#exampleModal">Details</button>
                                            <button type="button" class="btn btn-success">Active</button>
                                            <button type="button" class="btn btn-danger text-white">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Shajahan Mia</td>
                                        <td>
                                            <button type="button" class="btn btn-info">Details</button>
                                            <button type="button" class="btn btn-warning">Deactive</button>
                                            <button type="button" class="btn btn-danger text-white">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Kamal Khan</td>
                                        <td>
                                            <button type="button" class="btn btn-info">Details</button>
                                            <button type="button" class="btn btn-success">Active</button>
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
                                <h5 class="modal-title" id="exampleModalLabel">Question Setter Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table">
                                    <tr>
                                        <td>Name</td>
                                        <td>Abdul Kalam</td>
                                    </tr>
                                    <tr>
                                        <td>Deapartment</td>
                                        <td>Computer Science and Engineering</td>
                                    </tr>
                                    <tr>
                                        <td>Subject</td>
                                        <td>Data Structure</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>ab_kalam@gmail.com</td>
                                    </tr>
                                    <tr>
                                        <td>Mobile</td>
                                        <td>99345478912</td>
                                    </tr>
                                </table>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                     <!-- Modal -->
<?php include('footer.php'); ?>