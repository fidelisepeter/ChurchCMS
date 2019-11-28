@extends('layouts.homeapp')

@section('content')
    {{-- <div class="container">
        <h1>Add Members</h1>
        {!! Form::open(['action' => 'SermonsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('email', 'Email')}}
                {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Should be about 30 words long'])}}
            </div>
            <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body'])}}
            </div>
            {{-- <div class="form-group">
                {{Form::file('cover_image')}}
            </div> --}}
            {{-- {{Form::submit('Publish Note', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!} --}}
    {{-- </div> --}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Add Member To Church') }}
                        <a href="/importmembers" class="btn btn-secondary float-right">
                            {{ __('Add Members via Excel File')}}
                        </a>
                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="/members" enctype="multipart/form-data">
                            @csrf
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
    
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="member_type" class="col-md-4 col-form-label text-md-right">{{ __('Member Type') }}</label>
    
                                <div class="col-md-6">
                                    {{-- <input id="position" type="select" class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}" name="position" value="{{ old('position') }}" required autofocus> --}}
                                    <select class="form-control" id="member_type" name="member_type">
                                        <option value="Founder">Child</option>
                                        <option value="HeadPastor">Teen</option>
                                        <option value="AssociatePastor">Adult</option>
                                    </select>
                                    @if ($errors->has('member_type'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('member_type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>
    
                                <div class="col-md-6">
                                    <input id="mobile" type="integer" class="form-control{{ $errors->has('mobile number') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" required>
    
                                    @if ($errors->has('mobile'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nationality" class="col-md-4 col-form-label text-md-right">{{ __('Nationality') }}</label>
    
                                <div class="col-md-6">
                                    <input id="nationality" type="text" class="form-control{{ $errors->has('nationality') ? ' is-invalid' : '' }}" name="nationality" value="{{ old('nationality') }}" required autofocus>
    
                                    @if ($errors->has('nationality'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nationality') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
    
                                <div class="col-md-6">
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
                            </div>

                            <div class="form-group row">
                                <label for="occupation" class="col-md-4 col-form-label text-md-right">{{ __('Occupation') }}</label>
    
                                <div class="col-md-6">
                                    <input id="occupation" type="text" class="form-control{{ $errors->has('occupation') ? ' is-invalid' : '' }}" name="occupation" value="{{ old('occupation') }}" required autofocus>
    
                                    @if ($errors->has('occupation'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('occupation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>
    
                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Position') }}</label>
    
                                <div class="col-md-6">
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
                            </div>

                            <div class="form-group row">
                                <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>
    
                                <div class="col-md-6">
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
                            </div>
    
                            <div class="form-group row">
                                <label for="bday" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>
    
                                <div class="col-md-6">
                                    <input id="bday" type="date" class="form-control{{ $errors->has('bday') ? ' is-invalid' : '' }}" name="bday" value="{{ old('bday') }}" required autofocus>
    
                                    @if ($errors->has('bday'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('Birth Date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="datejoined" class="col-md-4 col-form-label text-md-right">{{ __('Date Joined') }}</label>
    
                                <div class="col-md-6">
                                    <input id="datejoined" type="date" class="form-control{{ $errors->has('datejoined') ? ' is-invalid' : '' }}" name="datejoined" value="{{ old('datejoined') }}" required autofocus>
    
                                    @if ($errors->has('datejoined'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('Date Joined') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="previouschurch" class="col-md-4 col-form-label text-md-right">{{ __('Previous Church') }}</label>
    
                                <div class="col-md-6">
                                    <input id="previouschurch" type="text" class="form-control{{ $errors->has('previouschurch') ? ' is-invalid' : '' }}" name="previouschurch" value="{{ old('previouschurch') }}" required autofocus>
    
                                    @if ($errors->has('previouschurch'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('previouschurch') }}</strong>
                                        </span>
                                    @endif
                                </div>
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
                            
                            <div class="form-group row">
                                <div class="col-md-2"></div>
                                {{Form::label('member_image', 'Member Image')}}
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                {{Form::file('member_image')}}
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add Member') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection