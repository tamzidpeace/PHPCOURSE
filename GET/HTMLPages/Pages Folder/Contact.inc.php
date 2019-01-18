<h1 id="request">Movie Premier Booking Form</h1>
<p class="req">Interested in Movie Premier at NY Cinema? Please complete and submit the following form to the Booking
    Office. One of our representatives will send you an information package tailored to the field(s) of Premier that
    interest you. Please indicate whether you would like additional information or not</p>


<style type="text/css">
    input[type="text"], input[type="email"], textarea {
        border: 1px solid dashed;
        background-color: rgb(221, 216, 212);
        width: 480px;
        padding: .5em;
        font-size: 1.0em;
    }

    .Error {
        color: red;
        font-size: 1.2em;
        font-family: Bitter, Georgia, Times, "Times New Roman", serif;
    }

    input[type="submit"] {
        color: white;
        float: right;
        font-size: 1.3em;
        font-family: Bitter, Georgia, Times, "Times New Roman", serif;
        width: 170px;
        height: 40px;
        background-color: #5D0580;
        border: 5px solid;
        border-bottom-left-radius: 35px;
        border-bottom-right-radius: 35px;
        border-top-left-radius: 35px;
        border-top-right-radius: 35px;
        border-color: rgb(221, 216, 212);
        font-weight: bold;
    }

    .FieldInfo {
        color: rgb(251, 174, 44);
        font-family: Bitter, Georgia, "Times New Roman", Times, serif;
        font-size: 1.3em;

    }

    .MF {
        color: black;
        font-size: 1.2em;
        font-family: Bitter, Georgia, Times, "Times New Roman", serif;
    }

</style>

<?php ?>

<form action="" method="post">
    <legend>* Please Fill Out the following Fields.</legend>
    <fieldset>
 <span class="FieldInfo">
Name:</span><br>
        <input class="input" type="text" Name="Name" value="">
        <span class="Error">*<?php echo $NameError; ?></span><br>
        <span class="FieldInfo">
E-mail:</span><br>
        <input class="input" type="text" Name="Email" value="">
        <span class="Error">*<?php echo $EmailError; ?></span><br>
        <span class="FieldInfo">
Gender:</span><br>
        <input class="radio" type="radio" Name="Gender" value="Female"><span class="MF">Female</span>
        <input class="radio" type="radio" Name="Gender" value="Male"><span class="MF">Male</span>
        <span class="Error">*<?php echo $GenderError; ?></span><br>
        <span class="FieldInfo">
Website:</span><br>
        <input class="input" type="text" Name="Website" value="">
        <span class="Error">*<?php echo $WebsiteError; ?></span><br>
        <span class="FieldInfo">
Comment:</span><br>
        <textarea Name="Comment" rows="5" cols="25"></textarea>
        <br>
        <br>
        <input type="Submit" Name="Submit" value="Submit">
    </fieldset>
</form>


<div class="clear"></div>

