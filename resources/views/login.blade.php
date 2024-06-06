<!doctype html>
<html class="no-js" lang="en">

@include('includes.head')

<body>
    <div class="login-content">
        <!-- Login -->
        <div class="nk-block toggled" id="l-login">
            <h1 class="login-title">FINGAL MEMORIALS LTD</h1>
            <p class="login-desc">Computer Software designed by Indigo 21, Ltd. for FINGAL MEMORIALS LTD</p>
            <p></p>
            <form action="{{route('authsubmit')}}" method="POST">
                <div class="nk-form">
                    @csrf

                    <div class="input-group">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                        <div class="nk-int-st">
                            <input type="text" class="form-control" name="username" placeholder="Username" />
                        </div>
                    </div>                   

                    <div class="input-group mg-t-15">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                        <div class="nk-int-st">
                            <input type="password" class="form-control" name="password" placeholder="Password" />
                        </div>
                    </div>
                   
                    <div class="row mt-20">
                        <div class="col-md-12 text-center">
                            <div class="form-btn">
                                <button class="btn btn-primary btn-icon-notika waves-effect"
                                    type="submit">Login</button>
                            </div>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible alert-mg-b-0 " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="notika-icon notika-close"></i></span>
                            </button>
                            <ul class="text-left ">
                                @foreach ($errors->all() as $error)
                                    <li > <strong>- </strong>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </form>

            <div class="nk-navigation nk-lg-ic">
                <a href="/forgot-password" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i
                        class="fa fa-question"></i>
                    <span>Forgot Password</span></a>
                <a href="/contact-us" data-ma-action="nk-login-switch" data-ma-block="#l-register"><i
                        class="fa fa-phone"></i>
                    <span>Contact us</span></a>

            </div>
        </div>
    </div>

    @include('includes.scripts')
</body>

</html>
