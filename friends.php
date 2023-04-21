<?php REQUIRE_ONCE 'template-html-components/header.php'?>
<body>
    <?php REQUIRE_ONCE 'template-html-components/navigation-bar.php'?>

    <section>
        <div class="container">
            <h1 class="heading">All Possible Users</p></h1>
            <!-- FILE INFORMATION -->
            <table class="table">
                <thead>
                    <!-- TABLE TITLERS -->
                    <tr>
                        <th>Username</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- GET THE INFORMATION FROM THE FRIENDSHIP TABLE IN THE DATABSE -->
                    <?php REQUIRE_ONCE 'template-html-components/friendship-table.php'?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>