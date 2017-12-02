<template>
   <aside class="menu">
      <ul class="menu-list">
         <li><a :class="{ 'is-active' : active === 'personal' }" href="/account/personal">Personal Information</a></li>
         <li><a :class="{ 'is-active' : active === 'account' }" href="/account/account">Account Settings</a></li>
         <li><a :class="{ 'is-active' : active === 'notifications' }" href="/account/notifications">Notification Settings</a></li>
      </ul>
   </aside>
</template>

<script>
  export default {
    components: {},
    data() {
      return {
      }
    },
    props: {
      active: {
        type: String,
        default: 'personal'
      }
    },
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