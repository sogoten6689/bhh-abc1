<?php
    class MemberUtilies {
        public static function indexMember() {
            $string = file_get_contents("../data.json");
            return json_decode($string, true);
        }

        public static function storeMember($name, $number, $note, $status, $phone) {
            $data = MemberUtilies::indexMember();
            $row = array("name" => $name, "number" => $number, "status" => $status, "note" => $note, "phone" => $phone);
            array_push($data, $row);
            $fp = fopen('../data.json', 'w');
            fwrite($fp, json_encode($data));
            fclose($fp);
            return 'succeed';
        }
        
        public static function removeMember($phone) {
            $data = MemberUtilies::indexMember();

            foreach($data as $key => $val){
                if($val['phone'] == $phone){
                    array_splice($data, $key);
                }
            }

            $fp = fopen('../data.json', 'w');
            fwrite($fp, json_encode($data));
            fclose($fp);
            return 'succeed';
        }
        
        public static function randomMember() {
            $data = MemberUtilies::indexMember();
            $countAvilable = 0;
            foreach($data as $key => $val){
                if($val['status'] == 1){
                    $countAvilable+=1;
                }
            }
            $RandomNumber = rand(1, $countAvilable);
            foreach($data as $key => $val){
                if($RandomNumber == 1 && $val['status'] == 1){
                    $data[$key]['status'] = 2;
                    $fp = fopen('../data.json', 'w');
                    fwrite($fp, json_encode($data));
                    fclose($fp);
                    return $val;
                }
                if($val['status'] == 1){
                    $RandomNumber--;
                }
                
            }
            return 'succeed';
        }
        
        public static function reset() {
            $data = MemberUtilies::indexMember();
            foreach($data as $key => $val){
                if($val['status'] == 2){
                    $data[$key]['status'] = 1;
                }
            }
            
            $fp = fopen('../data.json', 'w');
            fwrite($fp, json_encode($data));
            fclose($fp);
            return 'succeed';
        }
    }
?>