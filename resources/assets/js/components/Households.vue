<template>
  <div class="columns is-multiline" v-for="household in households"s>  
    <div class="column is-one-third">
      <div class="card is-fullwidth">
        <header class="card-header">
          <p class="card-header-title">
            Household {{ household.name }}
          </p>
        </header>

        <div class="card-content">
          <table class="table">
            <tbody>
              <tr v-for="user in household.users">
                <td>{{ user.name }}</td>
              </tr>
            </tbody>
          </table>
        </div>

        <footer class="card-footer">
          <a class="card-footer-item" v-show="true" href="/households/{{ household.id }}" >
            Visit {{ household.name }}
          </a>
        </footer>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    /**
     * Properties.
     */
    data() {
      return { households: [] }
    },

    /**
     * Instantiating and calling for an event listener.
     */
    ready() {
      this.loadHouseholds();
    },

    methods: {
      /**
       * Ajax call to get all the households
       */
      loadHouseholds() {
        this.$http.get('api/households')
            .then(({ body }) => this.households = JSON.parse(body));
      },

      /**
       * Ajax call to remove a household
       */
      removeHousehold(household) {
        this.households.$remove(household);
        
        this.$http.delete(`api/households/${household.id}`);
      },
    }
  }
</script>
