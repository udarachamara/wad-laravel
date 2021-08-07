@extends('layouts.theme')

@section('content-grid')
    <div class="container w-50">
    <h5>Company Details</h5>
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
                <label for="name">Name</label>
                <input @if (!$edit) disabled @endif type="text" class="form-control" name="name" value="{{ isset($companyData) ? $companyData->name : '' }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input @if (!$edit) disabled @endif type="text" class="form-control" name="email" value="{{ isset($companyData) ? $companyData->email : ''}}">
            </div>

            <div class="form-group">
                <label for="telephone">Telephone</label>
                <input @if (!$edit) disabled @endif type="text" class="form-control" name="telephone" value="{{ isset($companyData) ? $companyData->telephone : '' }}">
            </div>

            <div class="form-group">
                <label for="website">Website</label>
                <input @if (!$edit) disabled @endif type="text" class="form-control" name="website" value="{{ isset($companyData) ? $companyData->website : '' }}">
            </div>

            <div class="form-group">
                @if (isset($companyData))
                    <img src="{{ $companyData->logo }}" width="100" alt="">
                    <br>
                @endif
                <label for="logo">Logo</label>
                <input @if (!$edit) disabled @endif type="file" class="form-control" name="logo" >
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