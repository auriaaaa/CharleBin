# Guide de Contribution - CharleBin

## 📋 Table des matières

1. [Code de conduite](#code-de-conduite)
2. [Comment contribuer](#comment-contribuer)
3. [Processus de Pull Request](#processus-de-pull-request)
4. [Standards de code](#standards-de-code)
5. [Convention de nommage](#convention-de-nommage)
6. [Tests](#tests)


---

## 🚀 Comment contribuer

### 1. Forker le projet

Créez votre propre fork du repository CharleBin.

### 2. Créer une branche

Créez une branche pour votre fonctionnalité ou correction :

```bash
git checkout -b feature/ma-nouvelle-fonctionnalite
```

**Convention de nommage des branches :**
- `feature/description` : pour les nouvelles fonctionnalités
- `fix/description` : pour les corrections de bugs
- `docs/description` : pour la documentation
- `refactor/description` : pour le refactoring
- `test/description` : pour les tests

### 3. Développer

- Écrivez du code clair et maintenable
- Commentez les parties complexes
- Suivez les standards de code (voir ci-dessous)

### 4. Tester

Testez votre code localement avant de soumettre :
- Vérifiez qu'il n'y a pas d'erreurs PHP
- Testez les fonctionnalités dans différents navigateurs
- Assurez-vous que les tests existants passent

### 5. Commiter

Utilisez des messages de commit clairs et descriptifs :

```bash
git commit -m "feat: ajout de la fonctionnalité X"
git commit -m "fix: correction du bug Y"
git commit -m "docs: mise à jour du README"
```

**Convention des commits :**
- `feat:` nouvelle fonctionnalité
- `fix:` correction de bug
- `docs:` documentation
- `style:` formatage, points-virgules manquants, etc.
- `refactor:` refactoring du code
- `test:` ajout de tests
- `chore:` tâches de maintenance

### 6. Pusher

```bash
git push origin feature/ma-nouvelle-fonctionnalite
```

### 7. Ouvrir une Pull Request

Ouvrez une PR depuis votre fork vers la branche `main` de CharleBin.

---

## 🔄 Processus de Pull Request

### Avant de soumettre une PR

- [ ] Votre code respecte les standards de code
- [ ] Vous avez testé localement
- [ ] Vous avez mis à jour la documentation si nécessaire
- [ ] Votre branche est à jour avec `main`
- [ ] Les linters passent sans erreur
- [ ] Vous avez rempli le template de PR

### Template de PR

Utilisez le template fourni (`.github/PULL_REQUEST_TEMPLATE.md`) qui inclut :
- Description des changements
- Type de changement
- Checklist de validation
- Tests effectués
- Captures d'écran si applicable

### Revue de code

- Au moins une approbation est requise
- Les commentaires doivent être résolus
- Les tests automatiques doivent passer
- Pas de conflits avec la branche `main`

### Merge

Une fois approuvée, votre PR sera mergée par un mainteneur du projet.

---

## 💻 Standards de code

### PHP

- **Version** : PHP 7.0+
- **Standard** : PSR-12
- Indentation : 4 espaces
- Pas de balise PHP fermante `?>` dans les fichiers purement PHP
- Une classe par fichier

**Exemple :**
```php
<?php

namespace CharleBin;

class MaClasse
{
    private $propriete;

    public function maMethode($parametre)
    {
        if ($condition) {
            // Code ici
        }
        
        return $resultat;
    }
}
```

### JavaScript

- Indentation : 2 espaces
- Utiliser `const` et `let`, pas `var`
- Point-virgules obligatoires
- Quotes simples pour les chaînes

**Exemple :**
```javascript
const maFonction = (param) => {
  if (condition) {
    console.log('Message');
  }
  return resultat;
};
```

### CSS

- Indentation : 2 espaces
- Propriétés en ordre alphabétique
- Utiliser des classes sémantiques

---

## 🏷️ Convention de nommage

### Variables et fonctions
- PHP : `camelCase` ou `snake_case` selon PSR-12
- JavaScript : `camelCase`

### Classes
- `PascalCase`

### Constantes
- `UPPERCASE_SNAKE_CASE`

### Fichiers
- Classes : `PascalCase.php`
- Autres : `lowercase-kebab-case.php`

---

## 🧪 Tests

### Linters

Avant de soumettre votre code, exécutez les linters :

**PHP (si configuré) :**
```bash
# PHP_CodeSniffer
phpcs --standard=PSR12 lib/
```

**JavaScript (si configuré) :**
```bash
# ESLint
eslint js/
```

### Tests manuels

Testez votre code dans :
- Chrome/Chromium
- Firefox
- Safari (si possible)

Vérifiez :
- Le chiffrement/déchiffrement fonctionne
- Pas d'erreurs dans la console
- L'interface est responsive
- Les fonctionnalités existantes ne sont pas cassées

---

## 📝 Documentation

Si vous ajoutez une nouvelle fonctionnalité :
- Mettez à jour le README.md
- Ajoutez des commentaires dans le code
- Documentez les nouvelles options de configuration

---

## 🙏 Merci !

Merci de prendre le temps de contribuer à CharleBin. Chaque contribution, petite ou grande, est appréciée !