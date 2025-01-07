@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Schedule'])
<div class="container-fluid py-4">
    <div class="container">
        <div class="row">
            @foreach($lampus as $lampu)
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-10">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bolder">{{ $lampu->name }}</p>
                                    <h5 class="font-weight-bolder"></h5>
                                </div>
                            </div>
                            <div class="col-2">
                                <a href="#" class="text-secondary text-xxs text" data-bs-toggle="modal"
                                    data-bs-target="#editModal" data-name="{{ $lampu->name }}"
                                    data-time-on="{{ $lampu->timeon }}" data-time-off="{{ $lampu->timeoff }}">
                                    <i class="ni ni-settings-gear-65 text-lg opacity-10" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="col-8 schedule-1">
                                <p class="mb-0">
                                    <span class="text-sm font-weight-bold">Time On: {{ $lampu->timeon }}</span>
                                </p>
                                <p class="mb-0">
                                    <span class="text-sm font-weight-bold">Time Off: {{ $lampu->timeoff }}</span>
                                </p>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape {{ $lampu->status ? 'bg-gradient-success' : 'bg-gradient-danger' }} shadow-danger text-center rounded-circle">
                                    <i class="ni ni-bulb-61 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="btn-switch mt-2">
                                <form method="POST" action="{{ route('lampu.update-status', $lampu->id) }}">
                                    @csrf
                                    <input type="hidden" name="status" value="{{ $lampu->status ? 0 : 1 }}">
                                    <label class="switch">
                                        <input type="checkbox" onchange="this.form.submit()" {{ $lampu->status ? 'checked' : '' }}>
                                        <span class="slider round"></span>
                                    </label>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="editForm" method="" action="">
                    @csrf
                    <div class="mb-3">
                        <label for="timeon" class="form-label">Time On</label>
                        <input type="time" class="form-control" id="timeon" name="timeon" required>
                    </div>
                    <div class="mb-3">
                        <label for="timeoff" class="form-label">Time Off</label>
                        <input type="time" class="form-control" id="timeoff" name="timeoff" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" form="editForm">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget; // Tombol yang men-trigger modal
            const name = button.getAttribute('data-name');
            const timeOn = button.getAttribute('data-time-on');
            const timeOff = button.getAttribute('data-time-off');
            const status = button.getAttribute('data-status');
            const actionUrl = button.getAttribute('data-action-url');

            // Isi form dengan data dari tombol
            const modalForm = editModal.querySelector('#editForm');
            modalForm.action = actionUrl;
            modalForm.querySelector('#timeon').value = timeOn || '';
            modalForm.querySelector('#timeoff').value = timeOff || '';

            // Tambahkan nama lampu ke modal title
            const modalTitle = editModal.querySelector('.modal-title');
            modalTitle.textContent = `Edit Schedule ${name}`;
        });
    });


    document.addEventListener("DOMContentLoaded", function() {
        // Function to toggle icon status
        function toggleIconStatus(checkboxId, iconId) {
            const checkbox = document.getElementById(checkboxId);
            const icon = document.getElementById(iconId);

            checkbox.addEventListener("change", function() {
                if (checkbox.checked) {
                    icon.classList.remove("bg-gradient-danger");
                    icon.classList.add("bg-gradient-success");
                } else {
                    icon.classList.remove("bg-gradient-success");
                    icon.classList.add("bg-gradient-danger");
                }
            });
        }

        // Initialize toggle functions for each lamp
        toggleIconStatus("relay-toggle1", "icon-status-1");
        toggleIconStatus("relay-toggle2", "icon-status-2");
        toggleIconStatus("relay-toggle3", "icon-status-3");
        toggleIconStatus("relay-toggle4", "icon-status-4");
    });
</script>