<template>
    <div class="container">
        <h2>Pessoas</h2>
        <!-- Formulário de cadastro -->
        <!-- Listagem de pessoas -->
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            pessoas: [],
            novaPessoa: { nome: '', cpf: '', tipo: 'fisica', telefone: '', email: '' },
        };
    },
    methods: {
        async carregarPessoas() {
            const response = await axios.get('/api/pessoas');
            this.pessoas = response.data;
        },
        async adicionarPessoa() {
            await axios.post('/api/pessoas', this.novaPessoa);
            this.carregarPessoas();
            this.novaPessoa = { nome: '', cpf: '', tipo: 'fisica', telefone: '', email: '' };
        },
        async atualizarPessoa(pessoa) {
            await axios.put(`/api/pessoas/${pessoa.id}`, pessoa);
            this.carregarPessoas();
        },
        async excluirPessoa(id) {
            await axios.delete(`/api/pessoas/${id}`);
            this.carregarPessoas();
        },
    },
    mounted() {
        this.carregarPessoas();
    },
};
</script>

<style>
.container {
    margin-top: 20px;
}
</style>
