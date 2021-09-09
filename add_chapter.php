<?php include('top.php');?>
                <div class="top_pad">
                  Add Chapter
                </div>

                <div class="x_panel">
                <div class="x_title">
                  <h2>Add New Chapter</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Department<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <select class="form-control">
                          <option>Choose Department</option>
                          <option>Computer Science and Engineering</option>
                          <option>Mathematics</option>
                          <option>Chemistry</option>
                        </select>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Semester<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <select class="form-control">
                          <option>Choose Semester</option>
                          <option>First</option>
                          <option>Second</option>
                        </select>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Subject<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <select class="form-control">
                          <option>Choose Subject</option>
                          <option>Algorithm</option>
                          <option>DBMS</option>
                        </select>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Chapter Name<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="chap_nm" class="form-control" name="Chapter_name" required="required">
                      </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>

<?php include('footer.php');?>