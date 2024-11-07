<template>
    <div>
        <h1>Lista de Pessoas</h1>
        <router-link to="/pessoas/create">Adicionar Pessoa</router-link>
        <ul>
            <li v-for="pessoa in pessoas" :key="pessoa.id">
                {{ pessoa.nome }} 
                <router-link :to="{ name: 'pessoas.edit', params: { pessoa: pessoa.id } }">Editar</router-link>
                <button @click="deletePessoa(pessoa.id)">Excluir</button>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            pessoas: []
        };
    },
    mounted() {
        this.fetchPessoas();
    },
    methods: {
        fetchPessoas() {
            // Fetch pessoas from API
        },
        deletePessoa(id) {
            // Delete pessoa from API
        }
    }
};
</script>
