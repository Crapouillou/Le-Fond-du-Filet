<?php include 'layout/Header.php'; ?>
<main id="contact">

    
        <div class="contact-area">
            <h2>Contactez-nous</h2>
            <form method="POST" action="#" class="contact-form">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>

                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>

                <label for="subject">Sujet :</label>
                <input type="text" id="subject" name="subject" required>

                <label for="message">Message :</label>
                <textarea id="message" name="message" rows="5" required></textarea>

                <button type="submit">Envoyer</button>
            </form>
        </div>
    
</main>
<?php include 'layout/Footer.php'; ?>