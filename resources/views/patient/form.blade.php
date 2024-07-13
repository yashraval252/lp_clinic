@extends("frontend.app")
@section("content")
<div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm">
                <div class="card-body">
                  <div class="form-group">
                  <label for="patient_name">Name:</label>
                <input type="text" id="patient_name" name="patient_name" required><br>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="patient_phone">Phone:</label>
                    <input type="text" id="patient_phone" name="patient_phone" required><br>
                  </div>
                  <div class="form-group">
                    <label for="appointment_date">Appointment Date:</label>
                    <input type="datetime-local" id="appointment_date" name="appointment_date" required><br>
                  </div>
                  <div class="form-group">
                    <label for="signature">Signature:</label>
                    <!-- <canvas id="signature" width="400" height="200" style="border:1px solid #000000;"></canvas> -->
                    <input type="hidden" id="signature_input" name="signature"><br>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
<div class="test">
<form method="POST">
    @csrf
    <label for="patient_name">Name:</label>
    <input type="text" id="patient_name" name="patient_name" required><br>
    <label for="patient_email">Email:</label>
    <input type="email" id="patient_email" name="patient_email" required><br>
    <label for="patient_phone">Phone:</label>
    <input type="text" id="patient_phone" name="patient_phone" required><br>
    <label for="appointment_date">Appointment Date:</label>
    <input type="datetime-local" id="appointment_date" name="appointment_date" required><br>
    <label for="signature">Signature:</label>
    <canvas id="signature" width="400" height="200" style="border:1px solid #000000;"></canvas>
    <input type="hidden" id="signature_input" name="signature"><br>
    <button type="submit">Book</button>
</form>
</div>
@endsection