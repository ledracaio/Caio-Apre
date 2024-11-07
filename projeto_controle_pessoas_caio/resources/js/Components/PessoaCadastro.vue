<template>
    <div>
        <h1>Cadastrar Pessoa</h1>
        <form @submit.prevent="createPessoa">
            <input v-model="nome" placeholder="Nome" required />
            <input v-model="cpf" placeholder="CPF" required />
            <select v-model="tipo" required>
                <option value="fisica">Física</option>
                <option value="juridica">Jurídica</option>
            </select>
            <input v-model="telefone" placeholder="Telefone" required />
            <input v-model="email" placeholder="Email" required />
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            nome: '',
            cpf: '',
            tipo: 'fisica',
            telefone: '',
            email: ''
        };
    },
    methods: {
        createPessoa() {
            // Create pessoa via API
        }
    }
};
</script>
