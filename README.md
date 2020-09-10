# montournoi

## :pushpin: Note spéciale :
- Le projet est en cours de développement et n'est pas encore fonctionnel, seules quelques pages sont présentes sur le site de [démo](https://montournoi.org) mais nullement utilisable pour le moment !

## :sparkles: Explications
- Montournoi (https://montournoi.org) est une solution de gestion de tournoi unique proposant des fonctionnalités uniques :
  - Multisport (plusieurs activités simultanées possibles pour un même tournoi)
  - Multi-surfaces (gestion de la disponibilité des multiples aires de jeu pour chaque rencontre)
  - Affichage temps réel des résultats et classements, accessibles depuis le net

- Fonctionalités côté responsable de tournoi
  - Incription / connexion à l'application
  - Création et paramètrage d'un tournoi
  - Inscription des joueurs (ou équipes) par un responsable de tournoi (une inscription online sera proposée dans une version future)
  - En fonction du nombre de joueurs (ou équipes) présent(e)s, et des paramètres saisis par l'organisateur du tournoi, l'application va proposer de 1 à n poules et répartir les joueurs selon un tirage au sort dans chaque poules, en tenant compte éventuellement des éventuelles têtes de séries.
  
- Fonctionalités côté visiteur
  - Incription / connexion à l'application
  - Consultation de la liste des tournois publics en cours ou terminés (en accès libre)
  - Consultation de la liste des tournois privés en cours ou terminés (en accès limités par un code secret délivré par l'organisateur du tournoi)
  - Visualisation du tournoi sélectionné
  - Zapping entre les vues résultats / classements / poules / tableaux éliminatoires

## :rocket:	guide du Développeur

Assurez-vous d'avoir installé composer (https://getcomposer.org)

```bash
git clone git@github.com:didiou/montournoi.git
cd montournoi
composer validate
composer install
symfony server:start
```

Ouvrez votre navigateur à l'adresse http://localhost:8000
