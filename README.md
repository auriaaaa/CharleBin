# CharleBin 🔒

**CharleBin** est une application de partage de secrets chiffrés de bout en bout, basée sur PrivateBin. Elle permet de partager des messages textuels de manière sécurisée via un lien unique, sans que le serveur n'ait jamais accès au contenu en clair.

## 🎯 Fonctionnalités principales

- **Chiffrement zero-knowledge** : Le message est chiffré dans votre navigateur avant d'être envoyé au serveur
- **Partage par lien unique** : Génération d'un lien sécurisé pour partager votre secret
- **Auto-destruction** : Option de suppression automatique après lecture
- **Discussions** : Possibilité d'activer les commentaires sur un message
- **Protection par mot de passe** : Ajout optionnel d'un mot de passe supplémentaire
- **Expiration configurable** : Définissez la durée de vie de vos messages
- **Interface multilingue** : Support de plusieurs langues (français par défaut)
- **QR Code** : Génération de QR codes pour faciliter le partage

## 🚀 Installation

### Prérequis

- PHP 7.4 ou supérieur
- Serveur web (Apache, Nginx, etc.)
- Extensions PHP : `gd`, `zlib`, `json`

### Configuration rapide

1. **Clonez ou téléchargez le projet**
   ```bash
   git clone [url-du-repo] charlebin
   cd charlebin
   ```

2. **Configurez les permissions**
   ```bash
   chmod 700 data
   chmod 600 cfg/conf.php
   ```

3. **Configurez votre serveur web**
   
   Pointez le document root vers le dossier de l'application et assurez-vous que `.htaccess` est bien pris en compte (pour Apache).

4. **Accédez à l'application**
   
   Ouvrez votre navigateur et accédez à l'URL de votre installation.

## ⚙️ Configuration

Le fichier de configuration principal se trouve dans `cfg/conf.php`. Vous pouvez également définir un chemin personnalisé via la variable d'environnement `CONFIG_PATH`.

### Options principales

```ini
[main]
name = CharleBin                    ; Nom de l'application
discussion = true                   ; Activer les discussions
password = true                     ; Autoriser la protection par mot de passe
fileupload = false                  ; Upload de fichiers (désactivé par défaut)
sizelimit = 10485760               ; Taille max (10 MB)
languagedefault = fr               ; Langue par défaut
qrcode = true                      ; Générer des QR codes
compression = zlib                 ; Compression des données
```

### Options d'expiration

Les durées d'expiration disponibles par défaut :

- 5 minutes
- 10 minutes
- 30 minutes
- 1 heure
- 1 jour
- 1 semaine
- 1 mois (par défaut)
- 1 an
- Jamais

### Stockage des données

CharleBin supporte plusieurs backends de stockage :

- **Filesystem** (par défaut) : Stockage dans le dossier `data/`
- **Database** : MySQL, PostgreSQL, SQLite
- **GoogleCloudStorage** : Google Cloud Storage
- **S3Storage** : Amazon S3 ou compatible

Configuration pour base de données :
```ini
[model]
class = Database

[model_options]
dsn = "mysql:host=localhost;dbname=charlebin"
usr = "username"
pwd = "password"
```

## 🔐 Sécurité

### Principe du zero-knowledge

CharleBin utilise le chiffrement côté client (dans le navigateur) :

1. Le message est chiffré avec AES-256 avant l'envoi
2. La clé de chiffrement reste dans l'URL (après le `#`) et n'est jamais transmise au serveur
3. Le serveur ne stocke que le message chiffré
4. Seul le destinataire possédant le lien complet peut déchiffrer le message

## 📊 Limitation du trafic

Protection contre les abus avec limitation du nombre de requêtes :

```ini
[traffic]
limit = 10                         ; Nombre de posts par période
exempted = 192.168.1.0/24         ; IPs exemptées
```

## 🧹 Purge automatique

Configuration de la suppression automatique des messages expirés :

```ini
[purge]
limit = 300                        ; Délai minimum entre deux purges (secondes)
batchsize = 10                     ; Nombre de suppressions par lot
```

## 📝 Utilisation

### Créer un secret

1. Tapez ou collez votre message dans la zone de texte
2. Choisissez les options (expiration, mot de passe, etc.)
3. Cliquez sur "Envoyer"
4. Partagez le lien généré avec votre destinataire

### Lire un secret

1. Ouvrez le lien reçu
2. Entrez le mot de passe si nécessaire
3. Le message se déchiffre automatiquement dans votre navigateur

## 🤝 Support et contribution

CharleBin est basé sur [PrivateBin](https://privatebin.info/), un projet open-source sous licence zlib/libpng.

Pour plus d'informations sur PrivateBin :
- [GitHub](https://github.com/Jordan-Vigneulle/CharlBin)

## 📄 Licence

Ce projet utilise la licence zlib/libpng. Voir le projet original PrivateBin pour plus de détails.

## ⚠️ Avertissement

Bien que CharleBin utilise un chiffrement robuste, aucun système n'est infaillible. N'utilisez pas cette application pour des informations ultra-sensibles sans comprendre les risques. Assurez-vous d'utiliser HTTPS et de partager les liens de manière sécurisée.

---