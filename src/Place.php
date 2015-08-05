<?php
    class Place
    {
        private $description;

        function __construct($description)
        {
            $this->description = $description;
        }

        function setDescription($new_description)
        {
            $this->description = (string) $new_description;
        }

        function getDescription()
        {
            return $this->description;
        }

        /* Save place in $_SESSION variable */

        function save()
        {
            array_push($_SESSION['list_of_places'], $this);
        }

        /* return the list of all of our places    */
        static function getAll()
        {
            return $_SESSION['list_of_places'];
        }

        // reset to blank array when delete
        static function deleteAll()
        {
            $_SESSION['list_of_places'] = array();
        }
    }
 ?>
