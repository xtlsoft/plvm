<?php
    /**
     * PLVM - PHP Language Virtual Machine
     * 
     * @author  Tianle Xu <xtl@xtlsoft.top>
     * @license MIT
     * @package PLP
     * 
     */

    namespace PL\VirtualMachine;

    class VM {

        protected $rules = [];

        public function addRule($name, $func){

            $this->rules[$name] = $func;

        }

        public function run($ast){

            $rslt = null;

            foreach($ast as $v){
                $r = $this->real($v);
                if($r !== null) $rslt = $r;
            }

            return $rslt;

        }

        public function real($ast){

            $type = $ast['type'];
            $data = $ast['data'];

            return call_user_func($this->rules[$type], $this, $data);

        }

    }