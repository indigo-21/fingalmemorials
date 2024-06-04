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
                            <h3>Profile</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p class="breadcrumbs-link"><a href="">Dashboard</a> / <b>
                                    Profile </b></p>
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

                    <form method="POST" action=" {{ route('updateProfile', Auth::user()->id) }} ">
                        @if (isset($id))
                            @method('PUT')
                        @endif
                        @csrf
                        <div class="row" style="margin-top:20px;">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>First Name</label>
                                    <input type="text" name="firstname" id="firstname" class="form-control "
                                        value="{{ Auth::user()->firstname }}" placeholder="First Name">
                                </div>
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Last Name</label>
                                    <input type="text" name="lastname" class="form-control"
                                        value="{{ Auth::user()->lastname }}" placeholder="Last Name">
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Email</label>
                                    <input type="text" name="email"class="form-control"
                                        value="{{ Auth::user()->email }}" placeholder="Email">
                                </div>
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control"
                                        value="{{ Auth::user()->username }}" placeholder="Username">
                                </div>


                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-md-12 text-center ">
                                <a href="/edit-profile"
                                    class="btn btn-primary btn-icon-notika waves-effect form-btn form-cancel-btn ">
                                    Cancel</a>
                                <button type="submit" class="btn btn-primary btn-icon-notika waves-effect form-btn "
                                    id="submit">Update</button>

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
