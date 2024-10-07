@section('title',"Add Delivery Info")
@extends('layout.app')
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body border-bottom">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-2 mb-md-0 text-uppercase fw-medium">New Delivery</h6>
                        </div>
                    </div>
                    <div class="card-body" id="addDelivery">
                        <form id="addRoleForm" class="row g-3" onsubmit="return false">
                            @csrf
                            <input type="hidden" name="id" id="id"/>
                            <div class="row g-2">
                                <div class="col mb-1">
                                    <label class="form-label" for="store_id">Store <b class="text-danger">*</b></label>
                                    <select class="form-select" name="store_id" id="store_id">
                                        <option  value="">Select Store</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col mb-1">
                                    <label class="form-label" for="prod_type_id">Product Type <b class="text-danger">*</b></label>
                                    <select class="form-select" name="prod_type_id" id="prod_type_id">
                                        <option  value="">Select Product Type</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <h5>Recipient Details</h5>
                            <div class="row g-1">
                                <div class="col mb-1">
                                    <label class="form-label" for="recipient_name">Recipient Name <b class="text-danger">*</b></label>
                                    <input type="text" id="recipient_name" name="recipient_name" class="form-control" placeholder="Enter Recipient Name" tabindex="-1"/>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="row g-1">
                                <div class="col mb-1">
                                    <label class="form-label" for="recipient_address">Recipient Address <b class="text-danger">*</b></label>
                                    <input type="text" id="recipient_address" name="recipient_address" class="form-control" placeholder="Enter Recipient Address" />
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-1">
                                    <label class="form-label" for="recipient_phone">Recipient's Phone <b class="text-danger">*</b></label>
                                    <input type="text" id="recipient_phone" name="recipient_phone" class="form-control" placeholder="Enter Recipient Phone" />
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col md-1">
                                    <label class="form-label" for="recipient_sec_phone">Recipient's Secondary Phone </label>
                                    <input type="text" id="recipient_sec_phone" name="recipient_sec_phone" class="form-control" placeholder="Enter Secondary Phone" />
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <h5>Delivery Details</h5>

                            <div class="row g-1">
                                <div class="col mb-1">
                                    <label class="form-label" for="item_description">Item Description <b class="text-danger">*</b></label>
                                    <input type="text" id="item_description" name="item_description" class="form-control" placeholder="Enter Item Description" />
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-1">
                                    <label class="form-label" for="delivery_type">Delivery Type <b class="text-danger">*</b></label>
                                    <select class="form-select" name="delivery_type" id="delivery_type">
                                        <option  value="">Select Delivery Type</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col mb-1">
                                    <label class="form-label" for="amount_to_collect">Amount to Collect <b class="text-danger">*</b></label>
                                    <input type="number" id="amount_to_collect" name="amount_to_collect" class="form-control" placeholder="Enter the amount including delivery charge" />
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col mb-1">
                                    <label class="form-label" for="price">Price <b class="text-danger">*</b></label>
                                    <input type="number" id="price" name="price" class="form-control" placeholder="Enter Total price" />
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col mb-1">
                                    <label class="form-label" for="total_weight">Total Weight <b class="text-danger">*</b></label>
                                    <input type="number" id="total_weight" name="total_weight" class="form-control" placeholder="Enter Total Weight" />
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col mb-1">
                                    <label class="form-label" for="quantity">Total Quantity <b class="text-danger">*</b></label>
                                    <div class="input-group">
                                        <button type="button" class="btn btn-outline-secondary" id="decrementBtn">-</button>
                                        <input type="number" id="quantity" name="quantity" class="form-control" value="0" readonly />
                                        <button type="button" class="btn btn-outline-secondary" id="incrementBtn">+</button>
                                    </div>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <h5 class="modal-title d-flex">Delivery Area</h5>

                            <div class="row g-3">

                                <div class="col mb-1">
                                    <label class="form-label">Division <b class="text-danger">*</b></label>
                                    <select class="form-select" name="div_id" id="div_id">
                                        <option  value="">Select Division</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col mb-1">
                                    <label class="form-label">Division <b class="text-danger">*</b></label>
                                    <select class="form-select" name="dis_id" id="dis_id">
                                        <option  value="">Select Division</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col mb-1">
                                    <label class="form-label" for="thn_id">Thana <b class="text-danger">*</b></label>
                                    <select class="form-select" name="thn_id" id="thn_id">
                                        <option  value="">Select Thana</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col mb-1">
                                    <label class="form-label">Area <b class="text-danger">*</b></label>
                                    <select class="form-select" name="out_id" id="out_id">
                                        <option  value="">Select Area</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="row g-1">
                                <div class="col mb-1">
                                    <label class="form-label" for="special_remark">Special Remark</label>
                                    <input type="text" id="special_remark" name="special_remark" class="form-control" placeholder="Enter Special Remark" />
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="row g-1">
                                <div class="col mb-1">
                                    <button type="button" onclick="addData()" class="btn btn-success" style="width: 150px"> Save</button>
                                    <button type="reset" class="btn btn-outline-success" style="width: 150px"> Cancle</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body border-bottom">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-2 mb-md-0 text-uppercase fw-medium">Cost Of Delivery</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Delivery Fee</td>
                                <td>৳ 60</td>
                            </tr>
                            <tr>
                                <td>COD Fee</td>
                                <td>৳ 0</td>
                            </tr>
                            <tr>
                                <td>Discount</td>
                                <td>৳ 0</td>
                            </tr>
                            <tr>
                                <td>Promo Discount</td>
                                <td>৳ 0</td>
                            </tr>
                            <tr>
                                <td>Additional Charge</td>
                                <td>৳ 0</td>
                            </tr>
                            <tr>
                                <td>Compensation Cost</td>
                                <td>৳ 0</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td>Total Cost</td>
                                <td>৳ 60</td>
                            </tr>
                            </tfoot>
                        </table>
                        <br>
                        <p>
                            Cost might vary depending upon the delivery situations and other circumstances.
                        </p>
                        <p>
                            For details: <a href="{{url('pricing.plan')}}">Check the Pricing Plan</a>
                        </p>
                        <p>
                            ** Pickup Last Entry Time 4 pm
                        </p>
                        <p>
                            ** On Demand / Express / Fragile Last Entry Time 12:30 pm, Maximum size of any product should not be over 2CFT (In general)
                        </p>
                        <p>
                            ** Use Fragile Type for Cosmetics, Liquid grocery, Herbals, Gift Items,Electronic gadgets, Lights , Glass items, Food items (dry)
                        </p>
                        <p>
                            ** Inside Dhaka Normal Delivery will take 24-48 hours, On Demand & Fragile take 8 hours, Out Side Dhaka it may take 3-5 days
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <script>
        document.body.classList.add('sidebar-icon-only');

        const totalWeightInput = document.getElementById('quantity');
        const decrementBtn = document.getElementById('decrementBtn');
        const incrementBtn = document.getElementById('incrementBtn');

        let quantity = 0;

        decrementBtn.addEventListener('click', () => {
            if (quantity > 0) {
                quantity--;
                totalWeightInput.value = quantity;
            }
        });

        incrementBtn.addEventListener('click', () => {
            quantity++;
            totalWeightInput.value = quantity;
        });



        function addData() {
            url = "{{ url('deliverys') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: new FormData($("#addDelivery form")[0]),
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.statusCode == 200) {
                        Swal.fire({
                            title: "Success!",
                            text: data.statusMsg,
                            icon: "success"
                        });
                        $("#addDelivery form")[0].reset();
                        $("#addDelivery").modal("hide");
                    }else if (data.statusCode == 204) {
                        showErrors(data.errors);
                    }else{
                        Swal.fire({
                            icon: "error",
                            text: data.statusMsg,
                        });

                    }
                }, error: function (data) {
                    Swal.fire({
                        text: "Internal Server Error",
                        icon: "question"
                    });
                }
            });
            return false;
        };


        $.ajax({
            url: "{{ url('getStore') }}",
            method: 'GET',
            success: function(data) {
                if (Array.isArray(data) && data.length > 0) {
                    var $select = $('#store_id');
                    $select.empty();
                    $select.append('<option value="">Select a Store</option>');
                    $.each(data, function(index, item) {
                        $select.append($('<option>', {
                            value: item.id,
                            text: item.store_name
                        }));
                    });
                }
            },
            error: function(xhr) {
                Swal.fire({
                    icon: "error",
                    text: 'An error occurred:', xhr,
                });
            }
        });

        $.ajax({
            url: "{{ url('getProType') }}",
            method: 'GET',
            success: function(data) {
                if (Array.isArray(data) && data.length > 0) {
                    var $select = $('#prod_type_id');
                    $select.empty();
                    $select.append('<option value="">Select a Product Type</option>');
                    $.each(data, function(index, item) {
                        $select.append($('<option>', {
                            value: item.id,
                            text: item.name
                        }));
                    });
                }
            },
            error: function(xhr) {
                Swal.fire({
                    icon: "error",
                    text: 'An error occurred:', xhr,
                });
            }
        });

        $.ajax({
            url: "{{ url('getDeliveryType') }}",
            method: 'GET',
            success: function(data) {
                if (Array.isArray(data) && data.length > 0) {
                    var $select = $('#delivery_type');
                    $select.empty();
                    $select.append('<option value="">Select a Delivery Type</option>');
                    $.each(data, function(index, item) {
                        $select.append($('<option>', {
                            value: item.id,
                            text: item.name
                        }));
                    });
                }
            },
            error: function(xhr) {
                Swal.fire({
                    icon: "error",
                    text: 'An error occurred:', xhr,
                });
            }
        });

        $.ajax({
            url: "{{ url('GetDivisionInfo') }}",
            method: 'GET',
            success: function(data) {
                if (Array.isArray(data) && data.length > 0) {
                    var $select = $('#div_id');
                    $select.empty();
                    $select.append('<option value="">Select a Division</option>');
                    $.each(data, function(index, item) {
                        $select.append($('<option>', {
                            value: item.id,
                            text: item.name
                        }));
                    });
                }
            },
            error: function(xhr) {
                Swal.fire({
                    icon: "error",
                    text: 'An error occurred:', xhr,
                });
            }
        });

        $('#div_id').change(function() {
            var divisionId = $(this).val();
            if (divisionId) {
                getDistrict(divisionId)
            } else {
                $('#dis_id').empty().append('<option value="">Select a District</option>');
            }
        });

        function  getDistrict(divId, selecteddivId = null){
            $.ajax({
                url: "{{ url('GetDistrict') }}",
                method: 'GET',
                data: { divId: divId },
                success: function(data) {
                    var $select = $('#dis_id');
                    if (Array.isArray(data) && data.length > 0) {
                        $select.empty();
                        $select.append('<option value="">Select a District</option>');
                        $.each(data, function(index, item) {
                            $select.append($('<option>', {
                                value: item.id,
                                text: item.name,
                                selected: item.id == selecteddivId
                            }));
                        });
                    }else {
                        $select.empty();
                        $select.append('<option value="">Select a District</option>');
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: "error",
                        text: 'An error occurred:', xhr,
                    });
                }
            });
        }

        $('#dis_id').change(function() {
            var districtId = $(this).val();
            var divId = $('#div_id').val();
            if (districtId) {
                getThana(divId,districtId)
            } else {
                $('#dis_id').empty().append('<option value="">Select a Thana</option>');
            }
        });

        function  getThana(divId, dis_id, selectedTha = null){
            $.ajax({
                url: "{{ url('GetThana') }}",
                method: 'GET',
                data: { divId: divId,dis_id:dis_id },
                success: function(data) {
                    var $select = $('#thn_id');
                    if (Array.isArray(data) && data.length > 0) {
                        $select.empty();
                        $select.append('<option value="">Select a Thana</option>');
                        $.each(data, function(index, item) {
                            $select.append($('<option>', {
                                value: item.id,
                                text: item.name,
                                selected: item.id == selectedTha
                            }));
                        });
                    }else {
                        $select.empty();
                        $select.append('<option value="">Select a Thana</option>');
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: "error",
                        text: 'An error occurred:', xhr,
                    });
                }
            });
        }

        $('#thn_id').change(function() {
            var thaId = $(this).val();
            var divId = $('#div_id').val();
            var disId = $('#dis_id').val();
            if (thaId) {
                getArea(divId,disId,thaId)
            } else {
                $('#out_id').empty().append('<option value="">Select a Area</option>');
            }
        });

        function  getArea(divId, dis_id, thaId, selectedAra = null){
            $.ajax({
                url: "{{ url('GetArea') }}",
                method: 'GET',
                data: { divId: divId,dis_id:dis_id ,thaId:thaId },
                success: function(data) {
                    var $select = $('#out_id');
                    if (Array.isArray(data) && data.length > 0) {
                        $select.empty();
                        $select.append('<option value="">Select a Area</option>');
                        $.each(data, function(index, item) {
                            $select.append($('<option>', {
                                value: item.id,
                                text: item.name,
                                selected: item.id == selectedAra
                            }));
                        });
                    }else {
                        $select.empty();
                        $select.append('<option value="">Select a Area</option>');
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: "error",
                        text: 'An error occurred:', xhr,
                    });
                }
            });
        }
    </script>
@endsection
