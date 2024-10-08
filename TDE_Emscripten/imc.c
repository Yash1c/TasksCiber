#include <stdio.h>

// Função para calcular o IMC
float calcular_imc(float peso, float altura) {
    return peso / (altura * altura);
}

int main() {
    printf("Função calcular_imc disponível para WebAssembly\n");
    return 0;
}
