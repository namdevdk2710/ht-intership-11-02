@extends('admin.layouts.master')
@section('content')
      <div class="content-wrapper">
            <section class="content-header">
              <h1>
                List Contacts
                <small>
                  Displays a list of all Contacts</small>
              </h1>
            </section>
            <section class="content">
              <div class="row">
                <div class="col-md-12">
                  <div class="box">
                    <div class="box-header">
                            <h3 class="box-title">Contacts</h3>
                            <div class="box-tools">
                              <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                                <div class="input-group-btn">
                                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                              </div>
                            </div>
                          </div>
                    <div class="box-body">
                      <table class="table table-bordered" style="font-size:15px;text-align: center;">
                        <tbody>
                          <tr>
                            <th style="width: 10px;text-align: center;">#</th>
                            <th style="text-align: center;">Full Name</th>
                            <th style="text-align: center;">Telephone</th>
                            <th style="text-align: center;">Email</th>
                            <th style="text-align: center;">Content</th>
                            <th style="text-align: center;">Action</th>
                          </tr>
                          <tr>
                            <td>1</td>
                            <td>Nguyễn Văn A</td>
                            <td>0123456789</td>
                            <td>a@gmail.com</td>
                            <td>sdssfdfghjgf</td>
                            <td>
                              <a href="#" class="btn btn-primary" style="background-color:#20B2AA;"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                              <a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                          </tr>
                      </tbody></table>
                    </div> 
                    <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">
                              <li><a href="#">«</a></li>
                              <li><a href="#">1</a></li>
                              <li><a href="#">2</a></li>
                              <li><a href="#">3</a></li>
                              <li><a href="#">»</a></li>
                            </ul>
                          </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
@endsection 