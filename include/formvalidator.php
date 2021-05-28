<?php
    class userValidator {
        private string $title; 
        private string $date;
        private string $content;
        private string $author;
        private $errors = [];

        function __construct($title, $date, $content, $author){
            $this->title = $title;
            $this->date = $date;
            $this->content = $content;
            $this->author = $author;

        }

        
        public function validateTitle (){
            if (empty($this->title)) {
               $this->addError("title", "Title is required");
            } else {
                if (!preg_match("/^[a-zA-Z-' ]*$/", $this->title)) {
                    $this->addError("title", "Only letters and white space allowed");
                }
            }
        }
        public function validateDate (){
            if (empty($this->date)) {
                $this->addError("date", "Date is required");
            }
        }
        public function validateContent (){
            if (empty($this->content)) {
                $this->addError("content", "Content is required");
             } else {
                 if (!preg_match("/^[a-zA-Z-' ]*$/", $this->title)) {
                     $this->addError("content", "Only letters and white space allowed");
                 }
             }
        }
        public function validateAuthor (){
            if (empty($this->author))    {
                $this->addError("author", "Content is required");
             } else {
                 if (!preg_match("/^[a-zA-Z-' ]*$/", $this->author)) {
                     $this->addError("author", "Only letters and white space allowed");
                 }
             }
            
        }

        public function validateAll (){
            $this->validateTitle();
            $this->validateDate();
            $this->validateContent();
            $this->validateAuthor();
        }

        // will add the errors from methods above in error array
        public function addError ($key, $val){
            $this->errors[$key] = $val;

        }

         /**
         * Get the value of title
         */ 
        public function getTitle()
        {
                return $this->title;
        }
        public function getDate()
        {
                return $this->date;
        }
        public function getContent()
        {
                return $this->content;
        }
        public function getAuthor()
        {
                return $this->author;
        }
        public function getErrors(){
            return $this->errors;
        }


    }
    
?>