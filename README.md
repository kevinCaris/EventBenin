# 🎉 Plateforme de Gestion de Salles de Fêtes

## 📌 Description
Cette plateforme permet aux utilisateurs de rechercher, réserver et gérer des salles de fêtes pour divers événements. Elle offre une interface intuitive pour les administrateurs, les propriétaires et les clients.

## 🚀 Fonctionnalités principales
- 🔎 Recherche et réservation de salles
- 👤 Gestion des utilisateurs (admin, propriétaires, clients)
- 📅 Gestion des disponibilités et des paiements
- 🔔 Notifications et rappels automatisés
- ⚡ Composants interactifs avec **Livewire**

## 🛠️ Technologies utilisées
- **Backend** : Laravel + Livewire
- **Frontend** : Blade + TailwindCSS
- **Base de données** : MySQL
- **Conteneurisation** : Docker (optionnel)
- **Autres** : API REST, Alpine.js

## 🏗️ Installation et exécution

### 1️⃣ Cloner le projet
```bash
git clone https://github.com/kevinCaris/EventBenin.git
cd ton-projet
```
### 2️⃣ Installer les dépendances
```bash
composer install
npm install
```
### 3️⃣ Configurer l’environnement
Copier le fichier .env.example et le renommer en .env :
```bash
cp .env.example .env
```
Générer la clé d’application Laravel :
```bash
php artisan key:generate
```
Configurer la base de données dans le fichier .env, puis exécuter les migrations :

```bash
php artisan migrate --seed
```
### 4️⃣ Compiler les assets
```bash
npm run dev
```
### 5️⃣ Lancer le serveur
```bash
php artisan serve
```
###
Accéder à l'application via http://127.0.0.1:8000
