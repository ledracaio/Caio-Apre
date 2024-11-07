<template>
  <div>
    <h1>Adicionar Pessoa</h1>
    <form @submit.prevent="submit">
      <div>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" v-model="form.nome" />
      </div>
      <div>
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" v-model="form.cpf" />
      </div>
      <div>
        <label for="tipo">Tipo:</label>
        <select id="tipo" v-model="form.tipo">
          <option value="fisica">Física</option>
          <option value="juridica">Jurídica</option>
        </select>
      </div>
      <div>
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" v-model="form.telefone" />
      </div>
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="form.email" />
      </div>
      <button type="submit">Salvar</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        nome: '',
        cpf: '',
        tipo: 'fisica',
        telefone: '',
        email: '',
      },
    };
  },

  methods: {
    submit() {
      this.$inertia.post('/pessoas', this.form);
    }
  }
}
</script>