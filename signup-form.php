        
        <section class="container">
            <div class="well well-top text-center">
                <header>
                    <h2>Create Account</h2>
                </header>
            </div>
        </section>
        
        <div class="container">
            <section id="sign-up" class="well">
                <form>
                    <header>
                        <h3>Basic information</h3>
                    </header>
                    <div class="form-group has-success has-feedback">
                        <label for="fullName">Full Name</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Please Enter Full Name" required aria-describedby="inputSuccess">
                        <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                        <span id="inputSuccess" class="sr-only">(success)</span>
                    </div>
                    <div class="form-group has-warning has-feedback">
                        <label for="telNumber">Tel Number</label>
                        <input type="tel" class="form-control" id="telNumber" placeholder="Please Enter Telephone Number" required aria-describedby="inputWarning">
                        <span class="help-block"> - Please enter your telephone number, we will call you on it.</span>
                        <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
                        <span id="inputWarning" class="sr-only">(warning)</span>
                    </div>
                    <div class="form-group has-error has-feedback">
                        <label for="Email1">Email address</label>
                        <input type="email" class="form-control" id="Email1" placeholder="Please Enter Email" required aria-describedby="inputError">
                        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                        <span id="inputError" class="sr-only">(error)</span>
                    </div>
                    <div class="form-group">
                        <label>Birthdate</label>
                        <div class="row">
                          <div class="col-xs-12 col-sm-4">
                            <input type="number" class="form-control" placeholder="Day" min="1" max="31">
                          </div>
                          <div class="col-xs-12 col-sm-4">
                            <input type="number" class="form-control" placeholder="Month" min="1" max="12">
                          </div>
                          <div class="col-xs-12 col-sm-4">
                            <input type="number" class="form-control" placeholder="Year" min="1920" max="2017">
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender1">Gender</label>
                        <select id="gender1" class="form-control" required>
                            <option disabled selected>Select gender</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Password1">Password</label>
                        <input type="password" class="form-control" id="password1" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword1">Confirm password</label>
                        <input type="password" class="form-control" id="confirmPassword1" placeholder="Password" required>
                    </div>
                    <div class="checkbox">
                        <input id="AcheckboxRobot" type="checkbox">
                        <label for="AcheckboxRobot">Check If You Are Not A Robot.</label>
                    </div>
                    <a href="index.html" type="submit" class="btn btn-default">Submit</a>
                </form>
            </section><!-- /#Product-Panel/.Well -->
            <section id="features">
                <div class="row text-center">
                    <div class="col-xs-4 custom-padd-right">
                    <div class="feat-item"><i class="fa fa-truck fa-md"> </i>
                        <h4>Delivery within 5-7 days</h4>
                    </div>
                    </div>
                    <div class="col-xs-4 custom-padd-right custom-padd-left">
                    <div class="feat-item"><i class="fa fa-money fa-md"> </i>
                        <h4>Cash on delivery</h4>
                    </div>
                    </div>
                    <div class="col-xs-4 custom-padd-left">
                    <div class="feat-item"><i class="fa fa-retweet fa-md"> </i>
                        <h4>Free return within 7 days</h4>
                    </div>
                    </div>
                </div>
            </section>
        </div><!-- /.Container -->