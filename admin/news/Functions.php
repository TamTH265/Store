<?php 
    class Functions {
        private $id;
        private $title;
        private $imgAddress;
        private $publicDate;
        private $content;
        protected $dbConn;

        public function __construct() {
            require_once('../DBConnect.php');
            $db = new DBConnect();
            $this->dbConn = $db->connect();
        }

        function setId($id) {
            $this->id = $id;
        }

        function getId() {
            return $this->id;
        }

        function setTitle($title) {
            $this->title = $title;
        }

        function getTitle() {
            return $this->title;
        }

        function setImgAddress($imgAddress) {
            $this->imgAddress = $imgAddress;
        }

        function getImgAddress() {
            return $this->imgAddress;
        }

        function setPublicDate($publicDate) {
            $this->publicDate = $publicDate;
        }

        function getPublicDate() {
            return $this->publicDate;
        }

        function setContent($content) {
            $this->content = $content;
        }

        function getContent() {
            return $this->content;
        }

        public function create() {
            $sql = 'INSERT INTO news (id, title, imgAddress, publicDate, content) VALUES (null, ?, ?, ?, ?)';
            $stmt = $this->dbConn->prepare($sql);

            $stmt->bind_param('ssss', $this->title, $this->imgAddress, $this->publicDate, $this->content);

            if (!$stmt->execute()) {
                return false;
            } 
            return true;
        }

        public function getItemById() {
            $sql = 'select id, title, imgAddress, publicDate, content from news where id=?';
            $stmt = $this->dbConn->prepare($sql);
            $stmt->bind_param('i', $this->id);
            if (!$stmt->execute()) {
                return false;
            }
            $stmt->bind_result($this->id, $this->title, $this->imgAddress, $this->publicDate, $this->content);
            $stmt->fetch();
            $item = array($this->id, $this->title, $this->imgAddress, $this->publicDate, $this->content);
            return $item;
        }

        public function update() {
            $sql = 'update news set title=?, imgAddress=?, publicDate=?, content=? where id=?';
            $stmt = $this->dbConn->prepare($sql);
            $stmt->bind_param('ssssi', $this->title, $this->imgAddress, $this->publicDate, $this->content, $this->id);
            if (!$stmt->execute()) {
                return false;
            }
            return true;
        }
    }
?>