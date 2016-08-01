[:clipboard:](https://github.com/NMSFrance/ourdoc)

# No Man's Sky France API
API PHP qui sert les fronts. Elle utilise une base de donnée sous MySQL

# Prérequis
Docker : https://docs.docker.com/engine/installation/ (préférer l'installation avec VB)

# Installation

## Installer le projet
```
git clone git@github.com:NMSFrance/nmsfr-backend.git
```

## Setup de VB
- Aller sur l'interface de Virtual Box
- Aller dans la pannel de configuration de la machine `default`
- Aller dans la section `dossiers partagés`
- Ajouter un partage (icône sous forme de dossier avec un '+' vert, à droite du pannel)
- Chercher le chemin vers le dossier du projet `nmsfr-backend`
- Spécifier en nom `nmsfr`

## Setup Docker
- Ouvrir un shell
- `docker-machine start default` (si la machine n'était pas démarrée)
- `docker-machine ssh default`
- `cd /var/lib/boot2docker/`
- `sudo vi bootlocal.sh`

Dans le fichier, insérer les lignes suivantes :
```
mkdir /var/nmsfr
mount -t vboxsf nmsfr /var/nmsfr
```

- Sauvergarder le fichier
- `exit`
- `docker-machine restart default`

## Construction des containeurs Docker
- Aller dans le dossier du projet `nmsfr-backend` avec un shell
- `cd docker`
- `docker-compose build && docker-compose up -d`
- `docker exec -it docker_nmsfrbackend_1 /bin/bash`
- `php /usr/local/bin/composer.phar update`
- `exit`
- `docker exec -i docker_database_1 mysql -uroot -proot < ./conf/mysql/db.sql`

Les containeurs sont maintenant démarrés.
