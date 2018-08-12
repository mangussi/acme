@extends('base')

@section('title', 'Acme | Registration')

@section('content')


    <div class="row">
        <div class="col-md-1"></div>

        <div class="col-md-10">

            <h1>Register</h1>
            <hr>

            <!-- <form class="form" role="form" method="post" action="/register" > -->
            <form id="registerform" name="registerform" class="form-horizontal"
                  action="/register" method="post" novalidate>

                <div class="form-group">
                    <label for="first_name" class="col-sm-2 control-label">First Name</label>
                    <div class="col-sm-10">
                        <!-- <span class="input-group-addon"><i class="fa fa-font fa-fw"></i></span> -->
                        <input class="form-control required" type="text" name="first_name" id="first_name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="last_name" class="col-sm-2 control-label">Last Name</label>
                    <div class="col-sm-10">
                        <!-- <span class="input-group-addon"><i class="fa fa-font fa-fw"></i></span> -->
                        <input class="form-control required" type="text" name="last_name" id="last_name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <!-- <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span> -->
                        <input class="form-control required" type="email" name="email" id="email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="verify_email" class="col-sm-2 control-label">Confirm Email</label>
                    <div class="col-sm-10">
                        <!-- <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span> -->
                        <input class="form-control required" type="email" name="verify_email" id="verify_email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Choose a Password</label>
                    <div class="col-sm-10">
                        <!-- <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span> -->
                        <input class="form-control required" type="password" name="password" id="password">
                    </div>
                </div>

                <div class="form-group">
                    <label for="verify_password" class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <!-- <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span> -->
                        <input class="form-control required" type="password" name="verify_password"
                               id="verify_password">
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <div class="input-group">
                        <input type="submit"
                               class="btn btn-primary" value="Register">
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection


@section('bottomjs')
    <script>
        $(document).ready(function () {
            $("#registerform").validate(
                {
                    rules:
                        {
                            verify_email:
                                {
                                    required: true,
                                    email: true,
                                    equalTo: "#email"
                                },
                            verify_password:
                                {
                                    required: true,
                                    equalTo: "#password"
                                }
                        }
                });
        })
    </script>

@endsection
