[root@ip-172-31-92-179 html]# cat form.php
<html>

<head>
<title>Simple JQuery Post Form to PHP Example</title>
</head>

<body>

<!-- including jQuery from the google cdn -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js">      </script>

<!-- This div will be populated with error messages -->
<div id="example_form_error"></div>

<!-- This div will be populated with success messages -->
<div id="example_form_success"></div>

<!-- Here is your form -->
<div id="example_form_enter">
    <form id="contact_modal_form" method='post' action='form_post.php'>
            <label for="Name">Enter Your Name (Not "Adam"):</label> <input class='textbox' name='Name' type='text' size='25' required />
            <label for="Password">Enter Your Password:</label> <input class='textbox' name='Password' type='text' size='25' required />
            <button class='contact_modal_button' type='submit'>Send</button>
    </form>
</div>

<!-- This div contains a section that is hidden initially, but displayed when the form is submitted successfully -->
<div id="example_form_confirmation" style="display: none">
    <p>
        Additional static div displayed on success.
        <br>
        <br>
        <a href="form.php">Try Again</a>
    </p>
</div>

<!-- Below is the jQuery function that process form submission and receives back results -->
<script>
    $(function() {
        $("#contact_modal_form").submit(function(event) {
            var form = $(this);
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(),
                dataType: 'json',
                success: function(data) {
                    if(data.error == true) {
                        var error = $("#example_form_error");
                        error.css("color", "red");
                        error.html("Not " + data.msg + ". Please enter a different Password. The Username or Password you entered is incorrect.");
                    } else {
                        $("#example_form_enter").hide();
                        $("#example_form_error").hide();
                        $("#example_form_confirmation").show();

                        var success = $("#example_form_success");
                        success.css("color", "green");
                        success.html("Success! You submitted the Password " + data.msg + ". " + "The Username or Password you entered is CORRECT.");
                    }
                }
            });
            event.preventDefault();
        });
    });
</script>

</body>

</html>
