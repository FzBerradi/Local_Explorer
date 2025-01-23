# Explorateur Local : Application Web Basée sur l'Intelligence Artificielle

**Explorateur Local** est une application web sophistiquée qui fournit des recommandations d'activités personnalisées en fonction de la localisation, des conditions météorologiques et du moment. L'application utilise des technologies avancées telles que la géolocalisation, l'IA (GPT-3 ou GPT-4) et l'intégration de Google Maps pour offrir une expérience utilisateur fluide et intuitive.

## Fonctionnalités principales

1. **Géolocalisation et intégration des données météo**:
   - Utilise l'API de géolocalisation pour identifier la position actuelle de l'utilisateur.
   - Intègre une API météo pour accéder aux données météorologiques en temps réel de cet emplacement.

2. **Suggestions d'activités basées sur l'IA**:
   - Utilise GPT-3 ou GPT-4 pour générer des suggestions d'activités pertinentes en fonction de la météo et de l'heure.
   - Propose des activités variées, incluant des options intérieures et extérieures.

3. **Intégration de Google Maps**:
   - Affiche l'emplacement des activités suggérées sur une carte Google Maps.
   - Prend en compte les heures d'ouverture des activités et affiche des informations pertinentes.

4. **Suggestions dynamiques et uniques**:
   - Évite de répéter les mêmes suggestions d'activités.
   - Met à jour dynamiquement les recommandations en fonction des interactions de l'utilisateur.

5. **Interface utilisateur intuitive**:
   - Design simple et convivial permettant une navigation fluide.
   - Accessible à tous les niveaux de compétence technique.

---

## Prérequis

Avant de commencer, assurez-vous d'avoir installé les outils suivants :

- **Node.js** et **npm**
- **PHP** 
- **Composer** (gestionnaire de dépendances PHP)
- **MySQL** 
- **Clé API OpenWeatherMap** 
- **Clé API Google Maps**
- **Clé API OpenAI GPT-3 ou GPT-4** aussi On a utilise API Gemini car il est gratuit et pour eviter probleme de paiment

---

## Installation

### 1. Cloner le dépôt

Clonez le dépôt sur votre machine locale :

```bash
git clone https://github.com/FzBerradi/Local_Explorer.git
cd local_explorer
2. Installer les dépendances PHP
Installez les dépendances PHP avec Composer :

composer install
3. Installer les dépendances JavaScript
Installez les dépendances JavaScript avec npm :

npm install
4. Configurer l'environnement
Copiez le fichier .env.example en .env et modifiez les valeurs pour correspondre à votre configuration locale :
cp .env.example .env
Ouvrez le fichier .env et configurez les informations suivantes :
BASE DE DONNÉES :

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=local_explorer1
DB_USERNAME=root
DB_PASSWORD=mot_de_passe
Clé API OpenWeatherMap :

OPENWEATHERMAP_API_KEY=
Clé API Google Maps :

GOOGLE_MAPS_API_KEY=AIzaSyD8y_wg65OlyWvSn5vqnOtrKdoT614zBAg

Clé API Gemini (Google Studio AI)) :

Gemini_API_KEY=AIzaSyBX9uaDAlh9-gD5jyjn2WyCbiIv0lUlntI
5. Générer la clé d'application Laravel
Exécutez la commande suivante pour générer la clé d'application Laravel :

php artisan key:generate
6. Migration de la base de données
Exécutez les migrations pour créer les tables nécessaires dans la base de données :

php artisan migrate
7. Compiler les ressources JavaScript et CSS
Pour compiler les ressources en développement, utilisez la commande suivante :

npm run dev

8. Démarrer le serveur
Pour démarrer l'application en local, utilisez la commande suivante :

php artisan serve
Cela démarrera le serveur Laravel sur http://localhost:8000.

Utilisation de l'application
Accéder à l'interface : Ouvrez votre navigateur et accédez à http://localhost:8000.
Consulter les recommandations d'activités : L'application utilise votre géolocalisation pour vous proposer des activités en fonction de la météo et du moment.
Explorer les activités : Cliquez sur les activités proposées pour afficher des détails supplémentaires, voir leur emplacement sur Google Maps et obtenir des informations sur les horaires.
Dynamique : L'application ajuste les recommandations en temps réel en fonction de l'interaction de l'utilisateur et de l'évolution des conditions météorologiques.

### Explications supplémentaires :
- Ce fichier `README.md` contient **toutes les étapes nécessaires** pour démarrer l'application, de l'installation des services Docker à la configuration des API.
- Il couvre **l'installation des dépendances** (Node.js, PHP, Composer, Docker), la configuration des clés API externes nécessaires (OpenWeatherMap, Google Maps, Gemini), et le démarrage du projet via Docker.
