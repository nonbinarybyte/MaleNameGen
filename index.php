<?php // index.php

// Call the linkResource() function for the script/style resource!
function linkResource($type, $path) {
    if ($type === 'script') {
        echo "<script src=\"$path\"></script>\n";
    } elseif ($type === 'style') {
        echo "<link rel=\"stylesheet\" href=\"$path\">\n";
    }
}
linkResource('style', 'styles/index.css');

// Read names from the file, shuffle them, and display each name in an h2 tag
$fname = 'names.txt';
$names = file($fname, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
shuffle($names);

foreach ($names as $name) {
    echo "<h2>$name</h2>\n";
}

$nameCount = count($names);
if ($nameCount > 0) {
    echo "<h2>Total names: $nameCount</h2>\n";
} else {
    echo "<h2>No names found.</h2>\n";
}

// Display 5 names at a time. Navigate through pages using a 'page' query parameter.

$DisplayNamesPerPage = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] :
1;
$start = ($page - 1) * $DisplayNamesPerPage;
$end = $start + $DisplayNamesPerPage;
$displayedNames = array_slice($names, $start, $DisplayNamesPerPage);
foreach ($displayedNames as $name) {
    echo "<h2>$name</h2>\n";
}
if ($page > 1) {
    echo "<a href=\"?page=" . ($page - 1) . "\">Previous</a> ";
}
if ($end < $nameCount) {
    echo "<a href=\"?page=" . ($page + 1) . "\">Next</a>";
} else {
    echo "<h2>No more names to display.</h2>\n";
}
// Display the total number of names
echo "<h2>Total names: $nameCount</h2>\n";
// Display the current page number
echo "<h2>Current page: $page</h2>\n";
// Display the total number of pages
$totalPages = ceil($nameCount / $DisplayNamesPerPage);
echo "<h2>Total pages: $totalPages</h2>\n";
// Display a message if no names are found
if ($nameCount === 0) {
    echo "<h2>No names found.</h2>\n";
}



?>

<!DOCTYPE html>
<html>
    <head>
        <meta lang="en">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Name Generator</title>
    </head>
    <body></body>
</html>