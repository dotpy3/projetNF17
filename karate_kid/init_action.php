<?php
if (!isset($_FILES['file'])) {
	header('Location: init.php?error=noFile');
}