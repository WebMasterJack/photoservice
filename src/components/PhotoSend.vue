<template>
  <div class="photo-send d-flex flex-column">
    <h2>Добавить фотографию</h2>
    <input type="file" id="file" />
    <input
      type="submit"
      class="btn btn-info btn-md"
      value="Отправить"
      @click="send"
    />
    <div
      :key="componentKey"
      class="text-left"
      style="white-space: nowrap"
    >
      <template v-if="status">
        <h2 class="text-center text-success">Добавлено</h2>
        <p>ID:{{ this.sendes.get("post_id") }}</p>
        <p>URL:{{ this.sendes.get("url") }}</p>
      </template>
      <template v-else> </template>
    </div>
  </div>
</template>
<script>
export default {
  name: "PhotoSend",

  data() {
    return {
      sendes: {
        post_id: "",
        url: "",
        status: false,
      },
      componentKey: 0,
    };
  },
  methods: {
    send() {
      var input = document.querySelector('input[type="file"]');

      var formData = new FormData();
      formData.append("image", input.files[0]);

      fetch("http://photoservice/public/api/photo", {
        method: "POST",
        headers: {
          Accept: "*/*",
          Authorization: "Bearer " + this.token,
        },
        body: formData,
      })
        .then((response) => response.json())
        .then((commits) => {
          let obj = Object.entries(commits); //.map((val)=>{return val});

          this.sendes = new Map(obj);
          console.log(this.sendes.get("url"));
          this.status = this.sendes.get("status");
          console.log(this.status);
          this.componentKey += 1;
        });
    },
  },
  props: ["token"],
};
</script>