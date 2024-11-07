<template>
    <div>
      <h2>{{ pessoa.id ? "Editar" : "Cadastrar" }} Pessoa</h2>
      <form @submit.prevent="savePessoa">
        <input v-model="pessoa.nome" placeholder="Nome" />
        <input v-model="pessoa.cpf" placeholder="CPF" />
        <select v-model="pessoa.tipo">
          <option value="fisica">Física</option>
          <option value="juridica">Jurídica</option>
        </select>
        <input v-model="pessoa.telefone" placeholder="Telefone" />
        <input v-model="pessoa.email" placeholder="Email" />
        <button type="submit">Salvar</button>
      </form>
    </div>
  </template>
  
  <script>
  import axios from './axios';
  
  export default {
    props: {
      pessoaId: Number
    },
    data() {
      return {
        pessoa: { nome: '', cpf: '', tipo: '', telefone: '', email: '' }
      };
    },
    methods: {
      async savePessoa() {
        if (this.pessoa.id) {
          await axios.put(`pessoas/${this.pessoa.id}`, this.pessoa);
        } else {
          await axios.post('pessoas', this.pessoa);
        }
        this.$emit('saved');
      }
    }
  };
  </script>
  