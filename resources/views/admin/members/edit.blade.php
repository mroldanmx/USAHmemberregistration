@extends('layouts.portal')

@section('content')
<section class="content">
    <form class="form-horizontal" method="POST" action="{{ route('admin.members.update', $member->member_id) }}">
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
                    <div class="form-group @if($errors->has('member_first_name')) has-error @endif">
                        <label for="member_first_name" class="col-sm-3 control-label">First Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="member_first_name" name="member_first_name" placeholder="First Name" value="{{ old('member_first_name', $member->member_first_name) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('member_last_name')) has-error @endif">
                        <label for="member_last_name" class="col-sm-3 control-label">Last Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="member_last_name" name="member_last_name" placeholder="Last Name" value="{{ old('member_last_name', $member->member_last_name) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('member_dob')) has-error @endif">
                        <label for="member_dob" class="col-sm-3 control-label">Date of Birth</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="member_dob" name="member_dob" value="{{ old('member_last_name', $member->member_dob) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('member_gender')) has-error @endif">
                        <label class="col-sm-3 control-label">Gender</label>
                        <div class="col-sm-9">
                            <div class="radio">
                                <label>
                                <input type="radio" name="member_gender" id="member_male" value="M" @if($member->member_gender === 'M') checked @endif>
                                Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" name="member_gender" id="member_female" value="F" @if($member->member_gender === 'F') checked @endif>
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
                    <div class="form-group @if($errors->has('member_email')) has-error @endif">
                        <label for="member_email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="member_email" name="member_email" value="{{ old('member_email', $member->member_email) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('member_phone_1')) has-error @endif">
                        <label for="member_phone_1" class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="member_phone_1" name="member_phone_1" value="{{ old('member_phone_1', $member->member_phone_1) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('member_phone_2')) has-error @endif">
                        <label for="member_phone_2" class="col-sm-3 control-label">Alternative Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="member_phone_2" name="member_phone_2" value="{{ old('member_phone_2', $member->member_phone_2) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('address_line_1')) has-error @endif">
                        <label for="address_line_1" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="address_line_1" name="address_line_1" value="{{ old('address_line_1', $member->address->address_line_1) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('address_city')) has-error @endif">
                        <label for="address_city" class="col-sm-3 control-label">City</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="address_city" name="address_city" value="{{ old('address_city', $member->address->address_city) }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('address_country')) has-error @endif">
                        <label for="address_country" class="col-sm-3 control-label">Country</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="address_country" id="address_country">
                                <option value="">Select</option>
                                <option value="USA" @if($member->address->address_country === 'USA') selected="" @endif>USA</option>
                                <option value="Canada" @if($member->address->address_country === 'Canada') selected="" @endif>Canada</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('address_state')) has-error @endif">
                        <label for="address_state" class="col-sm-3 control-label">State</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="address_state" name="address_state">
                                <option value="">Select</option>
                                <optgroup label="USA">
                                    @foreach($states['USA'] as $state)
                                    <option value="{{ $state->abbreviation }}" @if($member->address->address_state === $state->abbreviation) selected="" @endif>{{ $state->name }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Canada">
                                    @foreach($states['Canada'] as $state)
                                    <option value="{{ $state->abbreviation }}" @if($member->address->address_state === $state->abbreviation) selected="" @endif>{{ $state->name }}</option>
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

@push('docready')
    $('#member_country').on('change', function() {
        $('#member_state').find('optgroup').hide();
        $('#member_state').find('optgroup[label="'+$(this).val()+'"]').show();
    }).trigger('change');
@endpush
