# Amal (عمل) — Brand Guidelines

**Version:** 1.0
**Date:** March 2026

---

## 1. Brand Identity

### Name & Meaning
- **English:** Amal
- **Arabic:** عمل (Amal — Deeds / Action)
- **Pronunciation:** /ˈʕa.mal/

### Slogan
- **Arabic:** حَيَّ عَلَىٰ خَيْرِ الْعَمَلِ
- **English:** Hasten to the Best of Deeds

### Mission
Help Muslims follow the whole Quran by gamifying awareness of what to do (Hizb Allah) and what to avoid (Hizb al-Shaytan), tracking an overall "Quran-following" score.

### Brand Voice
- **Tone:** Warm, encouraging, scholarly yet accessible
- **Language:** Bilingual (English primary, Arabic for Quranic/Islamic terms)
- **Direction:** Always use `dir="rtl"` and `lang="ar"` for Arabic text blocks

---

## 2. Logo

### Primary Logo
The logo is a wordmark consisting of the Arabic calligraphy **عمل** paired with the English text **Amal**.

| Element | Font | Weight | Size Ratio |
|---------|------|--------|------------|
| Arabic عمل | Noto Sans Arabic | Bold (700) | 2× English |
| English Amal | Kumbh Sans | Medium (500) | 1× base |

### Logo Colors

| Context | Arabic عمل | English Amal |
|---------|-----------|--------------|
| Dark background | Gold 400 `#facc15` | Gray 400 `#9ca3af` |
| Light background | Brand 600 `#0d9488` | Gray 500 `#6b7280` |

### Logo Spacing
- Minimum clear space: 1× the height of the Arabic text on all sides
- Arabic and English text separated by 8px (0.5rem) horizontal gap
- Vertically center-aligned

### Logo Don'ts
- Do not stretch or distort the wordmark
- Do not use colors outside the approved palette
- Do not place the logo on busy backgrounds without a backing container
- Do not separate the Arabic and English elements

---

## 3. Typography

### Primary Font — English
**Kumbh Sans** (Google Fonts)
- A geometric sans-serif with clean, modern proportions
- Weights used: 300 (Light), 400 (Regular), 500 (Medium), 600 (SemiBold), 700 (Bold)

| Use Case | Weight | Size |
|----------|--------|------|
| Hero heading | Bold 700 | 3rem–4.5rem (text-5xl to text-7xl) |
| Section heading | Bold 700 | 1.875rem (text-3xl) |
| Card title | Bold 700 | 1.25rem (text-xl) |
| Body text | Regular 400 | 1rem (text-base) |
| Caption / label | Medium 500 | 0.75rem–0.875rem (text-xs to text-sm) |
| Badge / tag | SemiBold 600 | 0.75rem (text-xs) |

### Arabic Font
**Noto Sans Arabic** (Google Fonts)
- A modern sans-serif Arabic typeface that pairs well with Kumbh Sans
- Weights used: 400 (Regular), 500 (Medium), 600 (SemiBold), 700 (Bold)

| Use Case | Weight | Size |
|----------|--------|------|
| Quranic verse (hero) | Bold 700 | 1.875rem–3rem (text-3xl to text-5xl) |
| Quranic verse (card) | Regular 400 | 1rem–1.25rem (text-base to text-xl) |
| Arabic title / label | Bold 700 | 1.5rem (text-2xl) |
| Arabic inline term | Regular 400 | 1rem (text-base) |

### CSS Custom Properties
```css
--font-sans: 'Kumbh Sans', ui-sans-serif, system-ui, sans-serif;
--font-arabic: 'Noto Sans Arabic', ui-sans-serif, sans-serif;
```

### Font Loading
- Kumbh Sans via Bunny Fonts CDN (GDPR-compliant)
- Noto Sans Arabic via Google Fonts CDN
- Both use `font-display: swap` to prevent FOIT

---

## 4. Color System

### 4.1 Brand Primary — Warm Teal

The primary brand color family. Used for positive actions, navigation highlights, quiz-by-surah contexts, and "Hizb Allah" (party of Allah) elements.

| Token | Hex | Usage |
|-------|-----|-------|
| `brand-50` | `#f0fdfa` | Light backgrounds, hover states (light theme) |
| `brand-100` | `#ccfbf1` | Subtle tints |
| `brand-200` | `#99f6e4` | Light accents |
| `brand-300` | `#5eead4` | Text on dark backgrounds (secondary) |
| `brand-400` | `#2dd4bf` | Text on dark backgrounds (primary), icons |
| `brand-500` | `#14b8a6` | Badges, inline labels, Arabic tags |
| `brand-600` | `#0d9488` | Buttons (primary), logo on light bg |
| `brand-700` | `#0f766e` | Button hover, CTA backgrounds |
| `brand-800` | `#115e59` | Dark accents |
| `brand-900` | `#134e4a` | Card backgrounds (dark theme), subtle containers |
| `brand-950` | `#042f2e` | Deep backgrounds (dark theme hero) |

### 4.2 Gold Accent

Used for premium/highest-rank elements, the slogan badge, rotating verse text, and "Firdous" (highest paradise) contexts.

| Token | Hex | Usage |
|-------|-----|-------|
| `gold-50` | `#fefce8` | Light backgrounds |
| `gold-100` | `#fef9c3` | Subtle tints |
| `gold-200` | `#fef08a` | Light accents |
| `gold-300` | `#fde047` | Hero verse text (dark bg), premium headings |
| `gold-400` | `#facc15` | Logo Arabic text (dark bg), verse dots active, badges |
| `gold-500` | `#eab308` | Badges, coming-soon Arabic labels |
| `gold-600` | `#ca8a04` | Verse references, subtle text on dark bg |
| `gold-700` | `#a16207` | Muted accent text |
| `gold-800` | `#854d0e` | Deep captions |
| `gold-900` | `#713f12` | Card backgrounds (dark theme, premium tier) |
| `gold-950` | `#422006` | Deep premium backgrounds |

### 4.3 Danger / Warning — Warm Red

Used for sin/warning contexts: major sins quiz, "Hizb al-Shaytan" (party of Satan), and Ashab ush-Shimaal elements.

| Token | Hex | Usage |
|-------|-----|-------|
| `danger-50` | `#fef2f2` | Light hover states for sin-related links |
| `danger-100` | `#fee2e2` | Subtle warning tints |
| `danger-200` | `#fecaca` | Two-camp banner text (light accents) |
| `danger-300` | `#fca5a5` | CTA text (outline danger buttons) |
| `danger-400` | `#f87171` | Arabic titles, icons on dark bg |
| `danger-500` | `#ef4444` | Badges, inline icons (✗ marks), Arabic tags |
| `danger-600` | `#dc2626` | Active badge backgrounds, button gradients |
| `danger-700` | `#b91c1c` | Button backgrounds, border accents |
| `danger-800` | `#991b1b` | Label text, muted headings |
| `danger-900` | `#7f1d1d` | Card container backgrounds (dark theme) |
| `danger-950` | `#450a0a` | Deep sin-context backgrounds |

### 4.4 Neutral Grays

Standard Tailwind gray scale for backgrounds, text, borders, and structural elements.

| Token | Hex | Usage |
|-------|-----|-------|
| `gray-50` | `#f9fafb` | Page background (light theme) |
| `gray-100` | `#f3f4f6` | Card backgrounds (light theme) |
| `gray-200` | `#e5e7eb` | Borders (light theme) |
| `gray-400` | `#9ca3af` | Secondary text (dark theme), English logo |
| `gray-500` | `#6b7280` | Muted text |
| `gray-600` | `#4b5563` | Body text (light theme) |
| `gray-700` | `#374151` | Headings (light theme), muted icons |
| `gray-800` | `#1f2937` | Borders (dark theme), table dividers |
| `gray-900` | `#111827` | Card backgrounds (dark theme), dropdown bg |
| `gray-950` | `#030712` | Page background (dark theme) |

### 4.5 Supplementary

| Token | Hex | Usage |
|-------|-----|-------|
| `purple-400` | `#c084fc` | Ihsan (Level 3) badge |
| `purple-700` | `#7e22ce` | Ihsan Arabic text accent |
| `purple-900` | `#581c87` | Ihsan badge background |
| `white` | `#ffffff` | Text on dark, button text, page bg (light) |
| `black` | `#000000` | Deepest card backgrounds (hellfire tier) |

---

## 5. Dark Theme

The primary/default theme. Dark backgrounds with warm teal and gold accents.

### Surfaces

| Element | Color | Token |
|---------|-------|-------|
| Page background | `#030712` | `gray-950` |
| Card background (positive) | Gradient from `brand-950` to `gray-950` | — |
| Card background (premium) | Gradient from `gold-950` to `gray-950` | — |
| Card background (danger) | Gradient from `danger-950` to `gray-950` | — |
| Nav bar | Transparent with `border-white/10` bottom border | — |
| Dropdown | `gray-900` with `border-white/10` | — |

### Text

| Element | Color | Token |
|---------|-------|-------|
| Primary heading | `#ffffff` | `white` |
| Secondary heading | `brand-200` to `brand-300` | — |
| Body text | `gray-400` | — |
| Muted / caption | `gray-500` to `gray-700` | — |
| Arabic Quranic (hero) | `gold-300` | — |
| Arabic Quranic (card) | Contextual: `brand-400`, `gold-400`, `danger-400` | — |
| Verse reference | `gold-600` | — |
| Links (nav) | `gray-400` → `white` on hover | — |

### Interactive

| Element | Default | Hover |
|---------|---------|-------|
| Primary CTA | `brand-600` bg, white text | `brand-500` bg |
| Danger CTA | `danger-700` bg, white text | `danger-600` bg |
| Outline danger CTA | `danger-950/60` bg, `danger-300` text, `danger-700/50` border | `danger-900/60` bg |
| Disabled button | `gold-900/40` bg, `gold-600` text, 60% opacity | — |
| Nav dropdown hover | `white/5` bg | — |
| Verse dot (active) | `gold-400`, width 24px | — |
| Verse dot (inactive) | `gray-700`, width 8px | `gray-600` |

---

## 6. Light Theme

Used on inner pages (quizzes, learning, progress). Clean whites with warm teal accents.

### Surfaces

| Element | Color | Token |
|---------|-------|-------|
| Page background | `#f9fafb` | `gray-50` |
| Card background | `#ffffff` | `white` |
| Nav bar | `white` with `gray-200` border, subtle shadow | — |
| Dropdown | `white` with `gray-200` border | — |

### Text

| Element | Color | Token |
|---------|-------|-------|
| Primary heading | `gray-900` | — |
| Body text | `gray-600` | — |
| Arabic logo | `brand-600` | — |
| English logo | `gray-500` | — |
| Links (nav) | `gray-600` → `brand-600` on hover | — |
| Positive context | `brand-*` scale | — |
| Danger context | `danger-*` scale | — |

### Interactive

| Element | Default | Hover |
|---------|---------|-------|
| Primary link hover | — | `brand-50` bg, `brand-700` text |
| Danger link hover | — | `danger-50` bg, `danger-700` text |
| Quiz correct answer | `brand-100` bg, `brand-700` text, `brand-500` border | — |
| Quiz incorrect answer | `danger-100` bg, `danger-700` text, `danger-500` border | — |
| Progress bar fill | `brand-500` | — |

---

## 7. Component Patterns

### Buttons

| Variant | Class Pattern |
|---------|--------------|
| Primary | `bg-brand-600 text-white rounded-xl px-8 py-3.5 font-semibold hover:bg-brand-500` |
| Danger | `bg-danger-700 text-white rounded-xl px-8 py-3.5 font-bold hover:bg-danger-600` |
| Outline Danger | `border border-danger-700/50 bg-danger-950/60 text-danger-300 rounded-xl hover:bg-danger-900/60` |
| Disabled | `cursor-not-allowed opacity-60 border border-gold-600/30 bg-gold-900/40 text-gold-600` |
| Ghost (nav) | `text-gray-400 hover:text-white` (dark) / `text-gray-600 hover:text-brand-600` (light) |

### Cards (Dark Theme)

All cards use:
- `rounded-2xl` corners
- `border` with contextual color at `/30` to `/50` opacity
- `bg-gradient-to-b from-{context}-950 via-{context}-900/40 to-gray-950`
- `shadow-2xl shadow-{context}-900/30`
- Optional `pointer-events-none absolute inset-0 bg-gradient-to-br from-{context}-300/10 via-transparent to-transparent` shine overlay

### Badges

| Type | Pattern |
|------|---------|
| Slogan | `rounded-full border border-gold-500/30 bg-gold-500/10 text-gold-400 text-sm px-5 py-2` |
| Rank | `rounded-full bg-gold-400/20 text-gold-300 text-xs px-3 py-1 font-semibold` |
| Active | `rounded-full bg-danger-600 text-white text-xs px-3 py-1 font-bold` |
| Level | `rounded-full bg-{color}-900/50 text-{color}-400 text-sm px-3 py-1 font-semibold` |

### Dropdowns (Nav)

```
invisible absolute left-0 top-full z-50 w-48 translate-y-1 rounded-lg border py-1
opacity-0 shadow-lg transition-all
group-hover:visible group-hover:translate-y-0 group-hover:opacity-100
```
- Dark: `border-white/10 bg-gray-900`
- Light: `border-gray-200 bg-white`

---

## 8. Iconography

### Approach
- No emoji in buttons (removed from rebrand — clean text labels only)
- Unicode symbols for list markers: ✓ (positive), ✗ (negative), ★ (premium), ◆ (standard), ✦ (special), ☠ (extreme danger)
- SVG chevrons for dropdown indicators (Heroicons outline style)
- No icon library dependency — inline SVG only

### Symbol Mapping

| Context | Symbol | Color |
|---------|--------|-------|
| Positive / correct | ✓ | `brand-400` |
| Negative / sin | ✗ | `danger-500` |
| Premium feature | ★ | `gold-400` |
| Standard feature | ◆ | `brand-400` |
| Special / slogan | ✦ | `gold-400` |
| Extreme danger | ☠ | `gray-700` |
| Warning | ⚠ | `danger-400` |

---

## 9. Spacing & Layout

### Grid System
- Max content width: `max-w-7xl` (80rem / 1280px)
- Horizontal padding: `px-4 sm:px-6 lg:px-8` (inner pages), `px-6 lg:px-12` (landing page)
- Section vertical padding: `py-12` to `py-16`

### Breakpoints (Tailwind defaults)
| Name | Min Width | Usage |
|------|-----------|-------|
| `sm` | 640px | 2-column grids, horizontal nav |
| `md` | 768px | — |
| `lg` | 1024px | 4-column card grid, wider padding |
| `xl` | 1280px | — |

### Card Grid
- Landing page tiers: `grid-cols-1 lg:grid-cols-4 gap-5`
- Implementation levels: `grid gap-5 sm:grid-cols-3`
- Two-camp banner: `grid-cols-1 sm:grid-cols-2 gap-3`

---

## 10. Motion & Transitions

| Element | Duration | Easing | Property |
|---------|----------|--------|----------|
| Button hover | 150ms | default | `background-color` |
| Dropdown appear | 200ms | default | `opacity, transform, visibility` |
| Verse rotation | 400ms | ease | `opacity` (fade out/in) |
| Verse auto-advance | 7000ms | — | interval timer |
| Chevron rotation | 150ms | default | `transform: rotate(180deg)` |
| Verse dot width | 300ms | default | `width` |

---

## 11. Accessibility

- All Arabic text blocks use `dir="rtl"` and `lang="ar"` attributes
- Verse navigation dots have `aria-label="Verse N"`
- Mobile hamburger has `aria-label="Toggle menu"`
- Color contrast: All text/background combinations meet WCAG AA minimum (4.5:1 for normal text, 3:1 for large text)
- Interactive elements have visible focus states via Tailwind's default `focus-visible:` ring
- No motion-sensitive animations (verse fade is subtle, no parallax or bouncing)

---

## 12. Asset Checklist

| Asset | Format | Location | Status |
|-------|--------|----------|--------|
| Favicon | SVG | `/public/favicon.svg` | Done (teal circle + gold عمل) |
| Favicon | ICO | `/public/favicon.ico` | Needs regeneration from SVG |
| Apple Touch Icon | PNG 180×180 | `/public/apple-touch-icon.png` | Needs regeneration from SVG |
| OG Image | PNG 1200×630 | — | Not yet created |
| Logo (dark bg) | SVG | — | Defined in NavBar (gold عمل + gray Amal) |
| Logo (light bg) | SVG | — | Defined in NavBar (teal عمل + gray Amal) |
| Hero banners | PNG/WebP | — | Planned (Nano Banana cartoon illustrations) |

---

## 13. Technical Implementation

### Tailwind v4 Theme (`resources/css/app.css`)
All colors are defined as CSS custom properties in the `@theme inline` block:
```css
@theme inline {
    --font-sans: 'Kumbh Sans', ui-sans-serif, system-ui, sans-serif, ...;
    --font-arabic: 'Noto Sans Arabic', ui-sans-serif, sans-serif;
    --color-brand-50: #f0fdfa;
    /* ... full brand, gold, danger scales ... */
}
```

### Font Loading (`resources/views/app.blade.php`)
```html
<!-- English -->
<link href="https://fonts.bunny.net/css?family=kumbh-sans:300,400,500,600,700" rel="stylesheet" />
<!-- Arabic -->
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@400;500;600;700&display=swap" rel="stylesheet" />
```

### CSS Class Usage
- English text: default (no class needed, inherits `font-sans`)
- Arabic text: `font-arabic` class
- Arabic text direction: `dir="rtl" lang="ar"` HTML attributes

### Theme Switching
- Dark theme: Applied via CSS class `dark` on `<html>` element
- Landing page: Hard-coded dark (`bg-gray-950 text-white`)
- Inner pages: `bg-gray-50 dark:bg-gray-950` with full `dark:` variant support
- NavBar: `theme` prop (`'light' | 'dark'`) controls color classes

---

## 14. Domain & Deployment

| Environment | Domain | Branch |
|-------------|--------|--------|
| Production | `amal.run` | `main` |
| Staging | `staging.amal.run` | `staging` |
| Local | `amal.test` | any |

---

*This document is the single source of truth for all Amal visual and brand decisions. All UI work should reference these guidelines for consistency.*
