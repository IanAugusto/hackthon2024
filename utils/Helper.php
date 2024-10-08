<?php
class Helper {
    public static function sanitizeInput($data) {
        return htmlspecialchars(strip_tags($data));
    }
}
?>