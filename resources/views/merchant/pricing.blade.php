@section('title',"Pricing Plan Info")
@extends('layout.app')
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body border-bottom">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-2 mb-md-0 text-uppercase fw-medium">Pricing Plan Info</h6>


                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive pt-3">

                            <table id="usersTable" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Parcel Type</th>
                                    <th>Pickup Location</th>
                                    <th>Delivery Location</th>
                                    <th>Weight</th>
                                    <th>Delivery Time</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Parcel</td>
                                    <td>Inside Dhaka</td>
                                    <td>Inside Dhaka</td>
                                    <td>0-0.5 Kg</td>
                                    <td>Standard Delivery</td>
                                    <td>৳ 60.00</td>
                                </tr>
                                <tr>
                                    <td>Parcel</td>
                                    <td>Inside Dhaka</td>
                                    <td>Inside Dhaka</td>
                                    <td>0.5-1 Kg</td>
                                    <td>Standard Delivery</td>
                                    <td>৳ 60.00</td>
                                </tr>
                                <tr>
                                    <td>Parcel</td>
                                    <td>Inside Dhaka</td>
                                    <td>Inside Dhaka</td>
                                    <td>1-2 Kg</td>
                                    <td>Standard Delivery</td>
                                    <td>৳ 60.00</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <script>

    </script>
@endsection
