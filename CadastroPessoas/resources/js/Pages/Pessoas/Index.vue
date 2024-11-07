<script setup>
import { Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import axios from 'axios';

const props = defineProps(['pessoas']);


async function deletePessoa(id) {
  if (confirm("Tem certeza que deseja excluir esta pessoa?")) {
    try {
      await axios.delete(route('pessoas.destroy', id), {
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
      });
      alert("Pessoa excluída com sucesso!");

      pessoas.value = pessoas.value.filter(pessoa => pessoa.id !== id);
    } catch (error) {
      console.error("Erro ao excluir pessoa:", error);
      location.reload();
    }
  }
}


</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Lista de Pessoas</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <Link :href="route('pessoas.create')" class="btn btn-primary mb-4">Criar Nova Pessoa</Link>
            <table class="table-auto w-full mt-4">
              <thead>
                <tr class="bg-gray-200">
                  <th class="px-4 py-2">Nome</th>
                  <th class="px-4 py-2">CPF</th>
                  <th class="px-4 py-2">Tipo</th>
                  <th class="px-4 py-2">Telefone</th>
                  <th class="px-4 py-2">E-mail</th>
                  <th class="px-4 py-2">Ações</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="pessoa in pessoas" :key="pessoa.id">
                  <td class="border px-4 py-2">{{ pessoa.nome }}</td>
                  <td class="border px-4 py-2">{{ pessoa.cpf }}</td>
                  <td class="border px-4 py-2">{{ pessoa.tipo }}</td>
                  <td class="border px-4 py-2">{{ pessoa.telefone }}</td>
                  <td class="border px-4 py-2">{{ pessoa.email }}</td>
                  <td class="border px-4 py-2">
                    <Link :href="route('pessoas.edit', pessoa.id)" class="text-blue-500 hover:underline">Editar</Link>
                    <button @click="deletePessoa(pessoa.id)" class="text-red-500 hover:underline ml-4">Excluir</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
