<?php

$content = file_get_contents('../../data/contact.json');
$content = json_decode($content,true);

class ContactManager {
    private $content;

    public function __construct($jsonFilePath) {
        $content = file_get_contents($jsonFilePath);
        $this->content = json_decode($content, true);
    }

    public function getSize() {
        if (empty($this->content)) {
            return 0;
        } else {
            return count($this->content);
        }
    }

    public function getID($index) {
        return ($this->content[$index]['id']);
    }

    public function getSubject($index) {
        return ($this->content[$index]['subject']);
    }

    public function getName($index) {
        return ($this->content[$index]['name']);
    }

    public function getEmail($index) {
        return ($this->content[$index]['email']);
    }

    public function getComments($index) {
        return ($this->content[$index]['comments']);
    }
}

$jsonFilePath = '../../data/contact.json';
$contactManager = new ContactManager($jsonFilePath);

function getSize(){
    $jsonFilePath = '../../data/contact.json';
    $contactManager = new ContactManager($jsonFilePath);
    $size = $contactManager->getSize();
    return $size;
}

function getID($index){
    $jsonFilePath = '../../data/contact.json';
    $contactManager = new ContactManager($jsonFilePath);
    $id = $contactManager->getID($index);
    return $id;
}

function getSubject($index){
    $jsonFilePath = '../../data/contact.json';
    $contactManager = new ContactManager($jsonFilePath);
    $subject = $contactManager->getSubject($index);
    return $subject;
}

function getName($index){
    $jsonFilePath = '../../data/contact.json';
    $contactManager = new ContactManager($jsonFilePath);
    $name = $contactManager->getName($index);
    return $name;
}

function getEmail($index){
    $jsonFilePath = '../../data/contact.json';
    $contactManager = new ContactManager($jsonFilePath);
    $email = $contactManager->getEmail($index);
    return $email;
}

function getComments($index){
    $jsonFilePath = '../../data/contact.json';
    $contactManager = new ContactManager($jsonFilePath);
    $comment = $contactManager->getComments($index);
    return $comment;
}
?>


