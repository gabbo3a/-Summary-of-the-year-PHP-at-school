<?php namespace RegisterForm; ?>

<?php include_once 'services/connection.php';            use connection; ?>
<?php include_once 'components/PopUps/CorrectPopup.php'; use CorrectPopup; ?>
<?php include_once 'services/DBservices.php';            use DBservices; ?>

<?php function url() {
  return sprintf(
        "%s://%s%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME'],
        '/PresentazioneFinalePHP/exercises/ES3/services/freeEmail.php'
        );
    }
?>

<?php function RegisterForm() { ?>
    <?php extract(connection\getConn()); ?>
    
    <div class="container-fluid w-50 p-4">
        <?php if(!isset($_REQUEST['services'])) { ?>
            <form action="#" method="post" onsubmit="">
                
                <!-- Name & Surname -->
                <h4>Name, Surname, Email</h4>
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Name">
                    <input type="text" name="surname" class="form-control" placeholder="Surname">
                </div>
    
                <!-- Email -->
                <div class="mb-3">
                    <input
                    type="email" name="email" 
                    onkeyup="freeEmail('<?php echo url();?>', this.value, 'emailMsg', 'sub')"
                    class="form-control" placeholder="example@example.com"
                    >
                    <span id="emailMsg"></span>
                </div>

                <!-- Gender -->
                <h4>Gender</h4>
                <?php 
                    $radios = array(
                        array("value"=>"m", "text"=>"Male"),
                        array("value"=>"f", "text"=>"Female"),
                        array("value"=>"o", "text"=>"Other")
                    ); 
                ?>
                <?php foreach ($radios as $radio) { ?>
                    <div class="form-check form-check-inline mb-3">
                        <input class="form-check-input" type="radio" name="gender" value="<?php echo $radio['value'] ?>" checked>
                        <label class="form-check-label"><?php echo $radio['text'] ?></label>
                    </div>
                <?php } ?>

                <!-- Province -->
                <h4>Province</h4>
                <?php $result = $conn->query("SELECT * FROM provinces"); // Fetch provinces from db ?> 
                <select name="provice" class="form-select mb-3" required>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <option value="<?php echo $row["code"]?>"><?php echo $row["name"]?></option>
                    <?php } ?>
                </select>

                <!-- Lingue -->
                <h4>Lingue Parlate</h4>
                <?php $result = $conn->query("SELECT * FROM languages"); // Fetch languages from db ?>
                <div class="row align-items-start ps-4 pe-4">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <div class="form-check col-2">
                            <input type="checkbox" name="languagesCodes[]" class="form-check-input" value="<?php echo $row["code"]?>"><?php echo $row["name"]?></option>
                        </div>
                    <?php }?>
                </div>
                
                <!-- Favourite Color -->
                <h4>Favourite Color</h4>
                <div class="mb-3">
                    <input type="color" name="favColor" class="form-control">
                </div>

                <!-- Birth Date -->
                <h4>Birth Date</h4>
                <div class="mb-3">
                    <input type="date" name="birthDate" class="w-100">
                </div>

                <!-- Telephone Number -->
                <h4>Telephone</h4>
                <div class="mb-3">
                    <input type="tel" name="tel" class="form-control" placeholder="Telephone">
                </div>

                <!-- Password -->
                <h4>Password</h4>
                <div class="mb-3">
                    <input 
                    type="password" name="password" class="form-control" placeholder="Password" id="pass1"
                    onkeyup="checkPassword('pass1', 'pass2', 'ERROR_MESSAGE', 'sub')"
                    >
                    <input 
                    type="password" class="form-control" placeholder="Confirm Password" id="pass2"
                    onkeyup="checkPassword('pass1', 'pass2', 'ERROR_MESSAGE', 'sub')"
                    >
                    <span>
                        <input type="checkbox" class="form-check-input" onclick="showPassword('pass1','pass2')">
                        <label class="ms-2">Show Password</label>
                    </span>
                </div>
                <span id="ERROR_MESSAGE" style="color: red"></span> <!-- Error Message -->
                <!-- END Password -->
                
                <!-- Submit -->
                <div class="d-grid gap-2">
                    <input
                        id="sub"
                        type="submit" 
                        name="services" value="Registrati" 
                        class="btn btn-outline-primary"
                        disabled
                    >
                </div>
            </form>
        <?php } else { 
            // Register
            DBservices\register($_REQUEST);
            CorrectPopup\CorrectPopup('Yuo are register');
            header("Refresh:1, url=index.php?nextpage=login");
        } ?>
    </div>
<?php } ?>