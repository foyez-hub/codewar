<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cppCode = isset($_POST['cppCode']) ? $_POST['cppCode'] : '';
    $cppFile = isset($_FILES['cppFile']) ? $_FILES['cppFile'] : null;
    
    $uploadDir = 'uploads/'; // Define upload directory here

    if (!empty($cppCode) || ($cppFile && $cppFile['error'] === UPLOAD_ERR_OK)) {
        if (!empty($cppCode)) {
            // If code is pasted, create a temporary file with the code
            $fileName = 'temp.cpp';
            $uploadedFilePath = $fileName;
            file_put_contents($uploadedFilePath, $cppCode);
        } else {
            // If file is uploaded, process it
            $tmpName = $cppFile['tmp_name'];
            $fileName = basename($cppFile['name']);

            // Check if the uploaded file has a .cpp extension
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
            if ($fileExtension !== 'cpp') {
                echo "Error: Only C++ files (.cpp) are allowed.";
                exit;
            }

            // Move the uploaded file to a temporary location
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $uploadedFilePath = $uploadDir . $fileName;

            if (!move_uploaded_file($tmpName, $uploadedFilePath)) {
                echo "Error: Failed to move the uploaded file.";
                exit;
            }
        }

        // Compile and execute the uploaded C++ file
        $output = shell_exec("g++ -o " . escapeshellarg($uploadDir . 'compiled_program') . " " . escapeshellarg($uploadedFilePath) . " 2>&1");
        if (!$output) {
            $output = shell_exec(escapeshellarg($uploadDir . 'compiled_program') . " 2>&1");
        }

        echo nl2br($output);

        // Clean up temporary files
        unlink($uploadedFilePath);
        if (file_exists($uploadDir . 'compiled_program')) {
            unlink($uploadDir . 'compiled_program');
        }
    } else {
        echo "Error: No C++ code provided.";
    }
} else {
    echo "Error: Invalid request.";
}
?>
