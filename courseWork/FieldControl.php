<?php

require_once 'interface.php';

class FieldControl implements Field
{
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli('localhost', 'root', '', "coursework");
        $this->conn->set_charset("utf8");
        mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
    }

    public function getFieldNames()
    {
        $sql = "SELECT name FROM field";
        $res = $this->conn->query($sql);
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                echo "<option value='{$row['name']}'>{$row['name']}</option>";
            }
        }
    }

    public function getFieldId(): string
    {
        $sql = "SELECT * FROM field";
        $res = $this->conn->query($sql);

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                if ($row['name'] == $_POST['field']) {
                    $fieldId = $row['id'];
                }
            }
        }

        return $fieldId;
    }

    public function getAllHashtagName()
    {
        $sql = "SELECT * FROM hashtag";
        $res = $this->conn->query($sql);
        $hashtagName = '';

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $hashtagName .= $row['name'] . " ";
            }
        }

        echo '<p>'.$hashtagName.'</p>';
    }

    public function deleteField()
    {
        if (!isset($_POST['delete'])) {
            echo '<p class="attention" >Слава богу, есть этот чекбокс, да?)</p>';
            return;   
        }
        $fieldId = $this->getFieldId();
        $this->conn->query("DELETE FROM `field` WHERE `id` = '$fieldId'");
        // echo "<br>тиипо удалил этот $fieldId в таблице филд<br> ";
        $this->deleteFieldHashtag($fieldId);
    }

    public function deleteFieldHashtag($fieldId)
    {
        $sql = "SELECT * FROM `field_#`";
        $res = $this->conn->query($sql);
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                if ($row['id_field'] == $fieldId) {
                    $this->deleteHashtag($row['id_#']);
                    $hashtagId = $row['id_#'];
                    $this->conn->query("DELETE FROM `field_#` WHERE `id_field` = '$fieldId' AND `id_#` = '$hashtagId'");
                    // echo "типо удалил ".$hashtagId." хэш и $fieldId облзна в табле филдхэш<br>";
                }
            }
        }
    }
    public function deleteHashtag(string $hashtagId)
    {
        $sql = "DELETE FROM `hashtag` WHERE `id` = '$hashtagId'";
        $this->conn->query($sql);
        // echo "тиипо удалил хэштег с айди $hashtagId в табле хэщ <br>";
    }
}