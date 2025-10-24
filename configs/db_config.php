<?php   
   //Remote
   
     define("SERVER","localhost");
     define("USER","root");
     define("DATABASE","wdpf66_harun");
     define("PASSWORD","");


    //    define("SERVER","localhost");
    //  define("USER","harun");
    //  define("DATABASE","wdpf66_harun");
    //  define("PASSWORD","6587@;;");

   //Local
   
    //define("SERVER","localhost");
    //define("USER","root");//rajib
    //define("DATABASE","hosting");
    //define("PASSWORD","");

    $db=new mysqli(SERVER,USER,PASSWORD,DATABASE);
    $tx="core_";
    

?>