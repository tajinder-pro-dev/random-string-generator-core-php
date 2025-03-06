<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $length = isset($_POST['length']) ? (int)$_POST['length'] : 10;
    $case = isset($_POST['case']) ? $_POST['case'] : 'both';

    // Function to generate a random string
    function generateRandomString($length, $case) {
        $characters = '0123456789'; // Always include numbers
        
        if ($case == 'both') {
            $characters .= 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Add lowercase and uppercase
        } elseif ($case == 'lower') {
            $characters .= 'abcdefghijklmnopqrstuvwxyz'; // Add lowercase only
        } elseif ($case == 'upper') {
            $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Add uppercase only
        }
        
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        
        return $randomString;
    }

    // Generate random string based on form inputs
    $generatedString = generateRandomString($length, $case);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Random String</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Random String Generator</h1>

        <?php if (isset($generatedString)): ?>
            <div class="result">
                <h3>Generated String:</h3>
                <p><strong><?php echo htmlspecialchars($generatedString); ?></strong></p>
            </div>
        <?php endif; ?>
            <br>
        <a href="index.html">Go Back</a>
    </div>
</body>
</html>
