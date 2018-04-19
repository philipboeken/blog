<b-dropdown position="is-bottom-left">
    <a class="navbar-item" slot="trigger">
        <span>Login</span>
        <b-icon icon="angle-down"></b-icon>
    </a>
    <b-dropdown-item custom paddingless>
        <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
            <div class="modal-card" style="width:300px;">
                <section class="modal-card-body">
                    <b-field label="Email">
                        <b-input
                            type="{{ $errors->has('email') ? ' is-danger' : '' }}" 
                            name="email"
                            placeholder="Your email"
                            @if ($errors->has('email'))
                                message={{ $errors->first('email') }}
                            @endif
                            required>
                        </b-input>
                    </b-field>
                    <b-field label="Password">
                        <b-input
                            name="password"
                            type="password"
                            password-reveal
                            placeholder="Your password"
                            @if ($errors->has('password'))
                                message={{ $errors->first('password') }}
                            @endif
                            required>
                        </b-input>
                    </b-field>
                    <b-checkbox>Remember me</b-checkbox>
                    <input type="hidden" name="timezone" id="timezone">
                </section>
                <footer class="modal-card-foot">
                    <button class="button is-primary">Login</button>
                </footer>
            </div>
        </form>
    </b-dropdown-item>
</b-dropdown>