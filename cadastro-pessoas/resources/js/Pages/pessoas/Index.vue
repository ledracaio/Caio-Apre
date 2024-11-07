<template>
  <div>
    <h1>Lista de Pessoas</h1>
    <div>
      <button @click="addPessoa">Adicionar Pessoa</button>
    </div>

    <ul>
      <li v-for="pessoa in pessoas" :key="pessoa.id">
        {{ pessoa.nome }} ({{ pessoa.tipo }})
        <button @click="deletePessoa(pessoa.id)">Excluir</button>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: {
    pessoas: Array,
  },

  methods: {
    addPessoa() {
      this.$inertia.visit('/pessoas/create');
    },

    deletePessoa(id) {
      if (confirm("Tem certeza que deseja excluir?")) {
        this.$inertia.delete(`/pessoas/${id}`);
      }
    }
  }
}
</script>
