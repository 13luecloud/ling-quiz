# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Ling-Quiz is a language learning quiz application built with **Laravel 12** (PHP 8.2+), **Inertia.js**, **React 19 + TypeScript**, and **Tailwind CSS 4**.

Requirements: PHP v8.2+, Node v22+, MySQL.

## Commands

```bash
# Full dev environment (server + queue + Vite in parallel)
composer dev

# With logging via Pail
composer dev:full

# Run tests (clears config cache first)
composer test

# Run a single test file
php artisan test tests/Feature/ExampleTest.php

# Code formatting
composer pint

# Format only changed files
composer pint-dirty

# Frontend build
npm run build
```

## Architecture

This is a monolithic Laravel + Inertia.js app. The frontend is rendered via React page components resolved dynamically from `resources/js/pages/**/*.tsx`. There is no API layer — Inertia controllers return Inertia responses directly.

### Key Patterns

- **No repository or service layer** — controllers interact directly with Eloquent models.
- **Mass assignment**: All models use `$guarded = ['id']` (everything except `id` is fillable).
- **Polymorphic tagging**: `Quiz` and `Problem` both use `TaggableTrait` (`app/Traits/TaggableTrait.php`), which attaches a `morphToMany` relationship to `Tag` via the `taggables` table.
- **Infrastructure**: Sessions, queue, and cache all use the database driver by default.

### Domain Model

The core quiz flow: a `User` targets one or more `Language`s (via `UserLanguage`). They take a `Quiz` in a target language, which contains `QuizItem`s — each pairing a `Problem` with the user's `answer`.

- **`Problem`**: Has a `question`, a JSON `choices` array, and a `correct_choice`. Belongs to a `Language` (via `for_language_id`).
- **`Quiz`**: Belongs to `User` and target `Language`. Tracks `started_at` and `completed_at`.
- **`QuizItem`**: Join between `Quiz`, `Problem`, and `User`; stores the user's `answer`.
- **`UserLanguage`**: Pivot for user ↔ language targeting (table: `user_target_languages`); enforces a unique constraint on `(user_id, language_id)`.
- **`Tag`**: Taggable on both `Quiz` and `Problem` for categorization.

### Frontend

React pages live in `resources/js/pages/`. Inertia resolves page components automatically — a controller returning `Inertia::render('Quiz/Show', [...])` maps to `resources/js/pages/Quiz/Show.tsx`.

### Testing

Tests use SQLite in-memory (configured in `phpunit.xml`). Factories for all models are in `database/factories/`. `QuizFactory` has `started()` and `completed()` states for time-based scenarios.
