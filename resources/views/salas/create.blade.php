@extends('layout.principal')
@section('contenido')
<div class="row">
    <div class="col-12">
        <div class="card-box">

            <div class="row">
                <div class="col-xl-6">
                    <h4 class="header-title mb-4">Inline forms</h4>

                    <h6 class="mb-3 text-muted">Visible labels</h6>

                    <form class="form-inline">
                        <label class="sr-only" for="inlineFormInput">Name</label>
                        <input type="text" class="form-control mb-3 mr-3" id="inlineFormInput" placeholder="Jane Doe">

                        <label class="sr-only" for="inlineFormInputGroup">Username</label>
                        <div class="input-group mb-3 mr-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">@</span>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
                        </div>

                        <div class="form-check mb-3 mr-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="inlinerememberCheck">
                                <label class="custom-control-label" for="inlinerememberCheck">Remember me</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mb-3">Submit</button>
                    </form>

                    <form class="form-inline mt-3">
                        <label class="mr-3 mb-3" for="inlineFormCustomSelect">Preference</label>
                        <select class="custom-select mb-3 mr-3" id="inlineFormCustomSelect">
                            <option selected>Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>

                        <div class="custom-control mr-3 custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="remember-preference">
                            <label class="custom-control-label" for="remember-preference">Remember my preference</label>
                        </div>

                        <button type="submit" class="btn btn-primary mb-3">Submit</button>
                    </form>

                    <h6 class="mt-3 mb-0 text-muted">Hidden labels</h6>

                    <form class="form-inline">
                        <div class="form-group mt-3 mr-3">
                            <label class="sr-only" for="exampleInputEmail3">Email
                                address</label>
                            <input type="email" class="form-control" id="exampleInputEmail3"
                                    placeholder="Enter email">
                        </div>
                        <div class="form-group mt-3 mr-3">
                            <label class="sr-only" for="exampleInputPassword3">Password</label>
                            <input type="password" class="form-control"
                                    id="exampleInputPassword3" placeholder="Password">
                        </div>

                        <div class="custom-control custom-checkbox  mt-3 mr-3">
                            <input type="checkbox" class="custom-control-input" id="hiddenlabelrememberCheck">
                            <label class="custom-control-label" for="hiddenlabelrememberCheck">Remember me</label>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3 mr-3">Sign in</button>
                    </form>

                </div>

                <div class="col-xl-6 mt-4 mt-xl-0">

                    <h4 class="header-title mb-4">Using the Grid</h4>

                    <form>
                        <div class="form-group row">
                            <label for="inputEmail3"
                                    class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3"
                                        placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword3"
                                        placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2">Radios</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <input type="radio" name="radio" id="radio1" value="option1" checked>
                                    <label for="radio1">
                                        Option one is this and that&mdash;be sure to include why
                                        it's great
                                    </label>
                                </div>
                                <div class="radio">
                                    <input type="radio" name="radio" id="radio2" value="option2">
                                    <label for="radio2">
                                        Option two can be something else and selecting it will
                                        deselect option one
                                    </label>
                                </div>
                                <div class="radio">
                                    <input type="radio" name="radio" id="radio3" value="option3" disabled>
                                    <label for="radio3">
                                        Option three is disabled
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-sm-2">Checkbox</label>
                            <div class="col-sm-10">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox21" type="checkbox">
                                    <label for="checkbox21">
                                        Check me out
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div><!-- end row -->


        </div>
    </div>
</div>
<!-- end row -->
@stop
