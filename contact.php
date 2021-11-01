<?php include "navigation.php" ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
</head>
<body>
<div class="container">
    <div class="row">
        <h1>contact us</h1>
    </div>
    <div class="row">
        <h4 style="text-align:center">We'd love to hear from you!</h4>
    </div>

    <form action="sendmail.php" method="post">
        <div class="row input-container">
            <div class="col-xs-12">
                <div class="styled-input wide">
                    <input type="text" required name="name"/>
                    <label>Name</label>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="styled-input">
                    <input type="text" required name="email"/>
                    <label>Email</label>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="styled-input" style="float:right;">
                    <input type="text" required name="phone"/>
                    <label>Phone Number</label>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="styled-input wide">
                    <textarea required name="message"></textarea>
                    <label>Message</label>
                </div>
            </div>
            <div class="col-xs-12">
                <input type="submit" id="submit" name="submit" value="Submit">
            </div>
        </div>
    </form>
</div>

<style>
    input:focus ~ label, textarea:focus ~ label, input:valid ~ label, textarea:valid ~ label {
        font-size: 0.75em;
        color: #999;
        top: -5px;
        -webkit-transition: all 0.225s ease;
        transition: all 0.225s ease;
    }

    .styled-input {
        float: left;
        width: 293px;
        margin: 1rem 0;
        position: relative;
        border-radius: 4px;
    }

    @media only screen and (max-width: 768px) {
        .styled-input {
            width: 100%;
        }
    }

    .styled-input label {
        color: #999;
        padding: 1.3rem 30px 1rem 30px;
        position: absolute;
        top: 10px;
        left: 0;
        -webkit-transition: all 0.25s ease;
        transition: all 0.25s ease;
        pointer-events: none;
    }

    .styled-input.wide {
        width: 650px;
        max-width: 100%;
    }

    input,
    textarea {
        padding: 30px;
        border: 0;
        width: 100%;
        font-size: 1rem;
        background-color: #2d2d2d;
        color: white;
        border-radius: 4px;
    }

    input:focus,
    textarea:focus {
        outline: 0;
    }

    input:focus ~ span,
    textarea:focus ~ span {
        width: 100%;
        -webkit-transition: all 0.075s ease;
        transition: all 0.075s ease;
    }

    textarea {
        width: 100%;
        min-height: 15em;
    }

    .input-container {
        width: 650px;
        max-width: 100%;
        margin: 20px auto 25px auto;
    }

    .submit-btn {
        float: right;
        padding: 7px 35px;
        border-radius: 60px;
        display: inline-block;
        background-color: #789bbe;
        color: white;
        font-size: 18px;
        cursor: pointer;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.06),
        0 2px 10px 0 rgba(0, 0, 0, 0.07);
        -webkit-transition: all 300ms ease;
        transition: all 300ms ease;
    }

    .submit-btn:hover {
        transform: translateY(1px);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.10),
        0 1px 1px 0 rgba(0, 0, 0, 0.09);
    }

    @media (max-width: 768px) {
        .submit-btn {
            width: 100%;
            float: none;
            text-align: center;
        }
    }

    input[type=checkbox] + label {
        color: #ccc;
        font-style: italic;
    }

    input[type=checkbox]:checked + label {
        color: #f00;
        font-style: normal;
    }
</style>
</body>
</html>

