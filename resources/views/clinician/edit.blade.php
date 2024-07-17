@extends('backend.app')
@section('content')
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Patients</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Appointment Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $patient->name }}</td>
                                <td>{{ $patient->email }}</td>
                                <td>{{ $patient->phone }}</td>
                                <td>{{ $patient->appointment_date }}</td>
                                <td>
                                    @php
                                    $status = $patient->status;
                                    @endphp
                                    <div class="form-group">
                                        <select class="form-control select2" name="status" id="status"
                                            style="width: 100%;">
                                            <option value="pending" @if($status == "pending") {{'selected'}}@endif>Pending</option>
                                            <option value="confirmed" @if($status == "confirmed") {{'selected'}}@endif>Confirmed</option>
                                            <option value="cancelled" @if($status == "cancelled") {{'selected'}}@endif>Cancelled</option>
                                            <option value="completed" @if($status == "completed") {{'selected'}}@endif>Completed</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#status').change(function() {
                var status = $(this).val();
                var id = "{{ $patient->id }}";
                $.ajax({
                    url: "{{ url('/clinician') }}/" + id,
                    type: "PUT",
                    data: {
                        _token: "{{ csrf_token() }}",
                        status: status
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.status === 'success') {
                            alert(data.message);
                        } else {
                            alert(data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>
    <!-- /.row -->
@endsection
    

