<?php include('top.php');?>

                <div class="top_pad multi_chap">
                  Multi Chapter Question Generation 
                </div>

                <div class="x_panel">
                <div class="x_title">
                  <h2>&nbsp;</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                    <div class="item form-group">
                        <div class="col-md-6">
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
                        <div class="col-md-6">
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
                    </div>
                    <div class="item form-group">
                        <div class="col-md-6">
                          <label class="col-form-label col-md-3 col-sm-3 label-align">Subject<span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 ">
                          <select class="form-control">
                            <option>Choose Subject</option>
                            <option>Data Structure</option>
                            <option>Discrete Mathematics</option>
                          </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label class="col-form-label col-md-3 col-sm-3 label-align">Chapter<span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 ">

                          <input type="checkbox" id="introduction" name="introduction" value="introduction">
                          <label for="vehicle1">Introduction</label><br>
                          <input type="checkbox" id="introduction" name="introduction" value="introduction">
                          <label for="vehicle1">Divide and Conquer</label><br>
                          <input type="checkbox" id="introduction" name="introduction" value="introduction">
                          <label for="vehicle1">Backtracking</label><br>
                          </div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <div class="col-md-6">
                          <label class="col-form-label col-md-3 col-sm-3 label-align">Total Set<span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 ">
                          <select class="form-control">
                            <option>Choose Number of Set</option>
                            <option>One</option>
                            <option>Two</option>
                            <option>Three</option>
                          </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="col-md-6">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Exam Name<span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                              <input type="text" id="chap_nm" class="form-control" name="Chapter_name" required="required" placeholder="Mid Term">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Exam Time<span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                              <input type="text" id="chap_nm" class="form-control" name="Chapter_name" required="required" placeholder="1 hour 30 minutes">
                            </div>
                          </div>
                        </div>
                    </div>

                     <div class="text-right">
                      <button class="btn btn-lg multi_chap_btn">Generate</button>
                    </div>
                  </form> 
                </div>
                  
                </div>
              </div>

<?php include('footer.php');?>