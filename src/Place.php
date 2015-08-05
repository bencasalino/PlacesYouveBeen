<?php
    class Place
    {
        private $cityname;
        private $durationstayed;

        function __construct($cityname, $durationstayed)
        {
            $this->cityname = $cityname;
            $this->durationstayed = $durationstayed;
        }

        function setcityname($new_cityname)
        {
            $this->cityname = (string) $new_cityname;
        }

        function getcityname()
        {
            return $this->cityname;
        }

        function setdurationstayed($new_durationstayed)
        {
            $this->durationstayed = (float) $new_durationstayed;
        }

        function getdurationstayed()
        {
            return $this->durationstayed;
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
