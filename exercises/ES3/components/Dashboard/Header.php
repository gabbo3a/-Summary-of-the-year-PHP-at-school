<?php namespace Header; ?>

<?php function Header($title, $isLogged, $mode) { ?>
    <?php $tcolor = $mode === 'light'? 'dark': 'light' // text color?>
    <?php $header = $mode === 'light'? '#b3d1fe': '#000' ?>
    
    <nav 
    class="navbar sticky-top navbar-dark"
    style="background-color: <?php echo $header?>;"
    >
        <div class="container-fluid px-5">

            <!-- Left -->
            <a class="navbar-brand text-<?php echo $tcolor?>" href="#">  
                <img src="./assets/img/apple-touch-icon.png" width="50">
                <span class="fs-2">
                    <?php /* print title */ $title = isset($title) ? $title : 'Default'; echo $title; ?>
                </span>
            </a>

            <!-- Right -->
            <div>
                <form action="#" method="get">

                    <input
                        type="checkbox" class="btn-check" id="btn-check-2" autocomplete="off" 
                        onclick="setDarkMode(this)" 
                        <?php 
                            if (isset($_COOKIE['darkMode'])) 
                                echo $_COOKIE['darkMode'] == 'true' ? 'checked' : '' 
                        ?>
                    >
                    <label class="btn btn-primary" for="btn-check-2">
                        <?php if ($mode === 'dark') { ?>
                            <i class="bi bi-brightness-high"></i>
                        <?php } else { ?>
                            <i class="bi bi-moon"></i>
                        <?php } ?>
                    </label>
                    
                    <div class="btn-group">
                        <?php if (!$isLogged) { ?> 
                            <button type="submit" class="btn btn-primary" name="nextpage" value="login">Login</button>
                            <button type="submit" class="btn btn-primary" name="nextpage" value="register">Register</button>
                        <?php } else { ?>
                            <button type="submit" class="btn btn-primary" name="nextpage" value="logout">Logout</button>
                            <button type="submit" class="btn btn-primary" name="nextpage" value="home">Home</button>
                            <button type="submit" class="btn btn-primary" name="nextpage" value="database">Database</button>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
    </nav>
<?php } ?>




