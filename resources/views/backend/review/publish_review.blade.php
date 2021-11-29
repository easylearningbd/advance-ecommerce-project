@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">{{ trans("admin.Publish All Reviews")   }}</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>{{ trans("admin.Summary")   }}  </th>
								<th>{{ trans("admin.Comment")   }} </th>
								<th>{{ trans("admin.User")   }} </th>
								<th>{{ trans("admin.Product")   }}  </th>
								<th>{{ trans("admin.Status")   }} </th>
								<th>{{ trans("admin.Action")   }}</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($review as $item)
	 <tr>
		<td> {{ $item->summary }}  </td>
		<td> {{ $item->comment }}  </td>
		<td>  {{ $item->user->name }}  </td>

		<td> {{ $item->product->product_name_en }}  </td>
		<td>
		@if($item->status == 0)
      <span class="badge badge-pill badge-primary">Pending </span>
       @elseif($item->status == 1)
       <span class="badge badge-pill badge-success">Publish </span>
		@endif

		  </td>

		<td width="25%">
  <a href="{{ route('delete.review',$item->id) }}" class="btn btn-danger" id="delete">Delete </a>
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

 

 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection