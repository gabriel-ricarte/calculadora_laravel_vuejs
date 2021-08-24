<template>
  <div class="container">
    <div class="container my-4">
      <div class="calculator card">
        <input
          type="text"
          class="calculator-screen z-depth-1"
          value=""
          disabled
          id="calculadora_val"
        />

        <div class="calculator-keys">
          <button
            type="button"
            class="operator enable btn btn-info"
            value="+"
            v-on:click="clickOperador('+')"
          >
            +
          </button>
          <button
            type="button"
            class="operator enable btn btn-info"
            value="-"
            v-on:click="clickOperador('-')"
          >
            -
          </button>
          <button
            type="button"
            class="operator enable btn btn-info"
            value="*"
            v-on:click="clickOperador('x')"
          >
            &times;
          </button>
          <button
            type="button"
            class="operator enable btn btn-info"
            value="&divide;"
            v-on:click="clickOperador('/')"
          >
            &divide;
          </button>

          <button
            type="button"
            value="7"
            class="btn btn-light waves-effect"
            v-on:click="clickNumero(7)"
          >
            7
          </button>
          <button
            type="button"
            value="8"
            class="btn btn-light waves-effect"
            v-on:click="clickNumero(8)"
          >
            8
          </button>
          <button
            type="button"
            value="9"
            class="btn btn-light waves-effect"
            v-on:click="clickNumero(9)"
          >
            9
          </button>

          <button
            type="button"
            value="4"
            class="btn btn-light waves-effect"
            v-on:click="clickNumero(4)"
          >
            4
          </button>
          <button
            type="button"
            value="5"
            class="btn btn-light waves-effect"
            v-on:click="clickNumero(5)"
          >
            5
          </button>
          <button
            type="button"
            value="6"
            class="btn btn-light waves-effect"
            v-on:click="clickNumero(6)"
          >
            6
          </button>

          <button
            type="button"
            value="1"
            class="btn btn-light waves-effect"
            v-on:click="clickNumero(1)"
          >
            1
          </button>
          <button
            type="button"
            value="2"
            class="btn btn-light waves-effect"
            v-on:click="clickNumero(2)"
          >
            2
          </button>
          <button
            type="button"
            value="3"
            class="btn btn-light waves-effect"
            v-on:click="clickNumero(3)"
          >
            3
          </button>

          <button
            type="button"
            value="0"
            class="btn btn-light waves-effect"
            v-on:click="clickNumero(0)"
          >
            0
          </button>
          <button
            type="button"
            class="decimal function btn btn-secondary"
            value="."
            v-on:click="clickNumero('.')"
          >
            .
          </button>
          <button
            type="button"
            class="all-clear function btn btn-danger btn-sm"
            value="all-clear"
             v-on:click="limpa()"
          >
            AC
          </button>

          <button
            type="button"
            class="equal-sign operator btn btn-default"
            value="="
            v-on:click="clickResult()"
          >
            =
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      valor_um: "",
      valor_dois: "",
      operacao: "",
    };
  },
  methods: {
    clickNumero(valor) {
      valor = $("#calculadora_val").val() + valor;
      $("#calculadora_val").val(valor);
    },
    clickOperador(valor) {

      this.operacao = valor;
      var expressao = $("#calculadora_val").val();
      if (expressao.length > 0) {
        this.disableEnableOperator(false);
        valor = $("#calculadora_val").val() + valor;
        $("#calculadora_val").val(valor);
      }
    },
    clickResult() {

      console.log(this.operacao);
      switch (this.operacao) {
        case "+":
          var expressao = $("#calculadora_val").val();
          if (expressao.length > 0) {
            var arrayExpressao = expressao.split("+");
            this.valor_um = arrayExpressao[0];
            this.valor_dois = arrayExpressao[1];
           if(arrayExpressao[1]){
               this.disableEnableOperator(true);
                this.valor_dois = arrayExpressao[1];
                this.soma();
            }
          }
          break;
        case "-":
          var expressao = $("#calculadora_val").val();
          if (expressao.length > 0) {
            var arrayExpressao = expressao.split("-");
            this.valor_um = arrayExpressao[0];
            if(arrayExpressao[1]){
                this.disableEnableOperator(true);
                this.valor_dois = arrayExpressao[1];
                this.subtrai();
            }

          }

          break;
        case "x":
          var expressao = $("#calculadora_val").val();
          if (expressao.length > 0) {
            var arrayExpressao = expressao.split("x");
            this.valor_um = arrayExpressao[0];
            this.valor_dois = arrayExpressao[1];
           if(arrayExpressao[1]){
               this.disableEnableOperator(true);
                this.valor_dois = arrayExpressao[1];
                this.multiplica();
            }

          }

          break;
        case "/":
          var expressao = $("#calculadora_val").val();
          if (expressao.length > 0) {
            var arrayExpressao = expressao.split("/");
            this.valor_um = arrayExpressao[0];
            this.valor_dois = arrayExpressao[1];
            if(arrayExpressao[1] && arrayExpressao[1] != 0){
                this.disableEnableOperator(true);
                this.valor_dois = arrayExpressao[1];
                this.divide();
            }else{
                swal("Operação inválida ");
            }

          }

          break;

        default:
          break;
      }
    },
    limpa(){
        $("#calculadora_val").val('');
        this.disableEnableOperator(true);
    },
    soma() {
      axios
        .get(
          "/api/soma/valor_um/" +
            this.valor_um +
            "/valor_dois/" +
            this.valor_dois
        )
        .then(
          (response) => {
            $("#calculadora_val").val(response.data);
          },
          (error) => {
            console.log(error);
          }
        );
    },
    subtrai() {
      axios
        .get(
          "/api/subtrai/valor_um/" +
            this.valor_um +
            "/valor_dois/" +
            this.valor_dois
        )
        .then(
          (response) => {
            $("#calculadora_val").val(response.data);
          },
          (error) => {
            console.log(error);
          }
        );
    },
    multiplica() {
      axios
        .get(
          "/api/multiplica/valor_um/" +
            this.valor_um +
            "/valor_dois/" +
            this.valor_dois
        )
        .then(
          (response) => {
            $("#calculadora_val").val(response.data);
          },
          (error) => {
            console.log(error);
          }
        );
    },
    divide() {
      axios
        .get(
          "/api/divide/valor_um/" +
            this.valor_um +
            "/valor_dois/" +
            this.valor_dois
        )
        .then(
          (response) => {
              console.log(response.data);
            $("#calculadora_val").val(response.data);
          },
          (error) => {
            console.log(error);
          }
        );
    },
    disableEnableOperator(flag){
        if (flag) {
            $('.enable').each(function(){
                $(this).removeAttr('disabled');
            });
        } else {
            $('.enable').each(function(){
                $(this).attr('disabled','disabled');
            });
        }
    }
  },
};
</script>
<style scoped>
html {
  font-size: 62.5%;
  box-sizing: border-box;
}

*,
*::before,
*::after {
  margin: 0;
  padding: 0;
  box-sizing: inherit;
}

.calculator {
  border: 1px solid #ccc;
  border-radius: 5px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 400px;
}

.calculator-screen {
  width: 100%;
  height: 80px;
  border: none;
  background-color: #252525;
  color: #fff;
  text-align: right;
  padding-right: 20px;
  padding-left: 10px;
  font-size: 4rem;
}

button {
  height: 60px;
  font-size: 2rem !important;
}

.equal-sign {
  height: 98%;
  grid-area: 2 / 4 / 6 / 5;
}

.calculator-keys {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-gap: 20px;
  padding: 20px;
}
</style>
