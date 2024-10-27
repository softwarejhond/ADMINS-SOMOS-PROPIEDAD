<?php
                                                                            ini_set('display_errors', 1);
                                                                            ini_set('display_startup_errors', 1);
                                                                            error_reporting(E_ALL);

// Initialize the session
session_start();
    // Establecer tiempo de vida de la sesión en segundos
    $inactividad = 86400;
    // Comprobar si $_SESSION["timeout"] está establecida
    if(isset($_SESSION["timeout"])){
        // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
        $sessionTTL = time() - $_SESSION["timeout"];
        if($sessionTTL > $inactividad){
            header("location: main.php");
            exit;
        }
    }
    // El siguiente key se crea cuando se inicia sesión
    $_SESSION["timeout"] = time();
// Include config file
require_once "conexion.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese su usuario.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingrese su contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: main.php");
                        } else{
                            // Display an error message if password is not valid
                            echo '<div class="alert alert-danger alert-dismissable text-center" style="text-aling:center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Contraseña incorrecta</b></div>';
               
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
					echo '<div class="alert alert-danger alert-dismissable text-center" style="text-aling:center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Usuario no existe</b></div>';
                }
            } else{
                echo "Algo salió mal, por favor vuelve a intentarlo.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
include 'head.php';
?>

<body>
    <div id="wrapper">
        <div id="left">
            <div id="signin">
                <div class="logo">
                    <img src="images/logo.png" alt="logo" style="text-aling:center; width:200px">
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div>
                        <label style="color:#fff">Usuario ID:</label>
                        <div class="input-group-prepend">
                                <div class="input-group-text form-control-lg"><i class="fa fa-user" style="cursor:pointer ;"></i></div>
                           
                        <input type="number" name="username" placeholder="1234567890"
                            class="text-input text-center form-control-lg" />
                        </div>
                    </div>
                    <div>
                    <label style="color:#fff">Contraseña:</label>
                            <div class="input-group-prepend">
                                <div class="input-group-text form-control-lg" id="viewPassword"><i class="fa fa-eye" style="cursor:pointer ;"></i></div>
                           
                            <input type="password" name="password" class="text-input text-center form-control-lg w-100" id="password"
                                placeholder="Contraseña"> 
                                </div>
                       
                    </div>
                    <button type="submit" class="primary-btn btn-lg"><b><i class="fa-solid fa-right-to-bracket"></i> Iniciar sesión</b></button>
                </form>
            </div>
            <footer id="main-footer">
            <p class="text-center login__forgot"> <?php 
                              $queryCompany = mysqli_query($con,"SELECT nombre FROM company");
                              while ($empresaLog = mysqli_fetch_array($queryCompany)) {
                               echo '<label  class="card-text">'.$empresaLog['nombre'].'</label>';
        
                               }
                               ?></p><!--se otorga el copy a la empresa-->
                <p class="text-center login__forgot">SIVP &copy; Copyright <?php echo date("Y");?></p>
                <a href="https://agenciaeaglesoftware.com/" target="_blank" class="login__forgot">Made by Agencia de
                    Desarrollo
                    Eagle Software</a>
            </footer>
        </div>
        <div id="right">
            <div id="showcase">
                <div class="showcase-content">

                </div>
            </div>
        </div>
    </div>
</body>
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto:300');

* {
    box-sizing: border-box;
}

body {
    font-family: 'Roboto', sans-serif;
    font-weight: 300;
    color: #fff;
    overflow: hidden;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    font-weight: 300;
}

#wrapper {
    display: flex;
    flex-direction: row;
}

#left {
    display: flex;
    flex-direction: column;
    flex: 1;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-image:linear-gradient(rgba(18, 57, 96, 0.8), rgba(18, 57, 96, 0.8)), url(images/fondo.png);
    box-shadow: 0 50px 70px -10px rgba(18, 57, 96, 0.90);
    background-size: cover;
  
    
}


#right {
    flex: 1;
}

/* Sign In */
#signin {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 80%;
    padding-bottom: 1rem;
}

#signin form {
    width: 80%;
    padding-bottom: 3rem;
}

#signin .logo {
    margin-bottom: 5vh;
    margin-top: 5vh;
}

#signin .logo img {
    width: 300px;
}

#signin label {
    font-size: 0.9rem;
    line-height: 2rem;
    font-weight: 500;
}

#signin .text-input {
    margin-bottom: 1.3rem;
    width: 100%;
    border-radius: 2px;
    background: #181818;
    border: 1px solid #555;
    color: #ccc;
    padding: 0.5rem 1rem;
    line-height: 1.3rem;
    
}

#signin .primary-btn {
    width: 100%;
}

#signin .secondary-btn,
.or,
.links {
    width: 60%;
}

#signin .links a {
    display: block;
    color: #fff;
    text-decoration: none;
    margin-bottom: 1rem;
    text-align: center;
    font-size: 0.9rem;
}

#signin .or {
    display: flex;
    flex-direction: row;
    margin-bottom: 1.2rem;
    align-items: center;
}


#signin .or span {
    color: #fff;
    padding: 0 0.8rem;
}

/* Showcase */
#showcase {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    text-align: center;
}

.imageCycle1 {
    background: url(images/fondo1.png);
    background-repeat: no-repeat;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='images/logoColor.png', sizingMethod='scale');
    -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='images/logoColor.png',sizingMethod='scale')";
}




#showcase .showcase-text {
    font-size: 3rem;
    width: 100%;
    color: #F9DA5A;
    margin-bottom: 1.5rem;
}

#showcase .secondary-btn {
    width: 60%;
    margin: auto;
}

/* Footer */
#main-footer {
    color: #fff;
    text-align: center;
    font-size: 0.8rem;
    max-width: 80%;
    padding-top: 5rem;
}

#main-footer a {
    color: #fff;
    text-decoration: underline;
}

/* Button */
.primary-btn {
    padding: 0.7rem 1rem;
    height: 4rem;
    display: block;
    border: 0;
    border-radius: 40px;
    font-weight: 500;
    background: #FF0083;
    color: #ffffff;
    text-decoration: none;
    cursor: pointer;
    text-align: center;
    transition: all 0.5s;
}

.primary-btn:hover {
    background-color: #23f207;
    transition: all 0.5s;
    font-size: 24px;
    border-radius: 0px;
    color: #181818;
    
}
img{
    transition: all 0.5s;
    width: 210px;
}
.secondary-btn {
    padding: 0.7rem 1rem;
    height: 2.7rem;
    display: block;
    border: 1px solid #F9DA5A;
    border-radius: 2px;
    font-weight: 500;
    background: none;
    color: #F9DA5A;
    text-decoration: none;
    cursor: pointer;
    text-align: center;
    transition: all 0.5s;
}

.secondary-btn:hover {
    border-color: #F9DA5A;
    color: #F9DA5A;
}

/* Media Queries */
@media (min-width: 1200px) {
    #left {
        flex: 4;
    }

    #right {
        flex: 6;
    }
}

@media (max-width: 768px) {
    body {
        overflow: auto;
    }

    #right {
        display: none;
    }

    #left {
        justify-content: start;
        margin-top: 4vh;
    }

    #signin .logo {
        margin-bottom: 2vh;
    }

    #signin .text-input {
        margin-bottom: 0.7rem;
    }

    #main-footer {
        padding-top: 1rem;
    }
}
</style>
<script>
//funcion para imagenes aleatorias
$(document).ready(function() {
    var classCycle = ['imageCycle1', 'imageCycle1'];

    var randomNumber = Math.floor(Math.random() * classCycle.length);
    var classToAdd = classCycle[randomNumber];

    $('body').addClass(classToAdd);

});
</script>
<script>
    //view pass
let password = document.getElementById('password');
let viewPassword = document.getElementById('viewPassword');
let click = false;

viewPassword.addEventListener('click', (e) => {
    if (!click) {
        password.type = 'text'
        click = true
    } else if (click) {
        password.type = 'password'
        click = false
    }
})
</script>


</html>