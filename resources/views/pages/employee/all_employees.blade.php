@extends('layouts.theme')

@section('content-grid')
<div class="d-flex justify-content-between my-4 pr-4">
    <h3>All Employees</h3>
    <a href="{{ route('employee.create') }}" class="btn btn-primary">New</a>
</div>
    <div>
        <table class="table table-striped table-bordere" style="width:100%" id="tbl_company">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Company</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(sizeof($employeeData))
                    @foreach($employeeData as $employee)
                        <tr>
                            <td>
                                {{ $employee->id }}
                            </td>
                            <td>
                                {{ $employee->full_name }}
                            </td>
                            <td>
                                {{ $employee->email }}
                            </td>
                            <td>
                                {{ $employee->phone }}
                            </td>
                            <td>
                                {{ $employee->company->name }}
                            </td>
                            <td>
                                <div class="flex action-btn">
                                    <button class="btn btn-primary mx-1"><i class="fa fa-eye" onclick="openEmployeeDetail('{{ $employee->id }}')"></i></button>
                                    <button class="btn btn-danger mx-1" onclick="openDelete('{{ $employee->id }}')"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <script>
        function openEmployeeDetail(id) {
            location.href= '/employee/'+id;
        }
    </script>

    <script>
        function openDelete(id) {
            Swal.fire({
                title: 'Warning',
                text: 'Do you want to Delete',
                icon: 'error',
                confirmButtonText: 'Delete',
                showCancelButton: true,
            }).then( function (value) {
                if (value.isConfirmed) {
                    $.ajax({
                        url: '/employee/' + id,
                        type: 'delete',
                        data: {
                            '_token' : "{{ csrf_token() }}"
                        },
                        success: function (data) {
                            Swal.fire({
                            title: 'Success',
                            text: 'Success deleting record',
                            icon: 'success'});
                        },
                        error: function (error) {
                            Swal.fire({
                            title: 'Error',
                            text: 'Error deleting record',
                            icon: 'error'});
                        }
                    })
                }
            })
        }
    </script>
@endsection

