<script setup>
import { useForm, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const form = useForm({
  nome: '',
  cpf: '',
  tipo: 'fisica',
  telefone: '',
  email: ''
});

function savePessoa() {
  form.post(route('pessoas.store'), {
    onSuccess: () => alert("Pessoa criada com sucesso!"),
    onError: (error) => console.error("Erro ao criar pessoa:", error)
  });
}
</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Cadastrar Nova Pessoa</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            
            <form @submit.prevent="savePessoa" class="space-y-6">

                <div class="flex justify-end space-x-4">
                <button type="submit" :disabled="form.processing" class="btn btn-primary">Salvar</button>
                <Link :href="route('pessoas.index')" class="btn btn-secondary">Cancelar</Link>  
              </div>
              
              <div class="space-y-2">
                <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                <input id="nome" v-model="form.nome" placeholder="Nome" required class="input-field"/>
              </div>
              
              <div class="space-y-2">
                <label for="cpf" class="block text-sm font-medium text-gray-700">CPF</label>
                <input id="cpf" v-model="form.cpf" placeholder="CPF" required class="input-field"/>
              </div>
              
              <div class="space-y-2">
                <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo de Pessoa</label>
                <select id="tipo" v-model="form.tipo" required class="input-field">
                  <option value="fisica">Física</option>
                  <option value="juridica">Jurídica</option>
                </select>
              </div>
              
              <div class="space-y-2">
                <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone</label>
                <input id="telefone" v-model="form.telefone" placeholder="Telefone" required class="input-field"/>
              </div>
              
              <div class="space-y-2">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" v-model="form.email" placeholder="Email" required class="input-field"/>
              </div>
              
            </form>

          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
