@extends ('main')
@section('content')
<style>
    .pwd-restriction-checked {
        list-style: none;
    }

    .pwd-restriction-checked:before {
        content: '?';
        padding-right: 10px;
    }
    
</style>
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-content">
                <div class="breadcrumbs-content">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <h3>{{ isset($id) ? 'Update' : 'Create' }} Users</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p class="breadcrumbs-link"><a href="">Dashboard</a> / <b>
                                    {{ isset($id) ? 'Update' : 'Create' }} Users </b></p>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="notika-icon notika-close"></i></span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li> <strong>- </strong>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action=" {{ isset($id) ? route('updateUser', $id) : route('createUser') }} ">
                        @if (isset($id))
                            @method('PUT')
                        @endif
                        @csrf
                        <div class="row" style="margin-top:20px;">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>First Name</label>
                                    <input type="text" name="firstname" id="firstname" class="form-control "
                                        value="{{ isset($user) ? $user->firstname : old('firstname') }}" placeholder="First Name">
                                </div>
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Last Name</label>
                                    <input type="text" name="lastname" class="form-control"
                                        value="{{ isset($user) ? $user->lastname : old('lastname') }}" placeholder="Last Name">
                                </div>
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Email</label>
                                    <input type="text" name="email"class="form-control"
                                        value="{{ isset($user) ? $user->email : old('email') }}" placeholder="Email">
                                </div>
                                <div class="bootstrap-select fm-cmp-mg" style="margin-bottom:20px;">
                                    <label>Access Level</label>
                                    <select class="selectpicker" name="access_level_id">
                                        @foreach ($accessLevels as $accessLevel)
                                            <option value="{{ $accessLevel->id }}"
                                                {{ isset($id) && $user->access_level_id == $accessLevel->id ? 'selected' : '' }}>
                                                {{ $accessLevel->type }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control"
                                        value="{{ isset($user) ? $user->username : old('username') }}" placeholder="Username">
                                </div>
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Password</label>
                                    <input type="password" name="password" id="basic-default-password" class="form-control" placeholder="Password" >
                                    <span class="input-group-text cursor-pointer" id="basic-default-password3"><i
                                        class="bx bx-hide"></i></span>
                                </div>
                                <div class="alert alert-warning"  id="password_requirements" hidden>
                                    <li id="pwd-restriction-length"> Be between 8-16 characters in length</li>
                                    <li id="pwd-restriction-upperlower">Contain at least 1 lowercase and 1 uppercase letter</li>
                                    <li id="pwd-restriction-number">Contain at least 1 number (0–9)</li>
                                    <li id="pwd-restriction-special">Contain at least 1 special character (!@#$%^&()'[]"?+-/*)</li>
                                </div>
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" id="basic-default-password-confirm" placeholder="Confirm Password">
                                </div>
                                <div class="alert alert-warning" id="confirm_password_div" hidden>
                                    <ul>
                                        <li id="pwd-restriction-length"> Please enter the password again.</li>
                                    </ul>
                                </div>
                                    
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-md-12 text-center ">
                                <a href="/users"
                                    class="btn btn-primary btn-icon-notika waves-effect form-btn form-cancel-btn ">
                                    Cancel</a>
                                <button type="submit"
                                    class="btn btn-primary btn-icon-notika waves-effect form-btn " id="submit">{{ isset($id) ? 'Update' : 'Create' }}</button>

                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('page-scripts')
    <script src="{{ asset('js/users.js') }}"></script>
@endsection
