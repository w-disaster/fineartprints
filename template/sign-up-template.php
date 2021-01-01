<main class="h-100 col-12">
    <div class="container pb-5 pl-4 pr-4">
        <div class="row">
            <div class="container shadow-sm bg-white border pb-1 mt-4 pt-5">
                <div class="row">
                    <div class="col-10 col-md-8 offset-1 offset-md-2 px-0 bg-white mb-4">
                        <form action="" method="POST" class="m-0">
                            <h2 class="ml-3">Sign-up</h2>
                            <div class="form-group row mx-3">
                                <div class="col-12 col-md-5 p-0">
                                    <label for="name" class="p-0 mb-0">Name:</label>
                                    <input type="text" class="form-control <?php echo $isnamevalid ?>" id="name" name="name" required/>
                                    <div class="invalid-feedback">Please enter a valid name.</div>
                                </div>
                                <div class="col-12 col-md-5 offset-md-2 p-0">
                                    <label for="surname" class="p-0 mb-0">Surname:</label>
                                    <input type="text" class="form-control <?php echo $issurnamevalid ?>" id="surname" name="surname" required/>
                                    <div class="invalid-feedback">Please enter a valid surname.</div>
                                </div>
                            </div>
                            <div class="form-group row mx-3">
                                <div class="col-12 col-md-5 p-0">
                                    <label for="password" class="p-0 mb-0">Password:</label>
                                    <input type="password" class="form-control <?php echo $ispasswordvalid ?>"
                                     id="password" name="password" required/>
                                    <div class="invalid-feedback">Password must be at least 8 digits
                                         and contains uppercase,lowercase and numbers.</div>
                                    </div>
                                <div class="col-12 col-md-5 offset-md-2 p-0">
                                    <label for="confirm-password" class="p-0 mb-0">Confirm password:</label>
                                    <input type="password" class="form-control <?php echo $isconfpwvalid?>" id="confirm-password"
                                     name="confirm-password" required/>
                                     <div class="invalid-feedback">Different password.</div>
                                </div>
                            </div>
                            <div class="form-group row mx-3">
                                <div class="col-12 col-md-5 p-0">
                                    <label for="email" class="p-0 mb-0">Email:</label>
                                    <input type="email" class="form-control <?php echo $isemailvalid?>" id="email" name="email" required />
                                    <div class="invalid-feedback">Please provide a valid email.</div>
                                </div>
                                <div class="col-12 col-md-5 offset-md-2 p-0">
                                    <label for="phone" class="p-0 mb-0">Phone:</label>
                                    <input type="number" class="form-control" id="phone" name="phone" required />
                                    <div class="invalid-feedback">Please provide a valid phone.</div>
                                </div>
                            </div>
                            <div class="form-group row mx-3">
                                <div class="col-12 col-md-5 p-0">
                                    <label for="birth_date" class="p-0 mb-0">Birth date:</label>
                                    <input type="date" class="form-control" id="birth_date" name="birth-date" required />
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
                                    <input type="number" class="form-control" id="postal_code" name="postal-code" required />
                                </div>
                            </div>
                            <div class="form-group row mx-3">
                                <div class="col-12 col-md-5 p-0">
                                    <label for="province" class="p-0 mb-0">Province:</label>
                                    <input type="text" class="form-control" id="province" name="province" required />
                                </div>
                                <div class="col-12 col-md-5 p-0 offset-md-2">
                                    <label for="ship_option" class="p-0 mb-0">Role:</label>
                                    <select id="ship_option" name="ship_option" class="form-control">
                                        <option value="customer">Customer</option>
                                        <option value="seller">Seller</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-6 col-md-4 offset-3 offset-md-4 mt-3">
                                <button type="submit" class="btn btn-primary col-md-12 border">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>