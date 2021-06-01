<?php

class PremiumMember extends Member
{
    private $_inDoorInterests = array();
    private $_outDoorInterests = array();

    /**
     * grabs user-selected indoor array
     * @return array
     */
    public function getInDoorInterests()
    {
        return $this->_inDoorInterests;
    }

    /**
     * sets user selections to the indoor array
     * @param array $inDoorInterests
     */
    public function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * grabs user-selected outdoor array
     * @return array
     */
    public function getOutDoorInterests()
    {
        return $this->_outDoorInterests;
    }

    /**
     * sets user selections to the outdoor array
     * @param array $outDoorInterests
     */
    public function setOutDoorInterests($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }


}
