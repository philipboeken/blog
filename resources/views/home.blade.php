@extends('layouts.center')
@section('title') Hallo {{ $user->first_name }}!
@endsection

@section('content-mid')
<div class="content">
    <h1>
        Welkom op ons blog!
    </h1>
    <p>
        Op het moment is de boel nog een beetje in onderhoud. Als je iets tegenkomt wat nog niet zo goed werkt, zou je mij (Philip)
        dan een mailtje kunnen sturen met wat er kapot is?
    </p>
    <h3>
        Bekende fouten:
    </h3>
    <ul>
        <li>
            File upload werkt niet
        </li>
        <li>
            Label, contact, of bestand aan een bericht koppelen
        </li>
        <li>
            Wachtwoord veranderen
        </li>
        <li>
            Sommige icoontjes worden nog niet goed geladen
        </li>
    </ul>

    <h3>
        Functionaliteit dat nog gemaakt moet worden:
    </h3>
    <ul>
        <li>
            Een 'weet u het zeker' popup bij verwijderen post
        </li>
        <li>
            Posts filteren op: aanwezigheid bestand, contactpersoon
        </li>
        <li>
            Zoekfunctie: Doorzoekt posts, reacties, allemaal andere dingen
        </li>
        <li>
            Email Notificaties
        </li>
        <li>
            Reactie-hierarchie, in plaats van alles onder elkaar
        </li>
        <li>
            Reacties kunnen bewerken/verwijderen
        </li>
        <li>
            Avatars
        </li>
    </ul>
</div>
@endsection