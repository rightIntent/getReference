<?php

/*------------------- Constants -------------------*/

// connection 
$conn = [
    'host' => 'localhost',
    'dbname' => 'reference',
    'root' => 'root',
    'password' => ''
];

$offer=[
    'ID',
    'F.I.SH',
    'Ishlayotgan fakultet, kafedra yoki bo’lim nomi',
    'Lavozimi',
    'Passport raqami',
    'Tug\'ilgan sanasi',
    'Kirgan sanasi',
    'Ketgan sanasi',
    'Holati'
 ];
 $student=[
     'ID',
     'F.I.Sh',
     'Fakulteti',
     'Yo\'nalishi',
     'Passport seriya va raqami',
     'Kursi',
     'Guruh',
     'Ta\'lim asosi',
     'Darajasi',
     'Tug\'ilgan sanasi',
     'Kirgan yili',
     'Ketgan yili',
     'Holati'   
 ];

    /*------------------- functions -------------------*/

    function add_slesh( $arr ) {
    $find = '';
    for ( $i = 0; $i < strlen( $arr ); $i++ ) {
        if ( $arr[$i] == "'" ) {
            $find .= '\\' . $arr[$i];
        } else {
            $find .= $arr[$i];
        }
    }
    return $find;
    }

    $category = explode('_', $_SESSION['category'])[0];
    
    class Events {

        public $pdo; 

        public function __construct()
        {
            $this-> pdo = new PDO('mysql:host=localhost;dbname=reference', 'root', ''); 
        }

        public function SELECT($table, $value){
            $sql = "SELECT * FROM $table WHERE `fullname` LIKE '%".$value."%' or `id`='" . $value . "'" ;
            $query = $this-> pdo-> prepare($sql);
            $query-> execute();
            return $query-> fetchAll(PDO::FETCH_ASSOC);
        }

        public function SELECTIF($tableState, $passport){

            $sql = "SELECT ts.*, f.name faculty, d.name direction FROM $tableState[0] ts JOIN directions d ON ts.faculty_id = d.faculty_id and ts.direction_id = d.direction_id JOIN facultys f ON f.faculty_id = d.faculty_id WHERE `passport` = '$passport' and `state` = '$tableState[1]'" ;
            $query = $this-> pdo-> prepare($sql);
            $query-> execute();
            return $query-> fetch(PDO::FETCH_ASSOC);
        }

        public function SELECTTOKEN($passport){
            $sql = "SELECT * FROM token where token_id = (select max(token_id) from token WHERE passport LIKE '$passport')";
            $query = $this-> pdo-> prepare($sql);
            $query-> execute();
            return $query-> fetch(PDO::FETCH_ASSOC);
        }

        public function SELECTJOIN($token_id){
            $tableSql = "SELECT typeref FROM `token` where token_id = '$token_id'";
            $getTable = $this -> pdo->prepare($tableSql);
            $getTable->execute();
            $table = $getTable -> fetch(PDO::FETCH_ASSOC);

            $table = explode('_', $table['typeref'])[0];

            $sql = "SELECT * FROM `token` t JOIN `$table` tb WHERE t.passport = tb.passport and t.token_id LIKE '$token_id'";
            $query = $this -> pdo->prepare($sql);
            $query -> execute();
            return $query->fetch(PDO::FETCH_ASSOC); 
        }

        public function INSERT( $table, $data ) {
            $key = array_keys($data);
            $string = implode( ',', $key );
            $value = ":". implode( ', :', $key );
            $sql = "INSERT INTO $table ($string) VALUES ($value)";
            $query = $this->pdo->prepare( $sql ); 
            $query->execute( $data );
        }

        public function DELETE($table, $id){
            $sql = "DELETE FROM $table WHERE id = '$id' ";
            $query = $this->pdo->prepare($sql);
            $query -> execute();
        }

        public function UPDATE($table, $row ){
            $keys = array_keys($row);
            $sql= "UPDATE `$table` SET"; 
            foreach($keys as $key){ $sql .= $key . '=' . "'" .$row[$key] . "'";};
            $sql .=  " WHERE `passport`=" . $row['passport'];
            $query=$this->pdo->prepare($sql);
            $query->execute();
        }
    };

?>
