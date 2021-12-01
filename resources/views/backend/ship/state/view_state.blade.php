@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">{{ trans("admin.State List")   }}t</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>{{ trans("admin.Division Name")   }} </th> 
								<th>{{ trans("admin.District Name")   }} </th>
								<th>{{ trans("admin.State Name")   }} </th>
								<th>{{ trans("admin.Action")   }}</th>
								 
							</tr>
						<tbody>
	 @foreach($state as $item)
	 <tr>
		<td> {{ $item->division->division_name }}  </td> 
		<td> {{ $item->district->district_name }}  </td> 
		<td> {{ $item->state_name }}  </td>

		<td width="40%">
 <a href="{{ route('state.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
 <a href="{{ route('state.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
 	<i class="fa fa-trash"></i></a>
		</td>
							 
	 </tr>
	  @endforeach
						</tbody>
						 
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			          
			</div>
			<!-- /.col -->


<!--   ------------ Add State Page -------- -->


          <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">{{ trans("admin.Add State")   }} </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('state.store') }}" >
	 	@csrf
				


<div class="form-group">
	<h5>{{ trans("admin.Division Select")   }} <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="division_id" class="form-control"  >
			<option value="" selected="" disabled="">Select Division</option>
			@foreach($division as $div)
			<option value="{{ $div->id }}">{{ $div->division_name }}</option>	
			@endforeach
		</select>
		@error('division_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>



<div class="form-group">
	<h5>{{ trans("admin.District Select")   }} <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="district_id" class="form-control"  >
			<option value="" selected="" disabled="">Select District</option>
			@foreach($district as $dis)
			<option value="{{ $dis->id }}">{{ $dis->district_name }}</option>	
			@endforeach
		</select>
		@error('district_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>



	 <div class="form-group">
		<h5>{{ trans("admin.State Name")   }}  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="state_name" class="form-control" > 
	 @error('state_name	') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>
 
					 

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">					 
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