<?php
/**
 * Description of TwitterService
 *
 * @author rvgud
 * Used to interact with Twitter API
 */
require_once('External\Twitter\TwitterAPIExchange.php');
require_once('Includes\Properties.php');
class TwitterService {
    /**
     * put your code here
     * @param String $hashtag value of the hashtag
     * get all the tweets associated with a hashtag provided
     */
    public function getTweetsByHashtag($hashtag)
    {
        //url to fetch all the tweets
        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        //mentioning the hashtag value
        $getfield = '?q=#'.$hashtag;
        //mentioning the request type method
        $requestMethod = 'GET';
        //setting the twitter app credentials
        $settings = array(
                            'oauth_access_token' => Properties::get("ACCESS_TOKEN"),
                            'oauth_access_token_secret' => Properties::get("ACCESS_TOKEN_SECRET"),
                            'consumer_key' => Properties::get("CONSUMER_KEY"),
                            'consumer_secret' => Properties::get("CONSUMER_SECRET")
                        );
        $twitter = new TwitterAPIExchange($settings);
        $data= $twitter->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest();
        //decode the json data into php variable
        $data=(array)@json_decode($data, false); 
        //statuses is having all the tweets
        return $data['statuses'];
    }
     /**
     * put your code here
     * @param String $hashtag value of the hashtag
     * filter the tweets according to their retweet count
     */
    public function getReTweetedTweetsByHashtag($hashtag)
    {
        try {
            $tweets=$this->getTweetsByHashtag($hashtag);
            //in case no tweet found for the hashtag
            if(empty($tweets)){
                throw new Exception("No tweet found for the hashtag:- #".$hashtag); 
            }
            $retweets=[];
            //filter the tweets accorig to their retweetcount and save in different array
            foreach ($tweets as $value) {
                if($value->retweet_count >0){
                    //create a new object and set the value required of a tweet.
                    $tweetdata=new stdClass();
                    $tweetdata->username=$value->user->name;
                    $tweetdata->userprofileimageurl=$value->user->profile_image_url_https;
                    $tweetdata->userscreenname=$value->user->screen_name;
                    $tweetdata->tweettext=$value->text;
                    $tweetdata->tweettime=$value->created_at;
                    array_push($retweets, $tweetdata);
                }
            }
            //in case no tweet is retweeted
            if(sizeof($retweets) == 0){
                throw new Exception("No retweeted tweet found for the hashtag:- #".$hashtag);
            }
            //return the retweeted tweets
            return $retweets;
        } 
        catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
