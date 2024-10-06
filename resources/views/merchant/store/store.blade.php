@section('title',"Store Info")
@extends('layout.app')
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body border-bottom">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-2 mb-md-0 text-uppercase fw-medium">Store Info</h6>
                            <button class="btn btn-success btn-sm " type="button" onclick="showModal()"><i
                                    class="typcn typcn-plus"></i> Add New Store
                            </button>

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
                                                <label>Search By Anything</label>
                                                <input type="text" id="name" name="name" class="form-control form-control-sm" placeholder="Enter Name For Search" aria-label="Username">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <table id="usersTable" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Owner Name</th>
                                    <th>Owner Phone</th>
                                    <th>Company Name</th>
                                    <th>Company Email</th>
                                    <th>Address</th>
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

    <!-- =================================================Add Customers=========================================================== -->
    <div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addRoleForm" class="row g-3" onsubmit="return false">
                        @csrf
                        <input type="hidden" name="id" id="id"/>
                        <div class="row g-2">
                            <div class="col mb-1">
                                <label class="form-label" for="store_name">Store Name <b class="text-danger">*</b></label>
                                <input type="text" id="store_name" name="store_name" class="form-control"
                                       placeholder="Enter Store Name" />
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col mb-1">
                                <label class="form-label" for="email">Store Email </label>
                                <input type="text" id="email" name="email" class="form-control"
                                       placeholder="Enter Store Email" />
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="row g-1">
                            <div class="col mb-1">
                                <label class="form-label" for="address">Address <b class="text-danger">*</b></label>
                                <input type="text" id="address" name="address" class="form-control"
                                       placeholder="Enter Address"/>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col mb-1">
                                <label class="form-label" for="contact_phone">Contact Phone <b class="text-danger">*</b></label>
                                <input type="number" id="contact_phone" name="contact_phone" class="form-control"
                                       placeholder="Enter Contact Phone"/>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col mb-1">
                                <label class="form-label" for="secondary_phone">Secondary Phone</label>
                                <input type="number" id="secondary_phone" name="secondary_phone" class="form-control"
                                       placeholder="Enter Secondary Phone"/>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col mb-1">
                                <label class="form-label" for="div_id">Select Division <b class="text-danger">*</b></label>
                                <select class="form-select" name="div_id" id="div_id">
                                    <option value="">Select A Division</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col mb-1">
                                <label class="form-label" for="dis_id">Select District <b class="text-danger">*</b></label>
                                <select class="form-select" name="dis_id" id="dis_id">
                                    <option value="">Select A District</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col mb-1">
                                <label class="form-label" for="thn_id">Select Thana <b class="text-danger">*</b></label>
                                <select class="form-select" name="thn_id" id="thn_id">
                                    <option value="">Select A Thana</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col mb-1">
                                <label class="form-label" for="out_id">Select Area <b class="text-danger">*</b></label>
                                <select class="form-select" name="out_id" id="out_id">
                                    <option value="">Select A Area</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="addData()" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <script>
        function showModal() {
            $("#addModal form")[0].reset();
            $(".modal-title").text("Add New Store");
            $("#addModal").modal("show");
        }

        $(document).ready(function () {
            var table = $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('storeInfo.data') }}',
                    type: 'POST',
                    data: function (d) {
                        d._token = $('input[name="_token"]').val(); // Include CSRF token
                        d.name = $('input[name="name"]').val();
                    }
                },
                columns: [
                    {data: 'id'},
                    {data: 'store_name', title: 'Store Name'},
                    {data: 'address', title: 'Address'},
                    {data: 'contact_phone', title: 'Contact Phone'},
                    {data: 'secondary_phone', title: 'Secondary Phone'},
                    {data: 'user_id', title: 'User'},
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
                /*columnDefs: [
                    {
                        targets: 4,
                        render: function (data, type, row) {
                            return data ? new Date(data).toLocaleString('en-GB', {timeZone: 'Asia/Dhaka'}) : 'N/A';
                        }
                    }
                ],*/
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                pageLength: 10
            });

            $('#usersTable tbody').on('click', '.edit-btn', function () {
                var id = $(this).data('id');
                showData(id);
            });

            // Handle Update button click
            $('#usersTable tbody').on('click', '.update-btn', function () {
                var data = table.row($(this).parents('tr')).data();
                console.log('Update button clicked for:', data);
            });

            // Handle Delete button click
            $('#usersTable tbody').on('click', '.delete-btn', function () {
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
                            url: "{{ url('store') }}" + '/' + id,
                            type: "POST",
                            data: {'_method': 'DELETE', '_token': csrf_token},
                            success: function (response) {
                                if (response.statusCode == 200) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
                                        icon: "success"
                                    });
                                } else {
                                    Swal.fire("Error occured !!");
                                }
                                $('#usersTable').DataTable().ajax.reload();
                            },
                            error: function (xhr) {
                                alert('Delete failed: ' + xhr.responseText);
                            }
                        });

                    }
                });

            });

            $('#name').on('change keyup', function () {
                table.draw();
            });

        });

        function addData() {
            url = "{{ url('store') }}";
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
                    } else if (data.statusCode == 204) {
                        showErrors(data.errors);
                    } else {
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
            $("#addModal").modal("show");
            $("#pass").hide();

            $.ajax({
                url: "{{ url('store') }}" + '/' + id,
                type: "GET",
                dataType: "JSON",
                success: function (data) {
                    $('#addModal form')[0].reset();
                    $('.modal-title').text('Update');
                    $('#addModal').modal('show');
                    $('#id').val(data.uid);
                    $('#store_name').val(data.store_name);
                    $('#email').val(data.email);
                    $('#address').val(data.address);
                    $('#contact_phone').val(data.contact_phone);
                    $('#secondary_phone').val(data.secondary_phone);
                    $('#div_id').val(data.div_id);
                    getDistrict(data.div_id, data.dis_id);
                    getThana(data.div_id, data.dis_id, data.thn_id);
                    getArea(data.div_id, data.dis_id, data.thn_id, data.out_id);
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
