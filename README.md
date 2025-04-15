<p align="center"><a href="https://www.facebook.com/lartfricain" target="_blank"><img src="public\images\lartfricain.jpg" width="400" alt="Laravel Logo"></a></p>

# Application de Gestion de Tâches

Une application web simple et efficace permettant de gérer vos tâches quotidiennes. Cette application offre toutes les fonctionnalités essentielles de gestion de tâches, incluant l'ajout, la modification, la suppression, ainsi que la restauration des tâches supprimées.

## Fonctionnalités

- **Authentification complète** : Création de compte et connexion sécurisée
- **Gestion des tâches** :
  - Créer de nouvelles tâches
  - Afficher la liste des tâches
  - Consulter les détails d'une tâche
  - Modifier une tâche existante
  - Supprimer une tâche (mise en corbeille)
- **Gestion de la corbeille** :
  - Afficher les tâches supprimées
  - Restaurer une tâche supprimée
  - Supprimer définitivement une tâche

## Prérequis

- PHP 8.0 ou supérieur
- Composer
- Base de données MySQL/MariaDB
- Serveur web (Apache/Nginx)

## Installation

1. Clonez le dépôt :
   ```
   git clone https://github.com/votre-nom/gestion-taches.git
   cd gestion-taches
   ```

2. Installez les dépendances :
   ```
   composer install
   ```

3. Copiez le fichier d'environnement :
   ```
   cp .env.example .env
   ```

4. Configurez votre fichier `.env` avec vos informations de base de données.

5. Générez la clé d'application :
   ```
   php artisan key:generate
   ```

6. Exécutez les migrations pour créer les tables nécessaires :
   ```
   php artisan migrate
   ```

7. Lancez le serveur de développement :
   ```
   php artisan serve
   ```

## Structure des routes

### Routes d'authentification

| Méthode | URI | Action | Nom de route |
|---------|-----|--------|-------------|
| GET | / | AuthController@login | login |
| POST | / | AuthController@store | store |
| GET | /register | AuthController@register | register |
| POST | /register | AuthController@storeRegister | storeRegister |
| GET | /logout | AuthController@logout | logout |

### Routes de gestion des tâches (protégées par authentification)

| Méthode | URI | Action | Nom de route |
|---------|-----|--------|-------------|
| GET | /tasks | TaskController@index | tasks.index |
| GET | /tasks/create | TaskController@create | tasks.create |
| POST | /tasks | TaskController@store | tasks.store |
| GET | /tasks/{task} | TaskController@show | tasks.show |
| GET | /tasks/{task}/edit | TaskController@edit | tasks.edit |
| PUT/PATCH | /tasks/{task} | TaskController@update | tasks.update |
| DELETE | /tasks/{task} | TaskController@destroy | tasks.destroy |
| GET | /Vos-tâches-supprimées | TaskController@tasksTrashed | tasksTrashed |
| PUT | /tasks/{id}/restaurer | TaskController@restore | restore |
| DELETE | /tasks/{id}/supprimer-définitivement | TaskController@forceDelete | forceDelete |

## Guide d'utilisation

### Création de compte et connexion

1. Accédez à la page d'accueil de l'application
2. Si vous n'avez pas encore de compte, cliquez sur "S'inscrire" et remplissez le formulaire
3. Une fois inscrit, connectez-vous avec vos identifiants

### Gestion des tâches

- **Ajouter une tâche** : Cliquez sur "Nouvelle tâche" et remplissez le formulaire
- **Voir toutes les tâches** : Accédez à la page d'accueil après connexion
- **Modifier une tâche** : Cliquez sur l'icône de modification à côté de la tâche concernée
- **Supprimer une tâche** : Cliquez sur l'icône de suppression
- **Voir les tâches supprimées** : Cliquez sur "Tâches supprimées" dans le menu

### Gestion de la corbeille

- **Restaurer une tâche** : Dans la liste des tâches supprimées, cliquez sur "Restaurer"
- **Supprimer définitivement** : Dans la liste des tâches supprimées, cliquez sur "Supprimer définitivement"

## Fonctionnement technique

Cette application utilise le framework Laravel et implémente le modèle de soft delete pour la gestion des tâches supprimées. Cela signifie que lorsqu'une tâche est "supprimée", elle est simplement marquée comme telle dans la base de données, mais reste récupérable jusqu'à sa suppression définitive.

### Contrôleurs principaux

- **AuthController** : Gère l'authentification (connexion, inscription, déconnexion)
- **TaskController** : Gère toutes les opérations liées aux tâches

## Sécurité

Toutes les routes de gestion des tâches sont protégées par un middleware d'authentification, ce qui signifie qu'un utilisateur doit être connecté pour accéder à ces fonctionnalités.
