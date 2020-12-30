<main class="h-100">
    <div class="container pb-5 pl-4 pr-4">
        <div class="row">
            <div class="container shadow-sm bg-white border pb-1 mt-4 pt-5">
                <div class="row">
                    <div class="col-10 col-md-8 offset-1 offset-md-2 px-0 bg-white mb-4">
                        <form action="sign-in.php" method="POST" class="m-0">
                            <h2 class="ml-3">Sign-up</h2>
                            <div class="form-group row mx-3">
                                <div class="col-12 col-md-5 p-0">
                                    <label for="name" class="p-0 mb-0">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" required/>
                                </div>
                                <div class="col-12 col-md-5 offset-md-2 p-0">
                                    <label for="surname" class="p-0 mb-0">Surname:</label>
                                    <input type="text" class="form-control" id="surname" name="surname" required/>
                                </div>
                            </div>
                            <div class="form-group row mx-3">
                                <div class="col-12 col-md-5 p-0">
                                    <label for="password" class="p-0 mb-0">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" required />
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a correct password.
                                </div>
                                <div class="col-12 col-md-5 offset-md-2 p-0">
                                    <label for="confirm_password" class="p-0 mb-0">Confirm password:</label>
                                    <input type="password" class="form-control" id="confirm_password"
                                     name="confirm password" required />
                                </div>
                                <div class="invalid-feedback">
                                    Different password.
                                </div>
                            </div>
                            <div class="form-group row mx-3">
                                <div class="col-12 col-md-5 p-0">
                                    <label for="email" class="p-0 mb-0">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required />
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a correct email.
                                </div>
                                <div class="col-12 col-md-5 offset-md-2 p-0">
                                    <label for="phone" class="p-0 mb-0">Phone:</label>
                                    <input type="number" class="form-control" id="phone" name="phone" required />
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a correct phone.
                                </div>
                            </div>
                            <div class="form-group row mx-3">
                                <div class="col-12 col-md-5 p-0">
                                    <label for="birth_date" class="p-0 mb-0">Birth date:</label>
                                    <input type="date" class="form-control" id="birth_date" name="birth_date" required />
                                </div>
                                <div class="col-12 col-md-5 offset-md-2 p-0">
                                    <label for="city" class="p-0 mb-0">City:</label>
                                    <input type="text" class="form-control" id="city" name="city" required />
                                </div>
                            </div>
                            <div class="form-group row mx-3">
                                <div class="col-12 col-md-5 p-0">
                                    <label for="address" class="p-0 mb-0">Address:</label>
                                    <input type="text" class="form-control" id="address" name="address" required />
                                </div>
                                <div class="col-12 col-md-5 offset-md-2 p-0">
                                    <label for="postal_code" class="p-0 mb-0">Postal code:</label>
                                    <input type="number" class="form-control" id="postal_code" name="postal_code" required />
                                </div>
                            </div>
                            <div class="form-group row mx-3">
                                <div class="col-12 col-md-5 p-0">
                                    <label for="province" class="p-0 mb-0">Province:</label>
                                    <input type="text" class="form-control" id="province" name="province" required />
                                </div>
                            </div>
                            <div class="form-group col-6 col-md-4 offset-3 offset-md-4 mt-3">
                                <button type="submit" class="btn btn-light col-md-12 border">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>