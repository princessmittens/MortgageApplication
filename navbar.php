<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="signup_mor.php">SIGNUP</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login_emp.php">Emp login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login_mor.php">Mor login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="consent_status.php">Status</a>
            </li>

            <?php

            if(isset($_SESSION['userbrid'])||isset( $_SESSION['userempid']))
            {
                echo '<li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>';
            }

            ?>
        </ul>
    </div>
</nav>