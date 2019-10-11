<?php
    //Default Values
    $nameError    = "";
    $pnError   = "";
    $emailError   = "";
    $genderError  = "";
    $websiteError = "";

    if(isset($_POST['Submit'])){

        //Name Validation
        if(empty($_POST["name"])){
            $nameError = "This field is required";
        }else{
            $name = Test_User_Input($_POST["name"]);
            //Accepts Letters and Whitespaces only
            if(!preg_match("/^[a-zA-Z\s.]+$/", $name)){
                $nameError = "Only letters and whitespace are allowed";
            }
        }

        //Phone Number Validation
        if(empty($_POST["phone"])){
            $pnError = "This field is required";
        }else{
            $phone = Test_User_Input($_POST["phone"]);
            //Accepts Numbers and Symbols only
            if(!preg_match("/^[0-9\-\(\)\/\+\s]*$/", $phone)){
                $pnError = "Invalid format";
            }
        }

        //Email Validation
        if(empty($_POST["email"])){
            $emailError = "This field is required";
        }else{
            $email = Test_User_Input($_POST["email"]);
            //Accepts Valid Email format only
            if(!preg_match("/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/", $email)){
                $emailError = "Invalid email format";
            }
        }

        //Gender Validation
        if(empty($_POST["gender"])){
            $genderError = "This field is required";
        }else{
            $gender = Test_User_Input($_POST["gender"]);
        }
        
        //Website Validation
        if(empty($_POST["website"])){
            $websiteError = "This field is required";
        }else{
            $website = Test_User_Input($_POST["website"]);
            if(!preg_match("%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu", $website)){
                $websiteError = "Invalid website address format";
            }
        }

        if(!empty($_POST["name"]) && !empty($_POST["phone"]) && !empty($_POST["email"]) && !empty($_POST["gender"]) && !empty($_POST["website"])){
            if((preg_match("/^[a-zA-Z\s]+$/", $name) == true) && (preg_match("/^[0-9\-\(\)\/\+\s]*$/", $phone) == true) && (preg_match("/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/", $email) == true) && (preg_match("%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu", $website)==true) ){
                echo "<div class='card-body border border-success mt-5' style='width: 50rem; margin:0 auto;'>";
                echo "<h2>Your Submitted Information</h2><br>";
                echo "Name: {$_POST["name"]}<br>";
                echo "Phone Number: {$_POST["phone"]}<br>";
                echo "Email: {$_POST["email"]}<br>";
                echo "Gender: {$_POST["gender"]}<br>";
                echo "Website: {$_POST["website"]}<br>";
                echo "Comments: {$_POST["comment"]}<br>";
                echo "</div>";
            } else {
                echo "Please complete the information";
            }
        }
    }

    


    function Test_User_Input($data){
        return $data;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Form Validation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    
    <div class="card mt-4"  style="width: 50rem; margin:0 auto;">
        <div class="card-header">
            PHP FORM VALIDATION
        </div>
        <div class="card-body">
            <form action="index.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="name">Name</label><span class="text-danger ml-1">* <i><?php echo $nameError; ?></i></span>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="phone">Phone Number</label><span class="text-danger ml-1">* <i><?php echo $pnError; ?></i></span>
                        <input type="text" name="phone" class="form-control" id="phone">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="email">Email</label><span class="text-danger ml-1">* <i><?php echo $emailError; ?></i></span>
                        <input type="text" name="email" class="form-control" id="email">
                    </div>
                    <div class="col-md-12">
                        <label for="gender">Gender</label><span class="text-danger ml-1">* <i><?php echo $genderError; ?></i></span>                        
                    </div>
                    <div class="form-group col-md-12">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="male" name="gender" value="Male" class="custom-control-input">
                            <label class="custom-control-label" for="male">Male</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="female" name="gender" value="Female" class="custom-control-input">
                            <label class="custom-control-label" for="female">Female</label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="website">Website</label><span class="text-danger ml-1">* <i><?php echo $websiteError; ?></i></span>
                        <input type="text" class="form-control" name="website" id="website">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="comment">Comment</label>
                        <textarea name="comment" id="comment" cols="3" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-primary btn-sm" name="Submit" value="Submit Form">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>