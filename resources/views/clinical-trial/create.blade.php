@extends('layouts.app')
@section('content')
@if($errors->has('title'))
    <div class="error">{{ $errors->first('title') }}</div>
@endif
<style type="text/css">
    .form-body {
        padding: 40px;
    }
    .centered
    {
        text-align:center;
    }
</style>
@if (session()->has('success'))
<div class="alert alert-success">
    @if(is_array(session('success')))
        <ul>
            @foreach (session('success') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    @else
        {{ session('success') }}
    @endif
</div>
@endif
<div class="form-body">
    <form action="{{ route('clinical-trial.store') }}" method="POST">
        @csrf
        <fieldset>

        <div class="row g-2">
            <div class="form-floating col-6 mb-3">
                <input type="text" name="first_name" id="title" class="form-control" placeholder="Enter Subject's First Name" value="{{ isset($trial->first_name) ?  $trial->first_name : '' }}" required>
                <label for="floatingInput">First Name</label>
            </div>
            <div class="col-6 mb-3">
                <div class="form-floating">
                    <input class="form-control" id="datepicker" name="date_of_birth" placeholder="MM/DD/YYY" type="text"/>
                    <label for="floatingTextarea">Date Of Birth</label>
                </div>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-6 mb-3">
                <select class="form-select" aria-label="Default select example" name="migrain_frequency" id="migrain_frequency" required>
                    <option selected>Select Migraine Frequency</option>
                    <option value="1">Daily</option>
                    <option value="2">Weekly</option>
                    <option value="3">Monthly</option>
                </select>
            </div>
            <div class="col-6 mb-3">
                <select class="form-select" aria-label="Default select example" id="daily_frequency" name="daily_frequency" style="display:none;">
                    <option value="">Select daily frequency</option>
                    <option value="1">1-2</option>
                    <option value="2">3-4</option>
                    <option value="3">5+</option>
                </select>
            </div>
        </div>
        </fieldset>
        <button type="submit" class="btn btn-primary centered">Submit</button>
    </form>
</div>
        
@endsection

