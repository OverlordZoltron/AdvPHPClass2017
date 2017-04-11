<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        class Dog {
            public $name;
            public function __construct($name) {
               $this->name = $name;
            }
            
            public function bark(){
                echo $name .' is barking <br />';
            }
        }
        
        $aDog = 'Dog';
        
        $dog = new $aDog('Jimbo');
        
        
        ?>
    </body>
</html>
