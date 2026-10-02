# Portfolio PHP avec contact SMTP

Prérequis : PHP 8.4 avec OpenSSL, sessions et filter ; PHPMailer est inclus. GitHub Pages n’exécute pas PHP : ce dépôt doit être servi par un hébergement PHP.

```sh
php -S localhost:8000
```

Définir `SMTP_USERNAME` (adresse Gmail) et `SMTP_PASSWORD` (nouveau mot de passe d’application) sur le serveur, hors Git. Tant que ces variables ne sont pas configurées, le formulaire affiche son indisponibilité et propose l’adresse mail directe. Révoquer dans Google le mot de passe déjà exposé : cette correction ne le révoque pas et ne le supprime pas de l’historique.

Le formulaire utilise TLS vers Gmail sur le port 587, l’adresse SMTP comme expéditeur et l’adresse validée du visiteur comme Reply-To. Les champs sont contrôlés côté serveur ; un jeton de session protège les POST et un délai d’une minute sépare les envois réussis par session. Les erreurs SMTP détaillées ne sont pas affichées. Le contrôle par session ne remplace pas une limitation globale sur l’hébergement.

Le contenu reprend le portfolio statique corrigé avec CSS, images et CV locaux. Pour recompiler le CSS : `npm ci && npm run build`.

```sh
php -l index.php
php tests/test_mail.php
# Après démarrage du serveur local, sans identifiants SMTP :
TEST_URL=http://localhost:8000/ python3 tests/test_contact.py -v
TEST_URL=http://localhost:8000/ TEST_PHP=1 npm test
```

Pour les tests navigateur, installer Node.js 24 et Chromium avec `npm ci` puis `npx playwright install --with-deps chromium`. Les tests vérifient le rendu, la navigation, le CV, les validations, les jetons de session et l’absence de configuration SMTP ; ils n’envoient pas de mail réel. Un transport de test vérifie également la préparation du message MIME, les accents et les adresses expéditeur/Reply-To.

## Validation

Les tests couvrent les scénarios décrits ci-dessous. Ils vérifient la version corrigée ; ils ne garantissent pas tous les usages possibles.
