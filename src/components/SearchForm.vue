<template>
  <div class="search-form">
    <div class="container w-25">
      <div class="form-group">
        <label for="phone" class="text-info">First Name:</label><br />
        <input type="text" class="form-control" v-model="first_name" />
      </div>
      <div class="form-group">
        <label for="phone" class="text-info">Surname:</label><br />
        <input type="text" class="form-control" v-model="surname" />
      </div>
      <div class="form-group">
        <input
          type="submit"
          class="btn btn-info btn-md w-100"
          @click="search"
        />
      </div>
      
    </div>
  <div class="users w-75">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Surname</th>
          </tr>
        </thead>
        <tbody v-for="user in users" :key="user">
          <tr>
            <th scope="row">{{ user.id }}</th>
            <td>{{ user.first_name }}</td>
            <td>{{ user.surname }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    
  </div>
</template>
<script>
export default {
  name: "SearchForm",

  data() {
    return {
      first_name: "",
      surname: "",
      users: {
        id: "",
        first_name: "",
        surname: "",
      },
    };
  },
  methods: {
    search() {
      let search = `${this.first_name} ` + `${this.surname}`;
      fetch(`http://photoservice/public/api/user?search=${search}`, {
        method: "GET",
        headers: {
          "Content-Type": "application/json",
          Authorization: "Bearer " + this.token,
        },
      })
        .then((response) => response.json())
        .then((commits) => {
          this.users = Array.from(commits).map((val) => {
            return val;
          });
          // console.log(this.users);
        });
        let users = document.querySelector("div.users");
        users.style="display:block !important";
    },
  },
  props: ["token"],
};
</script>