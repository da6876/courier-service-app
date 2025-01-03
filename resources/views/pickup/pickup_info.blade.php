@section('title',"Pickup Info")
@extends('layout.app')
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                                            <div>
                                                <p class="mb-2 text-md-center text-lg-left">Total Request</p>
                                                <h1 class="mb-0" id="totalCollected"> 0</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                                            <div>
                                                <p class="mb-2 text-md-center text-lg-left">Pending Request</p>
                                                <h1 class="mb-0" id="totalReceivable"> 0</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                                            <div>
                                                <p class="mb-2 text-md-center text-lg-left">Total Received</p>
                                                <h1 class="mb-0" id="totalReceived"> 0</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body border-bottom">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-2 mb-md-0 text-uppercase fw-medium">Recent Pickup Info</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive pt-3">
                            <div>
                                <form id="filterForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Search</label>
                                                <input type="text" id="name" name="name" class="form-control form-control-sm" placeholder="Search BY Name" aria-label="name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Search By Status</label>
                                                <select  class="form-select" id="DeliveryStatus" name="DeliveryStatus">
                                                    <option>Select Delivery Status</option>
                                                </select>
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
                    url: '{{ route('pickupinfo.data') }}',
                    type: 'POST',
                    data: function (d) {
                        d._token = $('input[name="_token"]').val();
                        d.name = $('input[name="name"]').val();
                        d.deliveryStatus = $('#deliveryStatus').val();;
                    },
                    // Fetch totals along with DataTable data
                    complete: function (data) {
                        // Assuming the totals are included in the response data
                        const totals = data.responseJSON.totals;
                        if (totals) {
                            countTo('#totalCollected', parseFloat($('#totalCollected').text().replace(/[৳ ,]/g, '')), totals.total_count, 1000);
                            countTo('#totalReceivable', parseFloat($('#totalReceivable').text().replace(/[৳ ,]/g, '')), totals.pending_count, 1000);
                            countTo('#totalReceived', parseFloat($('#totalReceived').text().replace(/[৳ ,]/g, '')), totals.received_count, 1000);
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
            $('#name').on('change keyup', function () {
                table.draw(); // Reload DataTable with new filters
            });
            $('#deliveryStatus').on('change', function () {
                table.draw();
            });
        });



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
            url: "{{ url('getDeliveryStatus') }}",
            method: 'GET',
            success: function(data) {
                if (Array.isArray(data) && data.length > 0) {
                    var $select = $('#DeliveryStatus');
                    $select.empty();
                    $select.append('<option value="">Select a Delivery Status</option>');
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
    </script>
@endsection
