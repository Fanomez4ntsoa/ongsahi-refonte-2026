# Projet ONGSAHI — Refonte 2026

## Contexte
Site WordPress de l'ONG SAHI Mpanasoa (Madagascar + Canada).
- Local : http://ongsahi-local.local
- Prod : https://www.ongsahi.org
- WP 6.9.4 / PHP 8.2 / MySQL 8.0.35

## Stack technique (vérifié par audit)
- Thème actif : **modins** (Gaviasthemes/ThemeForest, commercial)
- Thème child : modins-child (à créer en priorité)
- Page builder : **Elementor** (~2 600 contenus, massif)
- Header/Footer : Header Footer Elementor (CPT elementor-hf)
- Champs custom : **Meta Box** (PAS ACF — ne pas confondre)
- Dons : GiveWP (déjà installé)
- Événements : The Events Calendar
- Plugin custom : sahi-platforms (à auditer séparément)

## Objectif
Refonte VISUELLE en priorité. Structure de données et CPT existants conservés.

## Règles strictes
- ❌ NE JAMAIS modifier le thème parent `modins` (toujours via modins-child)
- ❌ NE JAMAIS modifier wp-admin/, wp-includes/, ou les plugins
- ❌ NE PAS introduire ACF (le projet utilise Meta Box)
- ❌ NE PAS modifier les CPT existants (portfolio, gva_megamenu, gva__template, etc.)
- ❌ NE PAS toucher à la BDD sans validation explicite
- ❌ NE PAS modifier `_elementor_data` directement en SQL
- ✅ Tout le code custom va dans `wp-content/themes/modins-child/`
- ✅ Préfixer les fonctions par `ongsahi_` ou `sahi_`
- ✅ Pour les champs custom → utiliser Meta Box (cohérence avec l'existant)
- ✅ Composants récurrents → widgets Elementor custom (pas de HTML brut)
- ✅ Tester en local avant tout

## Structure du thème child à créer
wp-content/themes/modins-child/
├── style.css           (header WP + variables CSS du design system)
├── functions.php       (enqueue parent + child + hooks)
├── screenshot.png
├── includes/
│   └── widgets/        (widgets Elementor custom)
└── assets/
    ├── css/
    └── js/

## Workflow
1. Toute feature passe par une discussion d'architecture AVANT le code
2. Modifications par petites itérations
3. Commit git après chaque section terminée
4. Pour le contenu Elementor → éditeur visuel, jamais en BDD