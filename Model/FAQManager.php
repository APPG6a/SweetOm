<?php
/**
 * Created by PhpStorm.
 * User: THEOPHILE
 * Date: 13/12/2017
 * Time: 17:30
 */

namespace SweetIt\SweetOm\Model;


class FAQManager extends Manager
{
    private $ID;
    private $Question;
    private $Response;

    /**
     * FAQManager constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->Question;
    }

    /**
     * @param mixed $Question
     */
    public function setQuestion($Question)
    {
        $this->Question = $Question;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->Response;
    }

    /**
     * @param mixed $Response
     */
    public function setResponse($Response)
    {
        $this->Response = $Response;
    }
}