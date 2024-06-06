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
            <form method="post" action="{{route('requestNewPassword')}}">
            @csrf
                <div class="nk-form">
                    <div class="row mb-20 ">
                        <div class="col-md-12 text-center">
                            <h4> Forgot Password </h4>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                        <div class="nk-int-st">
                            <input type="email" class="form-control" placeholder="Email" name="email"/>
                        </div>
                    </div>
                    <div class="row mt-20">
                        <div class="col-md-12 text-center">
                            <div class="form-btn">
                                <a href="/"><button type="button" class="btn btn-light btn-icon-notika waves-effect">Cancel</button></a>
                                <button class="btn btn-primary btn-icon-notika waves-effect">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="nk-navigation nk-lg-ic">
                <p style="color:#fff;">Copyright &copy; 2024. Indigo 21. All rights reserved.</p>
            </div>
        </div>
    </div>


    @include('includes.scripts')
</body>

</html>
