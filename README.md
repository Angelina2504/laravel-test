# Laravel Test Technique — Gestion de réservations immobilières

Application web de gestion de réservations immobilières développée dans le cadre d'un test technique, avec Laravel, Livewire, Filament et TailwindCSS.

## Technologies utilisées

- **Laravel 12** — framework PHP
- **Laravel Breeze** — authentification (login, register, logout)
- **Livewire Volt** — composants dynamiques sans rechargement de page
- **Filament v5** — panel d'administration
- **TailwindCSS 3** — styles et mise en page

## Prérequis

- PHP 8.3+
- Composer
- MySQL
- Node.js & NPM

## Installation

```bash
git clone https://github.com/Angelina2504/laravel-test.git
cd laravel-test
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Configure ta base de données dans `.env` puis :

```bash
php artisan migrate
php artisan db:seed
npm run dev
php artisan serve
```

## Comptes de test

Admin
admin@example.com
password

Utilisateur
test@example.com
password

## Fonctionnalités

- Authentification complète avec Laravel Breeze
- Affichage des propriétés disponibles sur le dashboard
- Réservation d'un bien avec dates et note via un composant Livewire
- Panel admin sur `/admin` accessible uniquement aux administrateurs
- Gestion des propriétés et réservations (CRUD) via Filament

## V.2 possible

- Landing page (login > dashboard), on pourrait imaginer une page qui présente les réservations et un bouton Connexion/Inscription
- Contrôle de surface (validation logique de formulaires, dates, champs obligatoires ou boutons désactivés)
- Validation sur les chevauchements de réservations (D1 -> D2, puis D3 -> D4 où D3 < D2)
- Confirmation de suppression d’une réservation (user), comme c’est fait côté admin avec Filament
- Style CSS Breeze par défaut, manque de personnalisation via TailwindCSS en V.1
- Détection d’une propriété déjà réservée
- Tests unitaires
