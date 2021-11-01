<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form form action="../includes/controller/addItems.php" method="post" class='form'>
    <p class='field required'>
        <label class='label required' for='name'>Title</label>
        <input class='text-input' id='text' name='name' required type='text'>
    </p>
    <p class='field required'>
        <label class='label required' for='description'>Description</label>
        <input class='text-input' id='name' name='name' required type='text'>
    </p>

    <div class='field'>
        <label class='label'>Type</label>
        <ul class='options'>
            <li class='option'>
                <input class='option-input' id='option-0' name='option' type='radio' value='0'>
                <label class='option-label' for='option-0'>React</label>
            </li>
            <li class='option'>
                <input class='option-input' id='option-1' name='option' type='radio' value='1'>
                <label class='option-label' for='option-1'>Vue</label>
            </li>
            <li class='option'>
                <input class='option-input' id='option-2' name='option' type='radio' value='2'>
                <label class='option-label' for='option-2'>Angular</label>
            </li>
            <li class='option'>
                <input class='option-input' id='option-3' name='option' type='radio' value='3'>
                <label class='option-label' for='option-3'>Riot</label>
            </li>
            <li class='option'>
                <input class='option-input' id='option-4' name='option' type='radio' value='4'>
                <label class='option-label' for='option-4'>Polymer</label>
            </li>
            <li class='option'>
                <input class='option-input' id='option-5' name='option' type='radio' value='5'>
                <label class='option-label' for='option-5'>Ember</label>
            </li>
            <li class='option'>
                <input class='option-input' id='option-6' name='option' type='radio' value='6'>
                <label class='option-label' for='option-6'>Meteor</label>
            </li>
            <li class='option'>
                <input class='option-input' id='option-7' name='option' type='radio' value='7'>
                <label class='option-label' for='option-7'>Knockout</label>
            </li>
        </ul>
    </div>
    <p class='field required half'>
        <label class='label' for='color'>Color</label>
        <input class='text-input' id='type' name='color' required type='text'>
    </p>
    <p class='field half'>
        <label class='label' for='price'>Phone</label>
        <input class='text-input' id='price' name='price' type='price'>
    </p>
    <input class='button' type='submit' value='Add'>
</form>
<style>
    body {
        background-color: black;
    }

    .form .button, .form, .form, .form, .form .text-input, .form .option-input + label, .form .checkbox-input + label, .form .label {
        padding: 0.75em 1em;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        outline: none;
        line-height: normal;
        border-radius: 0;
        border: none;
        background: none;
        display: block;
    }

    .form .label {
        font-weight: bold;
        color: white;
        padding-top: 0;
        padding-left: 0;
        letter-spacing: 0.025em;
        font-size: 1.125em;
        line-height: 1.25;
        position: relative;
        z-index: 100;
    }

    .required .form .label:after, .form .required .label:after {
        content: " *";
        color: #E8474C;
        font-weight: normal;
        font-size: 0.75em;
        vertical-align: top;
    }

    .form .select, .form .textarea, .form .text-input, .form .option-input + label, .form .checkbox-input + label {
        font: inherit;
        line-height: normal;
        width: 100%;
        box-sizing: border-box;
        background: #222222;
        color: white;
        position: relative;
    }

    .form , .form , .form , .form, .form {
        color: white;
    }

    .form .select:-webkit-autofill, .form .textarea:-webkit-autofill, .form .text-input:-webkit-autofill, .form .option-input + label:-webkit-autofill, .form .checkbox-input + label:-webkit-autofill {
        box-shadow: 0 0 0px 1000px #111111 inset;
        -webkit-text-fill-color: white;
        border-top-color: #111111;
        border-left-color: #111111;
        border-right-color: #111111;
    }

    .form .select:not(:focus):not(:active).error, .form .textarea:not(:focus):not(:active).error, .form .text-input:not(:focus):not(:active).error, .form .option-input + label:not(:focus):not(:active).error, .form .checkbox-input + label:not(:focus):not(:active).error, .error .customSelect:not(:focus):not(:active), .error .form .select:not(:focus):not(:active), .form .error .select:not(:focus):not(:active), .error .form .textarea:not(:focus):not(:active), .form .error .textarea:not(:focus):not(:active), .error .form .text-input:not(:focus):not(:active), .form .error .text-input:not(:focus):not(:active), .error .form .option-input + label:not(:focus):not(:active), .form .error .option-input + label:not(:focus):not(:active), .error .form .checkbox-input + label:not(:focus):not(:active), .form .error .checkbox-input + label:not(:focus):not(:active) {
        background-size: 8px 8px;
        background-repeat: repeat;
    }

    .form:not(.has-magic-focus) .customSelect.customSelectFocus, .form:not(.has-magic-focus) .customSelect:active, .form:not(.has-magic-focus) .select:active, .form:not(.has-magic-focus) .textarea:active, .form:not(.has-magic-focus) .text-input:active, .form:not(.has-magic-focus) .option-input + label:active, .form:not(.has-magic-focus) .checkbox-input + label:active, .form:not(.has-magic-focus) .customSelect:focus, .form:not(.has-magic-focus) .select:focus, .form:not(.has-magic-focus) .textarea:focus, .form:not(.has-magic-focus) .text-input:focus, .form:not(.has-magic-focus) .option-input + label:focus, .form:not(.has-magic-focus) .checkbox-input + label:focus {
        background: #4E4E4E;
    }

    .form .message {
        position: absolute;
        bottom: 0;
        right: 0;
        z-index: 100;
        font-size: 0.625em;
        color: white;
    }

    .form .option-input, .form .checkbox-input {
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
    }

    .form .option-input + label, .form .checkbox-input + label {
        display: inline-block;
        width: auto;
        color: #4E4E4E;
        position: relative;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        cursor: pointer;
    }

    .form .option-input:focus + label, .form .checkbox-input:focus + label, .form .option-input:active + label, .form .checkbox-input:active + label {
        color: #4E4E4E;
    }

    .form .option-input:checked + label, .form .checkbox-input:checked + label {
        color: white;
    }

    .form .button {
        font: inherit;
        line-height: normal;
        cursor: pointer;
        background: #E8474C;
        color: white;
        font-weight: bold;
        width: auto;
        margin-left: auto;
        font-weight: bold;
        padding-left: 2em;
        padding-right: 2em;
    }

    .form .button:hover, .form .button:focus, .form .button:active {
        color: white;
        border-color: white;
    }

    .form .button:active {
        position: relative;
        top: 1px;
        left: 1px;
    }

    body {
        padding: 2em;
    }

    .form {
        max-width: 40em;
        margin: 0 auto;
        position: relative;
        display: flex;
        flex-flow: row wrap;
        justify-content: space-between;
        align-items: flex-end;
    }

    .form .field {
        width: 100%;
        margin: 0 0 1.5em 0;
    }

    @media screen and (min-width: 40em) {
        .form .field.half {
            width: calc(50% - 1px);
        }
    }

    .form .field.last {
        margin-left: auto;
    }

    .form .textarea {
        max-width: 100%;
    }

    .form .select {
        text-indent: 0.01px;
        text-overflow: "" !important;
    }

    .form .select::-ms-expand {
        display: none;
    }

    .form .checkboxes, .form .options {
        padding: 0;
        margin: 0;
        list-style-type: none;
        overflow: hidden;
    }

    .form .checkbox, .form .option {
        float: left;
        margin: 1px;
    }

    .customSelect {
        pointer-events: none;
    }

    .customSelect:after {
        content: "";
        pointer-events: none;
        width: 0.5em;
        height: 0.5em;
        border-style: solid;
        border-color: white;
        border-width: 0 3px 3px 0;
        position: absolute;
        top: 50%;
        margin-top: -0.625em;
        right: 1em;
        transform-origin: 0 0;
        transform: rotate(45deg);
    }

    .customSelect.customSelectFocus:after {
        border-color: white;
    }

    .magic-focus {
        position: absolute;
        z-index: 0;
        width: 0;
        pointer-events: none;
        background: rgba(255, 255, 255, 0.15);
        transition: top 0.2s, left 0.2s, width 0.2s;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        transform-style: preserve-3d;
        will-change: top, left, width;
        transform-origin: 0 0;
    }
</style>
</body>
</html>