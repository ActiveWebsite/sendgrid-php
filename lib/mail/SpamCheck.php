<?php namespace SendGrid\Mail;

class SpamCheck implements \JsonSerializable
{
    private $enable;
    private $threshold;
    private $post_to_url;

    public function __construct($enable=null, $threshold=null, $post_to_url=null)
    {
        if(isset($enable)) $this->setEnable($enable);
        if(isset($threshold)) $this->setThreshold($threshold);
        if(isset($post_to_url)) $this->setPostToUrl($post_to_url);
    }

    public function setEnable($enable)
    {
        $this->enable = $enable;
    }

    public function getEnable()
    {
        return $this->enable;
    }

    public function setThreshold($threshold)
    {
        $this->threshold = $threshold;
    }

    public function getThreshold()
    {
        return $this->threshold;
    }

    public function setPostToUrl($post_to_url)
    {
        $this->post_to_url = $post_to_url;
    }

    public function getPostToUrl()
    {
        return $this->post_to_url;
    }

    public function jsonSerialize()
    {
        return array_filter(
            [
                'enable'      => $this->getEnable(),
                'threshold'   => $this->getThreshold(),
                'post_to_url' => $this->getPostToUrl()
            ],
            function ($value) {
                return $value !== null;
            }
        ) ?: null;
    }
}