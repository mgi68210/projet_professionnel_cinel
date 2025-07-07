<?php

return [

    /*
    |---------------------------------------------------------------
    | Quel "garde" utiliser par défaut ?
    |---------------------------------------------------------------
    | C’est comme dire : "Si tu ne précises rien, tu veux connecter
    | un utilisateur normal ou un admin ?"
    | Ici, on dit "utilisateur normal" (web).
    */
    'defaults' => [
        'guard' => 'web',         // ← utilisateur normal par défaut
        'passwords' => 'users',   // ← gestion des mots de passe pour les utilisateurs
    ],

    /*
    |---------------------------------------------------------------
    | Les gardes (guards)
    |---------------------------------------------------------------
    | Un "garde", c’est un agent de sécurité.
    | Il surveille une porte : "web" pour les utilisateurs normaux,
    | "admin" pour les administrateurs.
    */
    'guards' => [
        // Garde pour utilisateur normal
        'web' => [
            'driver' => 'session',     // ← garde qui utilise les sessions
            'provider' => 'users',     // ← il vérifie dans la liste "users"
        ],

        // Garde pour administrateur
        'admin' => [
            'driver' => 'session',     // ← pareil, on utilise la session
            'provider' => 'admins',    // ← mais il vérifie dans la liste "admins"
        ],
    ],

    /*
    |---------------------------------------------------------------
    | Les fournisseurs (providers)
    |---------------------------------------------------------------
    | Le fournisseur dit : "Où aller chercher les gens ?"
    | Un provider = une table + un modèle.
    */
    'providers' => [
        // Fournisseur pour les utilisateurs
        'users' => [
            'driver' => 'eloquent',              // ← on utilise Eloquent (ORM)
            'model' => App\Models\Utilisateur::class, // ← il cherche dans le modèle Utilisateur
        ],

        // Fournisseur pour les admins
        'admins' => [
            'driver' => 'eloquent',             // ← pareil, on utilise Eloquent
            'model' => App\Models\Admin::class, // ← il cherche dans le modèle Admin
        ],
    ],

    /*
    |---------------------------------------------------------------
    | Réinitialisation des mots de passe
    |---------------------------------------------------------------
    | Pour dire : "Si quelqu’un oublie son mot de passe,
    | on va où pour l’aider ?"
    */
    'passwords' => [
        'users' => [
            'provider' => 'users',            // ← lien avec le provider "users"
            'table' => 'password_resets',     // ← table utilisée pour stocker les tokens
            'expire' => 60,                   // ← le lien expire au bout de 60 minutes
            'throttle' => 60,                 // ← on ne peut pas en demander toutes les 5 secondes
        ],
    ],

    /*
    |---------------------------------------------------------------
    | Délai pour reconfirmer un mot de passe
    |---------------------------------------------------------------
    | Si tu reviens après 3 heures, il te redemande ton mot de passe.
    */
    'password_timeout' => 10800, // ← 3 heures
];
