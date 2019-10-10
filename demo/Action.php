<?php 
    class Action {
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

        function getId() {
            return $this->id;
        }

        function setContent($content) {
            $this->content = $content;
        }

        function getContent() {
            return $this->content;
        }

        public function create() {
            $sql = 'INSERT INTO tbl (id, content) VALUES (null, ?)';
            $stmt = $this->dbConn->prepare($sql);

            $stmt->bind_param('s', $this->content);

            if (!$stmt->execute()) {
                return false;
            } 
            return true;
        }

        public function getItemById() {
            $sql = 'select id, content from tbl where id=?';
            $stmt = $this->dbConn->prepare($sql);
            $stmt->bind_param('i', $this->id);
            if (!$stmt->execute()) {
                return false;
            }
            $stmt->bind_result($this->id, $this->content);
            $stmt->fetch();
            $item = array($this->id, $this->content);
            return $item;
        }

        public function update() {
            $sql = 'update tbl set content=? where id=?';
            $stmt = $this->dbConn->prepare($sql);
            $stmt->bind_param('si', $this->content, $this->id);
            if (!$stmt->execute()) {
                return false;
            }
            return true;
        }
    }
?>