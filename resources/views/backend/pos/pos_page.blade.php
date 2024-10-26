@extends('admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

 <div class="content">
    @php
        $allcart = Cart::content();
    @endphp
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">POS</a></li>
                            
                        </ol>
                    </div>
                    <h4 class="page-title">POS</h4>
                </div>
            </div>
        </div>     
        <!-- end page title -->
        <div class="row">
        @foreach($product as $key=> $item)
    
        @php
            $cartItem = $allcart->firstWhere('id', $item->id);
        @endphp
        <div class="col-sm-4 col-xl-3">
            <div class="card text-center">
                <div class="card-body">
                    <div class="product-img relative">
                        <img src="{{ asset($item->product_image) }}" style="width:120px; height: 120px;">
                    </div>
                    <div class="mt-3 text-center">
                        <h5>{{ $item->name }} 
                            </h5>
                        <h5> <b>₱{{ $item->selling_price }}</b></h5>
                    </div>
                    <div class="flex items-center justify-between mt-3">
                        @if($cartItem) 
                        <form method="post" action="{{ url('/cart-update/'.$cartItem->rowId) }}" class="cart-update-form d-inline-block">
                            @csrf
                            <div style="width: 120px;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        @if($cartItem->qty == 1)
                                        <a href="{{ url('/cart-remove/'.$cartItem->rowId) }}" class="btn btn-primary decrement-btn"> - </a>
                                        @else
                                        <button type="button" class="btn btn-primary decrement-btn">-</button>
                                        @endif
                                    </div>
                                    <input name="qty" type="text" class="form-control quantity-input" value="{{ $cartItem->qty }}" readonly>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-primary increment-btn">+</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @else
                        
                        <form method="post" action="{{ url('/add-cart') }}" style="display: inline;">
                        @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <input type="hidden" name="name" value="{{ $item->name }}">
                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="price" value="{{ $item->selling_price }}">
                        <button type="submit" class="btn btn-blue rounded-pill waves-effect waves-light" > Buy </button> 
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
        
        <div class="row">
            <div class="col-lg-6 col-xl-6">
                <div class="card text-center">
                    <div class="card-body"> 
                        <div class="table-responsive">
                            <table class="table table-bordered border-primary mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>QTY</th>
                                        <th>Price</th>
                                        <th>SubTotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allcart as $cart)
                                    <tr>
                                        <td>{{ $cart->name }}</td>
                                        <td>
                                            <form method="post" action="{{ url('/cart-update/'.$cart->rowId) }}">
                                                @csrf

                                                <input type="number" name="qty" value="{{ $cart->qty }}" style="width:40px;" min="1">
                                            
                                                <button type="submit" class="btn btn-sm btn-success" style="margin-top:-2px ;"> <i class="fas fa-check"></i> </button>   

                                            </form> 
                                        </td>
                                        <td>{{ $cart->price }}</td>
                                        <td>{{ $cart->price*$cart->qty }}</td>
                                        <td> <a href="{{ url('/cart-remove/'.$cart->rowId) }}"><i class="fas fa-trash-alt" style="color:#ffffff"></i></a> </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="bg-primary">
                            <br>
                            <p style="font-size:18px; color:#fff"> Quantity : {{ Cart::count() }} </p>
                            <p style="font-size:18px; color:#fff"> SubTotal : {{ Cart::subtotal() }} </p>
                            <p style="font-size:18px; color:#fff"> Vat : {{ Cart::tax() }} </p>
                            <p><h2 class="text-white"> Total </h2> <h1 class="text-white"> {{ Cart::total() }}</h1>   </p>
                            <br>
                        </div>
        <br>
            <form id="myForm" method="post" action="{{ url('/create-invoice') }}">
                @csrf
             
                <div class="form-group mb-3">
                    <label for="firstname" class="form-label">Customer </label>
                    <input name="name" value="">
                </div>
                <button class="btn btn-blue waves-effect waves-light">Checkout</button>


            </form>
                    </div>                                 
                </div> <!-- end card -->
            </div> <!-- end col-->

            <!-- <div class="col-lg-6 col-xl-6">
                <div class="card">
                    <div class="card-body">
                    @foreach($product as $item)
                        <form method="post" action="{{ url('/add-cart') }}" style="display: inline;">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <input type="hidden" name="name" value="{{ $item->name }}">
                            <input type="hidden" name="qty" value="1">
                            <input type="hidden" name="price" value="{{ $item->selling_price }}">
                            
                            <button type="submit" style="font-size: 16px; margin: 10px;">
                                <img src="{{ asset($item->product_image) }}" style="width: 20px; height: 20px;"> 
                                Add {{ $item->name }}
                            </button>
                        </form>
                    @endforeach
                        <div class="tab-pane" id="settings">
                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Image</th>
                                        <th>Name</th> 
                                        <th> </th> 
                                    </tr>

                                </thead>
                                        
                        
                                <tbody>
                                    @foreach($product as $key=> $item)
                                    <tr>
                                        <form method="post" action="{{ url('/add-cart') }}">
                                            @csrf

                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <input type="hidden" name="name" value="{{ $item->name }}">
                                            <input type="hidden" name="qty" value="1">
                                            <input type="hidden" name="price" value="{{ $item->selling_price }}">

                                                    <td>{{ $key+1 }}</td>
                                                    <td> <img src="{{ asset($item->product_image) }}" style="width:50px; height: 40px;"> </td>
                                                    <td>{{ $item->name }}</td>
                                                    <td><button type="submit" style="font-size: 20px; color: #000;" > <i class="fas fa-plus-square"></i> </button> </td> 
                                            

                                        </form>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>                           
                    </div>
                </div> 
            </div> -->
        </div>
        <!-- end row-->

    </div> <!-- container -->

</div> <!-- content -->


 
<script type="text/javascript">
    document.querySelectorAll('.cart-update-form').forEach(form => {
        const quantityInput = form.querySelector('.quantity-input');

        form.querySelector('.increment-btn').addEventListener('click', function() {
            quantityInput.value = parseInt(quantityInput.value) + 1;
            form.submit(); // Submit the form to update the cart
        });
        
        form.querySelector('.decrement-btn').addEventListener('click', function() {
            if (parseInt(quantityInput.value) > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
                form.submit(); // Submit the form to update the cart
            }
        });
    });
</script>






@endsection