<?php

/**
 * Description of Message
 *
 * @author 001031823
 */
class Message implements IMessage {
    
    protected $messages = [];
    
    public function addMessage($key, $msg) {
        $this->messages[$key] = $msg;
    }

    public function getAllMessages() {
        return $this->messages;
    }

    public function removeMessage($key) {
        if (array_key_exists($key, $this->messages)){
            unset($this->messages[$key]);
        }
    }

}
