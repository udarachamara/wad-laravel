@extends('layouts.theme')

@section('content-grid')
    <div class="container w-50">
        <h5>Employee Details</h5>
        <div>
        @if (Session::has('state'))
        <li>{!! session('state') !!}</li>
         @endif

         @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
        <form action="{{ $action->url }}" method="{{ $action->method }}">
            <input type="hidden" name="_method" value="{{ $action->method }}" />
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" @if (!$edit) disabled @endif class="form-control" name="first_name" value="{{ isset($employeeData) ? $employeeData->first_name : '' }}">
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" @if (!$edit) disabled @endif class="form-control" name="last_name" value="{{ isset($employeeData) ? $employeeData->last_name : '' }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" @if (!$edit) disabled @endif class="form-control" name="email" value="{{ isset($employeeData) ? $employeeData->email : '' }}">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" @if (!$edit) disabled @endif class="form-control" name="phone" value="{{ isset($employeeData) ? $employeeData->phone : '' }}">
            </div>

            <div class="form-group">
                <label for="phone">Company</label>
                <select @if (!$edit) disabled @endif  name="company_id" id="" class="form-control">
                    @foreach ( $companies as $company)
                    <option 
                    @if (isset($employeeData) && $employeeData->company_id == $company->id)
                        selected
                    @endif 
                    value="{{ $company->id }}">
                        {{ $company->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                @if (isset($employeeData))
                    <img src="{{ $employeeData->profile_photo }}" width="150" alt="">
                    <br>
                @endif
                <label for="profile_photo">Profile Picture</label>
                <input @if (!$edit) disabled @endif type="file" class="form-control" name="profile_photo" >
            </div>

            <div class="flex">
                @if ($edit)
                <button class="btn btn-primary" type="submit">Save</button>
                    @if (isset($id))
                    <a href="{{ $id }}" class="btn btn-danger" type="submit">Cancel</a>
                    @endif
                @endif
                @if (!$edit)
                    @if (isset($id))
                    <a href="{{ $id . '?edit=true' }}" class="btn btn-info">Edit</a>
                    @endif
                @endif
            </div>
        </form>
    </div>
@endsection