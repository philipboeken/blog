@extends('layouts.center')
@section('title') Instellingen
@endsection

@section('content-mid')
<section class="section">
    <div class="container">
        <form method="POST" action="{{ route('account') }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <fieldset>
                <legend>Gebruikersnaam</legend>
                <!-- Gebruikersnaam -->
                <div class="field is-horizontal">
                    <div class="field-label">
                        <label for="gebruikersnaam" class="label">Gebruikersnaam</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control has-icon has-icon-right">
                                <input type="text" class="input {{ $errors->has('gebruikersnaam') ? 'is-danger': '' }}" placeholder="Gebruikersnaam" name="gebruikersnaam"
                                    value="{{ $user->email ? $user->email : old('gebruikersnaam') }}">                                @if ($errors->has('gebruikersnaam'))
                                <span class="icon is-small">
                                            <i class="fa fa-warning"></i>
                                            </span>
                                <span class="help is-danger">
                                                {{ $errors->first('gebruikersnaam') }}
                                            </span> @endif
                                <span class="help">Uw gebruikersnaam is hetzelfde als uw e-mailadres, dus bij wijzigen wordt het e-mailadres ook aangepast. De gebruikersnaam moet ook voldoen aan de eisen van een e-mailadres!</span>
                            </p>
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Wachtwoord wijzigen</legend>
                <!-- Wachtwoord -->
                <div class="field is-horizontal">
                    <div class="field-label">
                        <label for="wachtwoord" class="label">Nieuw wachtwoord</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control has-icon has-icon-right">
                                <input type="password" class="input {{ $errors->has('wachtwoord') ? 'is-danger': '' }}" placeholder="Nieuw wachtwoord" name="wachtwoord">                                @if ($errors->has('wachtwoord'))
                                <span class="icon is-small">
                                                <i class="fa fa-warning"></i>
                                            </span>
                                <span class="help is-danger">
                                                {{ $errors->first('wachtwoord') }}
                                            </span> @endif
                                <span class="help">Het wachtwoord moet bestaan uit minimaal: 8 karakters waarvan minstens 1 hoofdletter, 1 kleine letter en 1 cijfer.</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Bevestig Wachtwoord -->
                <div class="field is-horizontal">
                    <div class="field-label">
                        <label for="wachtwoord-bevestiging" class="label">Bevestig nieuw wachtwoord</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control has-icon has-icon-right">
                                <input type="password" class="input {{ $errors->has('wachtwoord-bevestiging') ? 'is-danger': '' }}" placeholder="Nieuw wachtwoord"
                                    name="wachtwoord-bevestiging"> @if ($errors->has('wachtwoord-bevestiging'))
                                <span class="icon is-small">
                                                <i class="fa fa-warning"></i>
                                            </span>
                                <span class="help is-danger">
                                                {{ $errors->first('wachtwoord-bevestiging') }}
                                            </span> @endif
                            </p>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="field">
                    <div class="control is-pulled-right">
                        <button class="button is-primary">Opslaan</button>
                    </div>
                </div>
        </form>
    </div>
</section>
@endsection