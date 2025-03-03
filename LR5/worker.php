<?php
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/LR5/upload/';
    $types = [
      'application/vnd.ms-excel',
        'application/json',
        'text/xml',
        'application/xml'
    ];
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_FILES) {
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir);
        }
        $file = array_shift($_FILES);
        if (in_array($file['type'], $types)) {
            if (move_uploaded_file($file['tmp_name'], $uploadDir . $file['name'])) {
                echo "<a href = 'upload/{$file['name']}' download = '{$file['name']}'>Ссылка на скачивание файла";
    } else {
                echo 'Файл не был загружен';
            }
        } else {
            echo 'Неверный тип обрабатываемого файла';
        }
    }