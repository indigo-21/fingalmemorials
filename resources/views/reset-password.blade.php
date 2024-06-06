<!doctype html>
<html class="no-js" lang="en">

@include('includes.head')
<style>
    .pwd-restriction-checked {
        list-style: none;
    }

    .pwd-restriction-checked:before {
        content: '✓';
        padding-right: 10px;
    }
    
</style>
<body>
    <div class="login-content">
        <!-- Login -->
        <div class="nk-block toggled" id="l-login">
            <h1 class="login-title">FINGAL MEMORIALS LTD</h1>
            <p class="login-desc">Computer Software designed by Indigo 21, Ltd. for FINGAL MEMORIALS LTD</p>
            <p></p>
            <form method="post" action="{{route('recoverPassword',$id)}}">
            @csrf
                <div class="nk-form">
                    <div class="row mb-20 ">
                        <div class="col-md-12 text-center">
                            <h4> Reset Password </h4>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                        <div class="nk-int-st">
                            <input type="password" class="form-control" name="password" id="basic-default-password" placeholder="Password" />
                            <span class="input-group-text cursor-pointer" id="basic-default-password3"><i
                                class="bx bx-hide"></i></span>
                        </div>                       
                    </div>
                    <div class="alert alert-warning text-left mt-10"  id="password_requirements" hidden>
                        <li id="pwd-restriction-length"> Be between 8-16 characters in length</li>
                        <li id="pwd-restriction-upperlower">Contain at least 1 lowercase and 1 uppercase letter</li>
                        <li id="pwd-restriction-number">Contain at least 1 number (0–9)</li>
                        <li id="pwd-restriction-special">Contain at least 1 special character (!@#$%^&()'[]"?+-/*)</li>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                        <div class="nk-int-st">
                            <input type="password" class="form-control" id="basic-default-password-confirm"  name="password" placeholder="Confirm Password" />
                        </div>
                    </div>
                    <div class="alert alert-warning" id="confirm_password_div" hidden>
                        <ul>
                            <li id="pwd-restriction-length"> Please enter the password again.</li>
                        </ul>
                    </div>
                    <div class="row mt-20">
                        <div class="col-md-12 text-center">
                            <div class="form-btn">
                                <a href="/"><button type="button" class="btn btn-light btn-icon-notika waves-effect">Cancel</button></a>
                                <button class="btn btn-primary btn-icon-notika waves-effect"  id="submit">Submit</button>
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
    <script src="{{ asset('js/users.js') }}"></script>
   
</body>

</html>
