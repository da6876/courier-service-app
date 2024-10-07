@section('title',"Delivery Info")
@extends('layout.app')
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                                            <div>
                                                <p class="mb-2 text-md-center text-lg-left">Total Collected</p>
                                                <h1 class="mb-0" id="totalCollected">৳ 0</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                                            <div>
                                                <p class="mb-2 text-md-center text-lg-left">Total Receivable</p>
                                                <h1 class="mb-0" id="totalReceivable">৳ 0</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                                            <div>
                                                <p class="mb-2 text-md-center text-lg-left">Total Received</p>
                                                <h1 class="mb-0" id="totalReceived">৳ 0</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                                            <div>
                                                <p class="mb-2 text-md-center text-lg-left">Total Fee</p>
                                                <h1 class="mb-0" id="totalFee">৳ 0</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-bottom">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-2 mb-md-0 text-uppercase fw-medium">Recent Deliveries (Last 90 Days)</h6>
                            <a class="btn btn-success btn-sm " href="{{url('deliverys.create')}}"><i
                                    class="typcn typcn-plus"></i> New Delivery
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive pt-3">
                            <div>
                                <form id="filterForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Search</label>
                                                <input type="text" id="name" name="name" class="form-control form-control-sm" placeholder="Search BY Name" aria-label="name">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <table id="usersTable" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Status</th>
                                    <th>Status</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- Data will be populated by DataTables -->
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
        function countTo(selector, startValue, endValue, duration) {
            let startTime = null;

            const animate = (currentTime) => {
                if (!startTime) startTime = currentTime;
                const elapsed = currentTime - startTime;

                // Calculate the current value
                const progress = Math.min(elapsed / duration, 1); // Ensure it doesn't exceed 1
                const currentValue = Math.floor(startValue + (endValue - startValue) * progress);

                $(selector).text(`৳ ${currentValue}`);

                if (progress < 1) {
                    requestAnimationFrame(animate); // Continue the animation
                }
            };

            requestAnimationFrame(animate); // Start the animation
        }

        $(document).ready(function () {
            var table = $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('deliverys.data') }}',
                    type: 'POST',
                    data: function (d) {
                        d._token = $('input[name="_token"]').val();
                        d.name = $('input[name="name"]').val();
                    },
                    // Fetch totals along with DataTable data
                    complete: function (data) {
                        // Assuming the totals are included in the response data
                        const totals = data.responseJSON.totals;
                        if (totals) {
                            countTo('#totalCollected', parseFloat($('#totalCollected').text().replace(/[৳ ,]/g, '')), totals.total_collected, 1000);
                            countTo('#totalReceivable', parseFloat($('#totalReceivable').text().replace(/[৳ ,]/g, '')), totals.total_receivable, 1000);
                            countTo('#totalReceived', parseFloat($('#totalReceived').text().replace(/[৳ ,]/g, '')), totals.total_received, 1000);
                            countTo('#totalFee', parseFloat($('#totalFee').text().replace(/[৳ ,]/g, '')), totals.total_fee, 1000);
                        }
                    }
                },
                columns: [
                    {data: 'tracking_number', title: 'Tracking Number'},
                    {data: 'recipient_name', title: 'Recipient Name'},
                    {data: 'recipient_phone', title: 'Recipient Phone'},
                    {data: 'recipient_address', title: 'Recipient Address'},
                    {data: 'price', title: 'Price'},
                    {data: 'status', title: 'Status'},
                    {
                        data: null,
                        render: function (data, type, row) {
                            return `
                        <button type="button" class="btn btn-outline-success btn-sm btn-icon-text edit-btn" data-id="${row.uid}"><i class="typcn typcn-edit btn-icon-append"></i></button>
                        <button type="button" class="btn btn-outline-danger btn-sm btn-icon-text delete-btn" data-id="${row.uid}"><i class="typcn typcn-delete-outline btn-icon-append"></i></button>
                    `;
                        },
                        orderable: false,
                        searchable: false
                    }
                ],
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                pageLength: 10
            });

            $('#usersTable tbody').on('click', '.edit-btn', function () {
                var id = $(this).data('id');
                showData(id);
            });

            // Handle Delete button click
            $('#usersTable tbody').on('click', '.delete-btn', function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        var csrf_token = $('meta[name="csrf-token"]').attr('content');

                        $.ajax({
                            url: "{{ url('deliverys') }}" + '/' + id,
                            type: "POST",
                            data: {'_method': 'DELETE', '_token': csrf_token},
                            success: function(response) {
                                if (response.statusCode == 200) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
                                        icon: "success"
                                    });
                                } else {
                                    Swal.fire("Error occurred !!");
                                }
                                $('#usersTable').DataTable().ajax.reload();
                            },
                            error: function(xhr) {
                                alert('Delete failed: ' + xhr.responseText);
                            }
                        });
                    }
                });

                $('#name').on('change keyup', function () {
                    table.draw();
                });
            });
        });

        function addData() {
            url = "{{ url('deliverys') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: new FormData($("#addModal form")[0]),
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.statusCode == 200) {
                        Swal.fire({
                            title: "Success!",
                            text: data.statusMsg,
                            icon: "success"
                        });
                        $("#addModal form")[0].reset();
                        $("#addModal").modal("hide");
                        $('#usersTable').DataTable().ajax.reload();
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

        function showData(id) {
            $("#addModal form")[0].reset();
            $("#addModal input[type='hidden']").not("[name='_token']").each(function() {
                $(this).val('');
            });
            $("#addModal").modal("show");
            $("#pass").hide();

            $.ajax({
                url: "{{ url('deliverys') }}" + '/' + id,
                type: "GET",
                dataType: "JSON",
                success: function (data) {
                    $('#addModal form')[0].reset();
                    $('.modal-title').text('Update Data');
                    $('#addModal').modal('show');
                    $('#id').val(data.uid);
                    $('#i_name').val(data.name);
                    $('#status').val(data.status);
                    getDistrict(data.div_id, data.dis_id);
                    getThana(data.div_id, data.dis_id, data.tha_id);
                    getThana(data.div_id, data.dis_id, data.tha_id);
                    getArea(data.div_id, data.dis_id, data.tha_id, data.ara_id);
                }, error: function () {
                    swal({
                        title: "Oops",
                        text: "Error Occured",
                        icon: "error",
                        timer: '1500'
                    });
                }
            });
            return false;
        };

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
                    var $select = $('#tha_id');
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

        $('#tha_id').change(function() {
            var thaId = $(this).val();
            var divId = $('#div_id').val();
            var disId = $('#dis_id').val();
            if (thaId) {
                getArea(divId,disId,thaId)
            } else {
                $('#ara_id').empty().append('<option value="">Select a Area</option>');
            }
        });

        function  getArea(divId, dis_id, thaId, selectedAra = null){
            $.ajax({
                url: "{{ url('GetArea') }}",
                method: 'GET',
                data: { divId: divId,dis_id:dis_id ,thaId:thaId },
                success: function(data) {
                    var $select = $('#ara_id');
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
