<link rel="stylesheet" href="css/sign-in.css">

<div class="container pb-5 px-4 h-100 mx-5">
    <div class="row">
        <div class="container bg-white rounded shadow-sm mb-5 py-4">
            <h1 class="text-center">Sign-in</h1>
        </div>
    </div>
    <div class="row">
        <div class="container bg-white rounded shadow-sm px-5 my-4 col-md-4 offset-md-4 mw-25">
            <form class="needs-validation" novalidate>
                <div class="form-row">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control is-valid" required>
                    <div class="invalid-feedback">
                        Please provide a correct email.
                    </div>
                </div>
                <div class="form-row mt-2">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input id="password" type="password" class="form-control is-invalid" required>
                        <div class="input-group-append">
                            <span id="toggle_hidden_pass" class="input-group-text"><img src="upload/icons/eye.svg" alt="toggle password hidden" width="16" height="16"></span>
                        </div>
                        <div class="invalid-feedback">
                            Please provide a correct password.
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-block my-4" type="button">Continue</button>
            </form>
        </div>
    </div>
</div>

<script src="js/password-toggle-hide.js"></script>