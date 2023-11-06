<?php

class Contact {
    private $id;
    private $subject;
    private $name;
    private $email;
    private $comments;

    public function __construct($id, $subject, $name, $email, $comments) {
        $this->id = $id;
        $this->subject = $subject;
        $this->name = $name;
        $this->email = $email;
        $this->comments = $comments;
    }

    public function getId() {
        return $this->id;
    }

    public function getSubject() {
        return $this->subject;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getComments() {
        return $this->comments;
    }
}

class ContactManager {
    private static $contacts = [];

    public static function loadContactsFromJson($jsonFilePath) {
        $jsonContent = file_get_contents($jsonFilePath);
        self::$contacts = json_decode($jsonContent, true);
    }

    public static function getContacts() {
        $contacts = [];
        
        foreach (self::$contacts as $contactData) {
            $contact = new Contact(
                $contactData['id'],
                $contactData['subject'],
                $contactData['name'],
                $contactData['email'],
                $contactData['comments']
                
            );

            $contacts[] = $contact;
        }
        return $contacts;
    }

    public static function getContactById($id) {
        foreach (self::$contacts as $contactData) {
            if ($contactData['id'] == $id) {
                return new Contact(
                    $contactData['id'],
                    $contactData['subject'],
                    $contactData['name'],
                    $contactData['email'],
                    $contactData['comments']
                );
            }
        }

        return null; // Contact not found
    }
}


ContactManager::loadContactsFromJson('../../data/contact.json');
?>
