# Projet ONGSAHI — Refonte 2026

## 🎯 Contexte général
Site WordPress de l'ONG SAHI Mpanasoa (Madagascar + Canada).
- **Local** : http://ongsahi-local.local
- **Prod** : https://www.ongsahi.org
- **GitHub** : https://github.com/Fanomez4ntsoa/wp_temp (à renommer en `ongsahi-wordpress`)
- **WP** : 6.9.4 / **PHP** : 8.2 / **MySQL** : 8.0.35
- **Date du projet** : refonte démarrée le 04/05/2026

## 📦 Stack technique (vérifié par audit)

### Thème
- **Thème actif** : `modins-child` ✅ (créé et activé)
- **Thème parent** : `modins` (Gaviasthemes/ThemeForest, commercial)
- **Companion plugin** : `modins-themer` (CPT `gva__template`, `portfolio`, `gva_megamenu`)

### Page builder
- **Elementor** (free) — ~2 600 contenus, massif
- **PAS Elementor Pro** → pas de Theme Builder natif Elementor
- **Header Footer Elementor** présent sur disque mais désactivé

### Système de templates Header/Footer
⚠️ **IMPORTANT** : le site utilise le builder propriétaire de Modins (`modins-themer`) :
- CPT `gva__template` = templates Modins
- Accès via wp-admin → **Modins Template** → Header Layout / Footer Layout
- 5 headers existants + 2 footers
- Le menu `primary` (déclaré dans `modins/includes/template.php:62`) n'est pas mappé → la nav est consommée directement par Elementor dans le `gva__template`

### Champs custom
- **Meta Box** (PAS ACF — ne pas confondre)
- Déclarés en PHP dans `modins/includes/metaboxes.php`

### Plugins critiques
- **GiveWP** : dons (déjà installé)
- **WooCommerce** : e-commerce
- **The Events Calendar** : événements
- **Wordfence** : sécurité
- **Mailchimp for WP** : newsletter (clé API à configurer dans le footer)
- **WP Fastest Cache Premium** : cache
- **sahi-platforms** : plugin custom maison (Fanoela) — inscription bénévoles, tables custom, charge Tailwind via CDN
  - ⚠️ Dossier dupliqué `wp-content/plugins/sahi-platforms/sahi-platforms/` à nettoyer
- **Redondance formulaires** : CF7 + Ninja Forms + Formidable + sahi-platforms = à rationaliser

## 🎨 Design system

### Couleurs (provisoires, en attente de validation équipe SAHI)
```css
--sahi-blue: #0066CC          /* TODO : remplacer par le vrai code charte */
--sahi-white: #ffffff
--sahi-bg-transparent: rgba(255,255,255,0.05)
```

### Typographie
- Police custom **Mistral** présente à la racine du WP (à déplacer dans `modins-child/assets/fonts/`)
- Police principale du thème Modins à conserver pour cohérence (à identifier)

### Style header décidé
- **Header sticky** (reste visible au scroll)
- **Bouton "Faire un don"** mis en avant (couleur CTA différente)
- **Mobile** : hamburger ≤ 768px

## 📐 Structure du nouveau menu (validée)
Menu Principal SAHI 2026
├── Madagascar
│   ├── Nos actualités
│   ├── Qui sommes-nous
│   ├── Axes d'intervention
│   ├── Nos projets
│   ├── Chiffres clés
│   └── Nos partenaires
├── Canada
│   ├── About us
│   └── Key figures
├── Bénévoles
│   ├── Actualités
│   ├── Qui sont les bénévoles
│   ├── Axes d'intervention
│   ├── Devenir bénévole
│   └── Témoignages
├── Devenir notre partenaire
└── Faire un don 🎯 (CTA)

## 📄 État des pages cibles (audit du 04/05/2026)

| Page cible | État | Action requise |
|---|---|---|
| **Madagascar** | Pas de page dédiée | Repenser la home actuelle comme "Madagascar" OU créer une page dédiée |
| **Canada** | ❌ N'existe pas | Créer (en anglais, cf. doc spec) |
| **Bénévoles** | Articles seulement (post=3550, 3754, 3799) | Créer une vraie page hub "Bénévoles" |
| **Devenir partenaire** | ❌ N'existe pas | Créer |
| **Faire un don** | ✅ Existe (post=2322, Elementor) | À refondre visuellement |

## 🗺️ Roadmap globale

### ✅ Phase 0 — Setup (FAIT)
- [x] Audit du site existant (`docs/audit.md`)
- [x] Migration des URLs prod → local
- [x] Création thème child `modins-child`
- [x] Variables CSS du design system dans `modins-child/style.css`
- [x] Auto-loader widgets Elementor dans `functions.php`
- [x] Git initialisé + push GitHub
- [x] `.gitignore` propre (exclut core WP, plugins tiers, uploads)
- [x] Audit Header/Footer (`docs/audit-header-footer.md`)

### 🔄 Phase 1 — Header + Footer (EN COURS)

**Stratégie validée : Hybride safe — créer en parallèle, basculer quand prêt**

#### A. Préparation
- [ ] **A.1** Créer les pages manquantes en brouillon :
  - [ ] Page "Canada" (slug `/canada/`)
  - [ ] Page "Bénévoles" (hub, slug `/benevoles/`)
  - [ ] Page "Devenir partenaire" (slug `/devenir-partenaire/`)
  - Note : Madagascar → décision à prendre (home repensée vs page dédiée)
- [ ] **A.2** Créer le nouveau menu "Menu Principal SAHI 2026" en parallèle de l'actuel
  - Ne PAS l'assigner à `primary` tant que pas prêt
- [ ] **A.3** Préparer le template header :
  - "New Header Layout" est **VIDE** dans Elementor → parfait comme base de travail
  - Soit on l'utilise directement, soit on le renomme "SAHI Header 2026"
- [ ] **A.4** Préparer le template footer :
  - Dupliquer "Footer 01" → "SAHI Footer 2026"

#### B. Construction Header
- [ ] **B.1** Définir la structure visuelle (logo + nav + CTA Don)
- [ ] **B.2** Construire dans Elementor (sticky, transparent au top, opaque au scroll)
- [ ] **B.3** Overrides CSS dans `modins-child/style.css` (variables --sahi-*)
- [ ] **B.4** JS sticky scroll (si pas natif Elementor) dans `modins-child/assets/js/`
- [ ] **B.5** Responsive mobile (hamburger ≤ 768px)
- [ ] **B.6** Test multi-pages → assigner le header dans Modins Template
- [ ] **B.7** Commit Git

#### C. Construction Footer
- [ ] **C.1** Définir contenu (logo, contact, newsletter, réseaux sociaux, copyright, lien Politique de confidentialité)
- [ ] **C.2** Configurer Mailchimp API key (résout l'erreur actuelle)
- [ ] **C.3** Construire dans Elementor
- [ ] **C.4** CSS overrides
- [ ] **C.5** Test + commit

### Phase 2 — Refonte des pages (à venir)
1. Page Madagascar (home repensée)
2. Page Faire un don (refonte du visuel + Stripe)
3. Page Bénévoles (hub)
4. Page Devenir partenaire
5. Page Canada (en EN)

### Phase 3 — Fonctionnalités avancées (à venir)
- [ ] Multilingue FR/EN (Polylang recommandé)
- [ ] Optimisation système de dons GiveWP + Stripe
- [ ] Rationalisation des plugins de formulaires (garder 1 seul)
- [ ] Configurer compte Stripe SAHI
- [ ] Espace bénévoles authentifié
- [ ] (Phase 3+) Messagerie interne style Messenger

## 📂 Structure du thème child
wp-content/themes/modins-child/
├── style.css              # Header WP + variables CSS --sahi-*
├── functions.php          # Enqueue parent→child + auto-loader widgets
├── screenshot.png         # Placeholder bleu SAHI
├── .gitignore
├── includes/
│   └── widgets/           # Widgets Elementor custom (auto-chargés)
└── assets/
├── css/               # CSS additionnel (header.css, footer.css...)
└── js/                # JS custom (sticky scroll, etc.)

## 🔒 Règles strictes

- ❌ **NE JAMAIS** modifier le thème parent `modins` (toujours via `modins-child`)
- ❌ **NE JAMAIS** modifier `wp-admin/`, `wp-includes/`, ou les plugins tiers
- ❌ **NE PAS** introduire ACF (le projet utilise Meta Box)
- ❌ **NE PAS** modifier les CPT existants (`portfolio`, `gva_megamenu`, `gva__template`)
- ❌ **NE PAS** toucher à la BDD sans validation explicite
- ❌ **NE PAS** modifier `_elementor_data` directement en SQL
- ❌ **NE PAS** overrider `header.php` / `footer.php` du thème child → SANS EFFET (le rendu réel passe par les `gva__template` Elementor)
- ✅ Tout le code custom va dans `wp-content/themes/modins-child/`
- ✅ Préfixer les fonctions par `ongsahi_` ou `sahi_`
- ✅ Pour les champs custom → utiliser **Meta Box** (cohérence avec l'existant)
- ✅ Composants récurrents → **widgets Elementor custom** (pas de HTML brut dans Elementor)
- ✅ Tester en local avant tout
- ✅ Commit Git après chaque étape importante

## 🎯 Approche philosophique

**"Tout ce qui est structurel ou logique → en code (Git). Tout ce qui est contenu → en BDD (admin)."**

| Couche | Où ça se gère ? |
|---|---|
| Structure visuelle (header, footer, sections) | Elementor (`gva__template`) |
| Logo | Customizer ou Redux Modins |
| Menu (liens) | wp-admin → Apparence → Menus |
| Couleurs / typo / styles globaux | `modins-child/style.css` (variables CSS) |
| Composants récurrents (CTA, stats, témoignages) | Widgets Elementor custom dans `modins-child/includes/widgets/` |
| Surcharges CSS (override Modins) | `modins-child/style.css` ou fichiers dédiés |
| Comportements custom (PHP) | `modins-child/functions.php` |

---

## 🔄 MESSAGE DE REPRISE — Prochaine session

> **Salut Claude ! On reprend le projet de refonte du site SAHI Mpanasoa.**
>
> **Où on en est** :
> - Phase 0 (Setup) terminée ✅
> - Phase 1 (Header + Footer) en cours, on est à l'étape **A.1 — Préparation des pages manquantes**
>
> **Ce qu'on a découvert lors de la dernière session** :
> - Le site utilise le **builder propriétaire de Modins** (`modins-themer` + CPT `gva__template`), PAS Header Footer Elementor
> - "New Header Layout" est **VIDE** dans Elementor → c'est ma base de travail (pas besoin de dupliquer "Header 01" qui a du contenu Modins par défaut)
> - "Footer 01" est riche (adresse, téléphone, email, newsletter Mailchimp avec erreur API key) → à dupliquer
> - Pages cibles à créer : **Canada** ❌, **Bénévoles** (vraie page hub) ❌, **Devenir partenaire** ❌
> - **Faire un don** existe déjà (post=2322), à refondre
> - **Madagascar** : décision à prendre — home actuelle repensée OU page dédiée
>
> **Ce qu'on veut faire ensuite** :
> 1. Créer les 3 pages manquantes en brouillon
> 2. Trancher : Madagascar = home OU page dédiée ?
> 3. Créer le nouveau menu "Menu Principal SAHI 2026" en parallèle
> 4. Renommer (ou pas) "New Header Layout" → "SAHI Header 2026"
> 5. Dupliquer "Footer 01" → "SAHI Footer 2026"
> 6. Commencer à construire visuellement le header dans Elementor avec le design SAHI (transparent → opaque scroll, bleu, logo blanc, hamburger mobile ≤768px)
>
> **À vérifier au démarrage** :
> - Le thème child `modins-child` est-il toujours actif ?
> - Le site charge-t-il toujours sans erreur ?
> - Lire `docs/audit.md` et `docs/audit-header-footer.md` pour le contexte technique complet
>
> **Question ouverte pour cette session** :
> - Code couleur exact du bleu SAHI (à demander à l'équipe)
> - Madagascar = home ou page dédiée ?