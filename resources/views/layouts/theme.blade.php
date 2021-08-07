@extends('layouts.app')

@auth


@section('content')
    <div class="row">
        <div class="sidebar col-md-2 col-sm-12">
            <ul>
                <li>
                    <a href="{{ route('company.index') }}">Company</a>
                </li>
                <li>
                    <a href="{{ route('employee.index') }}">Employee</a>
                </li>
            </ul>
        </div>
        <div class="content-grid col-md-10 col-sm-12">
            @yield('content-grid')
        </div>
    </div>

@endsection

@endauth