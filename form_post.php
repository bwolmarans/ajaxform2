  [root@ip-172-31-92-179 html]# cat form_post.php
<?php

    // Request Post Variable
    $name = $_REQUEST['Name'];
    $password = $_REQUEST['Password'];

    // Validation
    if($password != 'hello123') {
    echo json_error($_REQUEST['Password']);
    } else {
    echo json_success($_REQUEST['Password']);
    };

    // Return Success Function
    function json_success($msg) {
        $return = array();
        $return['error'] = FALSE;
        $return['msg'] = $msg;
        return json_encode($return);
    }

    // Return Error Function
    function json_error($msg) {
        $return = array();
        $return['error'] = TRUE;
        $return['msg'] = $msg;
        return json_encode($return);
    }

?>
[root@ip-172-31-92-179 html]#
