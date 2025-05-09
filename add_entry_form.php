<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Dodaj wpis</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>
<body>
<div class="header"><h1>Dziennik Podróży</h1></div>
<div class="nav">
  <a href="entries.php">Wpisy</a>
  <a href="add_entry_form.php">Dodaj wpis</a>
  <a href="logout.php">Wyloguj</a>
</div>
<div class="container" id="app">
  <h2>Dodaj nowy wpis</h2>
  <form @submit.prevent="addEntry" enctype="multipart/form-data">
    <label>Tytuł:</label>
    <input type="text" v-model="newEntry.title" required>

    <label>Opis:</label>
    <textarea v-model="newEntry.description" required></textarea>

    <label>Miejsce:</label>
    <input type="text" v-model="newEntry.location" required>

    <label>Data podróży:</label>
    <input type="date" v-model="newEntry.travel_date" required>

    <label>Kategoria:</label>
    <select v-model="newEntry.category_id" required>
      <option value="">Wybierz kategorię</option>
      <option v-for="cat in categories" :value="cat.id">{{ cat.name }}</option>
    </select>

    <div style="margin-top: 15px;">
      <label>Zdjęcie:</label>
      <input type="file" @change="handleFileUpload" accept="image/*">
    </div>

    <input type="submit" value="Dodaj wpis">
  </form>
  <p v-if="message" class="message">{{ message }}</p>
</div>
<script>
const { createApp } = Vue;
createApp({
  data() {
    return {
      newEntry: {
        title: '',
        description: '',
        location: '',
        travel_date: '',
        category_id: ''
      },
      categories: [],
      photo: null,
      message: ''
    };
  },
  methods: {
    fetchCategories() {
      fetch('api/categories.php')
        .then(res => res.json())
        .then(data => this.categories = data);
    },
    handleFileUpload(event) {
      this.photo = event.target.files[0];
    },
    addEntry() {
      const formData = new FormData();
      for (const key in this.newEntry) {
        formData.append(key, this.newEntry[key]);
      }
      if (this.photo) {
        formData.append('photo', this.photo);
      }
      fetch('add_entry.php', {
        method: 'POST',
        body: formData
      })
      .then(res => res.text())
      .then(msg => {
        this.message = msg;
        this.newEntry = { title: '', description: '', location: '', travel_date: '', category_id: '' };
        this.photo = null;
      });
    }
  },
  mounted() {
    this.fetchCategories();
  }
}).mount('#app');
</script>
</body>
</html>
