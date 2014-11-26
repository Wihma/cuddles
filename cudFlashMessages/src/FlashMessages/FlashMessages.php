<?php

namespace Cuddles\CudFlashMessages;
/**
 * To attach comments-flow to a page or some content.
 *
 */
//implements \Anax\DI\IInjectionAware
class FlashMessages
{
    //use \Anax\DI\TInjectable;
    /**
     * View all comments.
     *
     * @return void
     */


    function __construct() {
        $this->view;
        //$this->messages = [];

        //array_push($this->classes, 'flashMessage');
    }
    /*public function initialize()
    {
        //$this->comments = new \Cuddles\CudRss\CudRss();
        //$this->comments->setDI($this->di);
        $this->view;
        $this->messages;
        $this->classes = [];

        array_push($this->classes, 'flashMessage');

    }*/

    public function setMessagemessages($message)
    {
        $this->messages = $message;
    }

    public function stringifyClasses ()
    {
        $classes;
        foreach ($this->classes as $key => $value) {
            $classes .= $value . ' ';
        }
        return $classes;
    }

    public function setMessages ($params = null)
    {
        $valid = false;
        if (isset($params['error'])) {
            $valid = true;
            $this->error($params['error']);
        } 
        if (isset($params['success'])) {
            $valid = true;
            $this->success($params['success']);
        }
        if (isset($params['warning'])) {
            $valid = true;
            $this->warning($params['warning']);
        }
        if (isset($params['notice'])) {
            $valid = true;
            $this->warning($params['notice']);
        }
       /* if (!$valid) {
            echo 'invalid valid message type';
        }*/
    }

    public function error ($params)
    {

        $params['classes'][] = 'flashMessage';
        $params['classes'][] = 'error';

        $this->classes = $params['classes'];
        $this->messages['error'] = ['message' => $params['message'], 'classes' => $this->stringifyClasses()];
    }

    public function success ($params)
    {
        $params['classes'][] = 'flashMessage';
        $params['classes'][] = 'success';

        $this->classes = $params['classes'];
        $this->messages['success'] = ['message' => $params['message'], 'classes' => $this->stringifyClasses()];
    }

    public function warning ($params)
    {
        $params['classes'][] = 'flashMessage';
        $params['classes'][] = 'warning';

        $this->classes = $params['classes'];
        $this->messages['warning'] = ['message' => $params['message'], 'classes' => $this->stringifyClasses()];
    }

    public function notice ($params)
    {
        $params['classes'][] = 'flashMessage';
        $params['classes'][] = 'notice';

        $this->classes = $params['classes'];
        $this->messages['notice'] = ['message' => $params['message'], 'classes' => $this->stringifyClasses()];
    }

    public function output ($type = null)
    {
        echo '<div class="'. $this->messages[$type]['classes'] . '">'. $this->messages[$type]['message'] .'</div>';
    }

    public function storeInSession ($type)
    {
        //session_name('flash_message');
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        
        $_SESSION['flash_message'] = '<div class="'. $this->messages[$type]['classes'] . '">'. $this->messages[$type]['message'] .'</div>';
    }

    public function getFromSession ()
    {
        //session_name('flash_message');
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        $messageObject = $_SESSION['flash_message'];

        $this->class = $messageObject->class;
        $this->messages  = $messageObject->messages;
        $this->view  = $messageObject->view;
    }
}