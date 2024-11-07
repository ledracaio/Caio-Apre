<template>
    <div>
        <button @click="createPessoa">Nova Pessoa</button>
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
                        <button @click="editPessoa(pessoa)">Editar</button>
                        <button @click="deletePessoa(pessoa.id)">Excluir</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            pessoas: [],
        }
    },
    mounted() {
        this.getPessoas();
    },
    methods: {
        getPessoas() {
            axios.get('/api/pessoas')
                .then(response => {
                    this.pessoas = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        createPessoa() {
            // Navegar para a rota de criação
        },
        editPessoa(pessoa) {
            // Navegar para a rota de edição, passando a pessoa como parâmetro
        },
        deletePessoa(id) {
            axios.delete(`/api/pessoas/${id}`)
                .then(response => {
                    this.getPessoas();
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
}
</script>