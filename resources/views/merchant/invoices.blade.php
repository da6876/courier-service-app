@section('title',"Outlet Info")
@extends('layout.app')
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body border-bottom">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-2 mb-md-0 text-uppercase fw-medium">Invoices  (Last 90 Days)</h6>
                        </div>
                    </div>
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

                    <div class="card-body">
                        <div class="table-responsive pt-3">
                            <div>
                                <form id="filterForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Search Name</label>
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

    <div class="modal fade" id="invoiceModal" tabindex="-1" role="dialog" aria-labelledby="invoiceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="invoiceModalLabel">Invoice Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Date: <span id="invoiceDate"></span></p>
                    <p>Invoice Number: <span id="invoiceNumber"></span></p>
                    <hr />
                    <table id="invoiceTable" style="width: 100%; border-collapse: collapse;">
                        <thead>
                        <tr>
                            <th style="border: 1px solid #000; padding: 8px;">Tracking Number</th>
                            <th style="border: 1px solid #000; padding: 8px;">Recipient Name</th>
                            <th style="border: 1px solid #000; padding: 8px;">Phone</th>
                            <th style="border: 1px solid #000; padding: 8px;">Address</th>
                            <th style="border: 1px solid #000; padding: 8px;">Price</th>
                            <th style="border: 1px solid #000; padding: 8px;">Status</th>
                        </tr>
                        </thead>
                        <tbody id="invoiceTableBody"></tbody>
                    </table>
                    <hr />
                    <div>
                        <h3>Total Amount: <span id="totalAmount"></span></h3>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="printInvoice()" class="btn btn-primary">Print Me</button>
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
                    url: '{{ route('invoicesInfo.data') }}',
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
                        <button type="button" class="btn btn-sm btn-info btn-icon-text edit-btn" data-id="${row.tracking_number}"><i class="typcn typcn-printer "></i></button>
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
                alert(id);
                generateInvoice(id);
            });

        });

        function generateInvoice(trackingNumber) {
            var urlGetInvoice = '{{url('path/to/get/invoice/data')}}';
            $.ajax({
                url: urlGetInvoice,
                type: 'GET',
                data: { tracking_number: trackingNumber },
                success: function (data) {
                    // Assuming 'data' contains the invoice details
                    $('#invoiceDate').text(new Date().toLocaleDateString());
                    $('#invoiceNumber').text('INV-' + Math.floor(Math.random() * 100000)); // Generate a random invoice number

                    // Clear existing rows
                    $('#invoiceTableBody').empty();

                    let totalAmount = 0;

                    // Populate invoice details
                    const row = `
                <tr>
                    <td style="border: 1px solid #000; padding: 8px;">${data.tracking_number}</td>
                    <td style="border: 1px solid #000; padding: 8px;">${data.recipient_name}</td>
                    <td style="border: 1px solid #000; padding: 8px;">${data.recipient_phone}</td>
                    <td style="border: 1px solid #000; padding: 8px;">${data.recipient_address}</td>
                    <td style="border: 1px solid #000; padding: 8px;">৳ ${parseFloat(data.price).toFixed(2)}</td>
                    <td style="border: 1px solid #000; padding: 8px;">${data.status}</td>
                </tr>
            `;
                    $('#invoiceTableBody').append(row);
                    totalAmount += parseFloat(data.price);

                    $('#totalAmount').text(`৳ ${totalAmount.toFixed(2)}`);

                    // Show the modal
                    $('#invoiceModal').modal('show');
                },
                error: function (xhr) {
                    console.error('Error fetching invoice data:', xhr);
                    alert('Failed to fetch invoice data.');
                }
            });
        }

        function printInvoice() {
            const invoiceContent = `
                    <html>
                        <head>
                            <title>Invoice</title>
                            <style>
                                table { width: 100%; border-collapse: collapse; }
                                th, td { border: 1px solid black; padding: 8px; }
                            </style>
                        </head>
                        <body>
                            <h1>Invoice Report</h1>
                            <p>Date: ${$('#invoiceDate').text()}</p>
                            <p>Invoice Number: ${$('#invoiceNumber').text()}</p>
                            <hr />
                            <table>
                                <thead>
                                    <tr>
                                        <th>Tracking Number</th>
                                        <th>Recipient Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${$('#invoiceTableBody').html()}
                                </tbody>
                            </table>
                            <hr />
                            <h3>Total Amount: ${$('#totalAmount').text()}</h3>
                        </body>
                    </html>
                `;

            const printWindow = window.open('', '', 'height=600,width=800');
            printWindow.document.write(invoiceContent);
            printWindow.document.close();
            printWindow.print();
        }
    </script>
@endsection
