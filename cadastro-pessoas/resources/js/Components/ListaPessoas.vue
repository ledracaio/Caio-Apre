<template>
    <div>
        <h1>Lista de Pessoas</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Tipo</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="pessoa in pessoas" :key="pessoa.id">
                    <td>{{ pessoa.nome }}</td>
                    <td>{{ pessoa.cpf }}</td>
                    <td>{{ pessoa.tipo }}</td>
                    <td>{{ pessoa.telefone }}</td>
                    <td>{{ pessoa.email }}</td>
                    <td>
                        <button @click="editarPessoa(pessoa)">Editar</button>
                        <button @click="deletarPessoa(pessoa.id)">Excluir</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            pessoas: []
        };
    },
    methods: {
        async carregarPessoas() {
            const response = await axios.get('/api/pessoas');
            this.pessoas = response.data;
        },
        async deletarPessoa(id) {
            await axios.delete(`/api/pessoas/${id}`);
            this.carregarPessoas();
        },
        editarPessoa(pessoa) {
            // Implementar função de edição aqui
        }
    },
    mounted() {
        this.carregarPessoas();
    }
};
</script>
