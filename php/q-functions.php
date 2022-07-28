<?php

        function connectToDB() {

                $host="127.0.0.1";
                $port=3306;
                $socket="";
                $user="root";
                $password="111111";
                $dbname="message_system";

                $con = new mysqli($host, $user, $password, $dbname, $port, $socket)
                        or die ('Could not connect to the database server' . mysqli_connect_error());

                return $con;
        }

        function addMessageToDB($con,$name,$email,$message,$type) {

                $messageid = getNextID($con);

                $query = "INSERT INTO message (messageid,fullname,email,messagebody,messagetype) VALUES ('$messageid', '$name', '$email', '$message', '$type')";

                if($result=mysqli_query($con,$query)) {
                        return true;
                } else {
                        die(mysql_error());
                        return false;
                }

        }

        function getNextID($con) {

                $query = "SELECT messageid FROM message ORDER BY messageid DESC LIMIT 1";

                $result = mysqli_query($con,$query) or die(mysql_error());
                
                $row = mysqli_fetch_assoc($result);

                $priorid = $row['messageid'];

                return $priorid + 1;

        }

?>

