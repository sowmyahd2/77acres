<!DOCTYPE html>
<html lang="en">

<head>
    <title>RB Group - Real Estate - Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" href="<?php echo base_url(IMAGES); ?>/favicon.png">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .main-content {
            width: 50%;
            border-radius: 20px;
            box-shadow: 0 5px 5px rgba(0, 0, 0, .4);
            margin: 3em auto;
            display: flex;
        }

        .company__info {
            background-color: #00C0FF;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: #fff;
        }

        .fa-android {
            font-size: 3em;
        }

        @media screen and (max-width: 640px) {
            .main-content {
                width: 90%;
            }

            .company__info {
                display: none;
            }

            .login_form {
                border-top-left-radius: 20px;
                border-bottom-left-radius: 20px;
            }
        }

        @media screen and (min-width: 642px) and (max-width:800px) {
            .main-content {
                width: 70%;
            }
        }

        .row>h2 {
            color:#244696;
        }

        .login_form {
            background-color: #fff;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            border-top: 1px solid #ccc;
            border-right: 1px solid #ccc;
        }

        form {
            padding: 0 2em;
        }

        .form__input {
            width: 100%;
            border: 0px solid transparent;
            border-radius: 0;
            border-bottom: 1px solid #aaa;
            padding: 1em .5em .5em;
            padding-left: 2em;
            outline: none;
            margin: 1.5em auto;
            transition: all .5s ease;
        }

        .form__input:focus {
            border-bottom-color: #84231f;
            box-shadow: 0 0 5px rgba(0, 80, 80, .4);
            border-radius: 4px;
        }

        .btn {
            transition: all .5s ease;
            width: 70%;
            border-radius: 30px;
            color: #fff;
            font-weight: 600;
            background-color: #244696;
            border: 1px solid #244696;
            
            margin-top: 1.5em;
            margin-bottom: 1em;
        }

        .company_title {
            color: #84231f;
        }

        .btn:hover,
        .btn:focus {
            background-color: #00C0FF;
            color: #fff;
        }

        .bg-image {
            background: url(<?php echo base_url(AIMAGES); ?>/bg-login.jpg);
            height: 100%;
            position: absolute;
            width: 100%;
            background-repeat: no-repeat;
            background-size: cover;

        }

    </style>

</head>

<body>

    <!-- Main Content -->
    <div class="bg-image">
        <div class="container-fluid">
            <div class="row main-content bg-success text-center">
                <div class="col-md-5 text-center company__info">
                    <span class="company__logo">
                      <a href="<?php echo base_url(); ?>">
                        <img src="<?php echo base_url(IMAGES); ?>/logo.png">
                      </a>
                    </span>
                   <!-- <h4 class="company_title">rbgroup</h4>-->
                </div>
                <div class="col-md-7 col-xs-12 col-sm-12 login_form ">
                    <div class="container-fluid">
                        <div class="row">
                            <h2><b>Admin Login</b></h2>
                        </div>
                        <div class="row">
                          <div id="infoMessage" class="error"><?php echo $message;?></div>
                            <?php echo form_open("auth/login");?>
                                <div class="row">
                                  <?php echo form_input($identity);?>
                                    <!-- <input type="text" name="username" id="username" class="form__input" placeholder="Username"> -->
                                </div>
                                <div class="row">
                                    <!-- <span class="fa fa-lock"></span> -->
                                    <?php echo form_input($password);?>
                                    <!-- <input type="password" name="password" id="password" class="form__input" placeholder="Password"> -->
                                </div>
                                <div class="row">
                                    <input type="submit" value="Submit" class="btn">
                                </div>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>

</html>
