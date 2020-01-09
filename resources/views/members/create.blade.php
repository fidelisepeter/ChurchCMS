@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Add Member</h3>
                        </div>
                        <div class="col text-right">
                            <a href="/importmembers" class="btn btn-dark float-right">
                                {{ __('Add Members via Excel File')}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="/members" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>

                            
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="member_type" class="col-form-label text-md-right">{{ __('Member Type') }}</label>

                                {{-- <input id="position" type="select" class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}" name="position" value="{{ old('position') }}" required autofocus> --}}
                                <select class="form-control" id="member_type" name="member_type">
                                    <option value="Child">Child</option>
                                    <option value="Teen">Teen</option>
                                    <option value="Adult">Adult</option>
                                </select>
                                @if ($errors->has('member_type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('member_type') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="mobile" class="col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                                <input id="mobile" type="integer" class="form-control{{ $errors->has('mobile number') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" required>

                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="nationality" class="col-form-label text-md-right">{{ __('Nationality') }}</label>

                                <input id="nationality" type="text" class="form-control{{ $errors->has('nationality') ? ' is-invalid' : '' }}" name="nationality" value="{{ old('nationality') }}" required autofocus>

                                @if ($errors->has('nationality'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nationality') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="gender" class="col-form-label text-md-right">{{ __('Gender') }}</label>

                                {{-- <input id="position" type="select" class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}" name="position" value="{{ old('position') }}" required autofocus> --}}
                                <select class="form-control" id="gender" name="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="occupation" class="col-form-label text-md-right">{{ __('Occupation') }}</label>

                                <input id="occupation" type="text" class="form-control{{ $errors->has('occupation') ? ' is-invalid' : '' }}" name="occupation" value="{{ old('occupation') }}" required autofocus>

                                @if ($errors->has('occupation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('occupation') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-form-label text-md-right">{{ __('Address') }}</label>

                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="position" class="col-form-label text-md-right">{{ __('Position') }}</label>

                                {{-- <input id="position" type="select" class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}" name="position" value="{{ old('position') }}" required autofocus> --}}
                                <select class="form-control" id="position" name="position">
                                    <option value="Founder">Founder</option>
                                    <option value="Pastor">Pastor</option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Elder">Elder</option>
                                    <option value="Deacon">Deacon</option>
                                    <option value="Deacon">Member</option>
                                </select>
                                @if ($errors->has('position'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="department" class="col-form-label text-md-right">{{ __('Department') }}</label>

                                {{-- <input id="position" type="select" class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}" name="position" value="{{ old('position') }}" required autofocus> --}}
                                <select class="form-control" id="department" name="department">
                                    <option value="Sanctum">Sanctum</option>
                                    <option value="MenMinistry">Men's Ministry</option>
                                    <option value="WomenMinistry">Women's Ministry</option>
                                    <option value="TechnicalTeam">Technical Team</option>
                                    <option value="CleaningTeam">Cleaning Team</option>
                                    <option value="EvangelismTeam">Evangelism Team</option>
                                    <option value="PrayerTeam">Prayer Team</option>
                                    <option value="WorshipTeam">Worship &amp; Praise Team</option>
                                    <option value="Choir">Choir</option>
                                </select>
                                @if ($errors->has('department'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="bday" class="col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                                <input id="bday" type="date" class="form-control{{ $errors->has('bday') ? ' is-invalid' : '' }}" name="bday" value="{{ old('bday') }}" required autofocus>

                                @if ($errors->has('bday'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Birth Date') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="datejoined" class="col-form-label text-md-right">{{ __('Date Joined') }}</label>

                                <input id="datejoined" type="date" class="form-control{{ $errors->has('datejoined') ? ' is-invalid' : '' }}" name="datejoined" value="{{ old('datejoined') }}" required autofocus>

                                @if ($errors->has('datejoined'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Date Joined') }}</strong>
                                    </span>
                                @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="previouschurch" class="col-form-label text-md-right">{{ __('Previous Church') }}</label>

                                <input id="previouschurch" type="text" class="form-control{{ $errors->has('previouschurch') ? ' is-invalid' : '' }}" name="previouschurch" value="{{ old('previouschurch') }}" required autofocus>

                                @if ($errors->has('previouschurch'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('previouschurch') }}</strong>
                                    </span>
                                @endif
                        </div>

                        {{-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                        {{-- <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div> --}}
                        
                        <div class="form-group">
                            {{Form::label('member_image', 'Member Image')}}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            {{Form::file('member_image')}}
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Member') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection