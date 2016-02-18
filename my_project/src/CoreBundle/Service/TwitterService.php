<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 29/01/16
 * Time: 13:42
 */
namespace CoreBundle\Service;
use Abraham\TwitterOAuth\TwitterOAuth;
use CoreBundle\Manager\TwitterManager;
use CoreBundle\Manager\WallManager;

class TwitterService
{
    protected $twitterManager;
    protected $wallManager;

    public function __construct($consumer_key, $consumer_secret, TwitterManager $twitterManager , WallManager $wallManager)
    {
        $this->connection = new TwitterOAuth($consumer_key, $consumer_secret);
        $this->twitterManager = $twitterManager;
        $this->wallManager = $wallManager;
    }

    public function getUserProfile($acces_token, $acces_token_secret)
    {
        $this->connection->setOauthToken($acces_token, $acces_token_secret);
        return $this->connection->get('account/verify_credentials');
    }

    public function getTwitterSearch($option, $search, $since_id = "", $max_id = "")
    {
        return $this->connection->get("search/tweets",
            ["q" => $option.$search,
             "count" => 25,
             "since_id" => $since_id,
             "max_id" => $max_id,
        ]);
    }
    public function getWallTweet($opt , $wall)
    {
        $last = $this->twitterManager->findOneByLast('wall', $wall);
        if($last === NULL) {
            $firstElement = $this->getTwitterSearch($opt, $wall->getName())->statuses[0]->id;
            $this->twitterManager->insertTweets($this->getTwitterSearch($opt, $wall->getName(), "", $firstElement), $wall);
        } else {
            $tweets = $this->getTwitterSearch($opt, $wall->getName(), $last->getTwitterId());
            $this->twitterManager->insertTweets($tweets, $wall);
        }
    }
    public function getAllWallTweet()
    {
        $wall_all = $this->wallManager->findAll();
        $opt="";
        foreach($wall_all as $value) {
            if ($value->getType()->getId() == 1) {
                $opt = "#";
            } elseif ($value->getType()->getId() == 2) {
                $opt = "@";
            } else {
                $opt = "";
            }
            $this->getWallTweet($opt, $value);
        }
    }


}