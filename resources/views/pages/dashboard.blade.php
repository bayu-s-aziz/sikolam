@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
<div class="container-fluid py-4">
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="row">
        @foreach($lampus as $index => $lampu)
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-10">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bolder" id="Nama-Lampu-{{ $index+1 }}">{{ $lampu->name }}</p>
                                <h5 class="font-weight-bolder"></h5>
                            </div>
                        </div>
                        <div class="col-2">
                            <a href="#" class="text-secondary text-xxs text" data-bs-toggle="modal"
                                data-bs-target="#editModal" data-id="{{ $lampu->id }}"
                                data-name="{{ $lampu->name }}"
                                data-action-url="{{ route('lampu.update-name', $lampu->id) }}">
                                <i class="ni ni-settings-gear-65 text-lg opacity-10" aria-hidden="true"></i>
                            </a>

                        </div>
                        <div class="col-8 schedule-{{ $index+1 }}">
                            <p class="mb-0">
                                <span class="text-sm font-weight-bold"> </span>
                            </p>
                            <p class="mb-0">
                                <span class="text-sm font-weight-bold"> </span>
                            </p>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape {{ $lampu->status ? 'bg-gradient-success' : 'bg-gradient-danger' }} shadow-danger text-center rounded-circle" id="icon-status-{{ $index+1 }}">
                                <i class="ni ni-bulb-61 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="btn-switch mt-2">
                            <form method="POST" action="/Relay{{ $index+1 }}">
                                @csrf
                                <input type="hidden" name="status" value="{{ $lampu->status }}" id="relay-status{{ $index+1 }}">
                                <label class="switch">
                                    <input type="checkbox" id="relay-toggle{{ $index+1 }}" onchange="toggleRelay{{ $index+1 }}()"
                                        {{ $lampu->status ? 'checked' : '' }}>
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
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Nama</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" action="">
                    @csrf
                    <input type="hidden" name="_method" value="PUT"> <!-- Untuk update -->
                    <input type="hidden" name="id" id="lampu-id">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lampu</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success" form="editForm">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget; // Button yang memicu modal
            const lampuName = button.getAttribute('data-name');
            const lampuId = button.getAttribute('data-id');
            const actionUrl = button.getAttribute('data-action-url');

            // Update form action URL dan input value
            const modalForm = editModal.querySelector('#editForm');
            modalForm.setAttribute('action', actionUrl);
            modalForm.querySelector('#lampu-id').value = lampuId;
            modalForm.querySelector('#name').value = lampuName;

            const modalTitle = editModal.querySelector('.modal-title');
            modalTitle.textContent = `Edit Name - ${lampuName}`;
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