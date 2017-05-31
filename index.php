<?php 
 /**
     * Service class s responsible for interaction with Twitter API.
     */
require_once("Services\TwitterService.php");
$tweetservice=new TwitterService();
$tweets=$tweetservice->getReTweetedTweetsByHashtag("custserv");
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ReTweetes</title>
        <link rel="stylesheet" href="main.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container-fluid">
        <?php
        foreach ($tweets as $value) {
            ?>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 tweetbox" >
                        <a class="account-group" href="http://twitter.com/<?php echo $value->userscreenname; ?>">
                            <img class="avatar" src="<?php echo $value->userprofileimageurl; ?>" alt="">
                            <span class="FullNameGroup">
                                <strong><?php echo $value->username; ?></strong>
                                @<?php echo $value->userscreenname; ?> 
                                at <?php echo $value->tweettime; ?>
                            </span>
                        </a>
                        <p>
                            <b>#custserv</b>
                        </p>
                        <p><?php echo $value->tweettext; ?></p>
                    </div>
                </div>
                
            <?php
        }
        ?>
       </div>
        
        
    </body>
</html>
