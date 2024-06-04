<template>
  <div>
      <h1>Insira o CEP</h1>
      <input v-model="cep" @input="getCepInfo" maxlength="8" />
      <div v-if="cepInfo">
          <p>Rua: {{ cepInfo.logradouro }}</p>
          <p>Bairro: {{ cepInfo.bairro }}</p>
          <p>Cidade: {{ cepInfo.localidade }}</p>
          <p>Estado: {{ cepInfo.uf }}</p>
          <input v-model="cepInfo.logradouro" readonly /><br />
          <input v-model="cepInfo.bairro" readonly /><br />
          <input v-model="cepInfo.localidade" readonly /><br />
          <input v-model="cepInfo.uf" readonly /><br />
      </div>
  </div>
</template>

<script>

export default {
data() {
  return {
    cep: '',
    cepInfo: null
  };
},
methods: {
  getCepInfo() {
    if (this.cep.length === 8) {
      fetch(`https://viacep.com.br/ws/${this.cep}/json/`)
        .then(response => response.json())
        .then(data => {
          this.cepInfo = data;
        });
    }
  }
}
};
</script>