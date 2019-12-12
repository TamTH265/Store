<?php 
    class Functions {
        private $id;
        private $title;
        private $imgAddress;
        private $content;
        private $categoryId;
        protected $dbConn;

        public function __construct() {
            require_once('../DBControl/DBConnect.php');
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
            $sql = 'select id, title, imgAddress, content, category_id from products where id=?';
            $stmt = $this->dbConn->prepare($sql);
            $stmt->bind_param('i', $this->id);
            if (!$stmt->execute()) {
                return false;
            }
            $stmt->bind_result($this->id, $this->title, $this->imgAddress, $this->content, $this->categoryId);
            $stmt->fetch();
            $item = array($this->id, $this->title, $this->imgAddress, $this->content, $this->categoryId);
            return $item;
        }

        public function update() {
            $sql = 'update products set title=?, imgAddress=?, content=?, category_id=? where id=?';
            $stmt = $this->dbConn->prepare($sql);
            $stmt->bind_param('ssssi', $this->title, $this->imgAddress, $this->content, $this->categoryId, $this->id);
            if (!$stmt->execute()) {
                return false;
            }
            return true;
        }
    }
?>