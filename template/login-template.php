<div class="flex-grow-1 subtle-pattern">
    <div class="container-fluid bg-white flex-flow-row-wrap subtle-pattern">
        <div class="container pb-5 px-4 mx-5">
            <div class="row">
                <div class="container bg-white rounded shadow-sm mb-5 py-4">
                    <h1 class="text-center display-4">Login</h1>
                </div>
            </div>
            <div class="row">
                <div class="container bg-white rounded shadow-sm p-5 my-4 col-md-4 offset-md-4">
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
                                    <span id="toggle-hidden-pass" class="input-group-text"><img src="upload/icons/eye.svg" alt="toggle password hidden" width="16" height="16"></span>
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a correct password.
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block my-4" type="button">Continue</button>
                        <p>Don't have an account? Sign up <a href="sign-up.php">here</a>.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/password-toggle-hide.js"></script>