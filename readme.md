# CRUD tramite API

*e' analoga alla crud ma invece che rotte web ci sono rotte api*

---------

Rispetto alla crud con routes web, mi ritorna dei JSON.

`$products,` risultato di `Product::all()`, non e un vero e proprio array, e un entita di laravel, ma laravel ce lo rende leggibile come json.

(su postman nell url devo sempre mettere all inizio : `localhost/api`)


--------

creo parte index, poi parte create. Questa parte prende i dati li salva nel db e ritorna una **rappresentazione** degli stessi.

--------

quando si tratta di update o di store, devo sempre usare la classe **Request**.

------

i json sono accessibili alla parte frontend grazie a **chiamate ajax**.

-------

#Middleware

il **middleware** fa delle verifiche, per la sicurezza.

se non ho creato le auth, posso creare il singolo middleware con

`php artisan make:middleware NOMEMIDDLEWARE`
chiamiamo il middleware, per esempio ApiAuth, quindi avro:

`php artisan make:middleware ApiAuth`


per agire sul middleware devo:

        
- modificare il file `http/kernel.php` inserendo `'api.auth' => \App\Http\Middleware\ApiAuth::class,`

- nell `api.php` avro `Route::middleware('api.auth')`;

[da **postman** vado nell header a create una nuova key che chiamo per es Authorization e inserisco la mia password per visualizzare i dati chiamati al db.
Poi tramite il file middleware (che in questo caso si chiama ApiAuth.php) gestisco errori. ]

Posso inserire la psw del mio middleware mettendola nel .env: `API_AUTH=asd` e la richiamo nel middleware con  `$apiKey = env(API_AUTH)`.

Volendo in alternativa posso farmi la mia config da config/App.php:

`'api_key' => env('API_AUTH', ''),`

e la richiamo nel middleware con `$apiKey = config(app.api_key)`.


nb: di prassi si aggiunge `'Bearer ' . $apiKey` ...e' un semplice nome che si aggiunge di prassi.
