Plateforme Web de Mise en Relation Clients – Prestataires
📌 Contexte et objectif

Le projet vise à développer une plateforme web permettant la mise en relation entre clients recherchant un service (plombier, coiffeur, peintre, etc.) et prestataires proposant ces services.
👉 L’objectif est de faciliter la recherche, la réservation et la validation des prestations via un système de points transférés au prestataire lorsque le client valide le travail effectué.

👥 Acteurs du système

Client : recherche un service, crée une demande, valide la prestation.

Prestataire : propose ses services, accepte/refuse une demande, exécute le travail.

Administrateur : supervise la plateforme, gère les utilisateurs, services et transactions.

🖥️ Structure du site

Accueil (présentation + accès rapide aux services)

Inscription / Connexion

Tableau de bord (Client / Prestataire)

Catalogue des services (filtres, recherche)

Profil utilisateur

Création de demande

Historique des transactions

Administration (gestion utilisateurs, services, litiges)

⚙️ Fonctionnalités principales

Authentification sécurisée (rôles : client, prestataire, admin)

Catalogue des services avec recherche et filtres

Gestion des demandes (création, acceptation, suivi)

Système de points (attribution, transfert automatique, historique)

Évaluations (notes + commentaires clients)

Tableau d’administration complet

🛠️ Exigences techniques

Backend : Symfony 7

Frontend : Twig + JavaScript

Base de données : MySQL

Sécurité : hashage des mots de passe, rôles utilisateurs

Accessibilité : responsive (PC, mobile, tablette)

Déploiement : GitHub, Netlify (frontend), Railway/Render (backend)

🗄️ Modèle de données simplifié

User (id, nom, email, mot_de_passe, rôle, points)

Service (id, nom, description)

Job (id, client_id, prestataire_id, service_id, statut, date)

Transaction (id, job_id, montant, date)

Review (id, job_id, note, commentaire)

👩‍💻 Organisation de l’équipe

Mariem Saidani – Scrum Master : coordination et suivi du projet

Anwar Zrelly – Gestion Trello : organisation des tâches

Ahmed Mefteh – Développeur : backend (Symfony), base de données

Oumaima Mkhinini – UI/UX Designer : maquettes (Figma), ergonomie

Azza Lotfi – Développeuse / Intégration : gestion GitHub, intégration frontend + tests

🚀 Méthodologie de travail

Méthode Agile Scrum avec sprints de 2 semaines et outils : Trello, GitHub, Figma.

Sprint 1 : Authentification + recherche de services

Sprint 2 : Gestion des demandes + profils

Sprint 3 : Système de points + avis + déploiement final

✅ Critères de validation

Inscription/connexion réussies

Recherche de services + consultation des prestataires

Création et gestion des demandes (client & prestataire)

Transfert automatique des points

Notation et commentaires des prestataires
