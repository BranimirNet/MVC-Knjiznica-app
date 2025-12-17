<main>
    <div class="form-box">
        <h2>Račun uspješno aktiviran</h2>

        <p>
            Vaš račun je uspješno aktiviran.
            Za nekoliko sekundi bit ćete preusmjereni na stranicu za prijavu.
        </p>

        <p>
            Ako se redirekcija en dogodi automatski,
            <a href="index.php?page=login">kliknite ovdje</a>
        </p>
    </div>
</main>
<script>
    setTimeout(function (){
        window.location.href="index.php?page=login";
    },3000);
</script>