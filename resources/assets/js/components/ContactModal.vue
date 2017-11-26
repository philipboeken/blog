<template>
    <div>
        <a class="button is-centered" @click="active=true">
            Create a new Contact
            <i class="fa fa-plus"></i>
        </a>

        <div class="modal" :class="{'is-active': active}">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Create a new Contact</p>
                    <a class="delete" @click="active=false"></a>
                </header>
                <section class="modal-card-body">
                    <div class="field">
                        <label class="label">First name</label>
                        <div class="control">
                            <input class="input" type="text" v-model="first_name">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Surname</label>
                        <div class="control">
                            <input class="input" type="text" v-model="surname">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Tel 1</label>
                        <div class="control">
                            <input class="input" type="text" v-model="tel1">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Tel 2</label>
                        <div class="control">
                            <input class="input" type="text" v-model="tel2">
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <a class="button is-success" @click="send()">Save changes</a>
                    <a class="button" @click="active=false">Cancel</a>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    components: {},
    data() {
      return {
        active: false,
        first_name: '',
        surname: '',
        tel1: '',
        tel2: ''
      }
    },
    props: {},
    methods: {
      send() {
        axios.post('/contacts/create', {
          first_name: this.first_name,
          surname: this.surname,
          tel1: this.tel1,
          tel2: this.tel2
        })
          .then(
            location.reload()
          );
      }
    }
  }
</script>