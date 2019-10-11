<?php 
    class Functions {
        private $id;
        private $title;
        private $imgAddress;
        private $content;
        private $categoryId;
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

        function setCategoryId($categoryId) {
            $this->categoryId = $categoryId;
        }

        function getCategoryId() {
            return $this->categoryId;
        }

        function setContent($content) {
            $this->content = $content;
        }

        function getContent() {
            return $this->content;
        }

        public function create() {
            $sql = 'INSERT INTO products (id, title, imgAddress, content, category_id) VALUES (null, ?, ?, ?, ?)';
            $stmt = $this->dbConn->prepare($sql);

            $stmt->bind_param('sssi', $this->title, $this->imgAddress, $this->content, $this->categoryId);

            if (!$stmt->execute()) {
                return false;
            } 
            return true;
        }

        public function getItemById() {
            $sql = 'select id, content from services where id=?';
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
            $sql = 'update services set content=? where id=?';
            $stmt = $this->dbConn->prepare($sql);
            $stmt->bind_param('si', $this->content, $this->id);
            if (!$stmt->execute()) {
                return false;
            }
            return true;
        }
    }
?>