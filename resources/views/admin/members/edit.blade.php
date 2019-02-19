@extends('layouts.portal')

@section('content')
<section class="content">
    <form class="form-horizontal" id="memberEditForm" method="POST" action="{{ route('admin.members.update', $member->id) }}">
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
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{ old('first_name', $member->first_name) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('last_name')) has-error @endif">
                        <label for="last_name" class="col-sm-3 control-label">Last Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{ old('last_name', $member->last_name) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('dob')) has-error @endif">
                        <label for="dob" class="col-sm-3 control-label">Date of Birth</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="dob" name="dob" value="{{ old('last_name', $member->dob) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('gender')) has-error @endif">
                        <label class="col-sm-3 control-label">Gender</label>
                        <div class="col-sm-9">
                            <div class="radio">
                                <label>
                                <input type="radio" name="gender" id="member_male" value="M" @if($member->gender === 'M') checked @endif>
                                Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" name="gender" id="member_female" value="F" @if($member->gender === 'F') checked @endif>
                                Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('member_type')) has-error @endif">
                        <label class="col-sm-3 control-label">Member Type</label>
                        <div class="col-sm-9">
                            <div class="radio">
                                <label>
                                <input type="radio" name="member_type" id="member_type_player" value="Player/Coach" checked>
                                Ice Player / Coach
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" name="member_type" id="member_type_manager" value="Manager/Volunteer">
                                Ice Manager / Volunteer
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" name="member_type" id="member_type_official" value="Official/Referees">
                                Ice Official (Referees)
                                </label>
                            </div>
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
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $member->email) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('phone_1')) has-error @endif">
                        <label for="phone_1" class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone_1" name="phone_1" value="{{ old('phone_1', $member->phone_1) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('phone_2')) has-error @endif">
                        <label for="phone_2" class="col-sm-3 control-label">Alternative Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone_2" name="phone_2" value="{{ old('phone_2', $member->phone_2) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('line_1')) has-error @endif">
                        <label for="address_line_1" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="line_1" name="line_1" value="{{ old('line_1', $member->address->line_1) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('city')) has-error @endif">
                        <label for="address_city" class="col-sm-3 control-label">City</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $member->address->city) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('country')) has-error @endif">
                        <label for="country" class="col-sm-3 control-label">Country</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="country" id="country">
                                <option value="">Select</option>
                                <option value="US" @if($member->address->country === 'US') selected="" @endif>USA</option>
                                <option value="CA" @if($member->address->country === 'CA') selected="" @endif>Canada</option>
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
                                    <option value="{{ $state->abbreviation }}" @if($member->address->state === $state->abbreviation) selected="" @endif>{{ $state->name }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Canada">
                                    @foreach($states['CA'] as $state)
                                    <option value="{{ $state->abbreviation }}" @if($member->address->state === $state->abbreviation) selected="" @endif>{{ $state->name }}</option>
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
        url: "{{ route('api.members.update', $member->id) }}",
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
