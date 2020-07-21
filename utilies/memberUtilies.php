<?php
    class MemberUtilies {
        public static function indexMember() {
            $string = file_get_contents("../data.json");
            return json_decode($string, true);
        }

        public function storeMember($name, $number, $note, $status) {
            $data = MemberUtilies::indexMember();
            $row = array("name" => $name, "number" => $number, "status" => $status, "note" => $note);
            array_push($data, $row);
            $fp = fopen('../data.json', 'w');
            fwrite($fp, json_encode($data));
            fclose($fp);
            return 'succeed';
        }
        
        public function removeMember($number) {
            $data = MemberUtilies::indexMember();

            foreach($data as $key => $val){
                if($val['number'] == $number){
                    unset($data[$key]);
                }
            }

            $fp = fopen('../data.json', 'w');
            fwrite($fp, json_encode($data));
            fclose($fp);
            return 'succeed';
        }
    }
?>