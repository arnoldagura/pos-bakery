@extends('admin_dashboard')
@section('admin')


 <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Customer Invoice</a></li>
                                           
                                            
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Customer Invoice</h4>
                                </div>
                            </div>
                        </div>     

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- Logo & title -->
                                        <div class="clearfix">
                                            <div class="float-start">
                                                <div class="auth-logo">
                                                    <div class="logo logo-dark">
                                                        <span class="logo-lg">
                                                            <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="" height="22">
                                                        </span>
                                                    </div>

                                                    <div class="logo logo-light">
                                                        <span class="logo-lg">
                                                            <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="" height="22">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="float-end">
                                                <h4 class="m-0 d-print-none">Invoice</h4>
                                            </div>
                                        </div>
                                            
                                                <div class="row">
                                                    <div class="col-md-6">
                                                    @isset($name)
                                                        <p><b>Hello, {{ $name }}</b></p>
                                                    @else
                                                        <p><b>Hello, Guest</b></p>
                                                    @endisset

                                                </div><!-- end col -->
                                                <div class="col-md-4 offset-md-2">
                                                    <div class="mt-3 float-end">
                                                        <p><strong>Order Date : </strong> <span class="float-end"> &nbsp;&nbsp;&nbsp;&nbsp; Jan 17, 2016</span></p>
                                                        <p><strong>Order Status : </strong> <span class="float-end"><span class="badge bg-danger">Unpaid</span></span></p>
                                                        <p><strong>Invoice No. : </strong> <span class="float-end">000028 </span></p>
                                                    </div>
                                                </div><!-- end col -->
                                            </div>
                                            <!-- end row -->

                                            <!-- end row -->

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                        <table class="table mt-4 table-centered">
                                            <thead>
                                            <tr><th>#</th>
                                                <th>Item</th>
                                                <th style="width: 10%">Qty</th>
                                                <th style="width: 10%">Unit Cost</th>
                                                <th style="width: 10%" class="text-end">Total</th>
                                            </tr></thead>
                                            <tbody>
                                            @php
                                            $sl = 1;
                                            @endphp

                                            @foreach($contents as $key=> $item)
                                            <tr>
                                                <td>{{ $sl++ }}</td>
                                                <td>
                                                    <b>{{ $item->name }}</b> <br/>
                                                    
                                                </td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td class="text-end">${{ $item->price*$item->qty }}</td>
                                            </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                                    </div> <!-- end table-responsive -->
                                                </div> <!-- end col -->
                                            </div>
                                            <!-- end row -->

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="clearfix pt-5">
                                                        <h6 class="text-muted">Notes:</h6>

                                                        
                                                    </div>
                                                </div> <!-- end col -->
                                                <div class="col-sm-6">
                                                    <div class="float-end">
                                    <p><b>Sub-total:</b> <span class="float-end">${{ Cart::subtotal() }}</span></p>
                                    <p><b>Vat (21%):</b> <span class="float-end"> &nbsp;&nbsp;&nbsp; ${{ Cart::tax() }}</span></p>
                                    <h3>${{ Cart::total() }} USD</h3>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div> <!-- end col -->
                                            </div>
                                            <!-- end row -->

                                            <div class="mt-4 mb-1">
                                                <div class="text-end d-print-none">
                                                    <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer me-1"></i> Print</a>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#invoice-modal">Create Invoice </button> 
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div> 
                            </div>
                        
                        </div> 

                </div> 



<div id="invoice-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body"> 
                <div class="text-center mt-2 mb-4 ">
                    <div class="auth-logo">
                        <h3>Invoice Of {{ isset($name) ? $name : 'Guest' }}</h3>
                        <h3>Total Amount  ${{ Cart::total() }}</h3>
                    </div>
            </div>
            <form class="px-3" method="post" action="{{ url('/final-invoice') }}">
                @csrf
                <div class="mb-3">
                    <label for="select-payment" class="form-label">Payment</label>
                    <select name="payment_method" class="form-select" id="example-select">
                        <option selected disabled >Select Payment </option>
                        <option value="Cash">Cash</option>
                        <option value="Online">Online</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pay" class="form-label">Pay Now</label>
                    <input class="form-control" type="text" name="payment_received" id="payment_received" placeholder="Pay Now" oninput="updateChange()">
                </div>
                <div class="mb-3">
                    <label for="change" class="form-label">Change</label>
                    <input class="form-control" type="text" name="change_given" id="change_given" placeholder="Change" readonly>
                </div>
                <input type="hidden" name="customer_name" value="{{ $name }}">
                <input type="hidden" name="order_date" value="{{ date('d-F-Y') }}">
                <input type="hidden" name="order_status" value="pending">
                <input type="hidden" name="total_products" value="{{ Cart::count() }}">
                <input type="hidden" name="sub_total" value="{{ Cart::subtotal() }}">
                <input type="hidden" name="vat" value="{{ Cart::tax() }}">
                <input type="hidden" name="total" value="{{ Cart::total() }}"> 

                <div class="mb-3 text-center">
                    <button class="btn btn-primary" type="submit">Complete Order </button>
                </div>
            </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
         
<script>
function updateChange() {
    const paymentReceived = parseFloat(document.getElementById('payment_received').value) || 0;
    const total = parseFloat('{{ Cart::total() }}');
    const changeGiven = paymentReceived - total;

    document.getElementById('change_given').value = changeGiven >= 0 ? changeGiven.toFixed(2) : '';
}
</script>




@endsection