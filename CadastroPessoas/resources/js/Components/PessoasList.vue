<template>
    <div>
      <h2>Pessoas</h2>
      <button @click="fetchPessoas">Atualizar</button>
      <ul>
        <li v-for="pessoa in pessoas" :key="pessoa.id">
          {{ pessoa.nome }} - {{ pessoa.cpf }}
          <button @click="editPessoa(pessoa)">Editar</button>
          <button @click="deletePessoa(pessoa.id)">Excluir</button>
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import axios from '../axios';
  
  export default {
    data() {
      return {
        pessoas: []
      };
    },
    methods: {
      async fetchPessoas() {
        const response = await axios.get('pessoas');
        this.pessoas = response.data;
      },
      async deletePessoa(id) {
        await axios.delete(`pessoas/${id}`);
        this.fetchPessoas();
      }
    },
    mounted() {
      this.fetchPessoas();
    }
  };
  </script>
  