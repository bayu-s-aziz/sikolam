@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Schedule'])
<div class="container-fluid pb-4 px-4 mt-1">
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive px-1">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase  text-xxs font-weight-bolder opacity-7">
                                        Name</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7 ps-2">
                                        Time On</th>
                                    <th
                                        class="text-center text-uppercase  text-xxs font-weight-bolder opacity-7">
                                        Time Off</th>
                                    <th
                                        class="text-center text-uppercase  text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-1 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Lampu Teras</h6>
                                                <p class="text-xs text-secondary mb-0">Relay 1(D5)</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">17.00</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold">05.00</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-success text-xs font-weight-bold">On</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="#" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal"
                                            data-bs-target="#editModal" data-name="" data-time-on=""
                                            data-time-off="" data-action-url="/schedule/1">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-1 py-1">

                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Lampu Ruang Tamu</h6>
                                                <p class="text-xs text-secondary mb-0">Relay 2(D6)</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">17.00</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold">05.00</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-warning text-xs font-weight-bold ">Off</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="#" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal"
                                            data-bs-target="#editModal" data-name="" data-time-on=""
                                            data-time-off="" data-action-url="/schedule/2">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-1 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Lampu Kamar Tidur</h6>
                                                <p class="text-xs text-secondary mb-0">Relay 3(D7)</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">17.00</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold">05.00</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-success text-xs font-weight-bold">On</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="#" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal"
                                            data-bs-target="#editModal" data-name="" data-time-on=""
                                            data-time-off="" data-action-url="/schedule/3">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-1 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Lampu Kamar Mandi</h6>
                                                <p class="text-xs text-secondary mb-0">Relay 4(D0)</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">17.00</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold">05.00</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-success text-xs font-weight-bold">On</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="#" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal"
                                            data-bs-target="#editModal" data-name="" data-time-on=""
                                            data-time-off="" data-action-url="/schedule/4">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" action="{{ route('save.schedule') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="time_on" class="form-label">Time On</label>
                        <input type="time" class="form-control" id="time_on" name="time_on" required>
                    </div>
                    <div class="mb-3">
                        <label for="time_off" class="form-label">Time Off</label>
                        <input type="time" class="form-control" id="time_off" name="time_off" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="editForm">Save changes</button>
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
            modalForm.querySelector('#name').value = name;
            modalForm.querySelector('#time_on').value = timeOn;
            modalForm.querySelector('#time_off').value = timeOff;
            modalForm.querySelector('#status').value = status;
        });
    });
</script>