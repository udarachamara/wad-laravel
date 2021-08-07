@extends('layouts.theme')

@section('content-grid')
<div class="d-flex justify-content-between my-4 pr-4">
    <h3>All Companies</h3>
    <a href="{{ route('company.create') }}" class="btn btn-primary">New</a>
</div>
    <div>
        <table class="table table-striped table-bordere" style="width:100%" id="tbl_company">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Website</th>
                <th scope="col">Telephone</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(sizeof($companyData))
                    @foreach($companyData as $company)
                        <tr>
                            <td>
                                {{ $company->id }}
                            </td>
                            <td>
                                {{ $company->name }}
                            </td>
                            <td>
                                {{ $company->website }}
                            </td>
                            <td>
                                {{ $company->telephone }}
                            </td>
                            <td>
                                <div class="flex action-btn">
                                    <button class="btn btn-primary mx-1" onclick="openCompanyDetail('{{ $company->id }}')"><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-danger mx-1" onclick="openDelete('{{ $company->id }}')"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <script>
        function openCompanyDetail(id) {
            location.href= '/company/'+id;
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
                        url: '/company/' + id,
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

