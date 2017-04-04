<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        require_once './autoload.php';
        
        $test = new ErrorMessage();
        
        $test->addMessage("test1", 'Testing Error Message 1');
        $test->addMessage("test2", 'Testing Error Message 2');
        $test->addMessage("test3", 'Testing Error Message 3');
        $test->addMessage("test4", 'Testing Error Message 4');
        
        $test->removeMessage("test2");
        
        var_dump('<br />', $test->getAllMessages());
        
        $test2 = new Message();
        
        $test->addMessage("test1", 'Testing Message 1');
        $test->addMessage("test2", 'Testing Message 2');
        $test->addMessage("test3", 'Testing Message 3');
        $test->addMessage("test4", 'Testing Message 4');
        
        $test->removeMessage("test3");
        
        var_dump('<br />', $test->getAllMessages());
        
        
        $test3 = new SuccessMessage();
        
        $test->addMessage("test1", 'Testing Success Message 1');
        $test->addMessage("test2", 'Testing Success Message 2');
        $test->addMessage("test3", 'Testing Success Message 3');
        $test->addMessage("test4", 'Testing Success Message 4');
        
        $test->removeMessage("test1");
        
        var_dump('<br />', $test->getAllMessages());
        ?>
    </body>
</html>
