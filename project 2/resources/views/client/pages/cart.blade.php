@extends('client.layouts.master')

@section('title')
    Gio hang
@endsection

@section('content')
    <div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="">Home</a>
						<i>|</i>
					</li>
					<li>Gio hang</li>
				</ul>
			</div>
		</div>
	</div>
    <div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>G</span>io hang cua ban
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				
				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>STT</th>
								<th>Hinh anh</th>
								<th>So luong</th>
								<th>Ten san pham</th>
								<th>Gia</th>
								<th>Chinh sua</th>
							</tr>
						</thead>
						<tbody>
                            <?php $i = 1 ?>
                            @foreach($cart as $key => $value)
							<tr class="rem1">
								<td class="invert">{{ $i }}</td>
								<td class="invert-image">
									<a href="single.html">
										<img src="img/upload/product/{{$value->options->img}}" alt="{{$value->name}} " class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<div class="quantity">
                                        <div class="form-group">
                                            <input type="number" name="qty" min='1' class="form-control qty" value="{{ $value->qty }}" data-id="{{ $value->rowId }}">
                                        </div>
									</div>
								</td>
								<td class="invert">{{ $value->name}}</td>
								<td class="invert">{{ number_format($value->price) }} VND</td>
								<td class="invert">
									<div class="rem">
										<div class="close1" data-id="{{ $value->rowId }}"> </div>
									</div>
								</td>
							</tr>
                            <?php $i++ ?>
							@endforeach
						</tbody>
					</table>
                    <h4 class="mb-sm-4 mb-3">Thanh toan : 
					<span>{{Cart::total()}} VND</span>
				</h4>
				</div>
			</div>
			<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3">Add a new Details</h4>
					<form action="payment.html" method="post" class="creditly-card-form agileinfo_form">
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls form-group">
										<input class="billing-address-name form-control" type="text" name="name" placeholder="Full Name" required="">
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Mobile Number" name="number" required="">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Landmark" name="landmark" required="">
											</div>
										</div>
									</div>
									<div class="controls form-group">
										<input type="text" class="form-control" placeholder="Town/City" name="city" required="">
									</div>
									<div class="controls form-group">
										<select class="option-w3ls">
											<option>Select Address type</option>
											<option>Office</option>
											<option>Home</option>
											<option>Commercial</option>

										</select>
									</div>
								</div>
								<button class="submit check_out btn">Delivery to this Address</button>
							</div>
						</div>
					</form>
					<div class="checkout-right-basket">
						<a href="payment.html">Make a Payment
							<span class="far fa-hand-point-right"></span>
						</a>
					</div>
				</div>
			</div>
		</div>
    </div>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="margin-left: 183px;">
                    <button type="button" class="btn btn-success delProduct">Có</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                </div>
            </div>
        </div>
    </div>
	<!-- //checkout page -->
@endsection