@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

		 

<!--   ------------ Add State Page -------- -->


          <div class="col-6">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit State </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('state.update',$state->id) }}" >
	 	@csrf
				


<div class="form-group">
	<h5>Division Select <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="division_id" class="form-control"  >
			<option value="" selected="" disabled="">Select Division</option>
			@foreach($division as $div)
			<option value="{{ $div->id }}" {{ $div->id == $state->division_id ? 'selected': '' }}>{{ $div->division_name }}</option>	
			@endforeach
		</select>
		@error('division_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>



<div class="form-group">
	<h5>District Select <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="district_id" class="form-control"  >
			<option value="" selected="" disabled="">Select District</option>
			@foreach($district as $dis)
			<option value="{{ $dis->id }}" {{ $dis->id == $state->district_id ? 'selected': '' }}>{{ $dis->district_name }}</option>	
			@endforeach
		</select>
		@error('district_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>



	 <div class="form-group">
		<h5>State Name  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="state_name" class="form-control" value="{{ $state->state_name }}"> 
	 @error('state_name	') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>
 
					 

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">					 
						</div>
					</form>




					  
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>

 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection