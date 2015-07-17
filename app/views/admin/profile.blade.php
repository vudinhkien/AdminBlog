
@extends('admin.index')
@section('content')

<ul class="nav  nav-tabs ">
	<li class="active">
		<a href="#tab1" class="changepass-profile" data-toggle="tab">
			<i class="fa fa-user"></i>
		   	User Profile
		</a>
	</li>
	<li>
	   <a href="#tab2" class="changepass-profile" data-toggle="tab">
	      <i class="fa fa-key"></i>
		   Change Password
		</a>
	</li>									
</ul>
 <div  class="tab-content mar-top">
	 <div id="tab1" class="tab-pane fade active in">
		  <div class="row">
				<div class="col-lg-12">
					 <div class="panel">
						   <div class="panel-body">
								<div class="col-md-4 user-images">
									<h3 class="panel-title">
										Images
									</h3>
									<img src="{{ Asset('assets/img/image-test.jpg') }}">
									<input type="file" id="example-file-input" name="file">
								</div>
								<div class="col-md-8">
									 <div class="panel-body">
										  <div class="table-responsive">
												<table class="table table-bordered table-striped" id="users">
	 
													<tr>
													   <td>User Name</td>
													   <td>
															{{ Session::get('name') }} 
													   </td>
													</tr>
 <!-- <a href="#" data-pk="<?php //echo $_SESSION['u_id']; ?>" data-key="user" class="editable" data-title="Edit User Name"><?php //echo $user_arr['user'];?></a> -->
													<tr>
													   <td>E-mail</td>
													   <td>
															{{ Session::get('email') }} 
													   </td>
													</tr>
													<tr>
														  <td>Phone Number</td>
														  <td>
																{{ Session::get('phone') }} 
														  </td>
													</tr>
													<tr>
												 	   <td>Address</td>
												      <td>
															{{ Session::get('address') }} 
													   </td>
													</tr>
												</table>
										  </div>
									 </div>
								</div>
						  </div>
					 </div>
				</div>
		  </div>
	 </div>
	 <div id="tab2" class="tab-pane fade">
		  <div class="row">
				<div class="col-md-12 pd-top">
					 <form action="#" class="form-horizontal">
						  <div class="form-body">
								<div class="form-group">
									 <label for="inputpassword" class="col-md-3 control-label">
										  Password
										  <span class='require'>*</span>
									 </label>
									 <div class="col-md-9">
										  <div class="input-group">
												<span class="input-group-addon">
													 <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
												</span>
												<input type="password" placeholder="Password" class="form-control"/>
										  </div>
									 </div>
								</div>
								<div class="form-group">
									 <label for="inputnumber" class="col-md-3 control-label">
										  Confirm Password
										  <span class='require'>*</span>
									 </label>
									 <div class="col-md-9">
										  <div class="input-group">
												<span class="input-group-addon">
													 <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
												</span>
												<input type="password" placeholder="Password" class="form-control"/>
										  </div>
									 </div>
								</div>
						   </div>
						   <div class="form-actions">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" class="btn btn-primary">Submit</button>
									 &nbsp;
									<button type="button" class="btn btn-danger">Cancel</button>
									 &nbsp;
									<input type="reset" class="btn btn-default hidden-xs resetprofile" value="Reset"></div>
						   </div>
					</form>
				</div>
		   </div>
	   </div>
</div>
@endsection