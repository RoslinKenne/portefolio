<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Zoyem Roslin KENNE</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #eef2f3;
            color: #2c3e50;
        }
        header {
            background: linear-gradient(90deg, #3498db, #2c3e50);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        nav {
            background-color: #2c3e50;
            padding: 1rem;
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }
        nav ul li {
            margin: 0 20px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }
        nav ul li a:hover {
            color: #3498db;
        }
        .content {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 60px;
        }
        .section {
            display: none;
        }
        .section.active {
            display: block;
        }
        h2 {
            color: #3498db;
            margin-bottom: 15px;
        }
        h3 {
            color: #2c3e50;
            margin-top: 20px;
        }
        ul {
            padding-left: 20px;
        }
        .skills-list, .projects-list {
            list-style: none;
            padding: 0;
        }
        .skills-list li, .projects-list li {
            background: #ecf0f1;
            margin: 5px 0;
            padding: 10px;
            border-radius: 3px;
        }
        .git-link {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }
        .git-link:hover {
            text-decoration: underline;
        }
        form input, form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        form button {
            background-color: #2c3e50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #3498db;
        }
        footer {
            text-align: center;
            padding: 1rem;
            background-color: #2c3e50;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <?php
    // Inclure PHPMailer
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'PHPMailer/src/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $success = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        $to = "zoyem.roslin.kenne@uqtr.ca";
        $subject = "Nouveau message de $name";
        $body = "Nom: $name\nEmail: $email\nMessage: $message";

        $mail = new PHPMailer(true);
        try {
            // Configuration SMTP pour Gmail
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kenneroslin5@gmail.com';
            $mail->Password = 'welxwkyvcwyiayod
'; // Remplacez par votre mot de passe d'application
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Expéditeur et destinataire
            $mail->setFrom($email, $name);
            $mail->addAddress($to);

            // Contenu de l'email
            $mail->isHTML(false);
            $mail->Subject = $subject;
            $mail->Body = $body;

            // Envoyer l'email
            $mail->send();
            $success = "Message envoyé avec succès !";
        } catch (Exception $e) {
            $success = "Erreur lors de l'envoi : " . $mail->ErrorInfo;
        }
    }
    ?>

    <header>
        <h1>Zoyem Roslin KENNE</h1>
        <p>Expert en Cybersécurité et Programmation</p>
    </header>

    <nav>
        <ul>
            <li><a data-section="about">À Propos</a></li>
            <li><a data-section="experience">Expérience</a></li>
            <li><a data-section="skills">Compétences</a></li>
            <li><a data-section="education">Formation</a></li>
            <li><a data-section="contact">Contact</a></li>
        </ul>
    </nav>

    <div class="content">
        <!-- Section À Propos -->
        <div id="about" class="section active">
            <h2>À Propos de Moi</h2>
            <p>Je suis Zoyem Roslin Kenne, un étudiant en informatique à l’Université de Trois-Rivières, passionné par la cybersécurité et le développement logiciel. Originaire de Bafoussam, au Cameroun, j’ai débuté mon parcours avec un Baccalauréat des Sciences Appliquées, suivi d’un Diplôme en Maintenance Informatique, avant de m’installer au Canada pour approfondir mes compétences.</p>
            <p>Mon expertise couvre plusieurs langages de programmation, dont Python, Java, C#, PHP, et JavaScript, ainsi que des frameworks comme React, Node.js et Angular. En cybersécurité, je me spécialise dans l’analyse des vulnérabilités, la protection des données et la sécurisation des infrastructures, avec une maîtrise d’outils comme Wireshark, Metasploit et Nmap.</p>
            <p>Mon objectif est de contribuer à un monde numérique plus sûr en développant des solutions robustes et en restant à la pointe des nouvelles technologies. En dehors de mes études, j’aime relever des défis comme les compétitions CTF, explorer des projets personnels en programmation, et m’impliquer dans des initiatives universitaires qui favorisent l’innovation.</p>
        </div>

        <!-- Section Expérience -->
        <div id="experience" class="section">
            <h2>Expérience</h2>
            <h3>Préposé à la plonge - Chartwell le duplexis, Trois-Rivières | Depuis 2023</h3>
            <p>Rôle consistant à assister dans les tâches de cuisine, démontrant une capacité d’adaptation et de travail en équipe.</p>

            <h3>Projets Académiques</h3>
            <ul class="projects-list">
                <li>
                    <strong>Développement d’un jeu de cartes en C# (Année 2)</strong><br>
                    Création d’un jeu de cartes interactif en C# avec une interface graphique développée à l’aide de Windows Forms. Implémentation des règles du jeu (ex. : gestion des tours, scores, victoire), gestion des événements utilisateur (clics, drag-and-drop), et affichage dynamique des cartes avec des animations simples. Projet réalisé dans le cadre d’un cours de programmation orientée objet.<br>
                    <a href="https://github.com/RoslinKenne/tp1groupe48-inf1035-masterfinal1.git" target="_blank" class="git-link">Lien GitHub</a>
                </li>
                <li>
                    <strong>Projet Game of Life en Python </strong><br>
                    Implémentation de l’automate cellulaire "Game of Life" de Conway en Python. Utilisation de la bibliothèque Pygame pour une interface graphique permettant de visualiser l’évolution des cellules. Optimisation des algorithmes pour gérer des grilles volumineuses, avec des fonctionnalités comme la pause, le redimensionnement et la personnalisation des règles initiales. Projet en cours dans le cadre d’un cours sur les algorithmes avancés.<br>
                    <a href="https://github.com/RoslinKenne/jeu-de-la-vie.git" target="_blank" class="git-link">Lien GitHub</a>
                </li>
                <li>
                    <strong>Site web pour les loisirs universitaires (Université de Trois-Rivières)</strong><br>
                    Développement d’un site web interactif en HTML, CSS, JavaScript et PHP pour promouvoir les événements et loisirs à l’Université de Trois-Rivières. Intégration d’une base de données MySQL pour stocker les informations sur les événements (dates, descriptions, inscriptions). Fonctionnalités incluant un calendrier dynamique, un formulaire d’inscription sécurisé et une interface responsive adaptée aux mobiles.<br>
                    <a href="https://github.com/zoyem-kenne/university-leisure-website" target="_blank" class="git-link">Lien GitHub</a>
                </li>
                <li>
                    <strong>Logiciel de location de bus (Projet académique)</strong><br>
                    Conception d’un logiciel en C# pour gérer les réservations et la flotte de bus. Développement d’une interface utilisateur intuitive avec Windows Forms, intégrant un système de gestion des disponibilités, des horaires et des paiements. Implémentation d’un sérialiseur/désérialiseur JSON pour sauvegarder et charger les données localement. Projet incluant des tests unitaires pour valider la robustesse du système.<br>
                    <a href="https://github.com/RoslinKenne/tp1g13-master.git" target="_blank" class="git-link">Lien GitHub</a>
                </li>
                <li>
                    <strong>Serialiseur/Désérialiseur JSON en Python </strong><br>
                    Développement d’un module permettant la conversion d’objets Python complexes en JSON et inversement. Implémentation de la gestion des types de données imbriqués, de la validation automatique des structures et de la gestion des erreurs pour éviter les incohérences, garantissant une sérialisation rapide et efficace. Projet réalisé dans le cadre d’un travail personnel pour améliorer la manipulation et l’échange de données entre applications.<br>
                    <a href="https://github.com/RoslinKenne/tp2inf1035g48-master.git" target="_blank" class="git-link">Lien GitHub</a>
                </li>
            </ul>
        </div>

        <!-- Section Compétences -->
        <div id="skills" class="section">
            <h2>Compétences</h2>
            <ul class="skills-list">
                <li>Langages de programmation (Python, Java, C, C#, HTML, CSS, PHP et JavaScript)</li>
                <li>Excellente connaissance des produits Microsoft et Apple</li>
                <li>Développement Web</li>
                <li>Cyber sécurité et protection des données</li>
                <li>Connaissance des normes de cyber sécurité (ISO 27001, RGPD)</li>
                <li>Tests et exploitation de failles via OWASP et DVWA (SQL Injection, XSS, CSRF, etc.)</li>
                <li>Vulnérabilités des protocoles et techniques d’attaque (MITM, spoofing, flooding, etc.)</li>
                <li>Composantes informatiques outils de diagnostics de panne</li>
                <li>Bonne connaissance de la méthodologie Agile</li>
            </ul>
        </div>

        <!-- Section Formation -->
        <div id="education" class="section">
            <h2>Formation</h2>
            <p>
                <strong>Baccalauréat en Informatique, spécialisation Cybersécurité</strong> - Université du Québec à Trois-Rivières (UQTR) | En cours (Début : 2022)<br>
                Programme complet axé sur la sécurité des systèmes, les réseaux, et le développement logiciel. Compétences acquises :<br>
                - <strong>Programmation orientée objet (C# / Java)</strong> : Étude des concepts fondamentaux (classes, héritage, polymorphisme, encapsulation), développement d’applications interactives et gestion de structures de données complexes.<br>
                - <strong>Développement web et bases de données</strong> : Conception d’applications web avec HTML, CSS, JavaScript, PHP, et utilisation de bases de données relationnelles (MySQL, PostgreSQL) avec requêtes SQL avancées.<br>
                - <strong>Sécurité informatique et cryptographie</strong> : Introduction au chiffrement symétrique/asymétrique, protocoles SSL/TLS, gestion des vulnérabilités et protection contre les attaques (SQL injection, XSS).<br>
                - <strong>Administration et réseautique</strong> : Configuration des réseaux (TCP/IP, routage), sécurisation via pare-feu et VPN.<br>
                - <strong>Développement logiciel et gestion de projet</strong> : Méthodes agiles (Scrum, Kanban), tests automatisés, et CI/CD.<br>
                - <strong>Algorithmique et intelligence artificielle</strong> : Structures de données avancées, algorithmes de tri/recherche, initiation à l’apprentissage automatique avec Python.<br>
                Projets académiques pratiques renforçant ces compétences techniques.
            </p>
            <p>
                <strong>Diplôme de Qualification Professionnelle en Maintenance Informatique</strong> - CEDIC, Bafoussam, Cameroun | 2021<br>
                Formation technique spécialisée dans la réparation, la maintenance et la configuration de matériel informatique. Acquisition de compétences en diagnostic de pannes, assemblage d’ordinateurs, et gestion des systèmes d’exploitation (Windows, Linux).
            </p>
            <p>
                <strong>Baccalauréat des Sciences Appliquées</strong> - Lycée Bilingue De Gouache, Bafoussam, Cameroun | 2021<br>
                Diplôme de fin d’études secondaires avec un accent sur les mathématiques, la physique et les sciences appliquées. Base solide pour mes études ultérieures en informatique et technologie.
            </p>
        </div>

        <!-- Section Contact -->
        <div id="contact" class="section">
            <h2>Contactez-moi</h2>
            <p>Téléphone : 438 836 1658</p>
            <p>Email : zoyem.roslin.kenne@uqtr.ca</p>
            <p>Localisation : Trois-Rivières</p>
            <?php if (isset($success)) echo "<p style='color: " . ($success === "Message envoyé avec succès !" ? "green" : "red") . ";'>$success</p>"; ?>
            <form method="POST">
                <input type="text" name="name" placeholder="Votre nom" required>
                <input type="email" name="email" placeholder="Votre email" required>
                <textarea name="message" placeholder="Votre message" rows="5" required></textarea>
                <button type="submit">Envoyer</button>
            </form>
        </div>
    </div>

    <footer>
        <p>© 2025 Zoyem Roslin KENNE</p>
    </footer>

    <script>
        // JavaScript pour gérer la navigation
        const links = document.querySelectorAll('nav a');
        const sections = document.querySelectorAll('.section');

        links.forEach(link => {
            link.addEventListener('click', function() {
                sections.forEach(section => {
                    section.classList.remove('active');
                });
                const sectionId = this.getAttribute('data-section');
                document.getElementById(sectionId).classList.add('active');
            });
        });
    </script>
</body>
</html>