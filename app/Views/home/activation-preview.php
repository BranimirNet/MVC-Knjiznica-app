<main>
    <div class="form-box">
        <h2>Aktivacija računa</h2>

        <p>Kliknite ispod na link za aktivaciju računa</p>

        <p>
            <a href="index.php?page=activate&key=<?= $_SESSION['activation']['key'] ?>">Aktiviraj račun</a>
        </p>

        <form method="POST">
            <?php
            $receivername = $receiveremail = "";
            if(isset($_SESSION['activation']['ime']) && isset($_SESSION['activation']['prezime'])){
                $receivername = $_SESSION['activation']['ime']." ".$_SESSION['activation']['prezime'];
                $receiveremail=$_SESSION['activation']['email'];
            }
            ?>
            <input type="hidden" name="receivername" value="<?= $receivername ?>">
            <input type="hidden" name="email" value="<?= $receiveremail ?>">
             <button name="sendMail">Pošalji mail</button>
        </form>
    </div>
</main>