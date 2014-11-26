<?php

//include "../src/Rss/CudRssController.php";

namespace Cuddles\CudRss;


require '../src/Rss/CudRssController.php';

 $CudRss = new CudRssController(); 

 $CudRss->error('Error Message');

 $CudRss->storeInSession();

 $CudRss->output();
 $CudRss->welcome();

//$hej = new CudRssController();


