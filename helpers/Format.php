<?php
class Format {

    public function formatDate($date) {                     //format data
        return date('F j, Y, g:i a', strtotime($date));     //timestamp Unix
    }

    public function textShorten($text, $limit = 400) {      //scurtare text la 400 cuvinte
        $text = $text . " ";                               
        $text = substr($text, 0, $limit);                   //Returnează o parte a unui șir
        $text = substr($text, 0, strrpos($text, ' '));
        $text = $text . ".....";
        return $text;
    }

    public function validation($data) {     //validare
        $data = trim($data);                //returnare spatiu caractere
        $data = stripcslashes($data);       //remove backslashes dinaintea cuvintelor
        $data = htmlspecialchars($data);    //convertește unele caractere predefinite în entități HTML (&-amp, "-quot etc)
        return $data;
    }
}
?>