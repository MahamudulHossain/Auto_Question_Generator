<?php include('top.php');?>

                <div class="top_pad all_ques">
                  All Questions
                </div>
                <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="item form-group">
                        <div class="col-md-4">
                          <label class="col-form-label col-md-3 col-sm-3 label-align">Department<span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 ">
                          <select class="form-control">
                            <option>Choose Department</option>
                            <option>Computer Science and Engineering</option>
                            <option>Mathematics</option>
                            <option>Chemistry</option>
                          </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label class="col-form-label col-md-3 col-sm-3 label-align">Semester<span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 ">
                          <select class="form-control">
                            <option>Choose Semester</option>
                            <option>First</option>
                            <option>Second</option>
                          </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label class="col-form-label col-md-3 col-sm-3 label-align">Subject<span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 ">
                          <select class="form-control">
                            <option>Choose Subject</option>
                            <option>Computer Science and Engineering</option>
                            <option>Mathematics</option>
                            <option>Chemistry</option>
                          </select>
                          </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                      <table id="datatable" class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Question </th>
                            <th class="column-title">Level </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td>Define algorithm. Write an algorithm to evaluate a polynomial using Hornor's rule</td>
                              <td>Hard</td>
                              <td>
                                  <button class="btn btn-primary btn-sm">Edit</button>
                                  <button class="btn btn-danger btn-sm">Delete</button>
                              </td>
                            </tr>
                            <tr>
                              <td>Devise an algorithm that inputs three integers and outputs them in increasing order</td>
                              <td>Medium</td>
                              <td>
                                  <button class="btn btn-primary btn-sm">Edit</button>
                                  <button class="btn btn-danger btn-sm">Delete</button>
                              </td>
                            </tr>
                            <tr>
                              <td>Present an algoritm that searches an unsorted array a[1 : n]</td>
                              <td>Medium</td>
                              <td>
                                  <button class="btn btn-primary btn-sm">Edit</button>
                                  <button class="btn btn-danger btn-sm">Delete</button>
                              </td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
              
                  </div>
                </div>
              </div>
                

<?php include('footer.php');?>
