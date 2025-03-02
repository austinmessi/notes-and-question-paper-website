<?php
session_start();
include 'db.php';

if (!isset($_GET['id'])) {
    die("Invalid access.");
}

$file_id = $_GET['id'];
$stmt = $conn->prepare("SELECT file_path FROM documents WHERE id = ?");
$stmt->bind_param("i", $file_id);
$stmt->execute();
$result = $stmt->get_result();
$file = $result->fetch_assoc();

if (!$file) {
    die("File not found.");
}

$file_path = $file['file_path'];
$file_url = htmlspecialchars($file_path, ENT_QUOTES, 'UTF-8'); // Prevent XSS
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script> <!-- PDF.js -->
    <script src="security.js"></script> <!-- Prevent Copy/Screenshot -->
    <style>
        /* Prevent text selection and right-click */
        body {
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }

        .container {
            text-align: center;
            margin-top: 20px;
        }

        .pdf-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        canvas {
            margin-bottom: 10px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body oncontextmenu="return false;" onkeydown="return disableKeys(event)">

<div class="container">
    <h2>Document Viewer</h2>
    <div id="pdfContainer" class="pdf-container"></div> <!-- PDF Pages will be rendered here -->
</div>

<script>
    function disableKeys(event) {
        if (event.keyCode == 123 || // Prevent F12
            (event.ctrlKey && event.shiftKey && event.keyCode == 73) || // Prevent Ctrl+Shift+I
            (event.ctrlKey && event.keyCode == 83) || // Prevent Ctrl+S
            (event.ctrlKey && event.keyCode == 80)) { // Prevent Ctrl+P
            event.preventDefault();
        }
    }

    document.addEventListener("keydown", disableKeys);

    // Load and render entire PDF using PDF.js
    var url = "<?php echo $file_url; ?>";
    pdfjsLib.getDocument(url).promise.then(function(pdf) {
        var pdfContainer = document.getElementById("pdfContainer");

        for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
            pdf.getPage(pageNum).then(function(page) {
                var scale = 1.5;
                var viewport = page.getViewport({ scale: scale });

                var canvas = document.createElement("canvas");
                var context = canvas.getContext("2d");
                canvas.width = viewport.width;
                canvas.height = viewport.height;
                pdfContainer.appendChild(canvas);

                var renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };
                page.render(renderContext);
            });
        }
    });
</script>

</body>
</html>
