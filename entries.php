<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Wpisy</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>
<body>
  
<div class="header">
  <h1>Dziennik Podróży</h1>
</div>
<div class="nav">
    <a href="entries.php">Wpisy</a>
    <a href="add_entry_form.php">Dodaj wpis</a>
    <a href="logout.php">Wyloguj</a>
  </div>
  <div class="container" id="app">
    <h2>Moje wpisy</h2>

    <label>Filtruj po kategorii:</label>
    <select v-model="selectedCategory">
      <option value="">Wszystkie</option>
      <option v-for="cat in categories" :key="cat.id" :value="cat.name">
        {{ cat.name }}
      </option>
    </select>

    <div v-for="entry in filteredEntries" :key="entry.id" class="entry">
      <h3>{{ entry.title }}</h3>
      <p>{{ entry.description }}</p>
      <small>{{ entry.location }} – {{ entry.travel_date }}</small>
      <img v-if="entry.photo" :src="'uploads/' + entry.photo" alt="Zdjęcie" />
    </div>
  </div>

  <script>
    const { createApp } = Vue;
    createApp({
      data() {
        return {
          entries: [],
          categories: [],
          selectedCategory: ''
        };
      },
      computed: {
        filteredEntries() {
          if (!this.selectedCategory) return this.entries;
          return this.entries.filter(e => e.category_name === this.selectedCategory);
        }
      },
      methods: {
        fetchEntries() {
          fetch('api/entries.php')
            .then(res => res.json())
            .then(data => this.entries = data);
        },
        fetchCategories() {
          fetch('api/categories.php')
            .then(res => res.json())
            .then(data => this.categories = data);
        }
      },
      mounted() {
        this.fetchEntries();
        this.fetchCategories();
      }
    }).mount('#app');
  </script>
</body>
</html>
