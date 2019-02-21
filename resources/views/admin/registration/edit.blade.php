@extends('layouts.portal')

@section('content')
<section class="content">
    <form class="form-horizontal" id="memberEditForm" method="POST" action="{{ route('admin.registrations.update', $registration->id) }}">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Personal Information</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <div class="form-group @if($errors->has('first_name')) has-error @endif">
                        <label for="first_name" class="col-sm-3 control-label">First Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{ old('first_name', $registration->member->first_name) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('last_name')) has-error @endif">
                        <label for="last_name" class="col-sm-3 control-label">Last Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{ old('last_name', $registration->member->last_name) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('dob')) has-error @endif">
                        <label for="dob" class="col-sm-3 control-label">Date of Birth</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="dob" name="dob" value="{{ old('last_name', $registration->member->dob) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('gender')) has-error @endif">
                        <label class="col-sm-3 control-label">Gender</label>
                        <div class="col-sm-9">
                            <div class="radio">
                                <label>
                                <input type="radio" name="gender" id="member_male" value="M" @if($registration->member->gender === 'M') checked @endif>
                                Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" name="gender" id="member_female" value="F" @if($registration->member->gender === 'F') checked @endif>
                                Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('member_type_id')) has-error @endif">
                        <label class="col-sm-3 control-label">Member Type</label>
                        <div class="col-sm-9">
                            @foreach($memberTypes as $typeID => $typeName)
                            <div class="radio">
                                <label for="member_type_{{ \Illuminate\Support\Str::snake($typeName) }}">
                                <input type="radio" name="member_type_id" id="member_type_{{ \Illuminate\Support\Str::snake($typeName) }}" value="{{ $typeID }}" @if($registration->member_type_id === $typeID) checked @endif>
                                {{ $typeName }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('member_diversity')) has-error @endif">
                        <label for="diversity" class="col-sm-3 control-label">Diversity</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="diversity" name="member_diversity" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Contact Information</h3>
                </div>
                <div class="box-body">
                    <div class="form-group @if($errors->has('email')) has-error @endif">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $registration->member->email) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('phone_1')) has-error @endif">
                        <label for="phone_1" class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone_1" name="phone_1" value="{{ old('phone_1', $registration->member->phone_1) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('phone_2')) has-error @endif">
                        <label for="phone_2" class="col-sm-3 control-label">Alternative Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone_2" name="phone_2" value="{{ old('phone_2', $registration->member->phone_2) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('line_1')) has-error @endif">
                        <label for="address_line_1" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="line_1" name="line_1" value="{{ old('line_1', $registration->member->address->line_1) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('city')) has-error @endif">
                        <label for="address_city" class="col-sm-3 control-label">City</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $registration->member->address->city) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('country')) has-error @endif">
                        <label for="country" class="col-sm-3 control-label">Country</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="country" id="country">
                                <option value="">Select</option>
                                <option value="US" @if($registration->member->address->country === 'US') selected="" @endif>USA</option>
                                <option value="CA" @if($registration->member->address->country === 'CA') selected="" @endif>Canada</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('state')) has-error @endif">
                        <label for="state" class="col-sm-3 control-label">State</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="state" name="state">
                                <option value="">Select</option>
                                <optgroup label="USA">
                                    @foreach($states['US'] as $state)
                                    <option value="{{ $state->abbreviation }}" @if($registration->member->address->state === $state->abbreviation) selected="" @endif>{{ $state->name }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Canada">
                                    @foreach($states['CA'] as $state)
                                    <option value="{{ $state->abbreviation }}" @if($registration->member->address->state === $state->abbreviation) selected="" @endif>{{ $state->name }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</section>
@endsection

@section('content-header')
@include('common.portal.page_heading', ['pageTitle' => 'Members Edit'])
@endsection

@include('partials.scripts.validation_bs4')

@push('docready')
$('#member_country').on('change', function() {
    $('#member_state').find('optgroup').hide();
    $('#member_state').find('optgroup[label="'+$(this).val()+'"]').show();
}).trigger('change');
var doSubmit = function(form) {
    var jqXhr = $.ajax({
        url: "{{ route('api.registrations.update', $registration->id) }}",
        method: "POST",
        data: $(form).serialize()
    }).done(function(data) {
        if (data.success) {
            bootstrapAlert(data.message, 'success');
        }
    }).fail(function(error) {
        if (error.responseJSON.errors) {
            showFieldErrors(error.responseJSON.errors);
        }
        bootstrapAlert(error.responseJSON.message, 'error');
    });
}
$("#memberEditForm").validate({
    submitHandler: function(form) {
        console.log('do');
        doSubmit(form);
    }
});
$('#memberEditForm').on('submit', function(e) { e.preventDefault() })
@endpush
