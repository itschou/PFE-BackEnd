# (PFE - Laravel 10)


[![GitHub stars](https://img.shields.io/github/stars/itschou/PFE-FrontEnd)](https://github.com/itschou/PFE-FrontEnd/stargazers)
[![GitHub forks](https://img.shields.io/github/forks/itschou/PFE-FrontEnd)](https://github.com/itschou/PFE-FrontEnd/network)
[![GitHub issues](https://img.shields.io/github/issues/itschou/PFE-FrontEnd)](https://github.com/itschou/PFE-FrontEnd/issues)

Le projet est un site web basé sur ReactJS qui consomme une API Laravel 10. Ce site permet aux entreprises de chercher des fournisseurs pour les produits ou services qu'ils souhaitent acquérir. Il permet également aux fournisseurs de s'identifier, d'avoir des clients et de gérer leurs commandes.

## Fonctionnalités

### Entreprise

- Filtrer les fournisseurs en utilisant des catégories.
- Obtenir les informations des fournisseurs pour les contacter.
- Avoir un contact direct avec les fournisseurs.
- Accéder aux coordonnées des fournisseurs (adresse, e-mail, téléphone).
- Voir la disponibilité du stock des fournisseurs.

### Fournisseur

- S'enregistrer en tant que fournisseur.
- Pouvoir modifier la disponibilité de leur stock directement sur le site.

### Admin

- Accepter les nouveaux fournisseurs pour qu'ils apparaissent sur le tableau de bord des entreprises.

## Installation

1. Clonez ce dépôt : `git clone https://github.com/itschou/PFE-BackEnd.git`
2. Accédez au répertoire du projet : `cd PFE-BackEnd`
3. Installez les dépendances : `composer install`

## Configuration

1. Renommez le fichier `.env.example` en `.env` et modifiez les valeurs selon votre configuration.

## Utilisation

1. Générez une nouvelle clé d'application : `php artisan key:generate`
2. Lancez le serveur de développement : `php artisan serve`
3. Ouvrez votre navigateur et accédez à `http://localhost:8000`

## Contribution

Les contributions sont les bienvenues ! Voici comment vous pouvez contribuer :

1. Fork le projet.
2. Créez une branche pour votre fonctionnalité : `git checkout -b ma-nouvelle-fonctionnalite`
3. Faites vos modifications.
4. Committez vos changements : `git commit -m "Ajout d'une nouvelle fonctionnalité"`
5. Poussez la branche : `git push origin ma-nouvelle-fonctionnalite`
6. Ouvrez une Pull Request.

## Auteurs

- Chou - [Adresse e-mail](mailto:ouwoxpro@gmail.com)

## License

Ce projet est sous licence MIT. Pour plus d'informations, consultez le fichier [LICENSE](LICENSE).
