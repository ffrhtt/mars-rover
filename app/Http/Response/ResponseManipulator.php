<?php

namespace App\Http\Response;

use Exception;
use Illuminate\Http\Request;

class ResponseManipulator
{
    private $state = "initial";
    private $heading;
    private $data;
    public function __construct(){

    }
    public function success($data=[])
    {
        $this->setData($data);
        $this->setState("success");
    }
    public function error(Exception $data)
    {
        //$this->setData($this->objectToArray($data->getTraceAsString()));
        $this->setData($data->getMessage());
        $this->setState("error");
    }
    public function toJson()
    {
        return json_encode([
            "state" =>$this->getState(),
            "head"  =>$this->heading,
            "data"  =>$this->objectToArray($this->getData())
        ]);
    }
    public function objectToArray($data){
        if (is_array($data) || is_object($data))
        {
            $result = [];
            foreach ($data as $key => $value)
            {
                $result[$key] = (is_array($data) || is_object($data)) ? $this->objectToArray($value) : $value;
            }
            return $result;
        }
        return $data;
    }

    /**
     * Get the value of state
     */ 
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * Get the value of heading
     */ 
    public function getHeading()
    {
        return $this->heading;
    }

    /**
     * Set the value of heading
     *
     * @return  self
     */ 
    public function setHeading($heading)
    {
        $this->heading = $heading;
    }

    /**
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */ 
    public function setData($data)
    {
        $this->data = $data;
    }
}
