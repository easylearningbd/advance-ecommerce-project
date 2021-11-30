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
				  <h3 class="box-title">{{ trans("admin.Slider List")   }}</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>

								<th>{{ trans("admin.Slider Image")   }}</th>
								<th>{{ trans("admin.Title")   }}</th>
								<th>{{ trans("admin.Decription")   }}</th>
                                <th>{{ trans("admin.Model ID")   }}</th>
                                <th>{{ trans("admin.Model Name")   }}</th>
                                <th>{{ trans("admin.Action Type")   }}</th>
                                <th>{{ trans("admin.Action")   }}</th>
								<th>{{ trans("admin.Status")   }}</th>
								<th>{{ trans("admin.Group")   }}</th>
								<th>{{ trans("admin.Action")   }}</th>

							</tr>
						</thead>
						<tbody>
	 @foreach($sliders as $item)
	 <tr>

 <td><img src="{{ asset($item->slider_img) }}" style="width: 70px; height: 40px;"> </td>
		<td>
            @if($item->title == NULL)
		 	<span class="badge badge-pill badge-danger"> No Title </span>
		 	@else
             {{ $item->title }}
		 	@endif
			</td>

         <td>{{ $item->description }}</td>
         <td>{{ $item->model_id }}</td>
         <td>{{ $item->model_name }}</td>
         <td>{{ $item->action_type }}</td>
         <td>{{ $item->action }}</td>
		<td>
		 	@if($item->status == 1)
		 	<span class="badge badge-pill badge-success"> Active </span>
		 	@else
           <span class="badge badge-pill badge-danger"> InActive </span>
		 	@endif

		 </td>

         <td>{{ $item->group_id }}</td>

		<td width="30%">
 <a href="{{ route('slider.edit',$item->id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil"></i> </a>

 <a href="{{ route('slider.delete',$item->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete">
 	<i class="fa fa-trash"></i></a>

@if($item->status == 1)
 <a href="{{ route('slider.inactive',$item->id) }}" class="btn btn-danger btn-sm" title="Inactive Now"><i class="fa fa-arrow-down"></i> </a>
	 @else
 <a href="{{ route('slider.active',$item->id) }}" class="btn btn-success btn-sm" title="Active Now"><i class="fa fa-arrow-up"></i> </a>
	 @endif

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


<!--   ------------ Add Slider Page -------- -->


          <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">{{ trans("admin.Add Slider")   }} </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
	 	@csrf

	 <div class="form-group">
		<h5>{{ trans("admin.Slider Title")   }}  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="title" class="form-control" >

	</div>
	</div>



	<div class="form-group">
		<h5>{{ trans("admin.Slider Decription")   }} <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="description" class="form-control" >

	  </div>
	</div>


     <div class="form-group">
         <h5>Slider Group ID  <span class="text-danger"></span></h5>
         <div class="controls">
             <input type="text"  name="group_id" class="form-control" >
         </div>
     </div>
     <div class="form-group">
         <h5>Slider Link Model ID <span class="text-danger"></span></h5>
         <div class="controls">
             <input type="text"  name="model_id" class="form-control" >
         </div>
     </div>
     <div class="form-group">
         <h5>Slider Link Model Name  <span class="text-danger"></span></h5>
         <div class="controls">
             <input type="text"  name="model_name" class="form-control" >
         </div>
     </div>

     <div class="form-group">
         <h5>Slider Action Type <span class="text-danger"></span></h5>
         <div class="controls">
             <input type="text"  name="action_type" class="form-control" >
         </div>
     </div>
     <div class="form-group">
         <h5>Slider Action  <span class="text-danger"></span></h5>
         <div class="controls">
             <input type="text"  name="action" class="form-control" >
         </div>
     </div>


	<div class="form-group">
		<h5>{{ trans("admin.Slider Image")   }} <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="file" name="slider_img" class="form-control" >
     @error('slider_img')
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
