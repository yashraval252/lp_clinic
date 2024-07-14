@extends('frontend.app')
@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Appointment Booking <small>(Fill the below form.)</small></h3>
                </div>
                <form id="quickForm" action="{{ url('/appointment') }}" method="POST" onsubmit="saveSignature()">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="patient_name">Name:</label>
                            <input type="text" id="patient_name" name="patient_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="patient_phone">Phone:</label>
                            <input type="text" id="patient_phone" name="patient_phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="appointment_date">Appointment Date:</label>
                            <input type="datetime-local" id="appointment_date" name="appointment_date" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="clinician">Select Clinician</label>
                            <select class="form-control select2" name="user_id" id="clinician" style="width: 100%;">
                                <option value="" selected> Select </option>
                                @foreach(App\Models\User::all() as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="signature">Signature:</label>
                            <canvas id="signature" width="400" height="200" style="border:1px solid #000000;"></canvas>
                            <input type="hidden" id="signature_input" name="signature" required>
                            <button type="button" class="btn btn-secondary" onclick="clearCanvas()">Clear</button>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        #signature {
            touch-action: none;
            /* Prevents touch scrolling on mobile devices */
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var canvas = document.getElementById('signature');
            var ctx = canvas.getContext('2d');
            var drawing = false;

            function getOffset(event) {
                var rect = canvas.getBoundingClientRect();
                return {
                    x: event.clientX - rect.left,
                    y: event.clientY - rect.top
                };
            }

            canvas.addEventListener('mousedown', function(e) {
                drawing = true;
                ctx.beginPath();
                var offset = getOffset(e);
                ctx.moveTo(offset.x, offset.y);
            });

            canvas.addEventListener('mousemove', function(e) {
                if (drawing) {
                    var offset = getOffset(e);
                    ctx.lineTo(offset.x, offset.y);
                    ctx.stroke();
                }
            });

            canvas.addEventListener('mouseup', function() {
                drawing = false;
            });

            canvas.addEventListener('mouseleave', function() {
                drawing = false;
            });

            function saveSignature() {
                var signatureData = canvas.toDataURL('image/png');
                document.getElementById('signature_input').value = signatureData;
            }

            function clearCanvas() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
            }

            window.saveSignature = saveSignature;
            window.clearCanvas = clearCanvas;
        });
    </script>
@endsection
