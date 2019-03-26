<?php
$ishop = new mysqli("localhost","user1","user1pass","ishopdb");


$email =  "hariskido214@gmail.com";
$username  = "username";

function notification($email, $username){
        $pull2 = "SELECT businessinv.*, business.businessID FROM businessinv LEFT OUTER JOIN business ON businessinv.businessID = business.businessID";
        $pull = "SELECT * FROM json";
        $pull3 = "SELECT business.* FROM business LEFT OUTER JOIN businessinv ON business.businessID = businessinv.businessID";
        $val = mysqli_query($ishop, $pull, $pull2, $pull3) or die (mysqli_error($ishop));
        $num = mysqli_num_row($val);
        while ($r = mysqli_feth_array($val, MYSQLI_ASSOC)){
                $pd     = $r['product_description'];
                $pdn    = $r['product'];

               // $pc     = $r['postal_code'];
               // $zip    = $r['zipcode'];

                $rf     = $r['recalling_firm'];
                $br     = $r['brand'];

                $res    = $r['reason_for_recall'];
                $class  = $r['classification'];

               // if($zip == $pc){
                        if($pdn == $pd){
                                if($br == $rf){
                                        $output  = " ";
                                        $subject = 'You have new recalls!';
                                        $headers = 'From: ishopforbusiness@gmail.com' . "\r\n" .
                                                'Reply-To: ishopforbusiness@gmail.com' . "\r\n" .
                                                'X-Mailer: PHP/' . phpversion();

                                       // $username = $_SESSION['username'];
                                       
                                        $output .= "Greetings, ". $username. ". We have founds new recalls that need to be brought to your attention!"
                                        $output .= '$class';
                                        $output .= '$pd';
                                        $output .= '$rf';
                                        $output .= '$pc';
                                        $output .= '$res';
              
                                       // $email = $_SESSION['email'];
                                        mail($email, $subject, $output, $header);
                                        return 1;
                                }
                                else{
                                        return 0;
                                }
                        }
                        else{
                                return 0;
                        }
               // }
               // else{
                  //      return 0;
                //}
        }
}

?>
