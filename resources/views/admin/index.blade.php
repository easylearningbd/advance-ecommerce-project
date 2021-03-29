@extends('admin.admin_master')
@section('admin')

@php
	$date = date('d-m-y');
	$today = App\Models\Order::where('order_date',$date)->sum('amount');

	$month = date('F');
	$month = App\Models\Order::where('order_month',$month)->sum('amount');

    $year = date('Y');
	$year = App\Models\Order::where('order_year',$year)->sum('amount');

    $pending = App\Models\Order::where('status','pending')->get();

@endphp
<div class="container-full">

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">							
		<div class="icon bg-primary-light rounded w-60 h-60">
			<i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
		</div>
		<div>
			<p class="text-mute mt-20 mb-0 font-size-16">Today's Sale</p>
			<h3 class="text-white mb-0 font-weight-500">${{ $today  }} <small class="text-success"><i class="fa fa-caret-up"></i> Usd</small></h3>
		</div>
	</div>
</div>
</div>
<div class="col-xl-3 col-6">
<div class="box overflow-hidden pull-up">
	<div class="box-body">							
		<div class="icon bg-warning-light rounded w-60 h-60">
			<i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
		</div>
		<div>
			<p class="text-mute mt-20 mb-0 font-size-16">Monthly Sale </p>
			<h3 class="text-white mb-0 font-weight-500">${{ $month }} <small class="text-success"><i class="fa fa-caret-up"></i> Usd</small></h3>
		</div>
	</div>
</div>
</div>
<div class="col-xl-3 col-6">
<div class="box overflow-hidden pull-up">
	<div class="box-body">							
		<div class="icon bg-info-light rounded w-60 h-60">
			<i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
		</div>
		<div>
			<p class="text-mute mt-20 mb-0 font-size-16">Yearly Sale </p>
			<h3 class="text-white mb-0 font-weight-500">${{ $year }} <small class="text-danger"><i class="fa fa-caret-down"></i> Usd</small></h3>
		</div>
	</div>
</div>
</div>
<div class="col-xl-3 col-6">
<div class="box overflow-hidden pull-up">
	<div class="box-body">							
		<div class="icon bg-danger-light rounded w-60 h-60">
			<i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
		</div>
		<div>
			<p class="text-mute mt-20 mb-0 font-size-16">Pending Orders </p>
			<h3 class="text-white mb-0 font-weight-500">{{ count($pending) }} <small class="text-danger"><i class="fa fa-caret-up"></i> Order </small></h3>
		</div>
	</div>
</div>
</div>
 
 
<div class="col-12">
<div class="box">
	<div class="box-header">
		<h4 class="box-title align-items-start flex-column">
		 Recent All Orders 
			 
		</h4>
	</div>

	@php
$orders = App\Models\Order::where('status','pending')->orderBy('id','DESC')->get();

	@endphp

	<div class="box-body">
		<div class="table-responsive">
			<table class="table no-border">
				<thead>

<tr class="text-uppercase bg-lightest">
	<th style="min-width: 250px"><span class="text-white">Date</span></th>
	<th style="min-width: 100px"><span class="text-fade">Invoice</span></th>
	<th style="min-width: 100px"><span class="text-fade">Amount</span></th>
	<th style="min-width: 150px"><span class="text-fade">Payment</span></th>
	<th style="min-width: 130px"><span class="text-fade">Status</span></th>
	<th style="min-width: 120px"><span class="text-fade">Process</span> </th>
</tr>
				</thead>
				<tbody>
		
    @foreach($orders as $item)
		<tr>										
			<td class="pl-0 py-8">
				 <span class="text-white font-weight-600 d-block font-size-16">
					{{ Carbon\Carbon::parse($item->order_date)->diffForHumans()  }}
				</span>
			</td>

			<td>
				 
				<span class="text-white font-weight-600 d-block font-size-16">
					{{ $item->invoice_no }}
				</span>
			</td>

			<td>
				<span class="text-fade font-weight-600 d-block font-size-16">
					$ {{ $item->amount }}
				</span>
				 
			</td>

			<td>
				 
				<span class="text-white font-weight-600 d-block font-size-16">
					{{ $item->payment_method }}
				</span>
			</td>
			<td>
				<span class="badge badge-primary-light badge-lg">{{ $item->status }}</span>
			</td>

			<td class="text-right">
				<a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-bookmark-plus"></span></a>
				<a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-arrow-right"></span></a>
			</td>
		</tr>
		@endforeach



					 
				</tbody>
			</table>
		</div>
	</div>
					</div>  
				</div>
			</div>
		</section>
		<!-- /.content -->
	  </div>

@endsection