<?php 
    class Submit {
        private $id;
        private $content;
        protected $dbConn;

        public function __construct() {
            require_once('DBConnect.php');
            $db = new DBConnect();
            $this->dbConn = $db->connect();
        }

        function setId($id) {
            $this->id = $id;
        }

        function setContent($content) {
            $this->content = $content;
        }

        function getId() {
            return $this->id;
        }

        function getContent() {
            return $this->content;
        }

        public function save() {
            $sql = 'insert into `tbl`(`id`, `content`) values (null, :content)';
            $stmt = $this->dbConn->prepare($sql);

            $stmt->bindParam(':content', $this->content);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>