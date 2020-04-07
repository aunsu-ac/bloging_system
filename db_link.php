<?php
/*
/*Database from
/* username=`aunsu`
/* password=`**********`...!
*/
        define("HOSTNAME","localhost");
        define("USERNAME","root");
        define("PASSWORD","");
        define("DBNAME","test_blog");

        $cnt = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME) or die("can not connect to database.");
?>