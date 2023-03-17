<div class="table-container"></div>
<h1 class="heading">File Information</h1>
<table class="table">
    <thead>
        <tr>
            <th>File Name</th>
            <th>File Size</th>
            <th>Owner</th>
            <th>Upload Date</th>
            <th>Upload Time</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <!-- GET THE FILES PRESENT IN THE DATABSE AND PUT THEM AS ROWS IN THIS TABLE -->
        <?php REQUIRE_ONCE 'get-users-file-info.php'?>
    </tbody>
</table>